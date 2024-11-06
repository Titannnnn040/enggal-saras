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
        Schema::create('m_stock_limit_obat', function (Blueprint $table) {
            $table->id();
            $table->string('code_obat');
            $table->string('kode_layanan');
            $table->string('nama_layanan');
            $table->integer('minimal_stock');
            $table->integer('maximal_stock');
            $table->integer('stock_aktual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_stock_limit_obat');
    }
};
