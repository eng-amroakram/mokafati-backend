<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeService extends Controller
{
    public $model = Employee::class;

    public function __construct()
    {
        $this->model = new Employee();
    }

    public function model($id)
    {
        return Employee::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        $store_manager = Auth::user();
        return Employee::data()->where('store_id', $store_manager->store->id)
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return Employee::changeStatus($id);
    }

    public function delete($id)
    {
        Employee::deleteFile($id, 'qr_code');
        return Employee::deleteModel($id);
    }

    public function store($data)
    {
        return Employee::storeModel($data);
    }

    public function update($data, $id)
    {
        return Employee::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Employee::getRules($id);
    }

    public function messages()
    {
        return Employee::getMessages();
    }
}
