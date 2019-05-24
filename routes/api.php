<?php

use Illuminate\Http\Request;

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

Route::get('health', 'HealthCheckController@health');

/*
|--------------------------------------------------------------------------
| Orders Routes
|--------------------------------------------------------------------------
*/

Route::get('orders', 'OrderController@index');
Route::get('orders/{id}', 'OrderController@show');
Route::post('orders/create', 'OrderController@store');
Route::put('orders/{orderId}', 'OrderController@editOrder');