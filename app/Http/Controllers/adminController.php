<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\insurance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class adminController extends Controller
{
    public function index(){
        $admin = Auth::guard('admin')->user();
        if($admin)  
        {
            $admin = admin::all();
            return view('admin/register_admin', ['admins'=>$admin]);
        }
        return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
       }
    public function login(Request $request){  //to login the farmers
        $incomingFields = $request->validate([
            'loginEmail' => ['required', 'email'],
            'loginPass' => 'required',
        ]);

        if(Auth::guard('admin')->attempt(['email' => $incomingFields['loginEmail'], 'password' => $incomingFields['loginPass']])){
            $request->session()->regenerate();
            return redirect('firms/admin/dashboard');
        }
        
        return redirect()->back()->withErrors(['email' => 'Invalid Login Credentials!']);         
    }
    public function edit(admin $admin){ //to edit and retrive the information
        $admin = Auth::guard('admin')->user();
        if($admin)  
        {
            return view('admin/edit_register_admin', ['admin'=>$admin]);
        }
        return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
    }
    public function logout(){ //to logout the farmers
        // User is authenticated
        if (Auth::guard('admin')->check()) {
            // User is authenticated
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect('/firms/admin/login');
        }
    }  
    public function store(Request $request){//to add new farmers
        $admin = Auth::guard('admin')->user();
        if($admin)  
        {
            $incomingFields = $request ->validate ([
                'firstName' => 'required',
                'middleName'=> 'nullable',
                'lastName' => 'required',
                'extensionName' => 'nullable',
                'email' => ['required', 'email',Rule::unique('admins', 'email') ],
                'password' => ['required', 'min:8', 'max:25'],
                'contactNumber'=> 'nullable',
                'office'=> 'nullable',
                'department'=> 'nullable',
                'position'=> 'nullable',
                'isActive'=> 'nullable',
                'role'=> 'nullable',
    
            ]);
            $incomingFields['password'] = bcrypt($incomingFields['password']);
            $admin = admin::create ($incomingFields);
            session()->flash('success', 'Successfully Registered!');
            return back();
        }
        return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');

       
    }
    public function find(Request $request, admin $admin){ //to search and find
        $request->validate([
          'query'=>'min:2'
       ]);

       $search_text = $request->input('query');
      // $user = User::table('users')
       $admin = admin::where('firstName','LIKE','%'.$search_text.'%')
                  ->orWhere('lastName', 'like', '%' . $search_text . '%')
                  ->orWhere('office', 'like', '%' . $search_text . '%')
                  ->orWhere('position', 'like', '%' . $search_text . '%')
                  ->orWhere('department', 'like', '%' . $search_text . '%')
                  ->orWhere('role', 'like', '%' . $search_text . '%')
                  ->paginate(5);
        return view('admin/search_register_admin',['admins'=>$admin]);
    }
    public function editProfile(admin $admin){
        //$user =Auth::user();
        return view('admin/profile')->with('admins', Auth::guards('admin'));
        //return view('farmer/profile', ['user'=>$user]);
    }
    public function update(admin $admin, Request $request){//to update admin's information in admin side in registration page
        $incomingFields = $request ->validate ([
            'firstName' => 'required',
            'middleName'=> 'nullable',
            'lastName' => 'required',
            'extensionName' => 'nullable',
            'contactNumber'=> 'nullable',
            'office'=> 'nullable',
            'department'=> 'nullable',
            'position'=> 'nullable',
            'isActive'=> 'nullable',
            'role'=> 'nullable',
        ]);
       
        
        $admin->update ($incomingFields);
        session()->flash('success', 'Successfully Updated!');
        return redirect(route('dashboard.admin.index'));
    }
    

    public function updateProfile(admin $admin, Request $request){

        $incomingFields = $request ->validate ([
            'firstName' => 'required',
            'middleName'=> 'nullable',
            'lastName' => 'required',
            'extensionName' => 'nullable',
            'contactNumber'=> 'nullable',
            'office'=> 'nullable',
            'department'=> 'nullable',
            'position'=> 'nullable',
            'role'=> 'nullable',
        ]);
       
        $admin->update ($incomingFields);
        session()->flash('success', 'Successfully Updated!');
        return back();
    }
    
    public function changePassword(Request $request){
        return view('admin/change_password');
    }
    public function changePasswordSave(admin $admin, Request $request){
    
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);
        $auth = Auth::guard('admin')->user();

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
        $admin =  admin::find($auth->id);
        $admin->password =  Hash::make($request->new_password);
        $admin->save();
        return back()->with('success', "Password Changed Successfully");
        
    }

}

