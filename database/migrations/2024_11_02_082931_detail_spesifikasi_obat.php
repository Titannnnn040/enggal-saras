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
        Schema::create('m_detail_spesifikasi_obat', function (Blueprint $table) {
            $table->id();
            $table->string('code_obat');
            $table->string('dosis');
            $table->string('interaksi_obat');
            $table->string('isi_kandungan');
            $table->string('cara_kerja_obat');
            $table->string('indikasi');
            $table->string('kontraindikasi');
            $table->string('peringatan');
            $table->string('farmakologi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_detail_spesifikasi_obat');
    }
};
