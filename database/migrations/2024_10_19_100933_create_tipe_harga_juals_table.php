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
        Schema::create('m_tipe_harga_jual', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_harga_jual_code');
            $table->string('tipe_harga_jual_name');
            $table->integer('edit_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_tipe_harga_jual');
    }
};
