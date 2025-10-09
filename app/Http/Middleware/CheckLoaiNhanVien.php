<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoaiNhanVien
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                // ✅ Nếu đã đăng nhập → điều hướng đúng trang
                $user = Auth::user();
                if ($user->loainhanvien === 'admin') {
                    return redirect('/accountAdmin');
                } elseif ($user->loainhanvien === 'user') {
                    return redirect('/account');
                }

                // Mặc định
                return redirect('/');
            }
        }

        return $next($request);
    }
}
