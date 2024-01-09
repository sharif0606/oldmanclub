<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthenticationController as auth;
use App\Http\Controllers\Backend\UserController as user;
use App\Http\Controllers\Backend\RoleController as role;
use App\Http\Controllers\Backend\DashboardController as dashboard;
use App\Http\Controllers\Backend\PermissionController as permission;
use App\Http\Controllers\Backend\Website\SettingController as setting;
use App\Http\Controllers\Backend\Website\SliderController as slider;
use App\Http\Controllers\Backend\Website\OurServicesController as ourservice;
use App\Http\Controllers\Backend\Website\HomepageController as homepage;
use App\Http\Controllers\Backend\Website\CustomerFeedbackController as cus_feedback;
use App\Http\Controllers\Backend\Website\GlobalNetWorkImageController as globalnetwork;

//NFC Business Card
use App\Http\Controllers\Backend\Website\NfcCard\NfcCardImageController as nfccard;
use App\Http\Controllers\Backend\Website\NfcCard\NfcCardPriceSectionController as nfcpricesection;
use App\Http\Controllers\Backend\Website\NfcCard\NfcCardPriceController as nfccardprice;
use App\Http\Controllers\Backend\Website\NfcCard\SubscribeSectionController as subscribesection;





use App\Http\Controllers\User\ClientAuthentication as clientauth;
use App\Http\Controllers\User\ClientController as client;

// landing page
use App\Http\Controllers\Common\frontendController as frontend;


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

Route::get('/register', [auth::class,'signUpForm'])->name('register');
Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'singOut'])->name('logOut');

Route::middleware(['checkauth'])->prefix('admin')->group(function(){
    Route::get('dashboard', [dashboard::class,'index'])->name('dashboard');
});
Route::middleware(['checkrole'])->prefix('admin')->group(function(){
    Route::resource('user', user::class);
    Route::resource('role', role::class);
    Route::get('permission/{role}', [permission::class,'index'])->name('permission.list');
    Route::post('permission/{role}', [permission::class,'save'])->name('permission.save');
    Route::resource('setting', setting::class);
    Route::resource('slider', slider::class);
    Route::resource('ourservice', ourservice::class);
    Route::resource('homepage', homepage::class);
    Route::resource('cus_feedback', cus_feedback::class);
    Route::resource('globalnetwork', globalnetwork::class);
    
//NFC card section
    Route::resource('nfccard', nfccard::class);
    Route::resource('nfcpricesection', nfcpricesection::class);
    Route::resource('nfccardprice', nfccardprice::class);
    Route::resource('subscribesection', subscribesection::class);
 
});


// Client Controller

Route::get('client/register',[clientauth::class,'signUpForm'])->name('clientregister');
Route::post('client/register',[clientauth::class,'signUpStore'])->name('clientregister.store');
Route::get('client/login', [clientauth::class,'signInForm'])->name('clientlogin');
Route::post('client/login', [clientauth::class,'signInCheck'])->name('clientlogin.check');
Route::get('client/logout', [clientauth::class,'singOut'])->name('clientlogOut');

Route::middleware(['checkclient'])->prefix('client')->group(function(){
    Route::get('dashboard', [client::class,'index'])->name('clientdashboard'); 
});

Route::get('', [frontend::class, 'frontend'])->name('frontend');
// Route::get('/', function () {
//     return view('frontend.home');
// });

