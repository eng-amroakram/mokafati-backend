<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreService extends Controller
{
    public $model = Store::class;

    public function __construct()
    {
        $this->model = new Store();
    }

    public function model($id)
    {
        return Store::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Store::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeAccountStatus($id)
    {
        return Store::changeAccountStatus($id);
    }

    public function delete($id)
    {
        return Store::deleteModel($id);
    }

    public function store($data)
    {
        return Store::store($data);
    }

    public function update($data, $id)
    {
        return Store::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Store::getRules($id);
    }

    public function messages()
    {
        return Store::getMessages();
    }
}
