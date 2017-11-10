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

Route::middleware('auth:api')->get('/shippings/user', 'ApiController@getAllShippingByUserId');
Route::middleware('auth:api')->get('/shipping/id/{id}/data', 'ApiController@getShippingDataById');
Route::middleware('auth:api')->get('/shipping/code/{code}/data', 'ApiController@getShippingDataByCode');
Route::middleware('auth:api')->get('/shipping/id/{id}/destiny', 'ApiController@getShippingDestinyById');

Route::middleware('auth:api')->post('/shipping/sign', 'ApiController@signShipping');