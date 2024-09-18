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
        Schema::create('m_rawat_inap', function (Blueprint $table) {
            $table->id();
            $table->string('rawat_inap_code');
            $table->string('regist_code');
            $table->string('no_reservasi');
            $table->string('no_antrian');
            $table->string('no_rm');
            $table->string('pasien_name');
            $table->string('jaminan');
            $table->string('layanan_id');
            $table->string('dokter_code');
            $table->string('perawat_code');
            $table->string('no_bpjs')->nullable();
            $table->string('tarif_pendaftaran');
            $table->string('biaya');
            $table->string('jam_praktek')->nullable();
            $table->string('keterangan_rujukan')->nullable();
            $table->string('jenis_kunjungan')->nullable();
            $table->string('saturasi_oksigen')->nullable();
            $table->string('suhu')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('lingkar_perut')->nullable();
            $table->string('imt')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('sistole')->nullable();
            $table->string('diastole')->nullable();
            $table->string('respiratory_rate')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('lingkar_kepala')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_rawat_inap');
    }
};
