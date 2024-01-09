<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class farmerController extends Controller
{
   public function index(){
    $user = User::paginate(10);;
    return view('admin/register', ['users'=>$user]);
   }
    
    public function store(Request $request){//to add new farmers
        $incomingFields = $request ->validate ([
            'rsbsa' => ['required', Rule::unique('users', 'rsbsa')],
            'firstName' => 'required',
            'middleName'=> 'nullable',
            'lastName' => 'required',
            'extensionName' => 'nullable',
            'sex'=> 'required',
            'birthdate' => 'required',
            'age'=> 'required',
            'email' => ['required', 'email',Rule::unique('users', 'email') ],
            'password' => ['required', 'min:8', 'max:25'],
            'barangayAddress' => 'required',
            'cityAddress' => 'nullable',
            'provinceAddress' => 'nullable',
            'regionAddress' => 'nullable',
            'contactNumber' => 'nullable',
            'validID' => 'nullable',
            'validIDPhoto' => 'nullable',
            'validIDNumber'=> 'nullable',
            'isActive' => 'nullable',
            'photo' => 'nullable',
            'birthplace' => 'nullable',
            'educationID'=> 'nullable',
            'religionID'=> 'nullable',
            'civilID'=> 'nullable',
            'spouseName'=> 'nullable',
            'motherName'=> 'nullable',
            'fourPs'=> 'nullable',
            'indigenous'=> 'nullable',
            'typeIPID'=> 'nullable',
            'householdHead'=> 'nullable',
            'householdName'=> 'nullable',
            'householdRelation'=> 'nullable',
            'householdCount'=> 'nullable',
            'householdMale'=> 'nullable',
            'householdFemale'=> 'nullable',
            'farmAssociationID'=> 'nullable',
            'contactPerson'=> 'nullable',
            'emergenceNumber'=> 'nullable',
            'beneficiaries1'=> 'nullable',
            'relationBeneficiaries1'=> 'nullable',
            'beneficiaries2'=> 'nullable',
            'relationbeneficiaries2'=> 'nullable',
        ]);
       
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create ($incomingFields);
        session()->flash('success', 'Successfully Registered!');
        return redirect('firms/farmer/register'); //going to the same page
    }
   
    public function login(Request $request){  //to login the farmers
        $incomingFields = $request->validate([
            'loginEmail' => ['required', 'email'],
            'loginPass' => 'required',
        ]);

        if (Auth::guard('web')->attempt(['email' => $incomingFields['loginEmail'], 'password' => $incomingFields['loginPass']])){
            $request->session()->regenerate();
            return redirect('firms/dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'Invalid Login Credentials!']);         
    }
    
    public function logout(){ //to logout the farmers
        
        if (Auth::guard('web')->check()) {
            // User is authenticated
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect('/firms/farmer/login');
        }
    }  
    
    public function edit(User $user){ //to edit and retrive the information
        return view('admin/register_edit', ['user'=>$user]);
    }
    public function editProfile(User $user){
        //$user =Auth::user();
        return view('farmer/profile')->with('user', Auth::user());
        //return view('farmer/profile', ['user'=>$user]);
    }
    public function update(User $user, Request $request){//to update farmer's information in admin side in registration page
        $incomingFields = $request ->validate ([
            'rsbsa' => 'required',
            'firstName' => 'required',
            'middleName'=> 'nullable',
            'lastName' => 'required',
            'extensionName' => 'nullable',
            'birthdate' => 'required',
            'age'=> 'required',
            'sex'=> 'required',
            'email' => 'required',
            'barangayAddress' => 'nullable',
            'cityAddress' => 'nullable',
            'provinceAddress' => 'nullable',
            'regionAddress' => 'nullable',
            'contactNumber' => 'nullable',
            'hasValidID' => 'nullable',
            'validID' => 'nullable',
            'validIDNumber'=> 'nullable',
            'isActive' => 'nullable',
            'birthplaceCity' => 'nullable',
            'birthplaceProvince' => 'nullable',
            'educationName'=> 'nullable',
            'religionName'=> 'nullable',
            'civilName'=> 'nullable',
            'spouseName'=> 'nullable',
            'motherName'=> 'nullable',
            'isFourPs'=> 'nullable',
            'isIndigenous'=> 'nullable',
            'indigenous'=> 'nullable',
            'isHouseholdHead'=> 'nullable',
            'householdName'=> 'nullable',
            'householdRelation'=> 'nullable',
            'householdCount'=> 'nullable',
            'householdMale'=> 'nullable',
            'householdFemale'=> 'nullable',
            'farmAssociation'=> 'nullable',
            'hasFarmAssociation'=> 'nullable',
            'isPWD'=> 'nullable',
            'contactPerson'=> 'nullable',
            'emergenceNumber'=> 'nullable',
            'bankName'=> 'nullable',
            'bankAccount'=> 'nullable',
            'bankBranch'=> 'nullable',
            'validIDPhoto'=> 'nullalble',
            'photo'=> 'nullable',
        ]);
       
        $user->update ($incomingFields);
        session()->flash('success', 'Successfully Updated!');
        return redirect(route('farmer.index'));
    }
    
    public function find(Request $request, User $user){ //to search and find
        $request->validate([
          'query'=>'min:2'
       ]);

       $search_text = $request->input('query');
      // $user = User::table('users')
       $user = User::where('firstName','LIKE','%'.$search_text.'%')
                  ->orWhere('lastName', 'like', '%' . $search_text . '%')
                  ->orWhere('barangayAddress', 'like', '%' . $search_text . '%')
                  ->orWhere('isActive', 'like', '%' . $search_text . '%')
                  ->orWhere('rsbsa', 'like', '%' . $search_text . '%')
                  ->paginate(5);
        return view('admin/register_search',['users'=>$user]);
    }

    public function updateProfile(User $user, Request $request){

        $incomingFields = $request ->validate ([
            'rsbsa' => 'required',
            'firstName' => 'required',
            'middleName'=> 'nullable',
            'lastName' => 'required',
            'extensionName' => 'nullable',
            'birthdate' => 'required',
            'age'=> 'required',
            'sex'=> 'required',
            'email' => 'required',
            'barangayAddress' => 'required',
            'cityAddress' => 'required',
            'provinceAddress' => 'required',
            'regionAddress' => 'required',
            'contactNumber' => 'required',
            'hasValidID' => 'required',
            'validID' => 'required',
            'validIDNumber'=> 'required',Rule::unique('users', 'validIDNumber'),
            'birthplaceCity' => 'required',
            'birthplaceProvince' => 'required',
            'educationName'=> 'required',
            'religionName'=> 'required',
            'civilName'=> 'required',
            'spouseName'=> 'required',
            'motherName'=> 'required',
            'isFourPs'=> 'required',
            'isIndigenous'=> 'required',
            'indigenous'=> 'required',
            'isHouseholdHead'=> 'required',
            'householdName'=> 'required',
            'householdRelation'=> 'required',
            'householdCount'=> 'required',
            'householdMale'=> 'required',
            'householdFemale'=> 'required',
            'hasFarmAssociation'=> 'required',
            'farmAssociation'=> 'required',
            'isPWD'=> 'required',
            'contactPerson'=> 'required',
            'emergenceNumber'=> 'required',
            'bankName'=> 'required',
            'bankAccount'=> 'required',
            'bankBranch'=> 'required',
            'validIDPhoto'=> 'nullalble',
            'photo'=> 'nullable',
        ]);
       
        if($request->hasfile( $incomingFields['photo']))
        {
            $file = $request->file( $incomingFields['photo']);
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('public/upload/', $filename);
            $incomingFields['photo'] =$filename;
        }
        $user->update ($incomingFields);
        session()->flash('success', 'Successfully Updated!');
        return view('farmer/profile');
    }
    
    public function changePassword(Request $request){
        return view('farmer/change_password');
    }
    public function changePasswordSave(User $user, Request $request){
    
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);
        $auth = Auth::user();

        // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password)) 
        {
            return back()->with('error', "Current Password is Invalid");
        }

        // Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) 
        {
            return back()->with("error", "New Password cannot be same as your current password.");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
        
    }

}