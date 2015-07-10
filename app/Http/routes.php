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

use App\Farm;

Route::group(['domain' => '{farm}.' . $_ENV['ROOT_DOMAIN']], function (){

    Route::bind('farm', function ($subdomain){
        return Farm::where('subdomain', $subdomain)->first();
    });

    Route::get('/', function ($farm){
        return view('layouts.farm-site')->with('farm', $farm);
    });

    Route::get('admin', function ($farm){
        return view('layouts.admin-site')->with('farm', $farm);
    });

    Route::group(['prefix' => 'admin'], function (){
        Route::get('shares', function ($farm){
            return view('layouts.admin-site.shares')->with('farm', $farm);
        });
    });
});

Route::get('/', function (){
    return view('layouts.admin-site');
});

Route::get('register', array('uses' => 'Controller@showRegistrationForm'));
Route::post('register', array('uses' => 'Controller@showLogin'));
