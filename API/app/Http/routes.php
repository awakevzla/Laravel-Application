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

Route::group(['prefix' => 'api'], function ()
{
  // ------------ Farm Routes ------------
  Route::group(['prefix' => '{entity}'], function ()
  {
    // Fetching
    Route::get('{id}', 'EntityController@fetchById')->where('id', '[0-9]+');
    Route::get('all', 'EntityController@fetchAll');
    Route::get('template', 'EntityController@fetchTemplate');

    // Delete
    Route::get('delete', 'EntityController@delete')->where('id', '[0-9]+');

    // Upsert
    Route::post('upsert', 'EntityController@upsert');
  });

});
