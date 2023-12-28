<?php

namespace App\Http\Controllers;

use App\Models\insurance;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
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
            'contactNumber' => 'required',
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
            'tenurialType' => 'nullable',
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
        //this is for sending message
        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_TOKEN");
        $senderNumber = getenv("TWILIO_PHONE");
        $twilio = new Client($sid, $token);
        
        $message = $twilio->messages
                          ->create($incomingFields['contactNumber'], // to
                                   [
                                       "body" => "You just filed an insurance report. We will validate it, kindly, wait our message for additional information. Thank you!",
                                       "from" => $senderNumber
                                   ]
                          );
        
        print($message->sid);
        return back();
    }

    public function sendingSMS(){

    }
}
