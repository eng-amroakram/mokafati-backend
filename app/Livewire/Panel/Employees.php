<?php

namespace App\Livewire\Panel;

use App\Http\Controllers\Services\Services;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Employees extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $service = null;

    public $pagination = 10;
    public $sort_field = 'id';
    public $sort_direction = 'asc'; // desc

    public $search = "";
    public $filters = [];

    public $name = "";
    public $email = "";
    public $phone = "";
    public $type = "waiter";
    public $qr_code = "";
    public $model_id = "";

    private function setService()
    {
        return Services::createInstance("EmployeeService") ?? new Services();
    }


    #[Title('لوحة التحكم - الموظفين'), Layout('layouts.panel.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;

        $service = $this->setService();
        $employees = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.panel.employees', [
            'employees' => $employees
        ]);
    }

    public function delete($id)
    {
        $service = $this->setService();
        $message = $service->delete($id);
        $this->alertMessage("تم الحذف بنجاح", 'success');
    }

    public function addEmployee()
    {
        $store_manager = User::where('id', Auth::id())->first();

        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "type" => $this->type,
            "status" => 'active',
            "store_id" => $store_manager->store->id,
        ];

        $rules = $service->rules();
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-errors', $errors);
            return false;
        }

        $user = $service->store($data);

        if ($user) {
            $this->dispatch('process-has-been-done');
            return redirect()->to(request()->header('Referer'));
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بياناتك', 'error');
        return false;
    }

    public function updateEmployee()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "type" => $this->type,
        ];

        $rules = $service->rules($this->model_id);
        $messages = $service->messages();
        $rules['store_id'] = [];
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-errors', $errors);
            return false;
        }

        $user = $service->update($data, $this->model_id);

        if ($user) {
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
        $employee = Employee::where('id', $id)->first();
        $this->model_id = $id;
        $this->name = $employee->name;
        $this->email = $employee->email;
        $this->phone = $employee->phone;
        $this->type = $employee->type;
        $this->dispatch('singleSelectInput', $this->type);
    }

    #[On('reset-properties')]
    public function empty()
    {
        $this->reset();
    }

    public function changeStatus($id)
    {
        $service = $this->setService();
        $result = $service->changeStatus($id);
        if ($result) {
            $this->alertMessage('تم التحديث بنجاح', 'success');
            return true;
        }
        $this->alertMessage('حدث خطأ', 'error');
        return false;
    }
}
