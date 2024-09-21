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
        Schema::create('m_detail_tindakan_rawat_inap', function (Blueprint $table) {
            $table->id();
            $table->string('tindakan_rawat_inap_code');
            $table->string('tindakan_code');
            $table->string('tindakan_name');
            $table->decimal('tarif_tindakan', 15, 2); // Adjust precision and scale as needed
            $table->integer('qty');
            $table->decimal('discount', 10, 2); // Adjust precision and scale as needed
            $table->decimal('total_tarif', 15, 2); // Adjust precision and scale as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_detail_tindakan_rawat_inap');
    }
};
