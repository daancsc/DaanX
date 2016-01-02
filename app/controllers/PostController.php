<?php

class PostController extends BaseController {

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


	public function weekget($page){
		if((Week::all()->count())>($page-1)*20){
	 	$weeks=Week::take(20)->skip(($page-1)*20)->orderBy("id","desc")->get();
		for($i=0;$i<count($weeks);$i++){
	            		$export[]=array(
	                		"title"=>urlencode(trim($weeks[$i]->web_main_top_title)),
	                		"day"=>urlencode(trim($weeks[$i]->web_main_top_day)),
	                		"writer"=>urlencode(trim($weeks[$i]->web_main_where)),
	                		"body"=>urlencode(base64_encode($weeks[$i]->web_main_data)),
	                		"file"=>urlencode(trim($weeks[$i]->web_main_link)),
					"image"=>urlencode(trim($weeks[$i]->web_main_file)),
					"link"=>urlencode(trim($weeks[$i]->web_main_outside_link))
	            		);
	        	}
	        	return urldecode(json_encode($export));
		}else{
			$export[]=array(
	                	"title"=>" ",
	                	"day"=>" ",
	                	"writer"=>" ",
	                	"body"=>" ",
	                	"file"=>" ",
				"image"=>" ",
				"link"=>" "
	            	);
			return urldecode(json_encode($export));
		}
	}

	public function newsstuget($page){
		if((Newsstu::all()->count())>($page-1)*20){
	 	$newsstu=Newsstu::take(20)->skip(($page-1)*20)->orderBy("id","desc")->get();
		for($i=0;$i<count($newsstu);$i++){
	            		$export[]=array(
	                		"title"=>urlencode(trim($newsstu[$i]->web_main_top_title)),
	                		"day"=>urlencode(trim($newsstu[$i]->web_main_top_day)),
	                		"writer"=>urlencode(trim($newsstu[$i]->web_main_where)),
	                		"body"=>urlencode(base64_encode($newsstu[$i]->web_main_data)),
	                		"file"=>urlencode(trim($newsstu[$i]->web_main_link)),
					"image"=>urlencode(trim($newsstu[$i]->web_main_file)),
					"link"=>urlencode(trim($newsstu[$i]->web_main_outside_link))
	            		);
	        	}
	        	return urldecode(json_encode($export));
		}else{
			$export[]=array(
	                	"title"=>" ",
	                	"day"=>" ",
	                	"writer"=>" ",
	                	"body"=>" ",
	                	"file"=>" ",
				"image"=>" ",
				"link"=>" "
	            	);
			return urldecode(json_encode($export));
		}
	}

	public function termget($page){
		if((Term::all()->count())>($page-1)*20){
	 	$term=Term::take(20)->skip(($page-1)*20)->orderBy("id","desc")->get();
		for($i=0;$i<count($term);$i++){
	            		$export[]=array(
	                		"title"=>urlencode(trim($term[$i]->web_main_top_title)),
	                		"day"=>urlencode(trim($term[$i]->web_main_top_day)),
	                		"writer"=>urlencode(trim($term[$i]->web_main_where)),
	                		"body"=>urlencode(base64_encode($term[$i]->web_main_data)),
	                		"file"=>urlencode(trim($term[$i]->web_main_link)),
					"image"=>urlencode(trim($term[$i]->web_main_file)),
					"link"=>urlencode(trim($term[$i]->web_main_outside_link))
	            		);
	        	}
	        	return urldecode(json_encode($export));
		}else{
			$export[]=array(
	                	"title"=>" ",
	                	"day"=>" ",
	                	"writer"=>" ",
	                	"body"=>" ",
	                	"file"=>" ",
				"image"=>" ",
				"link"=>" "
	            	);
			return urldecode(json_encode($export));
		}
	}

	public function raceget($page){
		if((Race::all()->count())>($page-1)*20){
	 	$race=Race::take(20)->skip(($page-1)*20)->orderBy("id","desc")->get();
		for($i=0;$i<count($race);$i++){
	            		$export[]=array(
	                		"title"=>urlencode(trim($race[$i]->web_main_top_title)),
	                		"day"=>urlencode(trim($race[$i]->web_main_top_day)),
	                		"writer"=>urlencode(trim($race[$i]->web_main_where)),
	                		"body"=>urlencode(base64_encode($race[$i]->web_main_data)),
	                		"file"=>urlencode(trim($race[$i]->web_main_link)),
					"image"=>urlencode(trim($race[$i]->web_main_file)),
					"link"=>urlencode(trim($race[$i]->web_main_outside_link))
	            		);
	        	}
	        	return urldecode(json_encode($export));
		}else{
			$export[]=array(
	                	"title"=>" ",
	                	"day"=>" ",
	                	"writer"=>" ",
	                	"body"=>" ",
	                	"file"=>" ",
				"image"=>" ",
				"link"=>" "
	            	);
			return urldecode(json_encode($export));
		}
	}

	public function bonusget($page){
		if((Bonus::all()->count())>($page-1)*20){
	 	$bonus=Bonus::take(20)->skip(($page-1)*20)->orderBy("id","desc")->get();
		for($i=0;$i<count($bonus);$i++){
	            		$export[]=array(
	                		"title"=>urlencode(trim($bonus[$i]->web_main_top_title)),
	                		"day"=>urlencode(trim($bonus[$i]->web_main_top_day)),
	                		"writer"=>urlencode(trim($bonus[$i]->web_main_where)),
	                		"body"=>urlencode(base64_encode($bonus[$i]->web_main_data)),
	                		"file"=>urlencode(trim($bonus[$i]->web_main_link)),
					"image"=>urlencode(trim($bonus[$i]->web_main_file)),
					"link"=>urlencode(trim($bonus[$i]->web_main_outside_link))
	            		);
	        	}
	        	return urldecode(json_encode($export));
		}else{
			$export[]=array(
	                	"title"=>" ",
	                	"day"=>" ",
	                	"writer"=>" ",
	                	"body"=>" ",
	                	"file"=>" ",
				"image"=>" ",
				"link"=>" "
	            	);
			return urldecode(json_encode($export));
		}
	}
}
