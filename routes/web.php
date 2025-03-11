<?php

use App\Http\Controllers\AdminPanelController;
use App\Livewire\Panel\Auth\AdminLogin;
use App\Livewire\Panel\Index;
use App\Livewire\Panel\Packages;
use App\Livewire\Panel\Stores;
use App\Livewire\Panel\Users;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::as('admin.')->prefix('admin')->middleware(['web'])->group(function () {

    Route::prefix('panel')
        ->as('panel.')
        ->middleware('auth')
        ->group(function () {
            Route::get('', Index::class)->name('index');
            Route::get('users', Users::class)->name('users');
            Route::get('packages', Packages::class)->name('packages');
            Route::get('stores', Stores::class)->name('stores');
            Route::get('logout', [AdminPanelController::class, 'logout'])->name('logout');
        });

    Route::middleware(['guest'])->group(function () {
        Route::get('login', AdminLogin::class)->name('login');
    });
});
