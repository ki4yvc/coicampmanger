<?php

use App\Troop;


/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {

    Route::resource('troop', 'TroopController');

    Route::auth();

    Route::get('/', function() {
      return view('welcome');
    });

    Route::get('/administrator', function () {
    return view('admin.index');
    });

    Route::get('/home', 'HomeController@index');

  /*  Route::get('/troop', function() {
      return view('troop');
    });*/

    Route::get('/sessionregistration', function() {
      return view('sessionregistration');
    });

    Route::get('/scoutregistration', function() {
      return view('scoutregistration');
    });

    //Route::post('/troopregistration', 'TroopController@store');
});
