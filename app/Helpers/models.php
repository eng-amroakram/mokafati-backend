<?php

use App\Http\Controllers\Services\Services;



if (!function_exists('models_count')) {
    function models_count($model)
    {
        if ($model == 'User') {
            $model =  Services::modelInstance($model);
            return $model::whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })->count();
        }

        // if ($model == 'Employee') {
        //     $model =  Services::modelInstance("User");
        //     return $model::whereHas('roles', function ($query) {
        //         $query->where('name', 'store_employee');
        //     })->count();
        // }

        $model =  Services::modelInstance($model);
        return $model::count();
    }
}
