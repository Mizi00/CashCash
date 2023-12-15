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
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('dateTimeVisit');
            
            //clés étrangères
            $table->unsignedBigInteger('clientNum');
            $table->unsignedBigInteger('registrationNum')->nullable();
            
            //relation avec les clés étrangères
            $table->foreign('clientNum')->references('id')->on('clients');
            $table->foreign('registrationNum')->references('id')->on('technicians');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
