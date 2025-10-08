<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
     use HasFactory;

    protected $table = 'DanhGia';
    protected $primaryKey = 'MaDanhGia';

    protected $fillable = [
        'MaSanPham',
        'MaNguoiDung',
        'SoSao',
        'NoiDung',
    ];
}
