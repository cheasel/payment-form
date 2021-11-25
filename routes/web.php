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

Route::get('/', function () {
    return view('index');
});

Route::get('/otp', function () {
    return view('otp');
});

Route::get('/success', function () {
    return view('success-otp');
});

Route::post('/store', "App\Http\Controllers\PaymentController@store");
Route::post('/otp', "App\Http\Controllers\PaymentController@otp");