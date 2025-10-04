<?php

namespace App\Http\Controllers;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sanphams = SanPham::all(); // Lấy toàn bộ sản phẩm
        $topsellers = SanPham::take(3)->get();
        return view('index', compact('sanphams', 'topsellers'));
    }
    public function show($MaSanPham)
    {
        $sanpham = SanPham::findOrFail($MaSanPham);
        return view('single-product', compact('sanpham'));
    }
    


}
