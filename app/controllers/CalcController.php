<?php

class CalcController extends BaseController {

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
	public function calcget($year,$month){
		if (Clac::all()->count()>0) {
			$calc=Clac::where('year','=','$year')->where('month','=','$month')->get();
				for ($i=0; $i <count($calc) ; $i++) {
					$export[]=array(
							"year"=>urlencode($calc[$i]->year),
							"month"=>urlencode($calc[$i]->month),
							"day"=>urlencode($calc[$i]->day),
							"commit"=>urlencode($calc[$i]->commit)
						);
				}
		}
		return urldecode(json_encode($export));
		else{
			$export[]=array(
					"year"=" ",
					"month"=" ",
					"day"=" ",
					"commit"=" "
				);
			return urldecode(json_encode($export));
		}
	}

}