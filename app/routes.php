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
	return "Hello";
});

Route::post('/register','StudentController@register');

Route::group(array('before' => 'stu_login'), function()
{
//	Route::get('/student','RouteController@chooselist');

});


