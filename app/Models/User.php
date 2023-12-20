<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rsbsa',
        'firstName',
        'middleName',
        'lastName',
        'extensionName',
        'sex',
        'birthdate',
        'age',
        'email',
        'password',
        'barangayAddress',
        'cityAddress',
        'provinceAddress',
        'regionAddress',
        'contactNumber',
        'validID',
        'validIDPhoto',
        'validIDNumber',
        'isActive',
        'photo',
        'birthplace',
        'educationID',
        'religionID',
        'civilID',
        'spouseName',
        'motherName',
        'fourPs',
        'indigenous',
        'typeIPID',
        'householdHead',
        'householdName',
        'householdRelation',
        'householdCount',
        'householdMale',
        'householdFemale',
        'farmAssociationID',
        'contactPerson',
        'emergenceNumber',
        'beneficiaries1',
        'relationBeneficiaries1',
        'beneficiaries2',
        'relationbeneficiaries2',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    
}
