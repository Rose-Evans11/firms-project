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
        'birthdate',
        'sex',
        'age',
        'email',
        'email_verified_at',
        'password',
        'barangayAddress',
        'cityAddress',
        'provinceAddress',
        'regionAddress',
        'contactNumber',
        'hasValidID',
        'validID',
        'validIDPhoto',
        'validIDNumber',
        'isActive',
        'photo',
        'birthplaceCity',
        'birthplaceProvince',
        'educationName',
        'religionName',
        'civilName',
        'spouseName',
        'motherName',
        'isFourPs',
        'isIndigenous',
        'indigenous',
        'isHouseholdHead',
        'householdName',
        'householdRelation',
        'householdCount',
        'householdMale',
        'householdFemale',
        'hasFarmAssociation',
        'farmAssociation',
        'isPWD',
        'contactPerson',
        'emergenceNumber',
        'bankName',
        'bankAccount',
        'bankBranch',
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
