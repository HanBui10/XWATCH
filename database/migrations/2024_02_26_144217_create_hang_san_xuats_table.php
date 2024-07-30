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
        Schema::create('hangsanxuat', function (Blueprint $table) {
            $table->id();
            $table->string('tenhang');
            $table->string('tenhang_slug');
            $table->string('hinhanh')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hangsanxuat');
    }
};
