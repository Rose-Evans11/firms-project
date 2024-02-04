<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
//use Barryvdh\DomPDF\Facade\PDF;
//use Barryvdh\DomPDF\Facade as PDF;
use App\Models\insurance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use PDF;

class insuranceController extends Controller
{
    use Sortable;


    public $sortable = [
        'insuranceType',
        'created_at',
        'cropName',
        'farmersID',
        'firstName',
        'middleName',
        'lastName',
        'extensionName',
        'barangayAddress',
        'cityAddress',
        'dateHarvest',
        'barangayFarm',
        'status',
        'statusNote',
    ];
    
    public function index(){
        $user = Auth::guard('web')->user();
        if($user)  
        {
            //$insurance = insurance::all();
            $insurance = insurance::sortable()
                ->where('farmersID', Auth::guard('web')->user()->id)
                ->paginate(10);
        return view('farmer/dashboard', ['insurances'=>$insurance]);
        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
       
    }
    public function createPDF() {
        // retreive all records from db
        $insurance = insurance::all();
        // share data to view
        view()->share('insurances',$insurance);
        $pdf = PDF::loadView('pdf_view');
        // download PDF file with download method
        return $pdf->stream('report.pdf', array('Attachment' => 0));
    }

    public function edit(insurance $insurance){ //to edit and retrive the information for insurance
        $user = Auth::guard('web')->user();
        if($user)    
        {
            return view('farmer/edit_insurance', ['insurances'=>$insurance]);

        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
        //return view('farmer/edit_insurance')->with('insurances', $insurance);
    }

    public function view(insurance $insurance){ //to edit and retrive the information for insurance
        $user = Auth::guard('web')->user();
        if($user)  
        {
            return view('farmer/view_insurance', ['insurances'=>$insurance]);

        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
    }

    public function pending(){
        //$insurance = insurance::all();
        $user = Auth::guard('web')->user();
        if($user)   
        {
            //$insurance = DB::table('insurances')->where('farmersID', Auth::guard('web')->user()->id)->where('status', 'Pending')->get();
            //$insurance=DB::sortable()->paginate(10);
            $insurance = insurance::sortable()
                ->where('farmersID', Auth::guard('web')->user()->id)
                ->where('status', 'Pending')
                ->paginate(10);
            return view('farmer/pending_insurance', ['insurances'=>$insurance]);
        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
        
    }

    public function approved(){
        //$insurance = insurance::all();
        $user = Auth::guard('web')->user();
        if($user)
        {
           // $insurance = DB::table('insurances')->where('farmersID', auth()->id())->get();
           // $insurance=insurance::sortable()->paginate(10)->where('status', 'Approved');
           $insurance = insurance::sortable()
                ->where('farmersID', Auth::guard('web')->user()->id)
                ->where('status', 'Approved')
                ->paginate(10);
            return view('farmer/approved_insurance', ['insurances'=>$insurance]);

        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
        
         
    }
    public function rejected(){
        //$insurance = insurance::all();
        $user = Auth::guard('web')->user();
        if($user)   
        {
            //$insurance = DB::table('insurances')->where('farmersID', auth()->id())->get();
            //$insurance=insurance::sortable()->paginate(10)->whereIn('status', ['Partially Rejected', 'Rejected']);
            $insurance = insurance::sortable()
            ->where('farmersID', Auth::guard('web')->user()->id)
            ->whereIn('status', ['Rejected', 'Partially Rejected'])
            ->paginate(10);
            return view('farmer/rejected_insurance', ['insurances'=>$insurance]);

        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
        
         
    }
    public function store(Request $request){

        $user = Auth::guard('web')->user();
        if($user)  
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
                'coverFrom' => 'nullable',
                'coverTo' => 'nullable',
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
                                           "body" => "You just filed an insurance report. We will validate it, kindly, wait our message for additional information. Thank you!",
                                           "from" => $senderNumber
                                       ]
                              );
            
            print($message->sid);
            return back();

        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
       
    }

    public function update(insurance $insurance, Request $request){

        $user = Auth::guard('web')->user();
        if($user)   
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
                'coverFrom' => 'nullable',
                'coverTo' => 'nullable',
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
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
     
    }
    public function find(Request $request, insurance $insurance){ //to search and find

        $user = Auth::guard('web')->user();
        if($user)  
        {
            $search_text = $request->input('query');
      // $user = User::table('users')
        $insurance = insurance::sortable()
                 ->where('farmersID', Auth::guard('web')->user()->id)
                  ->orWhere('cropName', 'like', '%' . $search_text . '%')
                  ->orWhere('insuranceType', 'like', '%' . $search_text . '%')
                  ->orWhere('status', 'like', '%' . $search_text . '%')
                  ->orWhere('rsbsa', 'like', '%' . $search_text . '%')
                  ->orWhere('cicNumber', 'like', '%' . $search_text . '%')
                  ->orWhere('cocNumber', 'like', '%' . $search_text . '%')
                  ->paginate(5);
        return view('farmer/search_insurance',['insurances'=>$insurance]);

        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
        $request->validate([
          'query'=>'min:2'
       ]);
    }

    public function admin_insurance_find(Request $request, insurance $insurance){ //to search and find

        $user = Auth::guard('admin')->user();
        if($user)  
        {
            $search_text = $request->input('query');
      // $user = User::table('users')
       $insurance = insurance::Where('farmersID', 'like', '%' . $search_text . '%')
                  ->orWhere('firstName', 'like', '%' . $search_text . '%')
                  ->orWhere('lastName', 'like', '%' . $search_text . '%')
                  ->orWhere('cropName', 'like', '%' . $search_text . '%')
                  ->orWhere('insuranceType', 'like', '%' . $search_text . '%')
                  ->orWhere('status', 'like', '%' . $search_text . '%')
                  ->orWhere('rsbsa', 'like', '%' . $search_text . '%')
                  ->orWhere('cicNumber', 'like', '%' . $search_text . '%')
                  ->orWhere('cocNumber', 'like', '%' . $search_text . '%')
                  ->orWhere('created_date', 'like', '%' . $search_text . '%')
                  ->paginate(5);
        return view('admin/search_insurance',['insurances'=>$insurance]);

        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
        $request->validate([
          'query'=>'min:2'
       ]);
    }
    public function sendRequestLetter(insurance $insurance, Request $request){

        $user = Auth::guard('web')->user();
        if($user)   
        {
            $incomingFields = $request ->validate ([
                'requestLetter'=> 'required',
                'contactNumber'=>'nullable',
            ]);
    
            $insurance->update ($incomingFields);
            session()->flash('success', 'Successfully send request Letter');
            $sid = getenv("TWILIO_SID");
            $token = getenv("TWILIO_TOKEN");
            $senderNumber = getenv("TWILIO_PHONE");
            $twilio = new Client($sid, $token);
            
            $message = $twilio->messages
                              ->create(Auth::guard('web')->user()->contactNumber, // to
                                       [
                                           "body" => "You just send a request letter. We will validate it, kindly, wait our message for additional information. Thank you!",
                                           "from" => $senderNumber
                                       ]
                              );
            
            print($message->sid);
            return back();

        }
         return redirect('firms/farmer/')->withInput()->with('errmessage', 'Please Login First!');
     
    }
}