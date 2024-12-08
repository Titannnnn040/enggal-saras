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
        Schema::create('t_lab_kualitatif', function (Blueprint $table) {
            $table->id();
            $table->string('uuid_test');
            $table->string('rentang_normal');
            $table->string('keterangan_positif');
            $table->integer('n_plus');
            $table->string('keterangan_negatif');
            $table->integer('n_min');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_lab_kualitatif');
    }
};
