<?php

namespace App\Http\Controllers;

use File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreFarmerRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class farmerController extends Controller
{
   public function index(){
    $user = User::paginate(10);
    return view('admin/register', ['users'=>$user]);
   }
    
    public function store(StoreFarmerRequest $request) {//to add new farmers
        $incomingFields = $request->validated();
        
        // File Folder Location 
        $valid_id_image_location = public_path('valid_id_image_location');
        $profile_image_location = public_path('profile_image_location');

        if(!file_exists($valid_id_image_location)) {
            mkdir($valid_id_image_location, 0755, true);
        }

        if(!file_exists($profile_image_location)) {
            mkdir($profile_image_location, 0755, true);
        }

        $imageValidID = time().'.'. $incomingFields['validIDPhoto']->extension();
        $imagePhoto = time().'.'. $incomingFields['photo']->extension();

        $incomingFields['validIDPhoto']->move($valid_id_image_location,  $imageValidID);
        $incomingFields['photo']->move($profile_image_location, $imagePhoto); 

        $incomingFields['validIDPhoto'] = $imageValidID;
        $incomingFields['photo'] = $imagePhoto;

        $incomingFields['password'] = bcrypt($incomingFields['password']);

       
        //to save new farmers
        $user = User::create($incomingFields);
        session()->flash('success', 'Successfully Registered!');


        // Retrieve and display images in Blade view
        //$validIdImageUrl = asset('valid_id_image_location/' . $imageValidID);
        // $profileImageUrl = asset('profile_image_location/' . $imagePhoto);

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
            return redirect('/firms/farmer/');
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
            'validIDPhoto'=> 'nullable',
            'photo'=> 'nullable',
        ]);
       
        
        // File Folder Location 
        $valid_id_image_location = public_path('valid_id_image_location');
        $profile_image_location = public_path('profile_image_location');

        if(!file_exists($valid_id_image_location)) {
            mkdir($valid_id_image_location, 0755, true);
        }

        if(!file_exists($profile_image_location)) {
            mkdir($profile_image_location, 0755, true);
        }

        $imageValidID = time().'.'. $incomingFields['validIDPhoto']->extension();
        $imagePhoto = time().'.'. $incomingFields['photo']->extension();

        $incomingFields['validIDPhoto']->move($valid_id_image_location,  $imageValidID);
        $incomingFields['photo']->move($profile_image_location, $imagePhoto); 

        $incomingFields['validIDPhoto'] = $imageValidID;
        $incomingFields['photo'] = $imagePhoto;
     
        $user->update ($incomingFields);
        session()->flash('success', 'Successfully Updated!');
        //return view('admin/register');
        return back();
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
            //'validIDPhoto'=> 'required|image|max:2048',
            //'photo'=> 'required|image|max:2048',
        ]);
       
        
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
