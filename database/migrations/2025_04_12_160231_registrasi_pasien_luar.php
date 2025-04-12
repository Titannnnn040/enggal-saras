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
        Schema::create('m_registrasi_pasien_luar', function (Blueprint $table) {
            $table->id();
            $table->string('regist_code');
            $table->string('patient');
            $table->string('address');
            $table->string('dob');
            $table->string('jaminan');
            $table->string('layanan');
            $table->string('dokter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_registrasi_pasien_luar');
    }
};
