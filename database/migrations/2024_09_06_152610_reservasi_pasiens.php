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
        Schema::create('m_reservasi_pasien', function (Blueprint $table) {
            $table->id();
            $table->string('no_reservasi');
            $table->string('no_rm');
            $table->string('pasien_name');
            $table->string('address');
            $table->string('phone_no');
            $table->string('gender');
            $table->date('reservasi_date');
            $table->time('time');
            $table->foreignId('layanan_id');
            $table->string('dokter_code');
            $table->string('jadwal_praktik');
            $table->foreignId('jaminan_id');
            $table->foreignId('no_antrian')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_reservasi_pasien');
    }
};
