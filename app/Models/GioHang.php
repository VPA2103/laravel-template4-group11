<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;

    protected $table = 'GioHang';
    protected $primaryKey = 'MaGioHang';

    protected $fillable = [
        'MaNguoiDung',
        'MaSanPham',
        'SoLuong',
        'DonGia',
        'ThanhTien',
    ];
}
