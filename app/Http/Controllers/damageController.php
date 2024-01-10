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

class damageController extends Controller
{
    use Sortable;

    public $sortable = [
        'insuranceType',
        'dateSubmitted',
        'created_at',
    ];
    public function index(){
         if(Auth::check())   
            {
                $damage = DB::table('damages')->where('farmersID', auth()->id())->get();
                $damage=damage::sortable()->paginate(10);
                return view('farmer/notice_loss', ['damages'=>$damage]);
    
            }
             return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
          
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
                                           "body" => "You just filed a notice report. We will validate it, kindly, wait our message for additional information. Thank you!",
                                           "from" => $senderNumber
                                       ]
                              );
            
            print($message->sid);
            return back();
            //return view('farmer/notice_loss');
        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
       
    }
    public function add(insurance $insurance){ //to edit and retrive the information for insurance
        if(Auth::check())   
        {
            return view('farmer/add_notice_loss', ['insurances'=>$insurance]);

        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
        //return view('farmer/edit_insurance')->with('insurances', $insurance);
    }
    public function edit(damage $damage){ //to edit and retrive the information for insurance
        if(Auth::check())   
        {
            return view('farmer/edit_notice_loss', ['damages'=>$damage]);

        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
        //return view('farmer/edit_insurance')->with('insurances', $insurance);
    }
    public function update(damage $damage, Request $request){

        if(Auth::check())   
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
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
     
    }
}
