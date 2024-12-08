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
        Schema::create('t_lab_kuantitatif', function (Blueprint $table) {
            $table->id();
            $table->string('uuid_test');
            $table->string('rentang_normal');
            $table->string('keterangan1');
            $table->string('batas_bawah');
            $table->string('antara');
            $table->string('batas_atas');
            $table->string('keterangan2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_lab_kuantitatif');
    }
};
