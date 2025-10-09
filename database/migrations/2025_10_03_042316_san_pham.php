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
        Schema::create('SanPham', function (Blueprint $table) {
        $table->id('MaSanPham');
        $table->string('TenSanPham')->nullable();
        $table->string('MoTa')->nullable();
        $table->decimal('Gia', 15, 2);
        $table->integer('SoLuongTon')->default(0);
        $table->string('AnhSanPham')->nullable();
        $table->unsignedBigInteger('MaLoaiSanPham')->nullable();
        $table->string('Slug')->unique();
        $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('SanPham');
    }
};
