<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(){
        $sanphams = SanPham::all(); // Lấy toàn bộ sản phẩm
        $topsellers = SanPham::take(3)->get();
        $LoaiSanPhams=LoaiSanPham::take(4)->get();
        return view('index', compact('sanphams','LoaiSanPhams', 'topsellers'));
    }
    public function show($MaSanPham)
    {
        $sanpham = SanPham::findOrFail($MaSanPham);
        return view('single-product', compact('sanpham'));
    }

}
