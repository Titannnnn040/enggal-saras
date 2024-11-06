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
        Schema::create('m_spesifikasi_dasar_obat', function (Blueprint $table) {
            $table->id();
            $table->string('code_obat');
            $table->integer('status');
            $table->integer('barang_racikan');
            $table->string('golongan_barang');
            $table->string('pabrik_principal');
            $table->string('lokasi_barang');
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_spesifikasi_dasar_obat');
    }
};
