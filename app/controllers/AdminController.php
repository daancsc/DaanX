<?php

class AdminController extends BaseController {

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
    $account=Input::get('inputAccount');
    $password=Input::get('inputPassword');
		if (Auth::attempt(array('account' => $account, 'password' => $password)))
    {
      return Redirect::intended('/admin/point');
    }
    else
    {
      return Redirect::to('/admin'); 
    }
	}

  public function point()
  {
    if (Auth::check())
    {
      $point=Point::all();
      return View::make('admin.point')->with('point',$point)->with('succes','0');
    }
    else
    {
      return Redirect::to('/admin');
    }
  }

  public function write()
  {
    if (Auth::check())
    {
      $point=Point::where('id','=',Input::get('team'))->firstOrFail();
      $point->point = $point->point+Input::get('plus');
      $point->save();
      $point=Point::all();
      return View::make('admin.point')->with('point',$point)->with('succes','1');
    }
    else
    {
      return Redirect::to('/admin');
    }
  }

  public function dashpoint()
  {
    if (Auth::check())
    {
      $point=Point::all();
      return View::make('admin.dashpoint')->with('point',$point);
    }
    else
    {
      return Redirect::to('/admin');
    }
	}
  
  //登出 控制器
  public function logout()
  {
    
  }
}
