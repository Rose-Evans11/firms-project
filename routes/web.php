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
use App\Http\Controllers\adminDamageController;
use App\Http\Controllers\adminIndemnityController;
use App\Http\Controllers\adminInsuranceController;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\generateAdminReportController;

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
Route::get('/firms/farmer/', function () { //farmers landing page
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

//add rice insurance for farmers side
Route::get('firms/rice-insurance', function () {
    $user = Auth::guard('web')->user();
    if($user) 
    {
        return view('farmer/rice_insurance');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

Route::get('firms/admin/add/rice-insurance', function () {
    $user = Auth::guard('admin')->user();
    if($user) 
    {
        return view('admin/add_rice_insurance');
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
Route::get('firms/admin/add/corn-insurance', function () {
    $user = Auth::guard('admin')->user();
    if($user)  
    {
        return view('admin/add_corn_insurance');
    }
    return redirect('firms/admin')->withInput()->with('errmessage', 'Please Login First!');
});


Route::get('firms/hvc-insurance', function () {
    $user = Auth::guard('web')->user();
    if($user)    
    {
        return view('farmer/hvc_insurance');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});
Route::get('firms/admin/add/hvc-insurance', function () {
    $user = Auth::guard('admin')->user();
    if($user)  
    {
        return view('admin/add_hvc_insurance');
    }
    return redirect('firms/admin')->withInput()->with('errmessage', 'Please Login First!');
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


Route::get('firms/farmer-indemnity', function () { //for indemnity
    $user = Auth::guard('web')->user();
    if($user)  
    {
        return view('farmer/indemnity');
    }
    return redirect('firms/farmer')->withInput()->with('errmessage', 'Please Login First!');
});

 //admin change password
Route::get('firms/admin/change-password', function () {
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
Route::put('/update/{admin}/profile', [adminController::class, 'updateProfile'])->name('admin.update.profile');

//for changing password farmer side
Route::get('/change/password', [farmerController::class, 'changePassword'])->name('farmer.changePassword');
Route::post('/update/password', [farmerController::class, 'changePasswordSave'])->name('farmer.updatePassword');

//for changing password admin side
Route::get('/change/password', [adminController::class, 'changePassword'])->name('admin.changePassword');
Route::post('/update/password', [adminController::class, 'changePasswordSave'])->name('admin.updatePassword');

//search function
Route::get('farmer/find',[farmerController::class, 'find'])->name('farmer.find');
Route::get('insurance/find',[insuranceController::class, 'find'])->name('insurance.find');

//search function for admin
Route::get('admin/insurance/find',[adminInsuranceController::class, 'admin_insurance_find'])->name('admin.insurance.find');
Route::get('admin/insurance/pending/find',[adminInsuranceController::class, 'admin_insurance_pending_find'])->name('admin.insurance.pending.find');
Route::get('admin/insurance/rice/find',[adminInsuranceController::class, 'admin_insurance_rice_find'])->name('admin.insurance.rice.find');
Route::get('admin/insurance/corn/find',[adminInsuranceController::class, 'admin_insurance_corn_find'])->name('admin.insurance.corn.find');
Route::get('admin/insurance/hvc/find',[adminInsuranceController::class, 'admin_insurance_hvc_find'])->name('admin.insurance.hvc.find');
Route::get('admin/insurance/rejected/find',[adminInsuranceController::class, 'admin_insurance_rejected_find'])->name('admin.insurance.rejected.find');
Route::get('admin/insurance/approved/find',[adminInsuranceController::class, 'admin_insurance_approved_find'])->name('admin.insurance.approved.find');

//validation and storing for insurance
Route::post('/insurance', [insuranceController::class, 'store'])->name('insurance.store');
Route::post('/admin/insurance', [adminInsuranceController::class, 'store'])->name('admin.insurance.store');

//status in insurance report
Route::get('firms/farmer/pending', [insuranceController::class, 'pending'])->name('insurance.pending'); 
Route::get('firms/farmer/approved', [insuranceController::class, 'approved'])->name('insurance.approved'); 
Route::get('firms/farmer/rejected', [insuranceController::class, 'rejected'])->name('insurance.rejected'); 
Route::get('/farmer/pending/{insurance}/edit', [insuranceController::class, 'edit'])->name('insurance.edit');
Route::get('/farmer/insurance/{insurance}/view', [insuranceController::class, 'view'])->name('insurance.view');
Route::put('/farmer/pending/{insurance}/update', [insuranceController::class, 'update'])->name('insurance.update');

//validatiion and storing for insurance admin side
Route::get('firms/admin/pending', [adminInsuranceController::class, 'pending'])->name('admin.pending'); 
Route::get('firms/admin/approved', [adminInsuranceController::class, 'approved'])->name('admin.approved'); 
Route::get('firms/admin/rejected', [adminInsuranceController::class, 'rejected'])->name('admin.rejected'); 
Route::get('firms/admin/rice-insurance', [adminInsuranceController::class, 'rice'])->name('admin.rice'); 
Route::get('firms/admin/corn-insurance', [adminInsuranceController::class, 'corn'])->name('admin.corn'); 
Route::get('firms/admin/hvc-insurance', [adminInsuranceController::class, 'hvc'])->name('admin.hvc'); 
Route::get('/admin/insurance/{insurance}/edit', [adminInsuranceController::class, 'edit'])->name('admin.insurance.edit');
Route::put('/admin/insurance/{insurance}/update', [adminInsuranceController::class, 'update'])->name('admin.insurance.update');
Route::get('/admin/insurance/{insurance}/view', [adminInsuranceController::class, 'view'])->name('admin.insurance.view');

//sending request letter

Route::put('/farmer/partially-rejected/{insurance}/request-letter', [insuranceController::class, 'sendRequestLetter'])->name('insurance.requestLetter');
Route::put('/admin/partially-rejected/{insurance}/request-letter', [adminInsuranceController::class, 'sendRequestLetter'])->name('admin.insurance.requestLetter');

//for farm list
Route::get('firms/farmer/farm-list', [farmController::class, 'index'])->name('farm.index'); 
Route::post('/farm', [farmController::class, 'store'])->name('farm.store');
Route::get('/farmer/farm/{farm}/edit', [farmController::class, 'edit'])->name('farm.edit');
Route::put('/farmer/farm/{farm}/update', [farmController::class, 'update'])->name('farm.update');

//for notice of loss
Route::post('/notice-loss', [damageController::class, 'store'])->name('damage.store');
Route::get('firms/farmer/notice-loss', [damageController::class, 'index'])->name('damage.index'); 
Route::get('/farmer/notice-loss/{insurance}/add', [damageController::class, 'add'])->name('damage.add');
Route::get('/farmer/notice-loss/{damage}/edit', [damageController::class, 'edit'])->name('damage.edit');
Route::get('/farmer/notice-loss/{damage}/view', [damageController::class, 'view'])->name('damage.view');
Route::put('/farmer/notice-loss/{damage}/update', [damageController::class, 'update'])->name('damage.update');

//for admin
Route::post('admin/notice-loss', [adminDamageController::class, 'store'])->name('admin.damage.store');
Route::get('firms/admin/notice-loss', [adminDamageController::class, 'index'])->name('admin.damage.index'); 
Route::get('firms/admin/notice-loss/{insurance}/add', [adminDamageController::class, 'add'])->name('admin.damage.add');
Route::get('firms/admin/notice-loss/{damage}/edit', [adminDamageController::class, 'edit'])->name('admin.damage.edit');
Route::get('firms/admin/notice-loss/{damage}/view', [adminDamageController::class, 'view'])->name('admin.damage.view');
Route::put('firms/admin/notice-loss/{damage}/update', [adminDamageController::class, 'update'])->name('admin.damage.update');

//for indemnity
Route::get('firms/farmer/indemnity', [indemnityController::class, 'index'])->name('indemnity.index'); 
Route::get('/farmer/indemnity/{damage}/add', [indemnityController::class, 'add'])->name('indemnity.add');
Route::get('/farmer/indemnity/{indemnity}/edit', [indemnityController::class, 'edit'])->name('indemnity.edit');
Route::put('/farmer/indemnity/{indemnity}/update', [indemnityController::class, 'update'])->name('indemnity.update');
Route::get('/farmer/indemnity/{indemnity}/view', [indemnityController::class, 'view'])->name('indemnity.view');
Route::post('/indemnity', [indemnityController::class, 'store'])->name('indemnity.store');

//for admin
Route::get('firms/admin/indemnity', [adminIndemnityController::class, 'index'])->name('admin.indemnity.index'); 
Route::post('admin/indemnity', [adminIndemnityController::class, 'store'])->name('admin.indemnity.store');
Route::get('/admin/indemnity/{damage}/add', [adminIndemnityController::class, 'add'])->name('admin.indemnity.add');
Route::get('/admin/indemnity/{indemnity}/edit', [adminIndemnityController::class, 'edit'])->name('admin.indemnity.edit');
Route::put('/admin/indemnity/{indemnity}/update', [adminIndemnityController::class, 'update'])->name('admin.indemnity.update');
Route::get('/admin/indemnity/{indemnity}/view', [adminIndemnityController::class, 'view'])->name('admin.indemnity.view');


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

//adding new admin
Route::post('/register/admin', [adminController::class, 'store'])->name('admin.store');
Route::get('/admin/{admin}/edit', [adminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{admin}/update', [adminController::class, 'update'])->name('admin.update');
Route::get('admin/find',[adminController::class, 'find'])->name('admin.find');

//generate pdf
Route::get('/insurance/pdf/', [adminInsuranceController::class, 'createPDF'])->name('insurance.pdf');
Route::get('/user/pdf/', [generateAdminReportController::class, 'createPDFUser'])->name('user.pdf');
Route::get('/notice-of-loss/pdf/', [generateAdminReportController::class, 'createPDFDamage'])->name('notice_of_loss.pdf');
Route::get('/insurance/find/pdf/', [adminInsuranceController::class, 'createPDFFind'])->name('insurance.find.pdf');

//generate excel
Route::get('/insurance/excel/', [generateAdminReportController::class, 'createExcel'])->name('user.excel');
Route::get('/user/excel/', [generateAdminReportController::class, 'createExcelUser'])->name('insurance.excel');
Route::get('/notice-of-loss/excel/', [generateAdminReportController::class, 'createExcelDamage'])->name('notice_of_loss.excel');

//generate csv
Route::get('/insurance/csv/', [generateAdminReportController::class, 'exportCsv'])->name('insurance.csv');
Route::get('/user/csv/', [generateAdminReportController::class, 'exportCsvUser'])->name('user.csv');
Route::get('/notice-of-loss/csv/', [generateAdminReportController::class, 'exportCsvDamage'])->name('notice_of_loss.csv');

?>
