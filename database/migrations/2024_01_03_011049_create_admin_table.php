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
        Schema::create('admins', function (Blueprint $table) {
            $table->id()->autoIncrement()->from('240001');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('extensionName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('contactNumber');
            $table->string('password');
            $table->string('office');
            $table->string('department');
            $table->string('position');
            $table->string('isActive');
            $table->string('role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
