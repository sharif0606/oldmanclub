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
use App\Http\Controllers\Api\Web\User\ChatController as ChatController;
use App\Http\Controllers\Api\Web\User\NfcCardController as webNfc;
use App\Http\Controllers\Api\Web\User\FollowController as follow;
use App\Http\Controllers\Api\Web\User\CompanyController as company;
use App\Http\Controllers\Api\LocationController;
use Illuminate\Support\Facades\Broadcast;

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
    Route::get('/client/all_following/{limit?}', [webClient::class, 'all_following']);
    Route::get('/client/all_followers_user/{id}/{limit?}', [webClient::class, 'all_followers_user']);
    Route::get('/client/all_following_user/{id}/{limit?}', [webClient::class, 'all_following_user']);


    Route::get('/client/accountSetting', [webClient::class, 'accountSetting']);
    Route::get('/client/gathering', [webClient::class, 'gathering']);
    Route::get('/client/singlePost/{id}', [webClient::class, 'singlePost']);
    Route::post('/client/save_profile', [webClient::class, 'save_profile']);
    Route::post('/client/save_cover_profile_photo', [webClient::class, 'save_cover_profile_photo']);

    Route::post('/client/change_password', [webClient::class, 'change_password']);
    Route::get('/client/search_by_people', [webClient::class, 'search_by_people']);
    Route::get('/client/client_by_search/{username}', [webClient::class, 'client_by_search']);
    Route::get('/client/user_profile/{id}/{limit?}', [webClient::class, 'userProfile']);

    // comment reaction routes
    Route::post('/comment/reaction_save', [comment::class, 'reaction_save']);
    Route::post('/comment/store', [comment::class, 'store']);
    Route::post('/comment/replay', [comment::class, 'replay']);
    Route::post('/comment/replay/reaction', [comment::class, 'replay_reaction']);
    Route::get('/comment/reply', [webClient::class, 'replyComment']);
    Route::post('/comment/replay/reaction_delete', [comment::class, 'replay_reaction_delete']);
    Route::post('/comment/reaction_delete', [comment::class, 'comment_reaction_delete']);
    // post routes
    Route::get('/post/{limit?}', [post::class, 'index']);
    Route::post('/post/store', [post::class, 'store']);
    Route::post('/post/update/{id}', [post::class, 'post_update']);
    Route::get('/my_post', [post::class, 'user_posts']);
    Route::post('/post/delete/{id}', [post::class, 'destroy']);
    Route::post('/post/privacy/{id}', [post::class, 'privacy']);
    Route::post('/post/reaction', [post::class, 'post_reaction']);
    Route::post('/post/share', [post::class, 'post_share']);
    Route::post('/post_reaction_delete', [post::class, 'post_reaction_delete']);
    // nfc card routes
    Route::get('/nfc/field', [webNfc::class, 'nfc_field']);
    Route::post('/nfc/card/store', [webNfc::class, 'store']);
    Route::get('/nfc/card/{id}', [webNfc::class, 'show']);
    Route::post('/nfc/card/send', [webNfc::class, 'send']);
    Route::post('/nfc/card/duplicate/{id}', [webNfc::class, 'duplicate']);
    Route::post('/nfc/card/delete/{id}', [webNfc::class, 'destroy']);
    Route::post('/nfc/card/update/{id}', [webNfc::class, 'update']);
    Route::post('/nfc/card/share', [webNfc::class, 'share']);
    Route::post('/nfc/card/pdf/{id}', [webNfc::class, 'pdf']);
    Route::post('/nfc/card/qrcode/{id}', [webNfc::class, 'qrcode']);
    Route::get('/nfc/design', [webNfc::class, 'get_nfc_design']);
    Route::post('/nfc/card/save_contact/{id}', [webNfc::class, 'save_contact']);
    Route::get('/nfc/virtual_background', [webNfc::class, 'virtual_background']);
    Route::post('/nfc/email', [webNfc::class, 'card_send_via_email']);
    // follow routes
    Route::post('/follow', [follow::class, 'follow']);
    Route::post('/unfollow', [follow::class, 'unfollow']);

    // company routes
    Route::get('/company', [company::class, 'index']);
    Route::post('/company', [company::class, 'store']);
    Route::post('/company/{id}', [company::class, 'update']);
    Route::post('/company/{id}', [company::class, 'destroy']);

    // chat routes
    Route::post('/chat', [ChatController::class, 'startConversation']);
    Route::get('/chat/search', [ChatController::class, 'searchConversations']);
    Route::get('/chat', [ChatController::class, 'getConversations']);
    Route::get('/chat/{id}/messages', [ChatController::class, 'getMessages']);
    Route::post('/chat/{id}/messages', [ChatController::class, 'sendMessage']);
    Route::post('/chat/typing', [ChatController::class, 'typing']);

    //location routes
    Route::get('/location/cities', [LocationController::class, 'cities']);
    Route::get('/location/states', [LocationController::class, 'states']);
    Route::get('/location/countries', [LocationController::class, 'countries']);

    Route::post('/messages/send', [App\Http\Controllers\Api\MessageController::class, 'sendMessage']);

    Route::middleware(['auth:sanctum'])->group(function () {
        
        Route::post('/broadcasting/auth', function (Request $request) {
            try {
                
                Log::info('Broadcasting auth request', [
                    'channel' => $request->channel_name,
                    'socket' => $request->socket_id,
                    'user' => $request->user()?->id,
                    'headers' => $request->headers->all(),
                    'token' => $request->bearerToken(),
                    'request_data' => $request->all()
                ]);
    
                if (!$request->user()) {
                    Log::error('Broadcasting auth failed: No authenticated user');
                    return response()->json(['message' => 'Unauthenticated'], 401);
                }
    
                // Get the channel name and socket ID from the request
                $channelName = $request->channel_name;
                $socketId = $request->socket_id;
    
                if (!$channelName || !$socketId) {
                    Log::error('Broadcasting auth failed: Missing required parameters', [
                        'channel_name' => $channelName,
                        'socket_id' => $socketId
                    ]);
                    return response()->json(['message' => 'Missing required parameters'], 422);
                }
    
                $pusherKey = config('broadcasting.connections.pusher.key');
                $pusherSecret = config('broadcasting.connections.pusher.secret');
                
                Log::info('Generating auth signature', [
                    'key' => $pusherKey,
                    'channel' => $channelName,
                    'socket_id' => $socketId
                ]);
    
                $signature = hash_hmac(
                    'sha256',
                    $socketId . ':' . $channelName,
                    $pusherSecret,
                    false  // Return as hex string
                );
    
                $response = [
                    'auth' => $pusherKey . ':' . $signature
                ];
    
                Log::info('Auth response', $response);
    
                return response()->json($response);
    
            } catch (\Exception $e) {
                Log::error('Broadcasting auth error', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                
                return response()->json([
                    'message' => 'Broadcasting authentication failed',
                    'error' => $e->getMessage()
                ], 500);
            }
        });
    });

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group( function () {
});