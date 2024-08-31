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
        Schema::create('rawat_jalan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('jenis_kelamin');
            $table->string('umur');
            $table->string('birth-date');
            $table->unsignedBigInteger('nik');
            $table->string('status_pernikahan');
            $table->string('pekerjaan');
            $table->foreignId('payment_id');
            $table->integer('no_bpjs/asuransi');
            $table->string('upload_foto');
            $table->string('note');
            $table->string('phone_number');
            $table->foreignId('province_id');
            $table->foreignId('cities_id');
            $table->foreignId('kecamatan_id');
            $table->foreignId('kelurahan_id');
            $table->string('address');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('kondisi_khusus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawat_jalan');
    }
};
