<?php

namespace App\Http\Controllers;

use App\Models\farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class farmController extends Controller
{
    public function index(){
        $user = Auth::guard('web')->user();
        if($user)  
        {
            //$insurance = insurance::all();
        //$farm = farm::where('farmersID', auth()->id())->get();
        //$farm=farm::paginate(10);
        $farm = farm::where('farmersID', Auth::guard('web')->user()->id)
            ->paginate(10);
        //$farm = DB::select('SELECT * FROM farms LEFT JOIN users ON farms.id = users.id');
        return view('farmer/farm_list', ['farms'=>$farm]);
        }
         return redirect('firms/farmer/login')->withInput()->with('errmessage', 'Please Login First!');
       
    }
    public function store(Request $request){
        $incomingFields = $request ->validate ([
            'farmersID'=> 'required',
            'firstName'=> 'required',
            'middleName'=> 'nullable',
            'lastName'=> 'required',
            'extensionName'=> 'nullable',
            'sitio'=> 'nullable',
            'farmersID'=> 'required',
            'barangayFarm'=> 'required',
            'cityFarm'=> 'required',
            'provinceFarm'=> 'required',
            'regionFarm'=> 'required',
            'farmArea'=> 'required',
            'ownershipType'=> 'required',
            'ownerName'=> 'required',
            'ownershipDocument'=> 'required',
            'withinAncestralDomain'=> 'required',
            'isAgraReformBenefi'=> 'required',
            'ownershipDocumentFile'=> 'nullable',
            'farmType'=> 'required',
            'ownDateFrom'=> 'nullable',
            'ownDateTo'=> 'nullable',
        ]);
       $farm = farm::create($incomingFields);
        session()->flash('success', 'Farm Added Successfully!');
        return redirect(route('farm.index'));
    }
    public function edit(farm $farm){ //to edit and retrive the information for insurance
        $user = Auth::guard('web')->user();
        if($user)    
        {
            return view('farmer/edit_farm', ['farms'=>$farm]);

        }
         return redirect('firms/farmer/login')->withInput()->with('errmessage', 'Please Login First!');
        //return view('farmer/edit_insurance')->with('insurances', $insurance);
    }
    public function update(farm $farm, Request $request){

        $user = Auth::guard('web')->user();
        if($user)    
        {
            $incomingFields = $request ->validate ([
                'farmersID'=> 'required',
                'firstName'=> 'required',
                'middleName'=> 'nullable',
                'lastName'=> 'required',
                'extensionName'=> 'nullable',
                'sitio'=> 'nullable',
                'barangayFarm'=> 'nullable',
                'cityFarm'=> 'nullable',
                'provinceFarm'=> 'nullable',
                'regionFarm'=> 'nullable',
                'farmArea'=> 'nullable',
                'ownershipType'=> 'nullable',
                'ownerName'=> 'nullable',
                'ownershipDocument'=> 'nullable',
                'withinAncestralDomain'=> 'nullable',
                'isAgraReformBenefi'=> 'nullable',
                'ownershipDocumentFile'=> 'nullable',
                'farmType'=> 'nullable',
                'ownDateFrom'=> 'nullable',
                'ownDateTo'=> 'nullable',
            ]);
    
            $farm->update ($incomingFields);
            session()->flash('success', 'Successfully Updated!');
            return redirect(route('farm.index'));

        }
         return redirect('firms/farmer/login')->withInput()->with('errmessage', 'Please Login First!');
     
    }

}
