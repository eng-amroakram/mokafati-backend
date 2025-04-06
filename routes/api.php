<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('panel/')->group(function () {

    Route::controller(AuthController::class)
        ->prefix('auth')
        ->middleware(['api'])
        ->group(function () {
            Route::post('register', 'register');
            Route::post('login', 'login');
            Route::post('logout', 'logout');
            Route::post('verify-email', 'verifyEmail');
            Route::post('forgot-password', 'forgotPassword');
            Route::post('reset-password', 'resetPassword');
        });
    // Route::middleware(['api', 'auth:sanctum'])
    //     ->group(function () {});
});
