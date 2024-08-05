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
            $table->uuid('id')->primary();
            $table->string('kode_kamar')->unique();
            $table->string('nama_kamar');
            $table->string('jenis_kamar');
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
