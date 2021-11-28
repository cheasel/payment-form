<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/sent_message', "App\Http\Controllers\EncryptController@sent_message");

Route::post('/receive_encrypt', "App\Http\Controllers\EncryptController@receive_encrypt");