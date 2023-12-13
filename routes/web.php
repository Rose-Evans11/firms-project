<?php

use App\Http\Controllers\farmerController;
use Illuminate\Support\Facades\Route;

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
    return view('farmer/index');
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
    return view('farmer/dashboard');
});

//insurance for farmers side
Route::get('firms/rice-insurance', function () {
    return view('farmer/rice_insurance');
});

Route::get('firms/corn-insurance', function () {
    return view('farmer/corn_insurance');
});

Route::get('firms/hvc-insurance', function () {
    return view('farmer/hvc_insurance');
});

//for farmers profile
Route::get('firms/farmer-profile', function () {
    return view('farmer/profile');
});

//for farmers password
Route::get('firms/farmer-change-password', function () {
    return view('farmer/change_password');
});

//for farm list
Route::get('firms/farmer-farm-list', function () {
    return view('farmer/farm_list');
});

//for notice of loss
Route::get('firms/farmer-notice-loss', function () {
    return view('farmer/notice_loss');
});

//for indemnity
Route::get('firms/farmer-indemnity', function () {
    return view('farmer/indemnity');
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
Route::get('firms/admin-register', function () {
    return view('admin/register');
});
Route::post('/register', [farmerController::class, 'register']);
Route::post('/login', [farmerController::class, 'login']);
Route::post('/logout', [farmerController::class, 'logout']);


?>