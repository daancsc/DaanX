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
	if(Week::take(10)->skip(($page-1)*10)->orderBy("id","desc")->count()>0){
        	$weeks=Week::take(10)->skip(($page-1)*10)->orderBy("id","desc")->get();
        	for($i=0;$i<count($weeks);$i++){
            		$export[]=array(
                		"title"=>urlencode(trim($weeks[$i]->web_main_top_title)),
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
