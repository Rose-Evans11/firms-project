<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class insurance extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'farmersID',
        'rsbsa',
        'firstName',
        'middleName',
        'lastName',
        'extensionName',
        'sex',
        'civilName',
        'spouseName',
        'birthdate',
        'isIndigenous',
        'indigenous',
        'barangayAddress',
        'cityAddress',
        'provinceAddress',
        'regionAddress',
        'email',
        'contactNumber',
        'insuranceType',
        'cropName',
        'variety',
        'areaInsured',
        'north',
        'east',
        'west',
        'south',
        'sitio',
        'barangayFarm',
        'cityFarm',
        'provinceFarm',
        'regionFarm',
        'location_lat',
        'location_long',
        'datePlanted',
        'plantingMethod',
        'dateSowing',
        'dateHarvest',
        'coverFrom',
        'coverTo',
        'tenurialType',
        'landCategory',
        'irrigationType',
        'soilType',
        'topography',
        'phLevel',
        'avgYield',
        'benefi1',
        'benefi1Relation',
        'benefi1Age',
        'benefi2',
        'benefi2Relation',
        'benefi2Age',
        'bankName',
        'bankAccount',
        'bankBranch',
        'status',
        'statusNote',
        'coverType',
        'amountCover',
        'sumInsured',
        'phase',
        'cicNumber',
        'cicdateIssued',
        'cocNumber',
        'cocdateIssued',
        'dateAssess',
        'assessBy',
        'dateSign',
        'signBy',
        'requestLetter',
    ];

    use Sortable;

    public $sortable = [
        'insuranceType',
        'created_at',
    ];
}
