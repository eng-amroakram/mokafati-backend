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

    public function changeStatus($id)
    {
        return Store::changeStatus($id);
    }

    public function delete($id)
    {
        Store::deleteFile($id, 'commercial_image');
        Store::deleteFile($id, 'tax_image');
        Store::deleteFile($id, 'invoice');
        Store::deleteFile($id, 'logo');
        $store = Store::find($id);
        $store->owner->syncRoles("user");
        return Store::deleteModel($id);
    }

    public function store($data)
    {
        return Store::storeModel($data);
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
