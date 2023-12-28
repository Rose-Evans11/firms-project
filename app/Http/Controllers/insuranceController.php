<?php

namespace App\Http\Controllers;

use App\Models\insurance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class insuranceController extends Controller
{
    public function index(){
        //$insurance = insurance::all();
        $insurance = insurance::where('farmersID', auth()->id())->get();
        return view('farmer/dashboard', ['insurances'=>$insurance]);
       }
    public function store(Request $request){
        $incomingFields = $request ->validate ([
            'farmersID' => 'required',
            'rsbsa' => 'required',
            'insuranceType' => 'required',
            'cropName' => 'required',
            'variety' => 'required',
            'areaInsured' => 'required',
            'north' => 'required',
            'east' => 'required',
            'west' => 'required',
            'south' => 'required',
            'barangayFarm' => 'required',
            'cityFarm' => 'required',
            'provinceFarm' => 'required',
            'location-lat' => 'required',
            'location-long' => 'required',
            'datePlanted' => 'required',
            'dateSowing' => 'required',
            'dateHarvest' => 'required',
            'landCategory' => 'required',
            'irrigationType' => 'required',
            'soilType' => 'required',
            'topography' => 'required',
            'from' => 'nullable',
            'to' => 'nullable',
            'phLevel' => 'nullable',
            'avgYield' => 'nullable',
            'benefi1' => 'required',
            'benefi1Relation' => 'required',
            'benefi1Age' => 'required',
            'benefi2' => 'required',
            'benefi2Relation'=> 'required',
            'benefi2Age' => 'required',
            'bankName' => 'required',
            'bankAccount' => 'required',
            'bankBranch' => 'required',
            'status' => 'required',
            'statusNote' => 'nullable',
            'coverType' => 'nullable',
            'phase' => 'nullable',
            'cicNumber' => 'nullable',
            'cicdateIssued' => 'nullable',
            'cocNumber' => 'nullable',
            'cocdateIssued' => 'nullable',
        ]);
        $insurances = insurance::create ($incomingFields);
        session()->flash('success', 'Filed Successfully!');
        return back();
    }
}
