<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
   protected $table = 'SanPham';

    // Khóa chính
    protected $primaryKey = 'MaSanPham';

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = [
        'TenSanPham',
        'MoTa',
        'Gia',
        'SoLuongTon',
        'AnhSanPham',
        'MaLoaiSanPham',
    ];
    public function loaiSanPham()
    {
        return $this->belongsTo(LoaiSanPham::class, 'MaLoaiSanPham', 'MaLoaiSanPham');
    }
}
