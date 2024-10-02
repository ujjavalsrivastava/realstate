<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PostPropertyController;
use App\Http\Controllers\PaymentgatewayController;
use App\Http\Controllers\admin\AdminController;
use App\Events\MessageSent;
use Illuminate\Http\Request;
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


Route::get('/chat', function (Request $request) {
   return view('front.chat');
});

// chat
Route::post('/send-message',[HomeController::class, 'sendMsg'])->middleware('auth');
Route::get('/showChat/{id}',[HomeController::class, 'showChat']);
Route::get('/user-chat-list',[HomeController::class, 'userChatList']);
// end chat


// Route::post('/send-message', function (Request $request) {
//     $user = auth()->user();  // Get the authenticated user
//     $message = $request->message;

    
//     // You can save the message to the database here (optional)

//     // Broadcast the message to other users
//     broadcast(new MessageSent($message, $user))->toOthers();

//     return ['status' => 'Message Sent!'];
// })->middleware('auth');


Route::get('/',[HomeController::class, 'index']);
// Route::get('/about-us',[HomeController::class, 'aboutUs']);

//login regisater ---
Route::get('/login',[HomeController::class, 'showlogin']);
Route::post('/loginPost',[HomeController::class, 'loginPost']);
Route::post('/register',[HomeController::class, 'register']);
Route::post('/forget',[HomeController::class, 'forget']);
Route::get('send_mail', [HomeController::class, 'sendMail']);
Route::post('verifyOtp', [HomeController::class, 'verifyOtp']);
Route::post('changePassword', [HomeController::class, 'changePassword']);
Route::get('/logout',[HomeController::class, 'logout']);
Route::get('show-forget-pass',[HomeController::class, 'showForgetPass']);

Route::post('password-change', [HomeController::class, 'passChange']);
//property post ----
Route::get('post-property', [PostPropertyController::class, 'postProperty']);
Route::post('pro_post_des', [PostPropertyController::class, 'proPostDes']);
Route::get('fatch_post', [PostPropertyController::class, 'fatchPost']);
Route::get('property-for-sale', [PostPropertyController::class, 'propertyForSale']);
Route::get('search-property', [PostPropertyController::class, 'searchPos']);
Route::post('post-views', [PostPropertyController::class, 'postViews']);
//property post details -------
Route::get('get_property/{id}', [PostPropertyController::class, 'getProperty']);

// for dropdown ---------
Route::get('show_res_com_details/{id}', [PostPropertyController::class, 'showResComDestail']);
Route::get('show_state/{id}', [PostPropertyController::class, 'showState']);
Route::get('show_city/{id}', [PostPropertyController::class, 'showCity']);

// fav pro ----------
Route::post('/fav-pro',[PostPropertyController::class, 'favoritePro']);

// footer file
Route::get('/about-us',[HomeController::class, 'aboutUs']);
Route::get('/contact-us',[HomeController::class, 'contactUs']);
Route::post('/post-contact-us',[HomeController::class, 'postContactUs']);
Route::get('/terms-conditions',[HomeController::class, 'termsConditions']);
Route::post('/news-subscription',[HomeController::class, 'newsSubscription']);

// review
Route::post('post-review',[ReviewController::class, 'postReview']);
Route::get('show-review-list/{id}',[ReviewController::class, 'showReviewList']);

Route::get('/getReletiondata/{id}',[HomeController::class, 'getReletiondata']);
Route::post('/orderGenerate',[PaymentgatewayController::class, 'orderGenerate']);
Route::post('/verify',[PaymentgatewayController::class, 'verify']);


Route::get('/emi-calculater',[HomeController::class, 'getEmiCalculater']);

Route::prefix('admin')->group(function () {
    Route::get('/login',[AdminController::class, 'getLogin']);
    Route::get('/sub-plan',[AdminController::class, 'subPlan']);
    Route::get('/sub-plan-delete/{id}', [AdminController::class, 'subPlanDelete']);
    Route::post('/loginPost',[AdminController::class, 'loginPost']);
    Route::get('/logout',[AdminController::class, 'logout']);

    Route::group(['middleware' => ['check.user']], function() {
        Route::get('/home',[AdminController::class, 'home']);
        Route::get('/payment-list',[AdminController::class, 'paymentList']);
    });
});
