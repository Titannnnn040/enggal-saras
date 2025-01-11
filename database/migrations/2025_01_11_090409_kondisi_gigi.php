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
        Schema::create('t_kondisi_gigi', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('code');
            $table->string('jenis');
            $table->string('arti');
            $table->string('keterangan');
            $table->string('warna');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_kondisi_gigi');
    }
};
