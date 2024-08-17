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
        Schema::create('m_tarif_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('code_pendaftaran');
            $table->string('nama_pendaftaran');
            $table->string('fee_medis');
            $table->string('jasa_klinik');
            $table->string('total_tarif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_tarif_pendaftaran');
    }
};
