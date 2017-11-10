<?php

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

Route::get('/', ['uses' => 'FrontController@index', 'as' => 'index']);

Route::get('/datatables-translations', ['uses' => 'HomeController@datatablesTranslations', 'as' => 'datatables.translations']);
Route::post('/shippings/get-states', ['uses' => 'FrontController@getStatesByCode', 'as' => 'shippings.get.states']);

Route::group(['middleware' => 'web'], function () {
    Auth::routes();

    Route::get('/home', ['uses' => 'HomeController@index']);

    Route::resource('users', 'UserController');
    
    Route::resource('shippings', 'ShippingController');
    
    Route::resource('states', 'StatesController');
    
});
