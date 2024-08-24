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
        Schema::create('m_tarif_radiologi', function (Blueprint $table) {
            $table->id();
        $table->string('tarif_radiologi_code');
            $table->string('nama_tarif_radiologi');
            $table->foreignId('group_tarif_id');
            $table->string('fee_medis');
            $table->string('jasa_klinik');
            $table->string('jasa_radiologi');
            $table->string('biaya_rujukan');
            $table->string('total_tarif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_tarif_radiologi');
    }
};
