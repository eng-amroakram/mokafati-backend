<?php

use App\Http\Controllers\Services\Services;



if (!function_exists('models_count')) {
    function models_count($model)
    {
        if ($model == 'User') {
            $model =  Services::modelInstance($model);
            return $model::where('role', 'user')->count();
        }

        if ($model == 'Employee') {
            $model =  Services::modelInstance("User");
            return $model::where('role', 'employee')->count();
        }


        $model =  Services::modelInstance($model);
        return $model::count();
    }
}
