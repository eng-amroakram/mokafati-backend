<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{
    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            Auth::logout();
            return redirect()->route('admin.login');
        }
        return redirect()->route('admin.login');
    }
}
