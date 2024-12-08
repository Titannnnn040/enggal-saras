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
        Schema::create('m_pemeriksaan_lab', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('code');
            $table->string('name');
            $table->string('jenis');
            $table->string('kelompok');
            $table->string('satuan');
            $table->string('keterangan');
            $table->string('hasil_rahasia');
            $table->integer('tipe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_pemeriksaan_lab');
    }
};
