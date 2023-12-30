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
        Schema::create('farms', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('farmersID');
            $table->foreign('farmersID')->references('id')->on('users');
            $table->string('barangayFarm');
            $table->string('cityFarm');
            $table->string('provinceFarm');
            $table->string('regionFarm');
            $table->string('farmArea');
            $table->string('farmType');
            $table->string('ownershipType');
            $table->string('ownershipDocument');
            $table->string('ownerName');
            $table->string('withinAncestralDomain');
            $table->string('isAgraReformBenefi');
            $table->binary('ownershipDocumentFile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farms');
    }
};
