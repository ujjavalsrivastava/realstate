<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostPropertyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes fsend_mailor your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[HomeController::class, 'index']);
// Route::get('/about-us',[HomeController::class, 'aboutUs']);

//login regisater ---
Route::get('/login',[HomeController::class, 'showlogin']);
Route::post('/loginPost',[HomeController::class, 'loginPost']);
Route::post('/register',[HomeController::class, 'register']);
Route::get('send_mail', [HomeController::class, 'sendMail']);
Route::post('verifyOtp', [HomeController::class, 'verifyOtp']);
Route::get('/logout',[HomeController::class, 'logout']);
Route::get('show-forget-pass',[HomeController::class, 'showForgetPass']);

//property post ----
Route::get('post-property', [PostPropertyController::class, 'postProperty']);
Route::post('pro_post_des', [PostPropertyController::class, 'proPostDes']);
Route::get('fatch_post', [PostPropertyController::class, 'fatchPost']);
Route::get('property-for-sale', [PostPropertyController::class, 'propertyForSale']);
Route::get('search-property', [PostPropertyController::class, 'searchPos']);
//property post details -------
Route::get('get_property/{id}', [PostPropertyController::class, 'getProperty']);

// for dropdown ---------
Route::get('show_res_com_details/{id}', [PostPropertyController::class, 'showResComDestail']);
Route::get('show_state/{id}', [PostPropertyController::class, 'showState']);
Route::get('show_city/{id}', [PostPropertyController::class, 'showCity']);


Route::get('/getReletiondata/{id}',[HomeController::class, 'getReletiondata']);
