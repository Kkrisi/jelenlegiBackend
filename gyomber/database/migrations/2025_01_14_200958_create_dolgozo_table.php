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
        Schema::create('dolgozo', function (Blueprint $table) {
            $table->unsignedBigInteger('d_azon')->primary(); // Elsődleges kulcs d_azon néven
            $table->string('nev');
            $table->string('email')->unique();
            $table->string('szul_nev');  
            $table->string('születesi_hely');
            $table->date('születesi_ido');
            $table->string('anyaja_neve');
            $table->string('taj_szam')->unique();
            $table->string('ado_szam')->unique();
            $table->string('gondviselo_nev')->nullable();
            $table->string('telefonszam');
            $table->text('megjegyzes')->nullable();
            $table->timestamps();

            // Kapcsolatok a külső táblákhoz
            $table->unsignedBigInteger('iskola_azon')->nullable();
            $table->unsignedBigInteger('gyakhely_azon')->nullable();

            // Külső kulcsok
            $table->foreign('iskola_azon')->references('isk_azon')->on('iskola')->onDelete('set null');
            $table->foreign('gyakhely_azon')->references('gyak_azon')->on('gyakorlatihely')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dolgozo');
    }
};
