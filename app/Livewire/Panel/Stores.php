<?php

namespace App\Livewire\Panel;

use App\Http\Controllers\Services\Services;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Stores extends Component
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

    public $name = "";
    public $owner_id = "";
    public $commercial_registration = "";
    public $tax_number = "";
    public $type = "";
    public $invoice = "";
    public $model_id = "";


    private function setService()
    {
        return Services::createInstance("StoreService") ?? new Services();
    }

    #[Title('لوحة التحكم - المتاجر'), Layout('layouts.panel.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;

        $service = $this->setService();
        $stores = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.panel.stores', [
            'stores' => $stores
        ]);
    }

    public function delete($id)
    {
        $service = $this->setService();
        $message = $service->delete($id);
        $this->alertMessage($message, 'success');
    }

    public function openModal($id)
    {
        $store = Store::where('id', $id)->first();
        $this->model_id = $id;
        $this->name = $store->name;
        $this->owner_id = $store->owner_id;
        $this->commercial_registration = $store->commercial_registration;
        $this->tax_number = $store->tax_number;
        $this->type = $store->type;
        $this->invoice = $store->invoice;

        $this->dispatch('singleSelectOwner', $store->owner_id);
        $this->dispatch('singleSelectType', $store->type);
    }

    public function addStore()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "owner_id" => $this->owner_id,
            "commercial_registration" => $this->commercial_registration,
            "tax_number" => $this->tax_number,
            "type" => $this->type,
            'invoice' => $this->invoice,
        ];

        $rules = $service->rules();
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-errors', $errors);
            return false;
        }

        $store = $service->store($data);

        $user = User::where('id', $this->owner_id)->first();
        $user->syncRoles('store_owner');

        if ($store) {
            $this->dispatch('process-has-been-done');
            return redirect()->to(request()->header('Referer'));
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل البيانات', 'error');
        return false;
    }

    public function updateStore()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "owner_id" => $this->owner_id,
            "commercial_registration" => $this->commercial_registration,
            "tax_number" => $this->tax_number,
            "type" => $this->type,
            "invoice" => $this->invoice,
        ];

        $rules = $service->rules($this->model_id);
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-errors', $errors);
            return false;
        }

        $store = $service->update($data, $this->model_id);

        if ($store) {
            $this->dispatch('process-has-been-done');
            return redirect()->to(request()->header('Referer'));
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل البيانات', 'error');
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

    #[On('reset-properties')]
    public function empty()
    {
        $this->reset();
    }
}
