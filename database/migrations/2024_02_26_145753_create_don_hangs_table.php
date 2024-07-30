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
        Schema::create('donhang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoidung_id')->constrained('nguoidung');
            $table->string('tinhtrang');
            $table->string('dienthoaigiaohang', 20);
            $table->string('diachigiaohang');
            $table->string('tongtien');
            $table->timestamps();
            $table->engine = 'InnoDB';
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donhang');
    }
};
