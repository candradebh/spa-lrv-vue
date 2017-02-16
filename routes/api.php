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





    Route::post('access_token','Api\AuthController@accessToken');
    Route::post('refresh_token','Api\AuthController@refreshToken');
    Route::get('/','Api\ApiController@index');

    //Route::middleware()->group(function (){
        Route::post('logout','Api\AuthController@logout');
        Route::get('user','Api\AuthController@getUser');
        Route::resource('customer', 'Api\CustomerController');
        Route::resource('invoice', 'Api\InvoiceController');
        Route::resource('products', 'Api\ProductsController');
        Route::resource('categories', 'Api\CategoriesController');
    //});


    Route::post('sitechat', 'Site\Chat\SiteChatController@store');
    Route::post('messages', 'Site\Chat\SiteChatController@index');
    Route::post('sendmessage', 'Site\Chat\SiteChatController@update');







