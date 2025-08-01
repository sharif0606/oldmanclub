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
use App\Http\Controllers\Backend\Admin\PostController;
use App\Http\Controllers\Backend\Admin\ContactUserController as contact;
use App\Http\Controllers\Backend\Admin\CouponController as coupon;

use App\Http\Controllers\Backend\Admin\PostBackgroundCategoryController as post_background_category;
use App\Http\Controllers\Backend\Admin\PostBackgroundController as post_background;


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
use App\Http\Controllers\Backend\Nfc\NfcVirtualBackgroundCategoryController as nfc_virtual_background_category;
use App\Http\Controllers\Backend\Nfc\NfcVirtualBackgroundController as nfc_virtual_background;
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

//Country City and State
use App\Http\Controllers\Backend\Location\CityController;
use App\Http\Controllers\Backend\Location\CountryController;
use App\Http\Controllers\Backend\Location\StateController;
//User
use App\Http\Controllers\User\ClientAuthentication as clientauth;
use App\Http\Controllers\User\ClientController as clientprofile;
use App\Http\Controllers\User\PhoneBookController as phonebook;
use App\Http\Controllers\User\PhoneGroupController as phonegroup;
use App\Http\Controllers\User\ShippingController as shipping;
use App\Http\Controllers\User\ShippingCommentController as shipcomment;
use App\Http\Controllers\User\EmailSendController;
use App\Http\Controllers\User\OrderController as order;
use App\Http\Controllers\User\AddressVerificationController as address_verify;
use App\Http\Controllers\User\CompanyController as company;
use App\Http\Controllers\User\BankController as bank;
use App\Http\Controllers\User\PostController as post;
use App\Http\Controllers\User\ShareController as share;
use App\Http\Controllers\PurchaseSmsController as purchase;
use App\Http\Controllers\FollowController as follow;
use App\Http\Controllers\User\PostCommnetController as postcomment;
use App\Http\Controllers\User\ReplyController as reply;
use App\Http\Controllers\User\CommentReactionController as commentreaction;
use App\Http\Controllers\User\ReplyReactionController as replyreaction;
use App\Http\Controllers\User\PostReactionController as postreaction;

// landing page
use App\Http\Controllers\Common\frontendController as frontend;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatUserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PusherController;

//NFC Field
use App\Http\Controllers\Backend\Nfc\NfcFieldController as nfc_field;
use App\Http\Controllers\Backend\Nfc\DesignCardController as design_card;
use App\Http\Controllers\Backend\Nfc\NfcCardController as nfc_card;


// printing_service admin panelBackend\Printingservice

use App\Http\Controllers\Backend\Printingservice\PrintingServiceController as print_service;
//use App\Http\Controllers\Backend\Printingservice\PrintingServiceImageController as print_service_image;

/*== for Mail and other Send Purpose ==*/
use App\Http\Controllers\TestController as test;
/*Test controler */
Route::get('/mail', [test::class, 'index'])->name('mail');


/*== API CONTROLLER ==*/

use App\Http\Controllers\Api\AuthController;


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

// Route::get('/register', [auth::class, 'signUpForm'])->name('register');
Route::post('/register', [auth::class, 'signUpStore'])->name('register.store');
Route::get('/login', [auth::class, 'signInForm'])->name('login');
Route::post('/login', [auth::class, 'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class, 'singOut'])->name('logOut');

// API ROUTES
Route::get('webapi/test', [AuthController::class, 'test']);
Route::post('webapi/client/login', [AuthController::class, 'clientLogin']);

Route::middleware(['checkauth'])->prefix('admin')->group(function () {
    Route::get('dashboard', [dashboard::class, 'index'])->name('dashboard');
    Route::get('admin/chat', [ChatController::class, 'adminChat'])->name('admin_chat');
    //Route::post('admin-chat', [ChatController::class, 'adminSendMessage'])->name('adminchat.store');
});

Route::middleware(['checkrole'])->prefix('admin')->group(function () {
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

    // Post background
    Route::resource('post-background-category', post_background_category::class);
    Route::resource('post-background', post_background::class);

    // Nfc
    Route::resource('nfc_field', nfc_field::class);
    Route::resource('design_card', design_card::class);
    Route::resource('nfc_card', nfc_card::class);
    Route::resource('coupon', coupon::class);
    // print_service admin panel
    Route::resource('print_service', print_service::class);
    Route::get('print_image/{id}', [print_service::class,'uploadfile'])->name('uploadimage');
    Route::post('print_image/{id}', [print_service::class,'uploadfile_store'])->name('uploadfile_store');
    //Route::resource('print_service_image', print_service_image::class);

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
    Route::get('post_list',[PostController::class,'post_list'])->name('post_list');
    Route::get('contact/list',[contact::class,'contact_list'])->name('contact_list');

    //website
    Route::resource('setting', setting::class);
    Route::resource('nfc-field', nfc_field::class);
    Route::resource('nfc-virtual-background-category', nfc_virtual_background_category::class);
    Route::resource('nfc-virtual-background', nfc_virtual_background::class);
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

    /*== Secret Login ==*/
    Route::get('secret/login/{id}', [client::class, 'secretLogin'])->name('secretLogin');
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
Route::get('client/forget-password', [clientauth::class, 'forget_password'])->name('client_forget_password');
Route::post('forget-password', [clientauth::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [clientauth::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [clientauth::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::middleware(['checkclient'])->prefix('user')->group(function () {
    //Route::get('dashboard', [clientprofile::class, 'index'])->name('clientdashboard');
    Route::get('dashboard', [clientprofile::class, 'gathering'])->name('clientdashboard');
    Route::get('my-profile', [clientprofile::class, 'myProfile'])->name('myProfile');
    Route::get('my-profile-about', [clientprofile::class, 'myProfileAbout'])->name('myProfileAbout');
    Route::get('my-nfc', [clientprofile::class, 'myNfc'])->name('myNfc');
    Route::get('followers', [clientprofile::class, 'all_followers'])->name('all.followers');
    Route::get('account-setting', [clientprofile::class, 'accountSetting'])->name('accountSetting');
    Route::get('find-people', [clientprofile::class, 'search_by_people'])->name('search_by_people');
    Route::resource('follow', follow::class);
    Route::resource('post-comment', postcomment::class);
    Route::resource('reply', reply::class);
    Route::resource('comment-reaction', commentreaction::class);
    Route::resource('reply-reaction', replyreaction::class);
    Route::resource('post-reaction', postreaction::class);
    Route::get('post-reaction-update', [postreaction::class,'post_reaction_update'])->name('post-reaction-update');
    Route::get('comment-reaction-update', [commentreaction::class,'comment_reaction_update'])->name('comment-reaction-update');
    Route::get('reply-reaction-update', [replyreaction::class,'reply_reaction_update'])->name('reply-reaction-update');
    Route::get('gathering', [clientprofile::class, 'gathering'])->name('gathering');
    Route::get('single-post/{id}', [ClientProfile::class, 'singlePost'])->name('singlePost');

    Route::resource('phonebook', phonebook::class);
    Route::resource('phonegroup', phonegroup::class);
    Route::resource('shipping', shipping::class);
    Route::get('shipp_comment/{id}',[shipping::class, 'shipp_comment'])->name('shipp_comment');
    Route::post('shipp_comment_store/{id}',[shipping::class, 'storeComment'])->name('shipp_comment_store');
    Route::resource('order', order::class);
    Route::get('order_edit/{id}',[order::class,'order_edit'])->name('order_edit_sampleimg');
    Route::post('order_update/{id}',[order::class,'order_update'])->name('order_update');

    Route::get('inbox', [EmailSendController::class, 'inbox'])->name('inbox');
    Route::get('sentbox', [EmailSendController::class, 'sentbox'])->name('sentbox');
    Route::get('sent_email', [EmailSendController::class, 'sent_email'])->name('sent_email_create');
    Route::post('store_email', [EmailSendController::class, 'store_email'])->name('store_email');
    Route::get('sent_email_show/{id}', [EmailSendController::class, 'sent_email_show'])->name('sent_email_show');

    Route::post('/profile/save', [clientprofile::class, 'save_profile'])->name('user_save_profile');
    Route::post('/profile/photo/save', [clientprofile::class, 'save_cover_profile_photo'])->name('save_cover_profile_photo');
    Route::post('/profile/savepass', [clientprofile::class, 'change_password'])->name('change_password');
    // Route::get('/phonebook/list', [clientprofile::class, 'phonebook_list'])->name('phonebook_list');

    //Route::get('/user/chat', [ChatController::class, 'userChat'])->name('user_chat');
    //Route::post('/user/chat', [ChatController::class, 'userSendMessage'])->name('userchat_store');
    Route::get('/chat', [HomeController::class,'index'])->name('chat');
    //Massage
    Route::get('/message/{id}', [HomeController::class,'getMessage'])->name('message');
    Route::post('message', [HomeController::class,'sendMessage']);
    Route::post('typing', [HomeController::class,'sendTyping']);
    Route::get('/lastmessage/{id}', [HomeController::class,'getLastMessage']);
    // Dashboard
    Route::get('/pop-message/{id}', [HomeController::class,'getSingleMessageDashboard'])->name('popUpMessage');


    //Update avatar
    Route::post('/updateavatar', [ChatUserController::class,'update'])->name('updateavatar');

    //Update Name
    Route::post('/nameupdate', [ChatUserController::class,'nameupdate'])->name('nameupdate');

    //Delete Contact
    Route::delete('/delete/{id}', [ChatUserController::class,'destroy'])->name('contact.destroy');

    //Search Contact
    Route::get('/search',[ChatUserController::class,'search']);

    //Search Recent Contact
    Route::get('/recentsearch',[ChatUserController::class,'recentsearch']);

    //chat Message Search
    Route::get('/messagesearch',[ChatUserController::class,'messagesearch']);

    //Delete Message
    Route::get('/deleteMessage/{id}',[HomeController::class,'deleteMessage']);

    // Delete Conversation
    Route::get('/deleteConversation/{id}', [HomeController::class,'deleteConversation'])->name('conversation.delete');

    //Group Create
    Route::post('/groups', [GroupController::class,'store'])->name('groups');

    //Group Search
    Route::get('/groupsearch',[GroupController::class,'groupsearch']);

    //Group Massage
    Route::get('/groupmessage/{id}', [GroupController::class,'getGroupMessage'])->name('groupmessage');
    Route::post('groupmessage', [GroupController::class,'sendGroupMessage']);
    Route::get('/grouplastmessage/{id}', [GroupController::class,'getGroupLastMessage']);

    // Delete Group Message
    Route::get('/deletegroupmessage/{id}',[GroupController::class,'deletegroupmessage']);

    // Delete Group Conversation
    Route::get('/deleteGroupConversation/{id}', [GroupController::class,'deleteGroupConversation'])->name('groupconversation.delete');

    //Group Message Search
    Route::get('/groupmessagesearch',[GroupController::class,'groupmessagesearch']);

    Route::resource('phonebook', phonebook::class);

    Route::get('/download-phonebook', [phonebook::class, 'downloadPhonebook'])->name('phonebook_download');
    Route::get('/sms-send', [phonebook::class, 'sendsms'])->name('sms_send');
    Route::get('/sms-create', [phonebook::class, 'sms_create'])->name('sms_create');
    Route::post('/sms-create', [phonebook::class, 'sms_store'])->name('sms_store');

    Route::resource('nfc_card', nfc_card::class);
    Route::get('nfc_card/{id}/email', [nfc_card::class, 'email'])->name('email_signature');
    Route::get('nfc_card/{id}/virtual-background', [nfc_card::class, 'virtual_background'])->name('virtual_background');
    Route::post('upload-own-image', [nfc_card::class, 'upload_own_image'])->name('upload_own_image');

    Route::resource('address_verify', address_verify::class);
    Route::resource('company', company::class);
    Route::resource('bank', bank::class);
    Route::resource('post', post::class);
    Route::resource('share', share::class);
    Route::post('post-update', [post::class, 'post_update'])->name('postUpdate');
    Route::resource('purchase', purchase::class);
});

Route::get('nfcqrurl/{id}/{client_id}', [nfc_card::class, 'showqrurl']);
Route::get('downloadPdf/{id}/{client_id}', [nfc_card::class, 'downloadPdf'])->name('downloadPdf');

//Share
Route::get('fb-share/{id}/{client_id}', [nfc_card::class, 'fbshare'])->name('fbshare');
Route::get('x-share/{id}/{client_id}', [nfc_card::class, 'xshare'])->name('xshare');
Route::get('l-share/{id}/{client_id}', [nfc_card::class, 'lshare'])->name('lshare');
Route::get('w-share/{id}/{client_id}', [nfc_card::class, 'wshare'])->name('wshare');

//Card Send via Email
Route::post('card-send-via-email', [nfc_card::class, 'card_send_via_email'])->name('card_send_via_email');

Route::get('duplicate/{id}/', [nfc_card::class, 'duplicate'])->name('duplicate');
Route::get('save-contact/{id}', [nfc_card::class, 'save_contact'])->name('save_contact');
Route::post('/send-message', [ChatController::class, 'sendMessage']);

Route::get('/', [frontend::class, 'frontend'])->name('frontend');
Route::get('nfccard', [frontend::class, 'nfccard'])->name('nfccard');
Route::get('shippingservice', [frontend::class, 'shippingservice'])->name('shippingservice');
Route::get('llcservice', [frontend::class, 'llcservice'])->name('llcservice');
Route::get('phoneservice', [frontend::class, 'phoneservice'])->name('phoneservice');
Route::get('smartmailservice', [frontend::class, 'smartmailservice'])->name('smartmailservice');
Route::get('printservice', [frontend::class, 'printservice'])->name('printservice');
Route::get('allservice', [frontend::class, 'allservice'])->name('allservice');
Route::get('shipping-more', [frontend::class, 'shipplearnmore'])->name('shipplearnmore');
Route::get('contact/create', [frontend::class, 'contact_create'])->name('contact_create');
Route::post('contact/create', [frontend::class, 'contact_store'])->name('contact_store');

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


/*===City and State ====*/
Route::get('/states', [StateController::class,'getStatesByCountry'])->name('getStatesByCountry');
Route::get('/code', [CountryController::class,'getCodesByCountry'])->name('getCodesByCountry');//Phone Code
Route::get('/cities', [CityController::class,'getCitiesByStates'])->name('getCitiesByStates');


//Route::middleware(['checkclient'])->group(function () {
    Route::get('{username}', [clientprofile::class, 'client_by_search'])->name('client_by_search');
    Route::get('{username}/profile', [clientprofile::class, 'usernameProfile'])->name('usernameProfile');
    Route::get('{username}/profile-about', [clientprofile::class, 'usernameProfileAbout'])->name('usernameProfileAbout');
//});
