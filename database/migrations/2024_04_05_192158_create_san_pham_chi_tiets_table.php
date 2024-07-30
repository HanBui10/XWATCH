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
        Schema::create('sanphamchitiet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanpham_id')->constrained('sanpham');
            $table->string('model'); 
            $table->string('mausac'); 
            $table->string('congnghemanhinh'); 
            $table->string('kichthuocmanhinh'); 
            $table->string('dophangiai'); 
            $table->string('bonho'); 
            $table->string('chatlieu'); 
            $table->string('trongluong'); 
            $table->string('tinhtrang'); 
            $table->string('baohanh'); 
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanphamchitiet');
    }
};
