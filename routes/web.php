<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
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
Route::get('/{category}/{subcategory}',[HomeController::class, 'serviceDetails']);

// Route::get('custom-login', [HomeController::class, 'showLoginForm'])->name('custom.login');
Route::post('custom-login', [HomeController::class, 'login']);
