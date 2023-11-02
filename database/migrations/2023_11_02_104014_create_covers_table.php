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
        Schema::create('covers', function (Blueprint $table) {
            $table->unsignedInteger('passingTime', 100);
            $table->string('commentWorks', 700);

            //clés étrangères
            $table->integer('numSerie');
            $table->integer('numFiche');

            //relation avec les tables
            $table->foreign('numSerie')->references('id')->on('materials');
            $table->foreign('numFiche')->references('id')->on('interventions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covers');
    }
};
