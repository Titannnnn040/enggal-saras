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
        Schema::create('t_lab_kualitatif_khusus', function (Blueprint $table) {
            $table->id();
            $table->string('uuid_test');
            $table->string('rentang_normal');
            $table->string('normal');
            $table->string('keterangan_tidak_normal');
            $table->integer('skala');
            $table->integer('narasi');
            $table->string('keterangan_normal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_lab_kualitatif_khusus');
    }
};
