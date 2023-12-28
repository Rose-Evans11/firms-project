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
        Schema::create('farm_list', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('farmersID');
            $table->foreign('farmersID')->references('id')->on('users');
            $table->string('barangayFarm');
            $table->string('cityFarm');
            $table->string('provinceFarm');
            $table->string('farmArea');
            $table->string('farmType');
            $table->string('ownershipType');
            $table->string('ownershipDocument');
            $table->string('withinAncestralDomain');
            $table->string('isAgraReformBenefi');
            $table->binary('ownershipDocumentFile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_list');
    }
};
