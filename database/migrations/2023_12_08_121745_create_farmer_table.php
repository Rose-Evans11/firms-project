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
        Schema::create('farmers', function (Blueprint $table) {
            $table->integer('farmerID') ->autoIncrement();
            $table->integer('barangayID'); //farmers address
            $table->integer('cityID');
            $table->integer('provinceID');
            $table->integer('regionID');
            $table->string('contactNumber');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('validID'); //valid id information
            $table->binary('validIDPhoto');
            $table->string('validIDNumber')->unique();
            $table->boolean('isActive');
            $table->binary('photo');
            $table->integer('age');
            $table->string('birthplace');
            $table->integer('educationID');
            $table->integer('religionID');
            $table->integer('civilID');
            $table->string('spouseName');
            $table->string('motherName');
            $table->boolean('fourPs');
            $table->boolean('indigenous');
            $table->integer('typeIPID');
            $table->boolean('householdHead'); //household information
            $table->string('householdName');
            $table->string('householdRelation');
            $table->integer('householdCount');
            $table->integer('householdMale');
            $table->integer('householdFemale');
            $table->integer('farmAssociationID');
            $table->string('contactPerson');
            $table->string('emergenceNumber');
            $table->string('beneficiaries1');
            $table->string('relationBeneficiaries1');
            $table->string('beneficiaries2');
            $table->string('relationbeneficiaries2');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
