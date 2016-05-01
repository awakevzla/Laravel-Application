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

//,'middleware' => ['api']
Route::group(['prefix' => 'api'], function () {

  Route::group(['prefix' => 'farm/'], function () {
    Route::get('{id}/{client_token}', 'FarmController@getWhereId')->where('id', '[0-9]+');
    Route::get('all/{client_token}', 'FarmController@getAll');
    Route::post('upsert/', 'FarmController@upsert');
  });

  Route::group(['prefix' => 'user'], function () {
    Route::get('/id/{id}', 'API\UserCredentialsController@getWhereId')->where('id', '[0-9]+');

    Route::post('/type', 'API\SessionController@getUserWhereToken');
  });

});
