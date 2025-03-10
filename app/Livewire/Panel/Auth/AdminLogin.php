<?php

namespace App\Livewire\Panel\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminLogin extends Component
{
    public $email = '';
    public $password = '';

    #[Layout('layouts.auth.login', ['headerTitle' => 'لوحة التحكم - تسجيل الدخول']), Title('لوحة التحكم - تسجيل الدخول')]
    public function render()
    {
        return view('livewire.panel.auth.admin-login');
    }

    #[On('submitting-login-data')]
    public function submit()
    {
        $user = User::where('email', $this->email)->first();

        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('admin.panel.index');
            }

            $this->dispatch('admin-db-login-validation', ["password" => "Check the password"]);
            return "";
        }

        $this->dispatch('admin-db-login-validation', ["email" => "Check the email or phone number"]);
        return "";
    }

    public function alertMessage($message, $type)
    {
        $this->alert($type, '', [
            'toast' => true,
            'position' => 'top-start',
            'timer' => 3000,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
