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
Route::get('/front/index', [App\Http\Controllers\PostGuzzleController::class, 'frontIndex'])->name('front.index')->middleware('role');
Route::get('/schedule/{qey_id}/{key}', [App\Http\Controllers\PostGuzzleController::class, 'schedule'])->name('schedule')->middleware('role');
Route::get('/surcharge/{qey_id}/{key}', [App\Http\Controllers\PostGuzzleController::class, 'surcharge'])->name('surcharge')->middleware('role');
Route::get('/challan/{qey_id}/{key}', [App\Http\Controllers\PostGuzzleController::class, 'challan'])->name('challan')->middleware('role');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
