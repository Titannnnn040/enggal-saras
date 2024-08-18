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
        Schema::create('m_tarif_tindakan', function (Blueprint $table) {
            $table->id();
            $table->string('code_tarif_tindakan');
            $table->string('nama_tarif_tindakan');
            $table->foreignId('group_tarif_id');
            $table->string('fee_medis');
            $table->string('jasa_klinik');
            $table->string('jasa_lainya');
            $table->string('total_tarif');
            $table->string('kode_tarif_bpjs')->nullable();
            $table->string('nama_tarif_tindakan_bpjs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_tarif_tindakan');
    }
};
