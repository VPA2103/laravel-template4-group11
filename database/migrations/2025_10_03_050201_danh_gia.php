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
        Schema::create('DanhGia', function (Blueprint $table) {
            $table->id('MaDanhGia'); // Khóa chính
            $table->unsignedBigInteger('MaSanPham'); // Sản phẩm
            $table->unsignedBigInteger('MaNguoiDung'); // Người dùng
            $table->tinyInteger('SoSao')->default(5); // 1-5 sao
            $table->text('NoiDung')->nullable(); // Nội dung đánh giá
            $table->timestamps();

            // FK nếu muốn, có thể thêm sau
            // $table->foreign('MaSanPham')->references('MaSanPham')->on('SanPham')->onDelete('cascade');
            // $table->foreign('MaUser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DanhGia');
    }
};
