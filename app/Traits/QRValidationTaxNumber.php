<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

trait QRValidationTaxNumber
{
    public function validateTaxNumber($invoiceImage = null, $taxNumber)
    {
        $base64Invoice = $this->getBase64FromImage($invoiceImage);
        $decodedData = $this->decodeTLV($base64Invoice);
        if (isset($decodedData['store_tax_number']) && trim($decodedData['store_tax_number']) === trim($taxNumber)) {
            return true;
        }
        return false;
    }

    private function getBase64FromImage($invoiceImage = null)
    {
        if ($invoiceImage) {

            $path = $invoiceImage->getRealPath();
            $process = new Process(['zbarimg', '--raw', $path]);
            $process->run();
            if (!$process->isSuccessful()) {
                return false;
            }

            return trim($process->getOutput());
        }

        return false;
    }

    private function decodeTLV($base64Data)
    {
        $data = base64_decode($base64Data);
        $result = [];

        $offset = 0;
        while ($offset < strlen($data)) {
            $tag = ord($data[$offset]);
            $length = ord($data[$offset + 1]);
            $value = substr($data, $offset + 2, $length);
            $offset += 2 + $length;

            $result[$tag] = $value;
        }

        $invoiceData = [
            'storeName' => $result[1] ?? '',
            'store_tax_number' => $result[2] ?? '',
            'time' => $result[3] ?? '',
            'total_bill' => $result[4] ?? '',
            'value_added_tax' => $result[5] ?? '',
        ];

        return $invoiceData;
    }
}
