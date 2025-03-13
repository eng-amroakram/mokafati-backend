<?php

namespace App\Livewire\Panel;

use App\Http\Controllers\Services\Services;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Packages extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    protected $service = null;

    public $pagination = 10;
    public $sort_field = 'id';
    public $sort_direction = 'asc'; // desc

    public $search = "";
    public $filters = [];

    public $title = "";
    public $price = "";
    public $cash_back = "";
    public $rewards = "";
    public $minimum_purchase = "";
    public $bonus = "";
    public $validity_period = "حتى نفاذ عدد المكافئات";
    public $model_id = "";

    private function setService()
    {
        return Services::createInstance("PackageService") ?? new Services();
    }

    #[Title('لوحة التحكم - الباقات'), Layout('layouts.panel.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;

        $service = $this->setService();
        $packages = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.panel.packages', [
            'packages' => $packages
        ]);
    }

    public function delete($id)
    {
        $service = $this->setService();
        $message = $service->delete($id);
        $this->alertMessage($message, 'success');
    }

    public function addPackage()
    {
        $service = $this->setService();

        $data = [
            "title" => $this->title,
            "price" => $this->price,
            "cash_back" => $this->cash_back,
            "rewards" => $this->rewards,
            "minimum_purchase" => $this->minimum_purchase,
            'bonus' => $this->bonus,
            // "validity_period" =>  $this->validity_period,
        ];

        $rules = $service->rules();
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-errors', $errors);
            // $this->alertMessage('يرجى التأكد من إدخال البيانات', 'error');
            return false;
        }

        $user = $service->store($data);

        if ($user) {
            // $this->alertMessage('تم تسجيل البيانات بنجاح', 'success');
            $this->dispatch('process-has-been-done');
            // $this->reset();
            return redirect()->to(request()->header('Referer'));
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بياناتك', 'error');
        return false;
    }

    public function updatePackage()
    {
        $service = $this->setService();

        $data = [
            "title" => $this->title,
            "price" => $this->price,
            "cash_back" => $this->cash_back,
            "rewards" => $this->rewards,
            "minimum_purchase" => $this->minimum_purchase,
            "bonus" => $this->bonus,
            // "validity_period" => $this->validity_period,
        ];

        $rules = $service->rules($this->model_id);
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-errors', $errors);
            // $this->alertMessage('يرجى التأكد من إدخال البيانات', 'error');
            return false;
        }

        $user = $service->update($data, $this->model_id);

        if ($user) {
            // $this->alertMessage('تم تحديث البيانات بنجاح', 'success');
            $this->dispatch('process-has-been-done');
            return redirect()->to(request()->header('Referer'));
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بياناتك', 'error');
        return false;
    }

    public function alertMessage($message, $type = "success")
    {
        if ($type == "success") {
            LivewireAlert::title("العملية نجحت")
                ->text($message)
                ->success()
                ->toast()
                ->position('top-start')
                ->timer(3000)
                ->show();
        }

        if ($type == "error") {
            LivewireAlert::title("العملية فشلت")
                ->text($message)
                ->error()
                ->toast()
                ->position('top-start')
                ->timer(3000)
                ->show();
        }
    }

    public function openModal($id)
    {
        $package = Package::where('id', $id)->first();
        $this->model_id = $id;
        $this->title = $package->title;
        $this->price = $package->price;
        $this->cash_back = $package->cash_back;
        $this->rewards = $package->rewards;
        $this->minimum_purchase = $package->minimum_purchase;
        $this->bonus = $package->bonus;
        // $this->validity_period = $package->validity_period;
    }

    #[On('reset-properties')]
    public function empty()
    {
        $this->reset();
    }
}
