<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\NfcCardController;
use App\Http\Controllers\Backend\Nfc\NfcCardController as nfc;

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
Route::post('/admin/login', [AdminAuthController::class, 'adminLogin']);
//Route::get('/nfc/show/{id}', [NfcCardController::class, 'show']);
Route::get('nfcqrurl/{id}/{client_id}', [nfc::class, 'showqrurl']);


//
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/client/all', [ClientController::class, 'index']);
    Route::get('/nfc/list/{id}', [NfcCardController::class, 'index']);
    Route::post('/admin/logout', [AdminAuthController::class, 'adminLogout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group( function () {
});