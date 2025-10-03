<?php

namespace App\Http\Controllers;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sanphams = SanPham::all(); // Lấy toàn bộ sản phẩm
        return view('index', compact('sanphams'));
    }
   
}
