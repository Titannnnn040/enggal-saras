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
        Schema::create('t_rentang_umur', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('waktu');
            $table->string('jenis');
            $table->string('konversi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_rentang_umur');
    }
};
