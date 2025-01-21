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
        Schema::create('gyakorlatihely', function (Blueprint $table) {
            $table->unsignedBigInteger('gyak_azon')->primary(); // Elsődleges kulcs
            $table->string('ceg_nev');
            $table->string('web_oldal')->nullable();
            $table->string('kapcsolat_tarto');
            $table->string('telefonszam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyakorlatihely');
    }
};
