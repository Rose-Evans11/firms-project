<?php

namespace App\Http\Controllers;

use App\Models\damage;
use Twilio\Rest\Client;
use App\Models\indemnity;
use App\Models\insurance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Auth;


class adminIndemnityController extends Controller
{
    public function index(){
        $user=Auth::guard('admin')->user();
        if($user)   
        {
            //$insurance = insurance::all();
            $indemnity = DB::table('indemnities')->get();
            $indemnity=indemnity::sortable()->paginate(10);
        return view('admin/indemnity', ['indemnities'=>$indemnity]);
        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
       
    }
    public function store(Request $request){

        $user=Auth::guard('admin')->user();
        if($user)
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
                'cropInsuranceID'=>['required', Rule::unique('indemnities', 'cropInsuranceID')],
                'policyNumber' => 'required',
                'cropName' => 'required',
                'variety' => 'required',
                'underwriterName' => 'nullable',
                'program' => 'required',
                'dateSowing' => 'required',
                'datePlanted' => 'required',
                'sitio' => 'nullable',
                'barangayFarm' => 'required',
                'cityFarm' => 'required',
                'provinceFarm' => 'required',
                'regionFarm' => 'required',
                'areaInsured' => 'required',
                'insuranceType' => 'required',
                'north' => 'required',
                'east' => 'required',
                'west' => 'required',
                'south' => 'required',
                'damageID'=>['required', Rule::unique('indemnities', 'damageID')],
                'damageCause' => 'required',
                'dateLoss' => 'required',
                'growthStage' => 'required',
                'areaDamage' => 'required',
                'extentDamage' => 'required',
                'dateHarvest' => 'required',
                'signature' => 'required',
                'dateSubmitted' => 'required',                
                'dateClaiming'=>'nullable',
                'amountToClaim'=>'nullable',
                'statusClaim'=>'nullable',
                'receivedBy'=>'nullable',
                'dateReceivedBy'=>'nullable',
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
                                           "body" => "You just submit a claim report. We will validate it, kindly, wait our message for additional information. Thank you!",
                                           "from" => $senderNumber
                                       ]
                              );
            
            print($message->sid);
            return back();
            //return view('firms/farmer/indemnity');


        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
       
    }
    public function add(damage $damage){ //to edit and retrive the information for insurance
        $user=Auth::guard('admin')->user();
        if($user)
        {
            return view('admin/add_indemnity', ['damages'=>$damage]);

        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
        //return view('farmer/edit_insurance')->with('insurances', $insurance);
    }
    public function edit(indemnity $indemnity){ //to edit and retrive the information for insurance
        $user=Auth::guard('admin')->user();
        if($user)   
        {
            return view('admin/edit_indemnity', ['indemnities'=>$indemnity]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        //return view('farmer/edit_insurance')->with('insurances', $insurance);
    }
    public function update(indemnity $indemnity, Request $request){

        $user=Auth::guard('admin')->user();
        if($user)  
        {
            $incomingFields = $request ->validate ([
                'damageCause' => 'required',
                'dateLoss' => 'required',
                'extentDamage' => 'required',
                'dateHarvest' => 'required',
                'signature' => 'required',
                'dateSubmitted' => 'required',
                'dateClaiming'=>'nullable',
                'amountToClaim'=>'nullable',
                'statusClaim'=>'nullable',
                'receivedBy'=>'nullable',
                'dateReceivedBy'=>'nullable',
            ]);
           
    
            $indemnity->update ($incomingFields);
            session()->flash('success', 'Successfully Updated!');
             //this is for sending message
             $sid = getenv("TWILIO_SID");
             $token = getenv("TWILIO_TOKEN");
             $senderNumber = getenv("TWILIO_PHONE");
             $twilio = new Client($sid, $token);
             
             $message = $twilio->messages
                               ->create($incomingFields['contactNumber'], // to
                                        [
                                            "body" => "Mabuhay! Ito po ang Office of Tanauan City Agriculurist, kayo po ay nakaschedule sa pagclaim ng indmenity sa araw na ito " .$incomingFields['dateClaiming']. ". Kung kayo po ay makatanungan, huwag po kayong mahihiyang lumapit sa ating tanggapan. Salamat po!" ,
                                            "from" => $senderNumber
                                        ]
                               );
             
             print($message->sid);
            return redirect(route('admin.indemnity.index'));

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
     
    }
    public function view(indemnity $indemnity){ //to edit and retrive the information for insurance
        $user=Auth::guard('admin')->user();
        if($user)   
        {
            return view('admin/view_indemnity', ['indemnities'=>$indemnity]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        //return view('farmer/edit_insurance')->with('insurances', $insurance);
    }
}
