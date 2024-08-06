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
        Schema::create('m_bed', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bed')->unique();
            $table->string('nama_bed');
            $table->foreignId('kamar_id');
            $table->string('status');
            $table->string('cadangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_bed');
    }
};
