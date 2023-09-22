<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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

Route::get('/test', function () {
    return view('front.data.schedule');
});
Route::get('/', [App\Http\Controllers\PostGuzzleController::class, 'index'])->name('front.login')->middleware('check');
Route::post('/fetchsector', [App\Http\Controllers\PostGuzzleController::class, 'fetchSector'])->name('fetchsector');
Route::post('/details', [App\Http\Controllers\PostGuzzleController::class, 'getDetails'])->name('details');

// OTP Verification
Route::post('/otp/send', [App\Http\Controllers\PostGuzzleController::class, 'otpSend'])->name('otp.send');
Route::post('/otp/verify', [App\Http\Controllers\PostGuzzleController::class, 'otpVerify'])->name('otp.verify');
Route::post('/otp/verify/two', [App\Http\Controllers\PostGuzzleController::class, 'otpVerifyTwo'])->name('otpverify');
Route::get('/resend/{id}', [App\Http\Controllers\PostGuzzleController::class, 'resend'])->name('resend');

// Landing Page after Successful Login
Route::get('/home', [App\Http\Controllers\PostGuzzleController::class, 'frontIndex'])->name('front.index')->middleware('role');
Route::get('/surcharge/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'surcharge'])->name('surcharge')->middleware('role');
Route::get('/challan/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'challan'])->name('challan')->middleware('role');

// Schedule
Route::get('/schedule', [App\Http\Controllers\PostGuzzleController::class, 'scheduleTwo'])->name('schedule.two')->middleware('role'); // Left Menu
Route::get('/schedule/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'schedule'])->name('schedule')->middleware('role'); // Dashboard
Route::get('/search/schedule/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'searchSchedule'])->name('search.schedule')->middleware('role'); // Dropdown Selection


// Challan
Route::get('/challan', [App\Http\Controllers\PostGuzzleController::class, 'challanTwo'])->name('challan.two')->middleware('role');
Route::get('/search/challan/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'searchChallan'])->name('search.challan')->middleware('role');
Route::post('/fetchamount', [App\Http\Controllers\PostGuzzleController::class, 'fetchAmount'])->name('fetchamount');
Route::post('/fetchchallan', [App\Http\Controllers\GenCallanDetailsController::class, 'challanDetails'])->name('fetchchallan');
Route::post('/fetchunpaidchallans/{plot_id?}', [App\Http\Controllers\GenCallanDetailsController::class, 'fetchUnpidChallans'])->name('fetchunpaidchallans')->middleware('role');
Route::get('/challan/details/{ch_no}', [App\Http\Controllers\GenCallanDetailsController::class, 'detailsChallan'])->name('challan.details')->middleware('role');

//History
Route::get('/history', [App\Http\Controllers\PostGuzzleController::class, 'historyTwo'])->name('history.two')->middleware('role');
Route::get('/search/history/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'searchHistory'])->name('search.history')->middleware('role');

//Water Sewerage Bills
Route::get('/water-sewerage-bills', [App\Http\Controllers\WaterSewerageBillsController::class, 'waterSewerageBill'])->name('water.bill')->middleware('role');
Route::get('/search/water-sewerage-bills/{plot_id}', [App\Http\Controllers\WaterSewerageBillsController::class, 'searchWaterSewerageBill'])->name('search.waterBill')->middleware('role');

// HBL Gateway Integration
Route::get('/payment-digital/{ch_id}/{ins_id}', [App\Http\Controllers\GenCallanDetailsController::class, 'payment'])->name('payment.mobile')->middleware('role');
Route::post('hbl', [App\Http\Controllers\PaymentMethod\HBLPaymentController::class, 'payment'])->name('hbl');

// Static Pages
Route::get('/faq', [App\Http\Controllers\MemFaqController::class, 'index'])->name('front.pages.faq')->middleware('role');

// Payment Success & Fail URI
Route::get('payment-success/{ref_no}/{bank_fee}/{amt_challan}/{amt_tobe_paid}', [App\Http\Controllers\PaymentMethod\PaymentController::class, 'success'])->name('payment-success');
Route::get('payment-fail', [App\Http\Controllers\PaymentMethod\PaymentController::class, 'fail'])->name('payment-fail');

// Payment Data
Route::post('/hbl/data', [App\Http\Controllers\PostGuzzleController::class, 'hbldata'])->name('hbl.data');
Route::post('/challanapi', [App\Http\Controllers\GenCallanDetailsController::class, 'detailsChallanApi'])->name('challanapi');
Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
