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
        $temps="";
		if($year%400==0||(($year%4==0)&&($year%100!=0))){
			$monthDay=array(31,29,31,30,31,30,31,31,30,31,30,31);
		}else{
			$monthDay=array(31,28,31,30,31,30,31,31,30,31,30,31);
		}
		if (Calc::where('year','=',$year)->where('month','=',$month)->count()>0) {
			for($i=1;$i<($monthDay[$month-1]+1);$i++){
                if(Calc::where('year','=',$year)->where('month','=',$month)->where('day','=',$i)->count()>0){
                    $calc=Calc::where('year','=',$year)->where('month','=',$month)->where('day','=',$i)->get();
                    for($y=0;$y<count($calc);$y++){
                        $temps[]=$calc[$y]->commit;
                    }
                    $temp=implode("\n",$temps);
                    $export[]=array(
                        "day"=>$i,
                        "commit"=>urlencode($temp)
                    );
                }else{
                    $export[]=array(
                        "day"=>$i,
                        "commit"=>" "
                    );
                }
                $temps="";
			}
		} else{
			$export[]=array(
					"year"=>" ",
					"month"=>" ",
					"day"=>" ",
					"commit"=>" "
				);
		}
		return urldecode(json_encode($export));
	}

}