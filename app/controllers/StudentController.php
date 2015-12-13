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

	public function register()
	{
		$id=Input::get('stu_id');
		$name=Input::get('stu_name');
        $nick=Input::get('stu_nick');
        $email=Input::get('stu_email');
		if(Student::where("account", "=", $id)->count()>0){
			$student=Student::where("account", "=", $id)->first();
            $auth=$student->auth;
			return $auth;
		}else{
			$student=new Student;
			$student->name=$name;
			$student->nick=$nick;
			$student->email=$email;
			$student->account=$id;
			$auth=str_random(20);
			while(true) {
				if (Student::where("auth", "=", $auth)->count() == 0) {
					$student->auth = $auth;
					break;
				} else {$auth = str_random(20);}
			}
			$student->save();

			return $auth;
		}
	}

	public function forumget($page){
        $topics=Topic::take(10)->skip(($page-1)*10)->get();
        for($i=0;$i<10;$i++){
            $writer=Student::find($topics[$i]->stu_id);
            $export[]=array(
                "title"=>urlencode($topics[$i]->title),
                "writer"=>urlencode($writer->nick),
                "body"=>urlencode($topics[$i]->body),
                "file"=>urlencode($topics[$i]->file)
            );
        }
        return json_encode(urldecode($export));
	}

}
