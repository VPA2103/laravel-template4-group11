<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;

    protected $table = 'KhuyenMai';
    protected $primaryKey = 'MaKhuyenMai';

    protected $fillable = [
        'TenKhuyenMai',
        'MaSanPham',
        'GiaTri',
        'LoaiKhuyenMai',
        'NgayBatDau',
        'NgayKetThuc',
    ];
}
