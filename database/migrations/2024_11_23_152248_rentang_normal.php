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
        Schema::create('t_rentang_normal', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('satuan_umur');
            $table->integer('batas_bawah');
            $table->integer('batas_atas');
            $table->integer('batas_bawah_hari');
            $table->integer('batas_atas_hari');
            $table->string('gender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_rentang_normal');
    }
};
