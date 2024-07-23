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
        Schema::create('m_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_layanan');
            $table->string('nama_layanan');
            $table->foreignId('jenis_layanan_id');
            $table->string('kode_layanan_bpjs')->nullable();
            $table->string('id_satu_sehat')->nullable();
            $table->string('medical_checkup')->nullable();
            $table->string('ibu_hamil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_layanan');
    }
};
