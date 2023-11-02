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
            $table->increments('id');
            $table->dateTime('dateTimeVisit');
            
            //clés étrangères
            $table->integer('numClient');
            $table->integer('numMatricule');

            //relation avec les clés étrangères
            $table->foreign('numClient')->reference('id')->on('customers');
            $table->foreign('numMatricule')->reference('id')->on('employees');
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
