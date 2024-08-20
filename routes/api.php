<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('send_mail', [AuthController::class, 'sendMail']);
Route::post('verify_otp', [AuthController::class, 'verifyOtp']);
Route::get('get_type', [AuthController::class, 'getType']);
Route::get('get_pro_type', [AuthController::class, 'getProType']);
Route::get('get_res_com_type_details', [AuthController::class, 'getResComTypeDetails']);
Route::post('change_password', [AuthController::class, 'changePassword']);
Route::post('pro-detail', [HomeController::class, 'proDetail']);  

    Route::get('get_pro_feature_master', [HomeController::class, 'getProFeatureMas']);
    Route::get('get_pro_description', [HomeController::class, 'getProDescription']);  
    Route::get('get_search_property', [HomeController::class, 'getSearchProperty']);  
    Route::get('get-country', [HomeController::class, 'getCountry']); 
    Route::post('get-state', [HomeController::class, 'getState']); 
    Route::post('get-city', [HomeController::class, 'getCity']); 
    Route::get('get-menu', [HomeController::class, 'menu']); 


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('pro_description', [HomeController::class, 'proDescription']);    
});