<?php

use App\Events\NewMessage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthenticationController as auth;
use App\Http\Controllers\Backend\UserController as user;
use App\Http\Controllers\Backend\ClientController as client;
use App\Http\Controllers\Backend\RoleController as role;
use App\Http\Controllers\Backend\DashboardController as dashboard;
use App\Http\Controllers\Backend\PermissionController as permission;
use App\Http\Controllers\Backend\Admin\SmsPackageController as sms;
use App\Http\Controllers\Backend\Admin\MailBoxController as mailbox;
use App\Http\Controllers\Backend\Admin\ShippingController;
use App\Http\Controllers\Backend\Admin\ShippingStatusTypeController as shipstatus;
use App\Http\Controllers\Backend\Admin\ShippingTrackingController as shiptrack;
use App\Http\Controllers\Backend\Admin\CommentController;
use App\Http\Controllers\Common\CartController;
use App\Http\Controllers\Common\CheckOutController;
use App\Http\Controllers\Backend\Admin\OrderController;
use App\Http\Controllers\Backend\Admin\CompanyController;
use App\Http\Controllers\Backend\Admin\BankController;

// use App\Http\Controllers\Backend\PhoneBookController as phonebook;
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
//Shipping Service
use App\Http\Controllers\Backend\Website\ShippingService\HeaderSectionController as shippingheader;
use App\Http\Controllers\Backend\Website\ShippingService\ServiceSectionController as shippingservice;
use App\Http\Controllers\Backend\Website\ShippingService\ChoiceSectionController as shippingchoice;
//LLC Service
use App\Http\Controllers\Backend\Website\LLcHeroSection\LlcHeroSectionController as llchero;
use App\Http\Controllers\Backend\Website\LLcHeroSection\LlcserviceController as llcservice;
use App\Http\Controllers\Backend\Website\LLcHeroSection\LlcPricingController as llcpricing;
use App\Http\Controllers\Backend\Website\LLcHeroSection\LlcCardsectionController as llccard;
//phone service
use App\Http\Controllers\Backend\Website\Phoneservice\PhoneNumberHeroController as phonehero;
use App\Http\Controllers\Backend\Website\Phoneservice\PhoneNumberServiceController as phoneservice;
use App\Http\Controllers\Backend\Website\Phoneservice\PhoneVirtualMapsController as phonemaps;
use App\Http\Controllers\Backend\Website\Phoneservice\PhoneCustomerFeedbackController as phonefeedback;
//Smart Mail Service
use App\Http\Controllers\Backend\Website\SmartMail\SmartMailHeroController as smartmailhero;
use App\Http\Controllers\Backend\Website\SmartMail\SmartWorkSectionController as smartwork;
use App\Http\Controllers\Backend\Website\SmartMail\SmartSmsServiceController as smartsms;
use App\Http\Controllers\Backend\Website\SmartMail\SmartPhonebookServiceController as smartphonebook;
//Printing service
use App\Http\Controllers\Backend\Website\PrintingService\PrintingHeroController as printhero;
use App\Http\Controllers\Backend\Website\PrintingService\PrintVideoSectionController as printvideo;
use App\Http\Controllers\Backend\Website\PrintingService\PrintCardSectionController as printcard;
use App\Http\Controllers\Backend\Website\PrintingService\PrintCustomerFeedbackController as printcus_feedback;


//User
use App\Http\Controllers\User\ClientAuthentication as clientauth;
use App\Http\Controllers\User\ClientController as clientprofile;
use App\Http\Controllers\User\PhoneBookController as phonebook;
use App\Http\Controllers\User\PhoneGroupController as phonegroup;
use App\Http\Controllers\User\ShippingController as shipping;
use App\Http\Controllers\User\ShippingCommentController as shipcomment;
use App\Http\Controllers\User\EmailSendController;
use App\Http\Controllers\OrderController as order;
use App\Http\Controllers\User\AddressVerificationController as address_verify;
use App\Http\Controllers\User\CompanyController as company;
use App\Http\Controllers\User\BankController as bank;

// landing page
use App\Http\Controllers\Common\frontendController as frontend;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PusherController;

//NFC Field
use App\Http\Controllers\Backend\Nfc\NfcFieldController as nfc_field;
use App\Http\Controllers\Backend\Nfc\DesignCardController as design_card;
use App\Http\Controllers\Backend\Nfc\NfcCardController as nfc_card;

// printing_service admin panelBackend\Printingservice

use App\Http\Controllers\Backend\Printingservice\PrintingServiceController as print_service;
use App\Http\Controllers\Backend\Printingservice\PrintingServiceImageController as print_service_image;
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

Route::get('/register', [auth::class, 'signUpForm'])->name('register');
Route::post('/register', [auth::class, 'signUpStore'])->name('register.store');
Route::get('/login', [auth::class, 'signInForm'])->name('login');
Route::post('/login', [auth::class, 'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class, 'singOut'])->name('logOut');

Route::middleware(['checkauth'])->prefix('admin')->group(function () {
    Route::get('dashboard', [dashboard::class, 'index'])->name('dashboard');
    Route::get('admin/chat', [ChatController::class, 'adminChat'])->name('admin_chat');
    Route::post('admin-chat', [ChatController::class, 'adminSendMessage'])->name('adminchat.store');
});
//middleware(['checkrole'])->
Route::prefix('admin')->group(function () {
    Route::resource('user', user::class);
    Route::resource('role', role::class);
    Route::resource('client', client::class);
    Route::get('addressverification/{id}',[client::class, 'verification'])->name('address_verify');
    Route::post('addressverification/{id}',[client::class, 'verification_update'])->name('address_verify_saved');

    Route::get('permission/{role}', [permission::class, 'index'])->name('permission.list');
    Route::post('permission/{role}', [permission::class, 'save'])->name('permission.save');
    Route::resource('sms', sms::class);
    Route::resource('mailbox', mailbox::class);
    Route::get('shipping/list', [ShippingController::class, 'shipping_list'])->name('shipping_list');
    Route::get('shipping-edit/{id}', [ShippingController::class, 'shipping_edit'])->name('shipping_edit');
    Route::post('shippingUpdate/{id}', [ShippingController::class, 'shipping_update'])->name('shipping_update');
    Route::resource('shipstatus', shipstatus::class);
    Route::resource('shiptrack', shiptrack::class);
    // Nfc
    Route::resource('nfc_field', nfc_field::class);
    Route::resource('design_card', design_card::class);
    Route::resource('nfc_card', nfc_card::class);
    // print_service admin panel
    Route::resource('print_service', print_service::class);
    Route::get('print_image/{id}', [print_service::class,'uploadfile'])->name('uploadimage');
    Route::post('print_image/{id}', [print_service::class,'uploadfile_store'])->name('uploadfile_store');
    Route::resource('print_service_image', print_service_image::class);

    Route::get('comment_list', [CommentController::class, 'comment_list'])->name('comment_list');
    Route::get('comment_edit/{id}', [CommentController::class, 'comment_edit'])->name('comment_edit');
    Route::post('comment_update/{id}', [CommentController::class, 'comment_update'])->name('comment_update');
    Route::get('order-list', [OrderController::class, 'order_list'])->name('order_list');
    Route::get('order-edit/{id}', [OrderController::class, 'order_edit'])->name('order_edit');
    Route::post('order-edit/{id}', [OrderController::class, 'order_store'])->name('order_update');

    Route::get('company_list',[CompanyController::class, 'company'])->name('company_list');
    Route::get('company_edit/{id}',[CompanyController::class, 'company_edit'])->name('company_edit');
    Route::post('company_update/{id}',[CompanyController::class, 'company_update'])->name('company_update');
    Route::get('company_show/{id}',[CompanyController::class, 'show'])->name('company_show');
    Route::get('bank_list',[BankController::class,'bank'])->name('bank_list');
    Route::get('bank_edit/{id}',[BankController::class,'bank_edit'])->name('bank_edit');
    Route::post('bank_update/{id}',[BankController::class,'bank_update'])->name('bank_update');


    //website  
    Route::resource('setting', setting::class);
    Route::resource('nfc-field', nfc_field::class);
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
    //shipping service
    Route::resource('shippingheader', shippingheader::class);
    Route::resource('shippingservice', shippingservice::class);
    Route::resource('shippingchoice', shippingchoice::class);
    //LLc Service
    Route::resource('llchero', llchero::class);
    Route::resource('llcservice', llcservice::class);
    Route::resource('llcpricing', llcpricing::class);
    Route::resource('llccard', llccard::class);
    //Phone Service
    Route::resource('phonehero', phonehero::class);
    Route::resource('phoneservice', phoneservice::class);
    Route::resource('phonemaps', phonemaps::class);
    Route::resource('phonefeedback', phonefeedback::class);
    //Smart Mail Hero
    Route::resource('smartmailhero', smartmailhero::class);
    Route::resource('smartwork', smartwork::class);
    Route::resource('smartsms', smartsms::class);
    Route::resource('smartphonebook', smartphonebook::class);
    //printing service 
    Route::resource('printhero', printhero::class);
    Route::resource('printvideo', printvideo::class);
    Route::resource('printcard', printcard::class);
    Route::resource('printcus_feedback', printcus_feedback::class);
});


// Client Controller

Route::get('client/register', [clientauth::class, 'signUpForm'])->name('clientregister');
Route::post('client/register', [clientauth::class, 'signUpStore'])->name('clientregister.store');

Route::post('/register/step1', [clientauth::class, 'registerStep1'])->name('register.step1');
Route::post('/register/step2', [clientauth::class, 'registerStep2'])->name('register.step2');
Route::post('/register/step3', [clientauth::class, 'registerStep3'])->name('register.step3');

Route::get('client/login', [clientauth::class, 'signInForm'])->name('clientlogin');
Route::post('client/login', [clientauth::class, 'signInCheck'])->name('clientlogin.check');
Route::get('client/logout', [clientauth::class, 'singOut'])->name('clientlogOut');

Route::middleware(['checkclient'])->prefix('user')->group(function () {
    Route::get('profile', [clientprofile::class, 'index'])->name('clientdashboard');
    Route::resource('phonebook', phonebook::class);
    Route::resource('phonegroup', phonegroup::class);
    Route::resource('shipping', shipping::class);
    Route::get('shipp_comment/{id}',[shipping::class, 'shipp_comment'])->name('shipp_comment');
    Route::resource('order', order::class);
    Route::get('order_edit/{id}',[order::class,'order_edit'])->name('order_edit_sampleimg');
    Route::post('order_update/{id}',[order::class,'order_update'])->name('order_update');
    Route::get('shipping_comments/{shippingId}', [shipping::class, 'showShippingComments'])->name('shippingcomment');
    Route::resource('shipcomment', shipcomment::class);

    Route::get('inbox', [EmailSendController::class, 'inbox'])->name('inbox');
    Route::get('sentbox', [EmailSendController::class, 'sentbox'])->name('sentbox');
    Route::get('sent_email', [EmailSendController::class, 'sent_email'])->name('sent_email_create');
    Route::post('store_email', [EmailSendController::class, 'store_email'])->name('store_email');
    Route::get('sent_email_show/{id}', [EmailSendController::class, 'sent_email_show'])->name('sent_email_show');

    Route::post('/profile/save', [clientprofile::class, 'save_profile'])->name('user_save_profile');
    Route::post('/profile/savepass', [clientprofile::class, 'change_password'])->name('change_password');
    // Route::get('/phonebook/list', [clientprofile::class, 'phonebook_list'])->name('phonebook_list');

    Route::get('/user/chat', [ChatController::class, 'userChat'])->name('user_chat');
    Route::post('/user/chat', [ChatController::class, 'userSendMessage'])->name('userchat_store');
    Route::resource('phonebook', phonebook::class);

    Route::get('/download-phonebook', [phonebook::class, 'downloadPhonebook'])->name('phonebook_download');
    Route::resource('nfc_card', nfc_card::class);
    Route::resource('address_verify', address_verify::class);
    Route::resource('company', company::class);
    Route::resource('bank', bank::class);
});
Route::get('nfcqrurl/{id}', [nfc_card::class, 'showqrurl']);
Route::get('save-contact/{id}', [nfc_card::class, 'save_contact'])->name('save_contact');
Route::post('/send-message', [ChatController::class, 'sendMessage']);

Route::get('', [frontend::class, 'frontend'])->name('frontend');
Route::get('nfccard', [frontend::class, 'nfccard'])->name('nfccard');
Route::get('shippingservice', [frontend::class, 'shippingservice'])->name('shippingservice');
Route::get('llcservice', [frontend::class, 'llcservice'])->name('llcservice');
Route::get('phoneservice', [frontend::class, 'phoneservice'])->name('phoneservice');
Route::get('smartmailservice', [frontend::class, 'smartmailservice'])->name('smartmailservice');
Route::get('printservice', [frontend::class, 'printservice'])->name('printservice');


// cart
Route::get('cart', [CartController::class, 'cart'])->name('cart_page');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('update.cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addto_cart');
Route::post('add-to-cart/{id}', [CartController::class, 'addToCart_store'])->name('addto_cart_store');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
Route::post('checkout', [CheckOutController::class, 'store'])->name('checkout.store');
// Route::get('/', function () {
//     return view('frontend.home');
// });


// Route::get('/', function () {
//     return view('welcome');
// });
/*==Chat controller == */
Route::get('/chat', 'App\Http\Controllers\PusherController@index');
Route::post('/broadcast', 'App\Http\Controllers\PusherController@broadcast');
Route::post('/receive', 'App\Http\Controllers\PusherController@receive');
