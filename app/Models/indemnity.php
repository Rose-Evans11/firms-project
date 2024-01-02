<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class indemnity extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'farmersID',
        'firstName',
        'middleName',
        'lastName',
        'extensionName',
        'barangayAddress',
        'cityAddress',
        'provinceAddress',
        'regionAddress',
        'contactNumber',
        'email',
        'damageID',
        'cicNumber',
        'policyNumber',
        'cropName',
        'variety',
        'underwriterName',
        'program',
        'dateSowing',
        'datePlanted',
        'sitio',
        'barangayFarm',
        'cityFarm',
        'provinceFarm',
        'regionFarm',
        'areaInsured',
        'north',
        'east',
        'west',
        'south',
        'damageCause',
        'dateLoss',
        'growthStage',
        'areaDamage',
        'extentDamage',
        'dateHarvest',
        'signature',
        'dateSubmitted',

    ];
}
