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
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->date('saleDate');
            $table->date('installationDate');
            $table->float('salePrice', 10);
            $table->string('location', 20);

            //clés étrangères
            $table->integer('referenceInterne');
            $table->integer('numClient');
            $table->integer('numContract');

            //relations avec les tables étrangères
            $table->foreign('referenceInterne')->references('id')->on('materialstypes');
            $table->foreign('numClient')->references('id')->on('materialstypes');
            $table->foreign('numContract')->references('id')->on('materialstypes');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
