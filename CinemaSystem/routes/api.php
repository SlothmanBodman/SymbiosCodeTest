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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Customer Routes
Route::post('customer/create', 'CustomerController@create');

Route::put('customer/update', 'CustomerController@update');

Route::delete('customer/delete', 'CustomerController@delete');

//Movies Routes
Route::post('movie/create', 'MovieController@create');

Route::put('movie/update', 'MovieController@update');

Route::delete('movie/delete', 'MovieController@delete');

//Showings Routes
Route::post('showing/create', 'ShowingController@create');

Route::put('showing/update', 'ShowingController@update');

Route::delete('showing/delete', 'ShowingController@delete');

//Bookings Routes
Route::post('booking/create', 'BookingController@create');

Route::put('booking/update', 'BookingController@update');

Route::delete('booking/delete', 'BookingController@delete');