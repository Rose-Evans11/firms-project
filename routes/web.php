<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\farmerController;
use App\Http\Controllers\farmerProfileController;

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
//farmers landing page
Route::get('/firms/farmer', function () {
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

//for farmers password
Route::get('firms/farmer-change-password', function () {
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

//for indemnity
Route::get('firms/farmer-indemnity', function () {
    if(Auth::check())   
    {
        return view('farmer/indemnity');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

//post for user registration
//Route::post('firms/register', [UserController::class, 'register']);

//for admin side 
//login page
Route::get('firms/admin-index', function () {
    return view('admin/admin_login');
});

//for admin side 
//register
//Route::get('firms/admin-register', function () {
//    return view('admin/register');
//});
Route::get('firms/farmer/register', [farmerController::class, 'index'])->name('farmer.index');
Route::post('/register', [farmerController::class, 'store'])->name('farmer.store');
Route::get('/farmer/{user}/edit', [farmerController::class, 'edit'])->name('farmer.edit');
Route::put('/farmer/{user}/update', [farmerController::class, 'update'])->name('farmer.update');
Route::post('/login', [farmerController::class, 'login']);
Route::post('/logout', [farmerController::class, 'logout']);
//Route::get('/edit/{user}/profile', [farmerController::class, 'editProfile'])->name('farmer.edit.profile');
Route::get('/profile/edit', 'PublicUserController@editUser')->middleware(['auth']);
Route::put('/update/{user}/profile', [farmerController::class, 'updateProfile'])->name('farmer.update.profile');
//Route::put('/update/profile', [farmerController::class, 'updateProfile'])->name('farmer.update.profile');
//search
Route::get('/find',[farmerController::class, 'find'])->name('web.find');

//get image
Route::get('/dbimage/{user}',[farmerController::class, 'getImage']);
?>