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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('farmersID');
            $table->foreign('farmersID')->references('id')->on('users')->onDelete('cascade');
            $table->string('rsbsa');
            $table->string('insuranceType');
            $table->string('cropName');
            $table->string('variety');
            $table->string('areaInsured');
            $table->string('north');
            $table->string('east');
            $table->string('west');
            $table->string('south');
            //$table->string('location');
            $table->double('location-lat');
            $table->double('location-long');
            $table->date('datePlanted');
            $table->date('dateSowing');
            $table->date('dateHarvest');
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('barangayFarm');
            $table->string('cityFarm');
            $table->string('provinceFarm');
            $table->string('tenurialType')->nullable();
            $table->string('landCategory');
            $table->string('irrigationType');
            $table->string('soilType');
            $table->string('topography');
            $table->string('phLevel')->nullable();
            $table->string('avgYield')->nullable();
            $table->string('benefi1');
            $table->string('benefi1Relation');
            $table->string('benefi1Age');
            $table->string('benefi2');
            $table->string('benefi2Relation');
            $table->string('benefi2Age');
            $table->string('bankName');
            $table->string('bankAccount');
            $table->string('bankBranch');
            $table->string('status');
            $table->string('statusNote')->nullable();
            $table->string('coverType')->nullable();
            $table->string('phase')->nullable();
            $table->string('cicNumber')->nullable();
            $table->string('cicdateIssued')->nullable();
            $table->string('cocNumber')->nullable();
            $table->string('cocdateIssued')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurances');
    }
};
