<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\farmerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\farmController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\damageController;
use App\Http\Controllers\indemnityController;
use App\Http\Controllers\insuranceController;
use App\Http\Controllers\farmerProfileController;
use App\Http\Controllers\adminInsuranceController;
use App\Http\Controllers\forgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/firms', function () { //farmers landing page
    return view('/home'); 
});
Route::get('/firms/farmer/login', function () { //farmers landing page
    return view('farmer/login'); 
});
Route::get('firms/about', function () {
    return view('farmer/about');
});
Route::get('firms/contact', function () {
    return view('farmer/contact');
});
Route::get('firms/help', function () {
    return view('farmer/help');
});
Route::get('firms/insurance-program', function () {
    return view('farmer/program');
});
//once user already login then these following routes is accessible by the farmers
Route::get('firms/dashboard', function () {
    if(Auth::check())   
    {
        return view('farmer/dashboard');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
    
});

//insurance for farmers side
Route::get('firms/rice-insurance', function () {
    if(Auth::check())   
    {
        return view('farmer/rice_insurance');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

Route::get('firms/corn-insurance', function () {
    if(Auth::check())   
    {
        return view('farmer/corn_insurance');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

Route::get('firms/hvc-insurance', function () {
    if(Auth::check())   
    {
        return view('farmer/hvc_insurance');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

//for farmers profile
Route::get('firms/farmer-profile', function () {
    if(Auth::check())   
    {
        return view('farmer/profile');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

Route::get('firms/admin/profile', function () {
    $user = Auth::guard('admin')->user();
    if($user)    
    {
        return view('admin/profile');
    }
    return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
});

//for farmers password
Route::get('firms/farmer/change-password', function () {
    if(Auth::check())   
    {
        return view('farmer/change_password');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

//for farm list
Route::get('firms/farmer-farm-list', function () {
    if(Auth::check())   
    {
        return view('farmer/farm_list');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

//for notice of loss
Route::get('firms/farmer-notice-loss', function () {
    if(Auth::check())   
    {
        return view('farmer/notice_loss');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

Route::get('firms/farmer-indemnity', function () { //for indemnity
    if(Auth::check())   
    {
        return view('farmer/indemnity');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

Route::get('firms/admin-index', function () {


}); //admin login
Route::get('firms/admin/change_password', function () {
    $user = Auth::guard('admin')->user();
    if($user)    
    {
        return view('admin/change_password');
    }
    return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
});

Route::get('firms/admin/login', function () { //admin login
    return view('admin/admin_login');
});

//for admin side 
//register
Route::get('firms/admin-register', function () {
    return view('admin/register');
});
Route::post('/register', [farmerController::class, 'register']);
Route::post('/login', [farmerController::class, 'login']);
Route::post('/logout', [farmerController::class, 'logout']);


?>