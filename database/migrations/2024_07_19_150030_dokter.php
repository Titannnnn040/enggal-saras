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
        Schema::create('m_dokter', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_dokter');
            $table->string('nama_lengkap');
            $table->string('code_bpjs');
            $table->string('sip');
            $table->string('end_date');
            $table->foreignId('layanan_id');
            $table->string('status');
            $table->string('nik_dokter');
            $table->string('id_dokter');
            $table->string('nama_petugas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_dokter');
    }
};
