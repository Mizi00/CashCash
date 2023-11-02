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
            $table->integer('serialNum');
            $table->integer('sheetNum');

            //relation avec les tables
            $table->foreign('serialNum')->references('id')->on('materials');
            $table->foreign('sheetNum')->references('id')->on('interventions');
            $table->primary(['serialNum,sheetNum']); //definition de la clé primaire
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
