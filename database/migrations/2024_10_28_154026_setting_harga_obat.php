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
        Schema::create('m_setting_harga_obat', function (Blueprint $table) {
            $table->id();
            $table->string('code_obat');
            $table->string('tipe_harga_jual_code');
            $table->string('tipe_harga_jual_name');
            $table->integer('profit_margin');
            $table->integer('biaya_tambahan');
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
        Schema::dropIfExists('m_setting_harga_obat');
    }
};
