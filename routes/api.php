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

Route::group([
	'middleware' => 'api',
	'prefix' => 'auth'
], function () {
    Route::post('authenticate', 'AuthController@authenticate')->name('api.authenticate');
    Route::post('register', 'AuthController@register')->name('api.register');
});
// users api routes
Route::resource('users', 'UserController');

// trips api routes
Route::get('trips/search', 'TripController@search');
Route::get('trips/{slug}', 'TripController@show');
Route::resource('trips', 'TripController');

// reservations api routes
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::resource('reservations', 'BookingController');
});
