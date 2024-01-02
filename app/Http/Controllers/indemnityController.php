<?php

namespace App\Http\Controllers;

use App\Models\indemnity;
use App\Models\insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class indemnityController extends Controller
{
    public function index(){
        if(Auth::check())   
        {
            //$insurance = insurance::all();
        $insurance = insurance::where('farmersID', auth()->id())->get();
        $insurance=insurance::sortable()->paginate(10);
        return view('farmer/notice_loss', ['insurances'=>$insurance]);
        }
         return redirect('firms/farmer/login')->withInput()->with('errmessage', 'Please Login First!');
       
    }
    public function store(Request $request){

        if(Auth::check())   
        {
            $incomingFields = $request ->validate ([
                'farmersID' => 'required',
                'firstName' => 'required',
                'middleName' => 'nullable',
                'lastName' => 'required',
                'extensionName' => 'nullable',
                'barangayAddress' => 'required',
                'cityAddress' => 'required',
                'provinceAddress' => 'required',
                'regionAddress' => 'required',
                'email' => 'required',
                'contactNumber' => 'required',
                'cicNumber' => 'required',
                'policyNumber' => 'required',
                'cropName' => 'required',
                'variety' => 'required',
                'underwriterName' => 'required',
                'program' => 'required',
                'dateSowing' => 'required',
                'datePlanted' => 'required',
                'sitio' => 'nullable',
                'barangayFarm' => 'required',
                'cityFarm' => 'required',
                'provinceFarm' => 'required',
                'regionFarm' => 'required',
                'areaInsured' => 'required',
                'north' => 'required',
                'east' => 'required',
                'west' => 'required',
                'south' => 'required',
                'damageCause' => 'required',
                'dateLoss' => 'required',
                'growthStage' => 'required',
                'areaDamage' => 'required',
                'extentDamage' => 'required',
                'dateHarvest' => 'required',
                'signature' => 'required',
                'dateSubmitted' => 'required',
            ]);
            $indemnity = indemnity::create ($incomingFields);
            session()->flash('success', 'Filed Successfully!');
            //this is for sending message
            $sid = getenv("TWILIO_SID");
            $token = getenv("TWILIO_TOKEN");
            $senderNumber = getenv("TWILIO_PHONE");
            $twilio = new Client($sid, $token);
            
            $message = $twilio->messages
                              ->create($incomingFields['contactNumber'], // to
                                       [
                                           "body" => "You just filed a notice report. We will validate it, kindly, wait our message for additional information. Thank you!",
                                           "from" => $senderNumber
                                       ]
                              );
            
            print($message->sid);
            return back();

        }
         return redirect('firms/farmer/login')->withInput()->with('errmessage', 'Please Login First!');
       
    }


}
