<?php

namespace App\Http\Controllers;

use App\Models\damage;
use Twilio\Rest\Client;
use App\Models\indemnity;
use App\Models\insurance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Auth;


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
