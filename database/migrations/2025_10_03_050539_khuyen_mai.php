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
       Schema::create('KhuyenMai', function (Blueprint $table) {
            $table->id('MaKhuyenMai'); // Khóa chính
            $table->string('TenKhuyenMai');
            $table->unsignedBigInteger('MaSanPham')->nullable(); // Nếu áp dụng cho sản phẩm cụ thể
            $table->decimal('GiaTri', 15, 2); // Giá trị giảm
            $table->string('LoaiKhuyenMai')->default('TienMat'); // Tên loại: TienMat hoặc PhanTram
            $table->date('NgayBatDau');
            $table->date('NgayKetThuc');
            $table->timestamps();

            // FK nếu muốn, thêm sau
            // $table->foreign('MaSanPham')->references('MaSanPham')->on('SanPham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('KhuyenMai');
    }
};
