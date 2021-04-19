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

Route::post('/hotels', 'App\Http\Controllers\HotelsController@getAllHotels');
Route::post('/hotel_name/', 'App\Http\Controllers\HotelsController@getAllHotelsByName');
Route::post('/hotel_city/', 'App\Http\Controllers\HotelsController@getAllHotelsByCity');
Route::post('/hotel_range/', 'App\Http\Controllers\HotelsController@getAllHotelsByRange');

Route::get('/', function () {
    return 'welcome';
});
