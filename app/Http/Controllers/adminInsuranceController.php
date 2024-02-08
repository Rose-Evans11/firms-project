<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use App\Models\insurance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Query\Builder;
use PDF;

class adminInsuranceController extends Controller
{
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    
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
    public function createPDF() {
        // retreive all records from db
        //$insurance = insurance::all();
        // share data to view
        //view()->share('insurances',$insurance);
       // $pdf = PDF::loadView('print_insurance_view');
        // download PDF file with download method
       // return $pdf->stream('insurance.pdf', array('Attachment' => 0));

       $insurances = insurance::all();
       $pdf = PDF::loadView('pdf_insurance_view', compact('insurances'))->setPaper('a4', 'landscape');

       $pdf->render();
       $dompdf = $pdf->getDomPDF();
       $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
       $dompdf->get_canvas()->page_text(34, 18, "{PAGE_NUM} / {PAGE_COUNT}", $font, 10, array(0, 0, 0));
       
       return $pdf->download('insurance.pdf');
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
    public function rice(){
        //$insurance = insurance::all();
        if (Auth::guard('admin')->check())
        {
            $insurance = insurance::sortable()->where('insuranceType', 'Rice')->paginate(10);
            return view('admin/rice_insurance', ['insurances'=>$insurance]);
        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        
    }
    public function corn(){
        //$insurance = insurance::all();
        if (Auth::guard('admin')->check())
        {
            $insurance = insurance::sortable()->where('insuranceType', 'Corn')->paginate(10);
            return view('admin/corn_insurance', ['insurances'=>$insurance]);
        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        
    }
    public function hvc(){
        //$insurance = insurance::all();
        if (Auth::guard('admin')->check())
        {
            $insurance = insurance::sortable()->where('insuranceType', 'High-Value Crops')->paginate(10);
            return view('admin/hvc_insurance', ['insurances'=>$insurance]);
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
            $insurance = insurance::sortable()->where('status', 'Approved')->paginate(10);
            return view('admin/approved_insurance', ['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        
         
    }
    public function rejected(){
        if (Auth::guard('admin')->check())
        {
            $insurance = insurance::sortable()->whereIn('status', ['Partially Rejected', 'Rejected'])->paginate(10);
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
                                           "body" => "The City Agriculture just filed an insurance report for you. We will validate it, kindly, wait our message for additional information. Thank you!",
                                           "from" => $senderNumber
                                       ]
                              );
            
            print($message->sid);
            return back();

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
       
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
                'policyNumber' => 'nullable',
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
             //this is for sending message
             $sid = getenv("TWILIO_SID");
             $token = getenv("TWILIO_TOKEN");
             $senderNumber = getenv("TWILIO_PHONE");
             $twilio = new Client($sid, $token);

             //$insuranceID=$request->id;
             $insuranceID=$insurance->id;
             $contactNumber=$request->contactNumber;
             $message = $twilio->messages
                               ->create($contactNumber, // to
                                        [
                                            "body" => 'Your filed insurance report with Insurance ID: '. $insuranceID . ' ' . ' was ' . $incomingFields['status'] . ' . The comment is '. $incomingFields['statusNote'] .'. ' ,
                                            "from" => $senderNumber
                                        ]
                               );
             
             print($message->sid);
            return back();

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
     
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
    public function createPDFFind(Request $request) {
      
        if (Auth::guard('admin')->check())
        {
           // $search_text = Request::input('query');
            $search_text = $this->request->input('query');
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
            });


            $pdf = PDF::loadView('pdf_insurance_view_find', compact('insurances'))->setPaper('a4', 'landscape');

            $pdf->render();
            $dompdf = $pdf->getDomPDF();
            $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
            $dompdf->get_canvas()->page_text(34, 18, "{PAGE_NUM} / {PAGE_COUNT}", $font, 10, array(0, 0, 0));
            
            return $pdf->download('insurance.pdf');

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
                      ->orWhere('created_at', 'like', '%' . $search_text . '%');
            })->where('status', 'Pending')->paginate(10);
                  
        return view('admin/search_insurance_pending_view',['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        $request->validate([
          'query'=>'min:2'
       ]);
    }
    public function admin_insurance_approved_find(Request $request, insurance $insurance){ //to search and find

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
                      ->orWhere('created_at', 'like', '%' . $search_text . '%');
            })->where('status', 'Approved')->paginate(10);
                  
                  
        return view('admin/search_insurance_approved_view',['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        $request->validate([
          'query'=>'min:2'
       ]);
    }
    public function admin_insurance_rejected_find(Request $request, insurance $insurance){ //to search and find

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
                      ->orWhere('created_at', 'like', '%' . $search_text . '%');
            })->whereIn('status', ['Partially Rejected', 'Rejected'])->paginate(10);
                  
        return view('admin/search_insurance_rejected_view',['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        $request->validate([
          'query'=>'min:2'
       ]);
    }
    public function admin_insurance_rice_find(Request $request, insurance $insurance){ //to search and find

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
                      ->orWhere('created_at', 'like', '%' . $search_text . '%');
            })->where('insuranceType', 'Rice')->paginate(10);
                  
        return view('admin/search_insurance_rice_view',['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        $request->validate([
          'query'=>'min:2'
       ]);
    }
    public function admin_insurance_corn_find(Request $request, insurance $insurance){ //to search and find

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
                      ->orWhere('created_at', 'like', '%' . $search_text . '%');
            })->where('insuranceType', 'Corn')->paginate(10);
                  
        return view('admin/search_insurance_corn_view',['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        $request->validate([
          'query'=>'min:2'
       ]);
    }
    public function admin_insurance_hvc_find(Request $request, insurance $insurance){ //to search and find

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
                      ->orWhere('created_at', 'like', '%' . $search_text . '%');
            })->where('insuranceType', 'High-Value Crops')->paginate(10);
                  
        return view('admin/search_insurance_hvc_view',['insurances'=>$insurance]);

        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
        $request->validate([
          'query'=>'min:2'
       ]);
    }
    public function sendRequestLetter(insurance $insurance, Request $request){

        $user = Auth::guard('admin')->user();
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
