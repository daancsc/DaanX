<?php

class StudentController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function login()
	{
		$account=Input::get('inputPassword');
    $login=Point::where('account','=',$account)->count();
    if($login>0)
    {
      $login=Point::where('account','=',$account)-> firstOrFail();
      Session::regenerate();
      Session::put('login',true);
      Session::put('id',$login->id);
      Session::put('name',$login->name);
      Session::put('account',$login->account);
      return Redirect::to('/point');
    }
    else
    {
      return Redirect::to('/')->with('error','#'); 
    }
	}

  public function watch()
  {
    if(Session::get('login')==true)
    {
      $login=Point::where('id','=',Session::get('id'))-> firstOrFail();
      return View::make('point')->with('point',$login);
    }
    else
    {
      return Redirect::to('/')->with('error','#'); 
    }
	}
  
  //登出 控制器
  public function logout()
  {
    Session::regenerate();
    Session::flush();
    return Redirect::to('/')->with('logout', '#');
  }
}
