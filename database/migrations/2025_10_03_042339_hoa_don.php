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
        Schema::create('HoaDon', function (Blueprint $table) {
            $table->id('MaHoaDon'); // Khóa chính
            $table->timestamp('NgayTaoHoaDon')->useCurrent();
            $table->decimal('ThanhTien', 15, 2);
            $table->unsignedBigInteger('MaNV'); // Cột nhân viên, chưa cần FK
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HoaDon');
    }
};
