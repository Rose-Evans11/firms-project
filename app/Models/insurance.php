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
        'barangayFarm',
        'cityFarm',
        'provinceFarm',
        'location_lat',
        'location_long',
        'datePlanted',
        'plantingMethod',
        'dateSowing',
        'dateHarvest',
        'from',
        'to',
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
        'phase',
        'cicNumber',
        'cicdateIssued',
        'cocNumber',
        'cocdateIssued',
    ];

    use Sortable;

    public $sortable = [
        'insuranceType',
        'created_at',
    ];
}
