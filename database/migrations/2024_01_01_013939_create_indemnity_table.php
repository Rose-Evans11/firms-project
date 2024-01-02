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
        Schema::create('indemnity', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('farmersID');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('extensionName')->nullable();
            $table->string('barangayAddress'); //farmers address
            $table->string('cityAddress')->nullable();
            $table->string('provinceAddress')->nullable();
            $table->string('regionAddress')->nullable();
            $table->string('contactNumber')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('damageID');
            $table->foreign('damageID')->references('id')->on('damages')->onDelete('cascade');
            $table->string('cicNumber')->nullable();
            $table->string('policyNumber')->nullable();
            $table->string('cropName');
            $table->string('variety')->nullanle();
            $table->string('underwriterName');
            $table->string('program');
            $table->date('dateSowing');
            $table->date('datePlanted');
            $table->string('sitio')->nullable();
            $table->string('barangayFarm');
            $table->string('cityFarm');
            $table->string('provinceFarm');
            $table->string('regionFarm');
            $table->string('areaInsured');
            $table->string('north');
            $table->string('east');
            $table->string('west');
            $table->string('south');
            //$table->string('location');
            $table->string('damageCause');
            $table->string('dateLoss');
            $table->string('growthStage');
            $table->string('areaDamage');
            $table->string('extentDamage');
            $table->date('dateHarvest');
            $table->string('signature');
            $table->string('dateSubmitted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indemnity');
    }
};
