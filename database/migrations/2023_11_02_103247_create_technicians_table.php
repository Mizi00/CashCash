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
        Schema::create('technicians', function (Blueprint $table) {
            $table->increments('id'); //clé primaire étrangère
            $table->string('qualification', 100);

            //clé étrangère
            $table->integer('numAgence');

            //relations clés étrangères
            $table->foreign('id')->references('id')->on('employees');
            $table->foreign('numAgence')->references('id')->on('agencies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};
