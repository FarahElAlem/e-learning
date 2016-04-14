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
    return view('index');
});
Route::auth();
Route::group(array('prefix'=>'api'),function()
{
  Route::resource('course','CourseController');
  Route::resource('section','SectionController');
  Route::resource('content','ContentController');
  Route::resource('video','VideoController');
  Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
  Route::post('authenticate', 'AuthenticateController@authenticate');
});
