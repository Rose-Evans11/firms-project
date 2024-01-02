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
        'cropName',
        'insuranceType',
        'sitio',
        'barangayFarm',
        'cityFarm',
        'provinceFarm',
        'regionFarm',
        'damageCause',
        'dateLoss',
        'extentDamage',
        'dateHarvest',
        'signature',
        'dateSubmitted',
    ];
    use Sortable;

    public $sortable = [
        'insuranceType',
        'dateSubmitted',
        'created_at',
    ];
}
