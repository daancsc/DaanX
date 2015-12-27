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
		if((Calc::all()->count())>($year-1)*4){
			$calc=Calc::->take(4)->skip(($year-1)*4)->orderBy("id","desc")->get();
				for($i=0;$i<count($calc);$i++){
					if ($year>2015&&$year<2099&&$month>0&&$month<12){
						$year=trim($calc[$i]->year);
						$month=trim($calc[$i]->month);
							$export[]=array(
	                						"day"=>urlencode(trim($calc[$i]->day)),
	                						"commit"=>urlencode(trim($calc[$i]->commit))
	            					);
					}
				}
		}
		return urldecode(json_encode($export));
		else{
			$export[]=array(
	                	"day"=>" ",
	                	"commit"=>" "
	            	);
			return urldecode(json_encode($export));
		}
	}

}