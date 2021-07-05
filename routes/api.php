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

Route::middleware('auth:api')->get('/me', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/users','\App\Http\Controllers\UserController@alluser');

Route::post('/register','App\Http\Controllers\UserController@register');

Route::post('/login',[ 'as' => 'login', 'uses' => 'App\Http\Controllers\UserController@login']);

Route::middleware('auth:api')->get('/users/{id}','\App\Http\Controllers\UserController@findUserbyId');

Route::middleware('auth:api')->put('/users/{id}','\App\Http\Controllers\UserController@updateUser');

Route::middleware('auth:api')->delete('/users/{id}','\App\Http\Controllers\UserController@deleteUser');

Route::get('/restaurants','App\Http\Controllers\RestaurantController@getAllRestaurants');

Route::get('/restaurants/{id}','App\Http\Controllers\RestaurantController@getRestaurantById');

Route::middleware('auth:api')->post('/restaurants','\App\Http\Controllers\RestaurantController@addRestaurant');
Route::middleware('auth:api')->put('/restaurants/{id}','\App\Http\Controllers\RestaurantController@updateResto');
Route::middleware('auth:api')->delete('/restaurants/{id}','\App\Http\Controllers\RestaurantController@deleteResto');

Route::get('/restaurants/{id}/reviews','App\Http\Controllers\ReviewController@getRestoReview');

Route::middleware('auth:api')->post('/restaurants/{id}/reviews','\App\Http\Controllers\ReviewController@addReview');

Route::get('/restaurants/{id}/menus','App\Http\Controllers\MenuController@getRestoMenu');
Route::get('/restaurants/{id}/menus/{menuId}','App\Http\Controllers\MenuController@getRestoMenubyId');

Route::middleware('auth:api')->delete('/restaurants/{id}/menus/{menuId}','\App\Http\Controllers\MenuController@deleteMenu');
Route::middleware('auth:api')->post('/restaurants/{id}/menus/','\App\Http\Controllers\MenuController@addMenu');
