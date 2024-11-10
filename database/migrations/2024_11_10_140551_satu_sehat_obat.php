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
        Schema::create('m_satu_sehat_obat', function (Blueprint $table) {
            $table->id();
            $table->string('code_obat');
            $table->string('code_kfa_variant')->nullable();
            $table->string('code_kfa_product')->nullable();
            $table->string('code_kfa_ingredient')->nullable();
            $table->string('cara_pakai')->nullable();
            $table->string('pola_pemberian')->nullable();
            $table->string('bentuk_sediaan_obat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_satu_sehat_obat');
    }
};
