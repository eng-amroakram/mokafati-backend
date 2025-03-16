<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Employee extends Model
{
    use ModelHelper;

    protected $file_path = 'images/qr-images';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'status',
        'qr_code',
        'store_id',
    ];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'name',
            'email',
            'phone',
            'type',
            'status',
            'qr_code',
            'store_id',
        ]);
    }

    public function getImagePath($filed)
    {
        $image = $this->attributes[$filed];
        return $image && Storage::disk('public')->exists($image) ? asset('storage/' . $image) : asset('panel/images/no-image-available.jpg');
    }

    public function getQrCodeTableAttribute()
    {
        return $this->getImagePath('qr_code');
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
        ], $filters);

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query
                ->where('name', 'like', '%' . $filters['search'] . '%');
        });
    }

    public function scopeGetRules(Builder $builder, $id = "")
    {
        return [
            'name' => ['required',],
            'email' => ['required', 'unique:employees,email,' . "$id," . "id"],
            'phone' => ['required', 'unique:employees,phone,' . "$id," . "id"],
            'type' => ['required', 'in:waiter,delivery,cashier'],
            'store_id' => ['required', 'exists:stores,id'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.unique' => 'البريد الإلكتروني مسجل بالفعل',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.unique' => 'رقم الهاتف مسجل بالفعل',
            'type.required' => 'نوع الموظف مطلوب',
            'type.in' => 'النوع يجب أن يكون أحد القيم التالية: waiter, delivery, cashier',
            'store_id.required' => 'هذا الحقل مطلوب',
            'store_id.exists' => 'المتجر المحدد غير موجود',
        ];
    }

    public function scopeStoreModel(Builder $builder, array $data = [])
    {
        $employee = $builder->create($data);
        if ($employee) {
            $this->generateQrCode($employee);
        }
        return $employee ? $employee : false;
    }

    public function generateQrCode($employee)
    {
        $folderPath = storage_path('app/public/images/qr-images/');

        // Check if the folder exists, if not, create it
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true); // true for recursive creation
        }

        $data = "Name: {$employee->name}\nPhone: {$employee->phone}\nEmail: {$employee->email}\nID: {$employee->id}\nType: {$employee->type}";
        $qrCodeName = 'employee_qr_' . $employee->id . '.png';

        QrCode::format('png')->size(200)->generate($data, $folderPath . $qrCodeName);

        $employee->qr_code = 'images/qr-images/' . $qrCodeName;
        $employee->save();
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {
        $user = $builder->find($id);

        if ($user) {
            $user = $user->update($data);
            return true;
        }
        return false;
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
