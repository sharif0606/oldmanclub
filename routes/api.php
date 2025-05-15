<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\NfcCardController;
use App\Http\Controllers\Backend\Nfc\NfcCardController as nfc;
use App\Http\Controllers\Api\Web\User\ClientController as webClient;
use App\Http\Controllers\Api\Web\User\CommentController as comment;
use App\Http\Controllers\Api\Web\User\PostController as post;
use App\Http\Controllers\Api\Web\Location\LocationController as location;
use App\Http\Controllers\Api\Web\User\ChatController as ChatController;
use App\Http\Controllers\Api\Web\User\NfcCardController as webNfc;
use App\Http\Controllers\Api\Web\User\FollowController as follow;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return response()->json(['message' => 'This is a test']);
});

// Route::get('/test', [AuthController::class, 'test']);
Route::post('/client/login', [AuthController::class, 'clientLogin']);
Route::post('/client/regi', [AuthController::class, 'signUpStore']);
Route::post('/client/forget-password', [AuthController::class, 'submitForgetPasswordForm']);
Route::post('/client/reset-password/{token}', [AuthController::class, 'submitResetPasswordForm']);
 
Route::post('/admin/login', [AdminAuthController::class, 'adminLogin']);
//Route::get('/nfc/show/{id}', [NfcCardController::class, 'show']);
Route::get('nfcqrurl/{id}/{client_id}', [nfc::class, 'showqrurl']);


//Client Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/client/logout', [AuthController::class, 'signOut']);
    Route::get('/client/all', [ClientController::class, 'index']);
    Route::get('/nfc/list/{id}', [NfcCardController::class, 'index']);
    Route::post('/admin/logout', [AdminAuthController::class, 'adminLogout']);

    //location routes
    Route::get('/location/country', [location::class, 'country']);
    Route::get('/location/state', [location::class, 'state']);
    Route::get('/location/city', [location::class, 'city']);
    Route::get('/location/area', [location::class, 'area']);
    
    // react routes
    Route::get('/client/dashboard', [webClient::class, 'index']);
    Route::get('/client/myprofile/{limit?}', [webClient::class, 'myProfile']);
    Route::get('/client/myNfc', [webClient::class, 'myNfc']);
    Route::get('/client/all_followers/{limit?}', [webClient::class, 'all_followers']);
    Route::get('/client/accountSetting', [webClient::class, 'accountSetting']);
    Route::get('/client/gathering', [webClient::class, 'gathering']);
    Route::get('/client/singlePost/{id}', [webClient::class, 'singlePost']);
    Route::post('/client/save_profile', [webClient::class, 'save_profile']);
    Route::post('/client/save_cover_profile_photo', [webClient::class, 'save_cover_profile_photo']);
    Route::get('/client/usernameProfile/{username}', [webClient::class, 'usernameProfile']);
    Route::get('/client/usernameProfileAbout/{username}', [webClient::class, 'usernameProfileAbout']);
    Route::post('/client/change_password', [webClient::class, 'change_password']);
    Route::get('/client/search_by_people', [webClient::class, 'search_by_people']);
    Route::get('/client/client_by_search/{username}', [webClient::class, 'client_by_search']);
    Route::get('/client/user_profile/{id}/{limit?}', [webClient::class, 'userProfile']);

    // comment reaction routes
    Route::post('/comment/reaction_save', [comment::class, 'reaction_save']);
    Route::post('/comment/store', [comment::class, 'store']);
    Route::post('/comment/replay', [comment::class, 'replay']);
    Route::post('/comment/replay/reaction', [comment::class, 'replay_reaction']);
    // post routes
    Route::get('/post/{limit?}', [post::class, 'index']);
    Route::post('/post/store', [post::class, 'store']);
    Route::post('/post/update/{id}', [post::class, 'post_update']);
    Route::get('/my_post', [post::class, 'user_posts']);
    Route::post('/post/delete/{id}', [post::class, 'destroy']);
    Route::post('/post/privacy/{id}', [post::class, 'privacy']);
    Route::post('/post/reaction', [post::class, 'post_reaction']);
    // nfc card routes
    Route::get('/nfc/field', [webNfc::class, 'nfc_field']);
    Route::post('/nfc/card/store', [webNfc::class, 'store']);
    Route::get('/nfc/card/{id}', [webNfc::class, 'show']);
    Route::post('/nfc/card/send', [webNfc::class, 'send']);
    Route::post('/nfc/card/duplicate/{id}', [webNfc::class, 'duplicate']);
    Route::post('/nfc/card/delete/{id}', [webNfc::class, 'delete']);
    Route::post('/nfc/card/update/{id}', [webNfc::class, 'update']);
    Route::post('/nfc/card/share', [webNfc::class, 'share']);
    Route::post('/nfc/card/pdf/{id}', [webNfc::class, 'pdf']);
    Route::post('/nfc/card/qrcode/{id}', [webNfc::class, 'qrcode']);
    Route::get('/nfc/design', [webNfc::class, 'get_nfc_design']);
    Route::post('/nfc/card/save_contact/{id}', [webNfc::class, 'save_contact']);
    // follow routes
    Route::post('/follow', [follow::class, 'follow']);
    Route::post('/unfollow', [follow::class, 'unfollow']);

    // chat routes
    Route::post('/chat', [ChatController::class, 'startConversation']);
    Route::get('/chat/search', [ChatController::class, 'searchConversations']);
    Route::get('/chat', [ChatController::class, 'getConversations']);
    Route::get('/chat/{id}/messages', [ChatController::class, 'getMessages']);
    Route::post('/chat/{id}/messages', [ChatController::class, 'sendMessage']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group( function () {
});