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
        Schema::create('materialstypes', function (Blueprint $table) {
            $table->string('internalRef');
            $table->string('label', 255);
            $table->string('familyCode');

            $table->primary('internalRef');

            $table->foreign('familyCode')->references('code')->on('families');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materialstypes');
    }
};
