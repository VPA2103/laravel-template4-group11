<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;


    protected $table = 'LoaiSanPham';   // Vì bạn đặt tên bảng là "LoaiSanPham"
    protected $primaryKey = 'MaLoaiSanPham';

    protected $fillable = [
        'TenLoaiSanPham',
        'AnhLoaiSanPham',
    ];


    // Quan hệ: 1 loại có nhiều sản phẩm
    public function SanPham()
    {
       
    }
}
