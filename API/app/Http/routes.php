<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::group(['prefix' => 'api'], function () {

  Route::group(['prefix' => 'farm'], function () {
    Route::get('/id/{farmid}', 'API\FarmController@getWhereId')->where('farmid', '[0-9]+');
  });

  Route::group(['prefix' => 'user'], function () {
    Route::get('/id/{id}', 'API\UserCredentialsController@getWhereId')->where('id', '[0-9]+');
    Route::get('/type/{token}', 'API\SessionController@getUserWhereToken');
  });

});
