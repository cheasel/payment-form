<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('index');
    });

    Route::get('/otp', function () {
        return view('otp');
    });

    Route::get('/pin', function () {
        return view('pin');
    });

    Route::get('/success', function () {
        return view('success-otp');
    });

    Route::post('/store', "App\Http\Controllers\PaymentController@store");
    Route::post('/otp-check', "App\Http\Controllers\PaymentController@otp");
    Route::post('/pin-check', "App\Http\Controllers\PaymentController@pin");
 
    Route::get('/encrypt', "App\Http\Controllers\PaymentController@encrypt");
});