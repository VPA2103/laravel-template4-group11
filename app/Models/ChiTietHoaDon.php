<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
   use HasFactory;

    protected $table = 'ChiTietHoaDon';
    protected $primaryKey = 'MaChiTiet';

    protected $fillable = [
        'MaHoaDon',
        'MaSanPham',
        'SoLuong',
        'DonGia',
        'ThanhTien',
    ];
}
