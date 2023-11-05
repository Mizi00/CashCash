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
            $table->id();
            $table->date('saleDate');
            $table->date('installationDate');
            $table->float('salePrice', 10);
            $table->string('location', 255);

            //clés étrangères
            $table->string('internalRef');
            $table->unsignedBigInteger('clientNum');
            $table->unsignedBigInteger('contractNum')->nullable();

            //relations avec les tables étrangères
            $table->foreign('internalRef')->references('internalRef')->on('materialstypes');
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
