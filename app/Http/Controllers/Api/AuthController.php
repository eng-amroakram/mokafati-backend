<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\UserService;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(Request $request, UserService $userService)
    {
        $rules = $userService->rules();
        $messages = $userService->messages();
        $otp = rand(100000, 999999);

        $data = $request->validate($rules, $messages);

        $data['role'] = 'user';
        $data['otp_code'] = $otp;

        $user = $userService->store($data);

        Mail::to($user->email)->send(new VerifyEmail($otp));

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
            'password' => ['required'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                "message" => "تحقق من بياناتك"
            ], 401);
        }

        if (!$user->email_verified_at) {
            return response()->json([
                "message" => "يرجى تأكيد بريدك الإلكتروني قبل تسجيل الدخول."
            ], 403);
        }

        // إنشاء توكن جديد
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            "message" => "أهلا بعودتك",
            "token" => $token,
            "user" => $user,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            "message" => "تم تسجيل الخروج بنجاح"
        ], 200);
    }

    public function verifyEmail(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|digits:6',
        ]);

        $user = User::where('email', $data['email'])->where('otp_code', $data['otp'])->first();

        if (!$user) {
            return response()->json(["message" => "كود التحقق غير صحيح."], 400);
        }

        // تحديث حالة التحقق
        $user->update([
            'email_verified_at' => now(),
            'otp_code' => null, // إزالة الكود بعد التحقق
        ]);

        return response()->json(["message" => "تم تفعيل الحساب بنجاح!"], 200);
    }

    public function forgotPassword(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $otp = rand(100000, 999999);

        // تحديث المستخدم بحفظ كود الـ OTP
        $user = User::where('email', $data['email'])->first();
        $user->update(['otp_code' => $otp]);

        // إرسال الكود عبر البريد
        Mail::to($user->email)->send(new VerifyEmail($otp));

        return response()->json(["message" => "تم إرسال كود إعادة تعيين كلمة المرور إلى بريدك الإلكتروني."], 200);
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|digits:6',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $data['email'])
            ->where('otp_code', $data['otp'])
            ->first();

        if (!$user) {
            return response()->json(["message" => "كود إعادة التعيين غير صحيح."], 400);
        }

        // تحديث كلمة المرور
        $user->update([
            'password' => bcrypt($data['password']),
            'otp_code' => null, // إزالة الكود بعد الاستخدام
        ]);

        return response()->json(["message" => "تم إعادة تعيين كلمة المرور بنجاح!"], 200);
    }
}
