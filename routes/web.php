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
Route::get('', function () { //farmers landing page or redirect to home
    if (request()->getHost() === 'firms.fun') {
        return redirect('/firms');
    }
    return view('/home');
});

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
Route::get('firms/dashboard', [insuranceController::class, 'index'])->name('dashboard.farmer.index'); 

//insurance for farmers side
Route::get('firms/rice-insurance', function () {
    $user = Auth::guard('web')->user();
    if($user) 
    {
        return view('farmer/rice_insurance');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

Route::get('firms/corn-insurance', function () {
    $user = Auth::guard('web')->user();
    if($user)  
    {
        return view('farmer/corn_insurance');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

Route::get('firms/hvc-insurance', function () {
    $user = Auth::guard('web')->user();
    if($user)    
    {
        return view('farmer/hvc_insurance');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

//for farmers profile
Route::get('firms/farmer/profile', function () {
    $user = Auth::guard('web')->user();
    if($user) 
    {
        return view('farmer/profile');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});
//for admin profile
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
    $user = Auth::guard('web')->user();
    if($user)  
    {
        return view('farmer/change_password');
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

 //admin change password
Route::get('firms/admin/change_password', function () {
    $user = Auth::guard('admin')->user();
    if($user)    
    {
        return view('admin/change_password');
    }
    return redirect('firms/admin/login')->withInput()->with('errmessage', 'Please Login First!');
});



//for data privacy
Route::get('firms/data-privacy', function () { 
    return view('farmer/data_privacy');
});

//for forget-password
Route::get('/forget-password', [forgotPasswordController ::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [forgotPasswordController ::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//for admin forget password
Route::get('admin/forget-password', [forgotPasswordController ::class, 'adminShowForgetPasswordForm'])->name('admin.forget.password.get');
Route::post('admin/forget-password', [forgotPasswordController ::class, 'adminSubmitForgetPasswordForm'])->name('admin.forget.password.post'); 
Route::get('admin/reset-password/{token}', [ForgotPasswordController::class, 'adminShowResetPasswordForm'])->name('admin.reset.password.get');
Route::post('admin/reset-password', [ForgotPasswordController::class, 'adminSubmitResetPasswordForm'])->name('admin.reset.password.post');

//for farmers CRUD
Route::get('firms/farmer/register', [farmerController::class, 'index'])->name('farmer.index'); 
Route::post('/register', [farmerController::class, 'store'])->name('farmer.store');
Route::get('/farmer/{user}/edit', [farmerController::class, 'edit'])->name('farmer.edit');
Route::put('/farmer/{user}/update', [farmerController::class, 'update'])->name('farmer.update');
Route::post('/login', [farmerController::class, 'login']);
Route::post('/logout', [farmerController::class, 'logout']);

//for edit user account
Route::put('/update/{user}/profile', [farmerController::class, 'updateProfile'])->name('farmer.update.profile');

//for changing password farmer side
Route::get('/change/password', [farmerController::class, 'changePassword'])->name('farmer.changePassword');
Route::post('/update/password', [farmerController::class, 'changePasswordSave'])->name('farmer.updatePassword');

//search function
Route::get('farmer/find',[farmerController::class, 'find'])->name('farmer.find');
Route::get('insurance/find',[insuranceController::class, 'find'])->name('insurance.find');


//status in insurance report
Route::get('firms/farmer/pending', [insuranceController::class, 'pending'])->name('insurance.pending'); 
Route::get('firms/farmer/approved', [insuranceController::class, 'approved'])->name('insurance.approved'); 
Route::get('firms/farmer/rejected', [insuranceController::class, 'rejected'])->name('insurance.rejected'); 
Route::get('/farmer/pending/{insurance}/edit', [insuranceController::class, 'edit'])->name('insurance.edit');
Route::get('/farmer/insurance/{insurance}/view', [insuranceController::class, 'view'])->name('insurance.view');
Route::put('/farmer/pending/{insurance}/update', [insuranceController::class, 'update'])->name('insurance.update');

//validation and storing for insurance
Route::post('/insurance', [insuranceController::class, 'store'])->name('insurance.store');
//status in insurance report
Route::get('firms/farmer/pending', [insuranceController::class, 'pending'])->name('insurance.pending'); 
Route::get('firms/farmer/approved', [insuranceController::class, 'approved'])->name('insurance.approved'); 
Route::get('firms/farmer/rejected', [insuranceController::class, 'rejected'])->name('insurance.rejected'); 
Route::get('/farmer/pending/{insurance}/edit', [insuranceController::class, 'edit'])->name('insurance.edit');
Route::get('/farmer/insurance/{insurance}/view', [insuranceController::class, 'view'])->name('insurance.view');
Route::put('/farmer/pending/{insurance}/update', [insuranceController::class, 'update'])->name('insurance.update');

//sending request letter

Route::put('/farmer/partially-rejected/{insurance}/request-letter', [insuranceController::class, 'sendRequestLetter'])->name('insurance.requestLetter');

//for farm list
Route::get('firms/farmer/farm-list', [farmController::class, 'index'])->name('farm.index'); 
Route::post('/farm', [farmController::class, 'store'])->name('farm.store');
Route::get('/farmer/farm/{farm}/edit', [farmController::class, 'edit'])->name('farm.edit');
Route::put('/farmer/farm/{farm}/update', [farmController::class, 'update'])->name('farm.update');

//for notice of loss
Route::get('firms/farmer/notice-loss', [damageController::class, 'index'])->name('damage.index'); 
Route::post('/notice-loss', [damageController::class, 'store'])->name('damage.store');
Route::get('/farmer/notice-loss/{insurance}/add', [damageController::class, 'add'])->name('damage.add');
Route::get('/farmer/notice-loss/{damage}/edit', [damageController::class, 'edit'])->name('damage.edit');
Route::put('/farmer/notice-loss/{damage}/update', [damageController::class, 'update'])->name('damage.update');

//for indemnity
Route::get('firms/farmer/indemnity', [indemnityController::class, 'index'])->name('indemnity.index'); 
Route::get('/farmer/indemnity/{damage}/add', [indemnityController::class, 'add'])->name('indemnity.add');
Route::get('/farmer/indemnity/{indemnity}/edit', [indemnityController::class, 'edit'])->name('indemnity.edit');
Route::put('/farmer/indemnity/{indemnity}/update', [indemnityController::class, 'update'])->name('indemnity.update');
Route::post('/indemnity', [indemnityController::class, 'store'])->name('indemnity.store');


Route::get('firms/admin/login', function () { //admin login
    return view('admin/admin_login');
});

//for admin side 
//register
//Route::get('firms/admin-register', function () {
//    return view('admin/register');
//});

//login for admin
Route::post('admin/register', [adminController::class, 'register'])->name('admin.index');
Route::get('firms/admin/register', [adminController::class, 'index'])->name('admin.index'); 

Route::post('admin/login', [adminController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [adminController::class, 'logout'])->name('admin.logout');

//dashboard for admin
Route::get('firms/admin/dashboard', [adminInsuranceController::class, 'index'])->name('dashboard.admin.index'); 
//admin index for 

//adding new farmer
Route::post('/register/admin', [adminController::class, 'store'])->name('admin.store');
Route::get('/admin/{admin}/edit', [adminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{admin}/update', [adminController::class, 'update'])->name('admin.update');
Route::get('admin/find',[adminController::class, 'find'])->name('admin.find');
?>
