<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class damage extends Model
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
        'email',
        'contactNumber',
        'cropInsuranceID',
        'policyNumber',
        'cicNumber',
        'underwriterName',
        'program',
        'dateSowing',
        'datePlanted',
        'cropName',
        'variety',
        'insuranceType',
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
        'extentDamage',
        'dateLoss',
        'growthStage',
        'areaDamage',
        'dateHarvest',
        'signature',
        'dateSubmitted',
    ];
    use Sortable;

    public $sortable = [
        'firstName',
        'lastName',
        'barangayAddress',
        'cropInsuranceID',
        'dateSubmitted',
        'cropName',
        'insuranceType',
        'areaInsured',
        'cicNumber',
        'damageCause',
        'extentDamage',
        'dateLoss',
        'growthStage',
        'areaDamage',
        'dateHarvest',
        'barangayFarm',
        'dateSubmitted',
    ];
}
