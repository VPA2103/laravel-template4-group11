<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoaiNhanVien
{
    public function handle(Request $request, Closure $next, $loai)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->loainhanvien !== $loai) {
            return abort(403, 'Bạn không có quyền truy cập');
        }

        return $next($request);
    }
}
