<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function sanpham()
    {
        $sanphams = SanPham::all();

        return view('admin.sanpham', compact('sanphams'));
    }

    //          'TenLoaiSanPham',
    //         'AnhLoaiSanPham',
    public function sanpham_add()
    {
        $loaisanphams = LoaiSanPham::select('MaLoaiSanPham', 'TenLoaiSanPham')->orderBy('TenLoaiSanPham')->get();

        return view('admin.them-sanpham', compact('loaisanphams'));
    }

    public function sanpham_store(Request $request)
    {
        // MaSanPham
        // 'TenSanPham',
        // 'MoTa',
        // 'Gia',
        // 'SoLuongTon',
        // 'AnhSanPham',
        // 'MaLoaiSanPham',
        // 'Slug',
        $request->validate([
            'TenSanPham' => 'required',
            // 'Slug' => 'required|unique:products,Slug',
            // 'short_description' => 'required',
            'MoTa' => 'required',
            'Gia' => 'required',
            'SoLuongTon' => 'required',
            'AnhSanPham' => 'required|mimes:png,jpg,jpeg|max:2048',
            'MaLoaiSanPham' => 'required',
        ]);
        $sanpham = new SanPham;

        $sanpham->TenSanPham = $request->TenSanPham;
        $sanpham->Slug = Str::Slug($request->TenSanPham);
        $sanpham->MoTa = $request->MoTa;
        $sanpham->Gia = $request->Gia;
        $sanpham->SoLuongTon = $request->SoLuongTon;
        $sanpham->MaLoaiSanPham = $request->MaLoaiSanPham;

        $current_timestamp = Carbon::now()->timestamp;

        if ($request->hasFile('AnhSanPham')) {
            $image = $request->file('AnhSanPham');
            $imageName = $current_timestamp.'.'.$image->extension();
            $sanpham->AnhSanPham = $imageName;

            $this->GenerateProductThumbailImage($image, $imageName);
        }

        if ($request->hasFile('images')) {
            $allowedfileExtion = ['png', 'jpg', 'jpeg'];
            $files = $request->file('images');

            foreach ($files as $file) {
                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension, $allowedfileExtion);

                if ($gcheck) {
                    $gfileName = $current_timestamp.'_'.$counter.'.'.$gextension;
                    array_push($gallery_arr, $gfileName);
                    $counter = $counter + 1;
                }
            }
            $gallery_images = implode(',', $gallery_arr);
        }

        $sanpham->save();

        return redirect()->route('admin.sanpham')->with('success', 'Sản Phẩm được thêm thành công!');
    }

    public function GenerateProductThumbailImage($image, $imageName)
    {
        $destinationPath = public_path('assets/products/thumbnails');
        $destinationPathThumbnail = public_path('assets/products/thumbnails');

        // Tạo thư mục nếu chưa có
        if (! File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }
        if (! File::exists($destinationPathThumbnail)) {
            File::makeDirectory($destinationPathThumbnail, 0755, true);
        }

        // Lưu ảnh gốc vào assets/products
        $image->move($destinationPath, $imageName);

        // Copy ảnh sang thumbnails (không resize)
        File::copy($destinationPath.'/'.$imageName, $destinationPathThumbnail.'/'.$imageName);
    }
}
