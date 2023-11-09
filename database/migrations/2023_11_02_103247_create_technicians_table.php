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
            $table->unsignedBigInteger('id'); //clé primaire étrangère
            $table->string('qualification', 100);
            $table->primary('id');
            //clé étrangère
            $table->unsignedBigInteger('agencyNum');

            //relations clés étrangères
            $table->foreign('agencyNum')->references('id')->on('agencies');
            $table->foreign('id')->references('id')->on('employees');
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
