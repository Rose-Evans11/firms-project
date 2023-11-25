<?php

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

Route::get('/firms', function () {
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

//insurance
Route::get('firms/rice-insurance', function () {
    return view('farmer/rice_insurance');
});

Route::get('firms/corn-insurance', function () {
    return view('farmer/corn_insurance');
});


//post for user registration
//Route::post('firms/register', [UserController::class, 'register']);


?>