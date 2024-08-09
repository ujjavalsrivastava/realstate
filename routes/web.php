<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
Route::get('/login',[HomeController::class, 'showlogin']);
Route::post('/loginPost',[HomeController::class, 'loginPost']);
Route::post('/register',[HomeController::class, 'register']);
Route::get('send_mail', [HomeController::class, 'sendMail']);
Route::post('verifyOtp', [HomeController::class, 'verifyOtp']);

Route::get('/logout',[HomeController::class, 'logout']);
Route::get('/getReletiondata/{id}',[HomeController::class, 'getReletiondata']);



Route::get('/{category}/{subcategory}',[HomeController::class, 'serviceDetails']);

// Route::get('custom-login', [HomeController::class, 'showLoginForm'])->name('custom.login');
Route::post('custom-login', [HomeController::class, 'login']);
