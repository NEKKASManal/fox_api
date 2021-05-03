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

Route::middleware('auth:api','throttle:rate_limit,1')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::resource('reservations',ReservationsController::class);
Route::resource('reservations','ReservationsController');
Route::resource('rooms','RoomsController');
Route::get('/insert','RoomsController@insert');
Route::get('/test','RoomsController@test');
// Route::post('agence',ReservationsController::class,'index');
// Route::post('agence',ReservationsController::class,'index');
// Route::resource('products', 'ProductController');
// Route::resource('users', 'UserController');
