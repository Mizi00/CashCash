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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastName', 40);
            $table->string('firstName', 40);
            $table->string('socialReason', 100);
            $table->unsignedInteger('sirenNum', 14);
            $table->string('apeCode', 10);
            $table->string('address', 50);
            $table->string('phoneNumber', 10);
            $table->string('faxNum', 10);
            $table->string('mailAddress', 255);
            $table->float('kmDistance', 10);
            $table->unsignedInteger('travelTime', 5);
            $table->integer('agencyNum');

            $table->foreign('agencyNum')->references('id')->on('agencies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
