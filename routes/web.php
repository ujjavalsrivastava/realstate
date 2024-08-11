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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class, 'index']);
Route::get('/about-us',[HomeController::class, 'aboutUs']);

//login regisater ---
Route::get('/login',[HomeController::class, 'showlogin']);
Route::post('/loginPost',[HomeController::class, 'loginPost']);
Route::post('/register',[HomeController::class, 'register']);
Route::get('send_mail', [HomeController::class, 'sendMail']);
Route::post('verifyOtp', [HomeController::class, 'verifyOtp']);
Route::get('/logout',[HomeController::class, 'logout']);

//property post ----
Route::get('post_property', [PostPropertyController::class, 'postProperty']);
Route::post('pro_post_des', [PostPropertyController::class, 'proPostDes']);
// for dropdown
Route::get('show_res_com_details/{id}', [PostPropertyController::class, 'showResComDestail']);


Route::get('/getReletiondata/{id}',[HomeController::class, 'getReletiondata']);
