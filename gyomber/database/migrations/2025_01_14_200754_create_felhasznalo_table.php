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
        Schema::create('felhasznalo', function (Blueprint $table) {
            $table->tinyIncrements('f_azon'); // Elsődleges kulcs 0–255 közötti értékekkel
            $table->string('email')->unique();
            $table->string('jelszo');
            $table->string('nev');
            $table->unsignedTinyInteger('jogosultsag_azon')->default(1); // Jogosultság 0-10 között
            $table->timestamps();

            //$table->check('jogosultsag_azon >= 0 AND jogosultsag_azon <= 10'); megszorítás hozzáadása
        
            $table->foreign('jogosultsag_azon')->references('jog_azon')->on('jogosultsag')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('felhasznalo');
    }
};
