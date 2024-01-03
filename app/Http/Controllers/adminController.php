<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\insurance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class adminController extends Controller
{
    public function index(){
        $admin = admin::all();
        return view('admin/register', ['admins'=>$admin]);
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
        return view('admin/register_edit', ['admin'=>$admin]);
    }
    public function logout(){ //to logout the farmers
        
        if (Auth::guard('admin')->check()) {
            // User is authenticated
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect('/firms/admin/login');
        }
    }  

    public function store(Request $request){//to add new farmers
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
        return redirect('firms/admin/register_admin');
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
        return view('admin/register_admin_search',['admins'=>$admin]);
    }
}
