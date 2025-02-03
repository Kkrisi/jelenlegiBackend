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
        Schema::create('kikuldott', function (Blueprint $table) {
            $table->bigIncrements('kikuldott_azon');
            $table->unsignedBigInteger('dolgozo_azon');
            $table->string('pdf_fajl_neve');
            $table->dateTime('kuldes_datuma');
            $table->timestamps();
        
            // Külső kulcsok
            $table->foreign('dolgozo_azon')->references('d_azon')->on('dolgozo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kikuldott');
    }
};
