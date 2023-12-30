<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class farm extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'farmersID',
        'barangayFarm',
        'cityFarm',
        'provinceFarm',
        'regionFarm',
        'farmArea',
        'ownershipType',
        'ownerName',
        'ownershipDocument',
        'withinAncestralDomain',
        'isAgraReformBenefi',
        'ownershipDocumentFile',
        'farmType',
    ];
}
