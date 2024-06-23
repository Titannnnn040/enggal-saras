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
        Schema::create('rawat-jalan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('jenis_kelamin');
            $table->date('birth_date');
            $table->id('status_pernikahan');
            $table->id('pendidikan_sederajat');
            $table->id('pekerjaan');
            $table->id('jenis_pembayaran');
            $table->id('phone_number');
            $table->id('address');
            $table->id('agama');
            $table->id('nama_ayah');
            $table->id('nama_ibu');
            $table->id('jenis_pembayaran');
            $table->id('jenis_pembayaran');
            $table->id('jenis_pembayaran');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawats');
    }
};
