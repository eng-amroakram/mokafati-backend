<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageService extends Controller
{
    public $model = Package::class;

    public function __construct()
    {
        $this->model = new Package();
    }

    public function model($id)
    {
        return Package::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Package::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeAccountStatus($id)
    {
        return Package::changeAccountStatus($id);
    }

    public function delete($id)
    {
        return Package::deleteModel($id);
    }

    public function store($data)
    {
        return Package::storeModel($data);
    }

    public function update($data, $id)
    {
        return Package::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Package::getRules($id);
    }

    public function messages()
    {
        return Package::getMessages();
    }
}
