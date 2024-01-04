<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\farmController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\damageController;
use App\Http\Controllers\farmerController;
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

Route::get('firms/farmer/register', [farmerController::class, 'index'])->name('farmer.index'); //adding new farmer
//crud for farmer information (note: try mo rin iconnect later yung profile sa page)
Route::post('/register', [farmerController::class, 'store'])->name('farmer.store');
Route::get('/farmer/{user}/edit', [farmerController::class, 'edit'])->name('farmer.edit');
Route::put('/farmer/{user}/update', [farmerController::class, 'update'])->name('farmer.update');
Route::post('/login', [farmerController::class, 'login']);
Route::post('/logout', [farmerController::class, 'logout']);
//for edit user account
Route::put('/update/{user}/profile', [farmerController::class, 'updateProfile'])->name('farmer.update.profile');
//search
Route::get('/find',[farmerController::class, 'find'])->name('web.find');
//for changing password
Route::get('/change/password', [farmerController::class, 'changePassword'])->name('farmer.changePassword');
Route::post('/update/password', [farmerController::class, 'changePasswordSave'])->name('farmer.updatePassword');
//reset password
Route::get('forget-password', [forgotPasswordController ::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [forgotPasswordController ::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//validation insurance
Route::post('/insurance', [insuranceController::class, 'store'])->name('insurance.store');
//dashboard for farmer
Route::get('firms/dashboard', [insuranceController::class, 'index'])->name('dashboard.farmer.index'); 

//for changing password admin side
Route::get('/change/password', [adminController::class, 'changePassword'])->name('admin.changePassword');
Route::post('/update/password', [adminController::class, 'changePasswordSave'])->name('admin.updatePassword');
//reset password
Route::get('/admin/forget-password', [forgotPasswordController ::class, 'adminShowForgetPasswordForm'])->name('admin.forget.password.get');
Route::post('/admin/forget-password', [forgotPasswordController ::class, 'adminSubmitForgetPasswordForm'])->name('admin.forget.password.post'); 
Route::get('/admin/reset-password/{token}', [ForgotPasswordController::class, 'adminShowResetPasswordForm'])->name('admin.reset.password.get');
Route::post('/admin/reset-password', [ForgotPasswordController::class, 'adminSubmitResetPasswordForm'])->name('admin.reset.password.post');

//validation insurance
Route::post('/insurance', [insuranceController::class, 'store'])->name('insurance.store');
//dashboard for farmer
Route::get('firms/dashboard', [insuranceController::class, 'index'])->name('dashboard.farmer.index'); 


//status in insurance report
Route::get('firms/farmer/pending', [insuranceController::class, 'pending'])->name('insurance.pending'); 
Route::get('firms/farmer/approved', [insuranceController::class, 'approved'])->name('insurance.approved'); 
Route::get('firms/farmer/rejected', [insuranceController::class, 'rejected'])->name('insurance.rejected'); 
Route::get('/farmer/pending/{insurance}/edit', [insuranceController::class, 'edit'])->name('insurance.edit');
Route::get('/farmer/insurance/{insurance}/view', [insuranceController::class, 'view'])->name('insurance.view');
Route::put('/farmer/pending/{insurance}/update', [insuranceController::class, 'update'])->name('insurance.update');

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

//admin
Route::post('/login/admin', [adminController::class, 'login'])->name('admin.login');
Route::post('/logout/admin', [adminController::class, 'logout'])->name('admin.logout');

Route::get('firms/admin/dashboard', [adminInsuranceController::class, 'index'])->name('dashboard.admin.index'); 
Route::get('firms/admin/register', [adminController::class, 'index'])->name('admin.index'); //adding new farmer
Route::post('/register/admin', [adminController::class, 'store'])->name('admin.store');
Route::get('/admin/{admin}/edit', [adminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{admin}/update', [adminController::class, 'update'])->name('admin.update');
Route::put('/update/{admin}/profile', [adminController::class, 'updateProfile'])->name('admin.update.profile');
Route::get('admin/find',[adminController::class, 'find'])->name('admin.find');

?>