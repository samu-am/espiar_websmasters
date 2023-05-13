<?php

use App\Http\Controllers\AdsenseController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\WhoisController;
use App\Http\Controllers\WPCMSController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IpController;
use App\Http\Controllers\analyticsController;
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

Route::post('/wprequest/{url}', [WPCMSController::class, 'getWordpressVersion']);

Route::post('/cmsrequest/{number}', [CMSController::class, 'getDomains']);
Route::post('/cmsupdate', [CMSController::class, 'setCMSName']);

Route::post('/adsenserequest', [AdsenseController::class, 'getAdsense']);

Route::post('/adsenseupdate', [AdsenseController::class, 'setAdsense']);

Route::post('/whoisrequest', [WhoisController::class, 'getWhois']);

Route::post('/whoisupdate', [WhoisController::class, 'setWhois']);

Route::post('/adsenserequest', [AdsenseController::class, 'getAdsense']);


Route::post('/iprequest', [IpController::class,'ipRequest']);
Route::post('/ipupdate', [IpController::class,'ipUpdate']);

Route::post('/wppluginrequest', [WPpluginController::class, 'getPlugin']);

Route::post('/wppluginupdate', [WPpluginController::class, 'setPlugin']);
Route::post('/analyticsrequest', [analyticsController::class,'analyticsRequest']);
Route::post('/analyticupdate', [analyticsController::class,'analyticsUpdate']);
