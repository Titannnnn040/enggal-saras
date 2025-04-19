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
        Schema::create('t_tracer_rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->string('tracer_code');
            $table->string('patient');
            $table->integer('pinjam');
            $table->string('penanggung_jawab');
            $table->string('dokter');
            $table->integer('status');
            $table->timestamp('update_status');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_tracer_rekam_medis');
    }
};
