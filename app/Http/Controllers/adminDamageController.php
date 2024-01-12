<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminDamageController extends Controller
{
    public function index(){
        $user = Auth::guard('admin')->user();
        if($user)    
        {
            $damage = DB::table('damages')->get();
            $damage=damage::sortable()->paginate(10);
            return view('admin/notice_loss', ['damages'=>$damage]);
   
        }
        return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
    } 
   }
}
