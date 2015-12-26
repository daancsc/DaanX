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

	public function calcget($page){
		if((Calc::all()->count())>($page-1)*10){
	 		$calc=Calc::take(10)->skip(($page-1)*10)->orderBy("id","desc")->get();
			for($i=0;$i<count($calc);$i++){
				$year_sum=trim($calc[$i]->year);
				$month_sum=trim($calc[$i]->month);
					for ($e=2015; $e <2026 ; $e++) {
						$year=$e;
						for ($i=1; $i <13 ; $i++) {
							$month=$i;
							$export[]=array(
	                						"year"=>urlencode(trim($calc[$i]->year)),
	                						"month"=>urlencode(trim($calc[$i]->month)),
	                						"day"=>urlencode(trim($calc[$i]->day)),
	                						"commit"=>urlencode(trim($calc[$i]->commit))
	            				);
					}
			}

	        	}
	        	return urldecode(json_encode($export));
		}else{
			$export[]=array(
	                	"year"=>" ",
	                	"month"=>" ",
	                	"day"=>" ",
	                	"commit"=>" "
	            	);
			return urldecode(json_encode($export));
		}
	}

}