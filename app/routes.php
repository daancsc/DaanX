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

Route::get('/post/week/{page}','PostController@weekget');//最新公告

Route::get('/post/newsstu/{page}','PostController@newsstuget');//學生公告

Route::get('/post/term/{page}','PostController@termget');//新學期公告

Route::get('/post/race/{page}','PostController@raceget');//競賽公告

Route::get('/post/bonus/{page}','PostController@bonusget');//獎金公告

Route::get('/calc/{year}/{month}','CalcController@calcget');//獎金公告

Route::group(array('before' => 'stu_login'), function()
{
//	Route::get('/student','RouteController@chooselist');
	Route::get('/forum/main/{page}','StudentController@forumget');

});


