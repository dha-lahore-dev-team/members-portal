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
Route::post('/otp/send', [App\Http\Controllers\PostGuzzleController::class, 'otpSend'])->name('otp.send');
Route::post('/otp/verify', [App\Http\Controllers\PostGuzzleController::class, 'otpVerify'])->name('otp.verify');
Route::get('/resend/{id}', [App\Http\Controllers\PostGuzzleController::class, 'resend'])->name('resend');
Route::get('/home', [App\Http\Controllers\PostGuzzleController::class, 'frontIndex'])->name('front.index')->middleware('role');
Route::get('/surcharge/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'surcharge'])->name('surcharge')->middleware('role');
Route::get('/challan/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'challan'])->name('challan')->middleware('role');

// Schedule
Route::get('/schedule', [App\Http\Controllers\PostGuzzleController::class, 'scheduleTwo'])->name('schedule.two')->middleware('role'); // Left Menu
Route::get('/schedule/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'schedule'])->name('schedule')->middleware('role'); // Dashboard
Route::get('/search/schedule/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'searchSchedule'])->name('search.schedule')->middleware('role'); // Dropdown Selection

Route::get('/challan', [App\Http\Controllers\PostGuzzleController::class, 'challanTwo'])->name('challan.two')->middleware('role');
Route::get('/history', [App\Http\Controllers\PostGuzzleController::class, 'historyTwo'])->name('history.two')->middleware('role');
Route::get('/search/challan/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'searchChallan'])->name('search.challan')->middleware('role');
Route::get('/search/history/{plot_id}', [App\Http\Controllers\PostGuzzleController::class, 'searchHistory'])->name('search.history')->middleware('role');
Route::post('/fetchamount', [App\Http\Controllers\PostGuzzleController::class, 'fetchAmount'])->name('fetchamount');
Route::post('/fetchchallan', [App\Http\Controllers\GenCallanDetailsController::class, 'challanDetails'])->name('fetchchallan');
Route::post('/fetchunpaidchallans/{plot_id?}', [App\Http\Controllers\GenCallanDetailsController::class, 'fetchUnpidChallans'])->name('fetchunpaidchallans')->middleware('role');
Route::get('/challan/details/{ch_no}', [App\Http\Controllers\GenCallanDetailsController::class, 'detailsChallan'])->name('challan.details')->middleware('role');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
