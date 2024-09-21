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
        Schema::create('m_tindakan_rawat_inap', function (Blueprint $table) {
            $table->id();
            $table->string('tindakan_code');
            $table->date('tindakan_date');
            $table->time('tindakan_time');
            $table->string('dokter_code');
            $table->string('regist_code');
            $table->string('no_rm');
            $table->string('pasien_name');
            $table->string('layanan_id');
            $table->string('all_tarif');
            $table->string('all_discount');
            $table->string('final_tarif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_tindakan_rawat_inap');
    }
};
