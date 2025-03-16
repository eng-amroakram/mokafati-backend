<?php

use App\Http\Controllers\AdminPanelController;
use App\Livewire\Panel\Auth\AdminLogin;
use App\Livewire\Panel\Employees;
use App\Livewire\Panel\Index;
use App\Livewire\Panel\Packages;
use App\Livewire\Panel\Stores;
use App\Livewire\Panel\Users;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

Route::get('/', function () {
    return redirect()->route('admin.panel.index');
});

Route::as('admin.')->prefix('admin')->middleware(['web'])->group(function () {

    Route::prefix('panel')
        ->as('panel.')
        ->middleware('auth')
        ->group(function () {

            Route::get('', Index::class)->name('index');
            Route::get('logout', [AdminPanelController::class, 'logout'])->name('logout');

            Route::middleware('role:store_owner')->group(function () {
                Route::get('employees', Employees::class)->name('employees');
            });

            Route::middleware('role:admin')->group(function () {
                Route::get('users', Users::class)->name('users');
                Route::get('packages', Packages::class)->name('packages');
                Route::get('stores', Stores::class)->name('stores');
            });
        });

    Route::middleware(['guest'])->group(function () {
        Route::get('login', AdminLogin::class)->name('login');
    });
});


Route::get('test', function () {
    $qrCodeName = 'employee_qr.png';
    $data = "Name: Amro\nPhone: 599916672\nEmail: gmail.com\nID: 125615\nType: admin";

    QrCode::format('png')->size(200)->generate($data, storage_path('app/public/images/qr-images/') . $qrCodeName);

    $path = storage_path('app/public/images/qr-images/') . $qrCodeName;
    $process = new Process(['zbarimg', '--raw', $path]);
    $process->run();
    if (!$process->isSuccessful()) {
        return false;
    }

    dd(trim($process->getOutput()));
});



// الفاتورة
// تمتلك البيانات التالية:

// الرقم الضريبي
// اسم المتجر
// مبلغ الشراء
// وتاريخ الشراء
// ومبلغ الضريبة


// تطابق الفاتورة مع المتجر
// يجب ان يكون المتجر لديه عروض متاحة
