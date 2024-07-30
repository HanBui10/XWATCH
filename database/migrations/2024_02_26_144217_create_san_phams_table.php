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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loaisanpham_id')->constrained('loaisanpham');
            $table->foreignId('hangsanxuat_id')->constrained('hangsanxuat');
            $table->string('tensanpham');
            $table->string('tensanpham_slug');
            $table->integer('soluong');
            $table->double('giamoi');
            $table->double('giacu');
            $table->string('hinhanh')->nullable();
            $table->string('hinhanh1')->nullable();
            $table->string('hinhanh2')->nullable();
            $table->text('motasanpham')->nullable();
            $table->text('doinetsanpham')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};
