<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Nếu đã đăng nhập rồi, chuyển hướng thẳng theo role
        if (Auth::check()) {
            $user = Auth::user();
            return $user->loainhanvien === 'admin'
                ? redirect()->route('accountAdmin')
                : redirect()->route('accountUser');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->loainhanvien === 'admin') {
                return redirect()->route('accountAdmin');
            } else {
                return redirect()->route('accountUser');
            }
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
