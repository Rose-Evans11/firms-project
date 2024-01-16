<?php

namespace App\Http\Controllers;

use App\Models\damage;
use Twilio\Rest\Client;
use App\Models\insurance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Auth;

class adminDamageController extends Controller
{

    public function index(){
        $user = Auth::guard('admin')->user();
        if($user)    
        {
            $damage = DB::table('damages')->get();
            $damage=damage::sortable()->paginate(10);
            return view('admin/notice_loss', ['damages'=>$damage]);
    
        }
            return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
          
    }
    public function store(Request $request){

        $user = Auth::guard('admin')->user();
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
                'cropInsuranceID' => ['required', Rule::unique('damages', 'cropInsuranceID')],
                'cropName' => 'required',
                'variety' => 'required',
                'insuranceType' => 'required',
                'policyNumber' => 'required',
                'cicNumber' => 'required',
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
                'north' => 'required',
                'east' => 'required',
                'west' => 'required',
                'south' => 'required',
                'damageCause' => 'required',
                'dateLoss' => 'required',
                'extentDamage' => 'required',
                'growthStage' => 'required',
                'areaDamage' => 'required',
                'dateHarvest' => 'required',
                'signature' => 'required',
                'dateSubmitted' => 'required',
            ]);
            $damage = damage::create ($incomingFields);
            session()->flash('success', 'Filed Successfully!');
            //this is for sending message
            $sid = getenv("TWILIO_SID");
            $token = getenv("TWILIO_TOKEN");
            $senderNumber = getenv("TWILIO_PHONE");
            $twilio = new Client($sid, $token);
            
            $message = $twilio->messages
                              ->create($incomingFields['contactNumber'], // to
                                       [
                                           "body" => "Admin just filed a notice report. We will validate it, kindly, wait our message for additional information. Thank you!",
                                           "from" => $senderNumber
                                       ]
                              );
            
            print($message->sid);
            return back();
            //return view('farmer/notice_loss');
        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
       
    }
    public function add(insurance $insurance){ //to edit and retrive the information for insurance
        $user = Auth::guard('admin')->user();
        if($user)      
        {
            return view('admin/add_notice_loss', ['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        //return view('farmer/edit_insurance')->with('insurances', $insurance);
    }
    public function edit(damage $damage){ //to edit and retrive the information for insurance
        $user = Auth::guard('admin')->user();
        if($user)       
        {
            return view('admin/edit_notice_loss', ['damages'=>$damage]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        //return view('farmer/edit_insurance')->with('insurances', $insurance);
    }
    public function update(damage $damage, Request $request){

        $user = Auth::guard('admin')->user();
        if($user)       
        {
            $incomingFields = $request ->validate ([
                'damageCause' => 'required',
                'dateLoss' => 'required',
                'extentDamage' => 'required',
                'dateHarvest' => 'required',
                'signature' => 'required',
                'dateSubmitted' => 'required',
            ]);
           
    
            $damage->update ($incomingFields);
            session()->flash('success', 'Successfully Updated!');
            return redirect(route('damage.index'));

        }
         return redirect('firms/farmadminer/')->withInput()->with('errmessage', 'Please Login First!');
     
    }
    public function view(damage $damage){ //to edit and retrive the information for insurance
        if (Auth::guard('admin')->check()) 
        {
            return view('admin/view_notice_loss', ['damages'=>$damage]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
    }
}
