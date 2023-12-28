<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class farm extends Model
{ use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'farmersID',
        'ownershipType',
        'ownerName',
        'ownershipDocument',
        'withininAncestralDomain',
        'withininAncestralDomain',
        'isAgraReformBenefi',
        'farmType',
        'ownershipDocumentFile',
        'farmArea',
        'topography',
        'soilType',
        'tenurialType',
    ];
}
