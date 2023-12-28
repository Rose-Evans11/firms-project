<?php

namespace App\Http\Controllers;

use App\Models\farm;
use Illuminate\Http\Request;

class farmController extends Controller
{
    public function store(Request $request){
        $incomingFields = $request ->validate ([
            'farmersID'=> 'required',
            'barangayFarm'=> 'required',
            'cityFarm'=> 'required',
            'provinceFarm'=> 'required',
            'farmArea'=> 'required',
            'ownershipType'=> 'required',
            'ownerName'=> 'required',
            'ownershipDocument'=> 'required',
            'withininAncestralDomain'=> 'required',
            'isAgraReformBenefi'=> 'required',
            'farmType'=> 'required',
            'ownershipDocumentFile'=> 'required'
        ]);
        $farm = farm::create ($incomingFields);
        session()->flash('success', 'Filed Successfully!');
        return back();
    }
}
