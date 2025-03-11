<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request, UserService $userService)
    {
        $rules = $userService->rules();
        $messages = $userService->messages();
        unset($rules['role']);
        dd($rules);
        $data = $request->validate($rules, $messages);
        dd($data);
        $user = $userService->store($data);
        if ($user) {
            return response()->json([
                "message" => "تم تسجيل حسابك بنجاح"
            ], 201);
        }

        return response()->json([
            "message" => "حدث خطأ اثناء تسجيل بياناتك، يرجى المحاولة لاحقا"
        ], 500);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required',],
        ]);

        $user = User::where('email', $data['email'])->first();

        if ($user) {
            return response()->json([
                "message" => "اهلا بعودتك"
            ], 200);
        }

        return response()->json([
            "message" => "تحقق من بياناتك"
        ], 200);
    }

    public function logout(Request $request, User $user) {}
}
