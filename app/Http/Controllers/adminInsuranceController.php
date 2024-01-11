<?php

namespace App\Http\Controllers;

use Twilio\Http\Client;
use App\Models\insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Auth;

class adminInsuranceController extends Controller
{
    use Sortable;

    public $sortable = [
        'insuranceType',
        'created_at',
    ];
    public function index(){
        if (Auth::guard('admin')->check())
        {
            //$insurance = insurance::all();
        $insurance = insurance::all();
        $insurance=insurance::sortable()->paginate(10);
        return view('/admin/dashboard', ['insurances'=>$insurance]);
        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
       
    }

    public function edit(insurance $insurance){ //to edit and retrive the information for insurance
        if (Auth::guard('admin')->check())  
        {
            return view('admin/edit_insurance', ['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        //return view('farmer/edit_insurance')->with('insurances', $insurance);
    }

    public function view(insurance $insurance){ //to edit and retrive the information for insurance
        if (Auth::guard('admin')->check()) 
        {
            return view('admin/view_insurance', ['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
    }
    public function pending(){
        //$insurance = insurance::all();
        if (Auth::guard('admin')->check())
        {
            $insurance = insurance::sortable()->where('status', 'Pending')->paginate(10);
            return view('admin/pending_insurance', ['insurances'=>$insurance]);
        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        
    }

    public function approved(){
        if (Auth::guard('admin')->check())  
        {
            $insurance = DB::table('insurances')->get();
            $insurance=insurance::sortable()->paginate(10)->where('status', 'Approved');
            return view('admin/approved_insurance', ['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        
         
    }
    public function rejected(){
        if (Auth::guard('admin')->check())
        {
            $insurance = DB::table('insurances')->get();
            $insurance=insurance::sortable()->paginate(10)->whereIn('status', ['Partially Rejected', 'Rejected']);
            return view('admin/rejected_insurance', ['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        
         
    }
    public function store(Request $request){

        if (Auth::guard('admin')->check())
        {
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
                'sitio' => 'required',
                'barangayFarm' => 'required',
                'cityFarm' => 'required',
                'provinceFarm' => 'required',
                'regionFarm' => 'required',
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
                'amountCover' => 'nullable',
                'sumInsured' => 'nullable',
                'phase' => 'nullable',
                'cicNumber' => 'nullable',
                'cicdateIssued' => 'nullable',
                'cocNumber' => 'nullable',
                'cocdateIssued' => 'nullable',
                'dateAssess' => 'nullable',
                'assessBy' => 'nullable',
                'dateSign' => 'nullable',
                'signBy' => 'nullable',
                'requestLetter' => 'nullable',
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
                                           "body" => "Admin just filed an insurance report. We will validate it, kindly, wait our message for additional information. Thank you!",
                                           "from" => $senderNumber
                                       ]
                              );
            
            print($message->sid);
            return back();

        }
         return redirect('firms/farmer/login')->withInput()->with('errmessage', 'Please Login First!');
       
    }

    public function update(insurance $insurance, Request $request){

        if (Auth::guard('admin')->check()) 
        {
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
                'amountCover' => 'nullable',
                'sumInsured' => 'nullable',
                'phase' => 'nullable',
                'cicNumber' => 'nullable',
                'cicdateIssued' => 'nullable',
                'cocNumber' => 'nullable',
                'cocdateIssued' => 'nullable',
                'dateAssess' => 'nullable',
                'assessBy' => 'nullable',
                'dateSign' => 'nullable',
                'signBy' => 'nullable',
                'requestLetter' => 'nullable',
            ]);
    
            $insurance->update ($incomingFields);
            session()->flash('success', 'Successfully Updated!');
            return redirect(route('insurance.pending'));

        }
         return redirect('firms/farmer/login')->withInput()->with('errmessage', 'Please Login First!');
     
    }

    public function admin_insurance_find(Request $request, insurance $insurance){ //to search and find

        if (Auth::guard('admin')->check())
        {
            $search_text = $request->input('query');
            $insurance = insurance::where(function($query) use ($search_text) {
                $query->where('farmersID', 'like', '%' . $search_text . '%')
                      ->orWhere('firstName', 'like', '%' . $search_text . '%')
                      ->orWhere('lastName', 'like', '%' . $search_text . '%')
                      ->orWhere('cropName', 'like', '%' . $search_text . '%')
                      ->orWhere('insuranceType', 'like', '%' . $search_text . '%')
                      ->orWhere('status', 'like', '%' . $search_text . '%')
                      ->orWhere('rsbsa', 'like', '%' . $search_text . '%')
                      ->orWhere('cicNumber', 'like', '%' . $search_text . '%')
                      ->orWhere('cocNumber', 'like', '%' . $search_text . '%')
                      ->orWhere('created_at', 'like', '%' . $search_text . '%');
            })->paginate(10);
        return view('admin/search_insurance',['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        $request->validate([
          'query'=>'min:2'
       ]);
    }
    public function admin_insurance_pending_find(Request $request, insurance $insurance){ //to search and find

        if (Auth::guard('admin')->check())
        {
            $search_text = $request->input('query');
            $insurance = insurance::where(function($query) use ($search_text) {
                $query->where('farmersID', 'like', '%' . $search_text . '%')
                    ->orWhere('firstName', 'like', '%' . $search_text . '%')
                    ->orWhere('lastName', 'like', '%' . $search_text . '%')
                    ->orWhere('cropName', 'like', '%' . $search_text . '%')
                    ->orWhere('insuranceType', 'like', '%' . $search_text . '%')
                    ->orWhere('rsbsa', 'like', '%' . $search_text . '%')
                    ->orWhere('cicNumber', 'like', '%' . $search_text . '%')
                    ->orWhere('cocNumber', 'like', '%' . $search_text . '%')
                    ->orWhere('created_at', 'like', '%' . $search_text . '%')
                    ->when(request('status') === 'Pending', function($query) {
                        $query->where('status', 'Pending');
                    });
            })->paginate(10);
                  
        return view('admin/search_insurance_pending_view',['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        $request->validate([
          'query'=>'min:2'
       ]);
    }
}
