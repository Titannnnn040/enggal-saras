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
        Schema::create('m_satuan_obat', function (Blueprint $table) {
            $table->id();
            $table->string('code_obat');
            $table->string('satuan_kecil');
            $table->string('satuan_kemasan');
            $table->integer('qty_satuan_kemasan');
            $table->string('satuan_kemasan_lainya');
            $table->integer('qty_satuan_kemasan_lainya');
            $table->string('satuan_racik');
            $table->integer('qty_satuan_racik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_satuan_obat');
    }
};
