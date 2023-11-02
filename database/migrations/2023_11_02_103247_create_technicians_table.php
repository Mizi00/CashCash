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
            $table->id(); //clé primaire étrangère
            $table->string('qualification', 100);

            //clé étrangère
            $table->integer('agencyNum');

            //relations clés étrangères
            
            $table->foreign('agencyNum')->references('id')->on('agencies');

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
