<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('GioHang', function (Blueprint $table) {
            $table->id('MaGioHang'); // Khóa chính
            $table->unsignedBigInteger('MaNguoiDung'); // Người dùng
            $table->unsignedBigInteger('MaSanPham'); // Sản phẩm
            $table->integer('SoLuong')->default(1);
            $table->decimal('DonGia', 15, 2);
            $table->decimal('ThanhTien', 15, 2);
            $table->timestamps();

            // FK nếu muốn, có thể thêm sau
            // $table->foreign('MaUser')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('MaSanPham')->references('MaSanPham')->on('SanPham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GioHang');
    }
};
