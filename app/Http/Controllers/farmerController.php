<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class farmerController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request ->validate ([
            'rsbsa' => ['required', Rule::unique('users', 'rsbsa')],
            'firstName' => 'required',
            'middleName'=> 'nullable',
            'lastName' => 'required',
            'extensionName' => 'nullable',
            'birthdate' => 'required',
            'sex'=> 'required',
            'email' => ['required', 'email',Rule::unique('users', 'email') ],
            'password' => ['required', 'min:8', 'max:25']
        ]);
       
        

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create ($incomingFields);
        session()->flash('success', 'Successfully Registered!');
        return redirect('firms/admin-register');
    }

    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginEmail' => ['required', 'email'],
            'loginPass' => 'required',
        ]);

        if(auth()->attempt(['email'=>$incomingFields['loginEmail'], 'password' =>$incomingFields['loginPass']])){
            $request->session()->regenerate();
            return redirect('firms/dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'Invalid Login Credentials!']);         
    }

    public function logout(){
        
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('firms/farmer');
    }
}
