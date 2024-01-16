<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;
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
        'cropInsuranceID',
        'cropName',
        'variety',
        'insuranceType',
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
        'dateClaiming',
        'amountToClaim',

    ];
    use Sortable;

    public $sortable = [
        'insuranceType',
        'dateSubmitted',
        'created_at',
    ];
}
