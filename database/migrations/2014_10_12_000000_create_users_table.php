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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement()->from(20240001);
            $table->string('rsbsa')->unique();
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->string('extensionName')->nullable();
            $table->date('birthdate');
            $table->integer('age');
            $table->string('sex');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('barangayAddress'); //farmers address
            $table->string('cityAddress')->nullable();
            $table->string('provinceAddress')->nullable();
            $table->string('regionAddress')->nullable();
            $table->string('contactNumber')->nullable();
            $table->string('hasValidID')->nullable(); //->references('id')->on('users'); //valid id information
            $table->string('validID')->nullable(); //->references('id')->on('users'); //valid id information
            $table->binary('validIDPhoto')->nullable();
            $table->string('validIDNumber')->unique()->nullable();
            $table->string('isActive')->default('Active');
            $table->binary('photo')->nullable();
            $table->string('birthplaceCity')->nullable();
            $table->string('birthplaceProvince')->nullable();
            $table->string('educationName')->nullable();
            $table->string('religionName')->nullable();
            $table->string('civilName')->nullable();
            $table->string('spouseName')->nullable();
            $table->string('motherName')->nullable();
            $table->string('isFourPs')->nullable();
            $table->string('isIndigenous')->nullable();
            $table->string('indigenous')->nullable();
            $table->string('isHouseholdHead')->nullable(); //household information
            $table->string('householdName')->nullable();
            $table->string('householdRelation')->nullable();
            $table->integer('householdCount')->nullable();
            $table->integer('householdMale')->nullable();
            $table->integer('householdFemale')->nullable();
            $table->string('hasFarmAssociation')->nullable();
            $table->string('farmAssociation')->nullable();
            $table->string('isPWD')->nullable();
            $table->string('contactPerson')->nullable();
            $table->string('emergenceNumber')->nullable();
            $table->string('bankName')->nullable();
            $table->string('bankAccount')->nullable();
            $table->string('bankBranch')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
