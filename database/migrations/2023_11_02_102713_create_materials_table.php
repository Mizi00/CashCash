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
            $table->string('internalRef');
            $table->integer('clientNum');
            $table->integer('contractNum');

            //relations avec les tables étrangères
            $table->foreign('internalRef')->references('id')->on('materialstypes');
            $table->foreign('clientNum')->references('id')->on('clients');
            $table->foreign('contractNum')->references('id')->on('maintenancecontracts');


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
