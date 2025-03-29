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
        Schema::create('t_kuota_reservasi', function (Blueprint $table) {
            $table->id();
            $table->integer('layanan');
            $table->string('dokter');
            $table->string('day');
            $table->string('praktek');
            $table->string('type');
            $table->integer('max_reservasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_kuota_reservasi');
    }
};
