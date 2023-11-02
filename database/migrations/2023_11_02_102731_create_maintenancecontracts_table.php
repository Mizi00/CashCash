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
        Schema::create('maintenancecontracts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('signatureDate');
            $table->date('dueDate'); //date échéance

            //clés étrangères
            $table->integer('numClient');

            //relation avec la clé étrangère
            $table->foreign('numClient')->references('id')->on('customers');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenancecontracts');
    }
};
