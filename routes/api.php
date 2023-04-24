<?php

use App\Http\Controllers\AdsenseController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\WhoisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cmsrequest/{number}', [CMSController::class, 'getDomains']);
Route::post('/cmsupdate', [CMSController::class, 'setCMSName']);

Route::post('/whoisrequest', [WhoisController::class, 'getWhois']);
Route::post('/whoisupdate', [WhoisController::class, 'setWhois']);

Route::post('/adsenserequest', [AdsenseController::class, 'getAdsense']);
