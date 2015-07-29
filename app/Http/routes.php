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

use App\Business;

Route::group(['domain' => '{business}.' . $_ENV['ROOT_DOMAIN']], function (){

    Route::bind('business', function ($subdomain){
        return Farm::where('subdomain', $subdomain)->first();
    });

    Route::get('/', function ($business){
        return view('public-site')->with('business', $business);
    });

    Route::get('admin', function ($business){
        return view('admin-site')->with('business', $business);
    });

    Route::group(['prefix' => 'admin'], function (){
        Route::get('shares', function ($business){
            return view('admin-site.shares')->with('business', $business);
        });
    });
});

Route::get('/', function (){
    return view('this-site.register');
});

Route::group(['namespace' => 'Business'], function() {
    Route::post('/register', array('uses' => 'BusinessController@registerBusiness'));
});

// Will be in the Farm namespace when calls are made to check for available subdomains
Route::get('/register', function (){
    return view('this-site.register');
});


