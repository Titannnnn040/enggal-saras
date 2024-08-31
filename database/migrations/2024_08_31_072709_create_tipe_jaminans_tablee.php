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
        Schema::create('m_tipe_jaminan', function (Blueprint $table) {
            $table->id();
            $table->string('code_tipe_jaminan')->nullable();
            $table->string('nama_tipe_jaminan');
            $table->string('tipe_jaminan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_tipe_jaminan');
    }
};
