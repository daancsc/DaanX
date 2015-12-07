<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::post('/', 'StudentController@login');

Route::get('/point', 'StudentController@watch');

Route::get('/logout', 'StudentController@logout');

Route::get('/admin', function()
{
  return View::make('admin.index');  
});

Route::post('/admin', 'AdminController@login');

Route::get('/admin/point', 'AdminController@point');
Route::post('/admin/point', 'AdminController@write');

Route::get('/admin/dashpoint','AdminController@dashpoint');

Route::get('/admin/{auth}', function($auth)
{
  $auth=Hash::make($auth);
  return $auth;
});
