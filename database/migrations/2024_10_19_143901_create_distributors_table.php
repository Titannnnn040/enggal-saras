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
        Schema::create('m_distributor', function (Blueprint $table) {
            $table->id();
            $table->string('distributor_code');
            $table->string('distributor_name');
            $table->string('address');
            $table->string('city');
            $table->string('contact_person');
            $table->string('phone_no');
            $table->string('fax');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_distributor');
    }
};
