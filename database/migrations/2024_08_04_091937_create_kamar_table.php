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
        Schema::create('m_kamar', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kamar')->unique();
            $table->string('nama_kamar');
            $table->string('jenis_kamar');
            $table->string('jumlah_bed')->nullable();
            $table->integer('tarif_kamar')->default(0);
            $table->integer('jasa_pelaksana')->default(0);
            $table->integer('total_tarif')->default(0);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_kamar');
    }
};
