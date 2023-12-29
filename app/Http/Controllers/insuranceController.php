<?php

namespace App\Http\Controllers;

use App\Models\insurance;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Validation\Rule;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class insuranceController extends Controller
{
    use Sortable;

    public $sortable = [
        'insuranceType',
        'created_at',
    ];
    public function index(){
        //$insurance = insurance::all();
        $insurance = insurance::where('farmersID', auth()->id())->get();
        $insurance=insurance::sortable()->paginate(10);
        return view('farmer/dashboard', ['insurances'=>$insurance]);
    }

    public function edit(insurance $insurance){ //to edit and retrive the information for insurance
        return view('farmer/edit_insurance', ['insurances'=>$insurance]);
        //return view('farmer/edit_insurance')->with('insurances', $insurance);
    }
    public function pending(){
        //$insurance = insurance::all();
        $insurance = DB::table('insurances')->where('farmersID', auth()->id())->get();
        $insurance=insurance::sortable()->paginate(10)->where('status', 'Pending');
        return view('farmer/pending_insurance', ['insurances'=>$insurance]);
    }
    public function store(Request $request){
        $incomingFields = $request ->validate ([
            'farmersID' => 'required',
            'rsbsa' => 'required',
            'firstName' => 'required',
            'middleName' => 'nullable',
            'lastName' => 'required',
            'extensionName' => 'nullable',
            'sex' => 'required',
            'civilName' => 'required',
            'spouseName' => 'required',
            'birthdate' => 'required',
            'isIndigenous' => 'required',
            'indigenous' => 'required',
            'email' => 'required',
            'barangayAddress' => 'required',
            'cityAddress' => 'required',
            'provinceAddress' => 'required',
            'regionAddress' => 'required',
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
            'location_lat' => 'required',
            'location_long' => 'required',
            'datePlanted' => 'required',
            'plantingMethod' => 'required',
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

    public function update(insurance $insurance, Request $request){
        $incomingFields = $request ->validate ([
            'variety' => 'required',
            'areaInsured' => 'required',
            'north' => 'required',
            'east' => 'required',
            'west' => 'required',
            'south' => 'required',
            'barangayFarm' => 'required',
            'cityFarm' => 'required',
            'provinceFarm' => 'required',
            'location_lat' => 'required',
            'location_long' => 'required',
            'datePlanted' => 'required',
            'plantingMethod' => 'required',
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

        $insurance->update ($incomingFields);
        session()->flash('success', 'Successfully Updated!');
        return redirect(route('insurance.pending'));
    }

}
