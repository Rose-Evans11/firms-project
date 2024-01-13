<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminIndemnityController extends Controller
{
    public function index(){
        $user=Auth::guard('admin')->user();
        if($user)   
        {
            //$insurance = insurance::all();
            $damage = DB::table('indemnities')->get();
            $damage=damage::sortable()->paginate(10);
        return view('admin/indemnity', ['indemnities'=>$indemnity]);
        }
         return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
       
    }
}
