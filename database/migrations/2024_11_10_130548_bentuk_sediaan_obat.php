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
        Schema::create('m_bentuk_sediaan_obat', function (Blueprint $table) {
            $table->id();
            $table->string('bentuk_sediaan_code');
            $table->string('bentuk_sediaan_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_bentuk_sediaan_obat');
    }
};
