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

    public function Welcome(){
        $lastHolText=Setting::where('item','=','lastHolText')->first()->value;
        $lastHolDate=Setting::where('item','=','lastHolDate')->first()->value;
        $export[]=array(
            "id"=>" ",
            "title"=>$lastHolText,
            "day"=>$lastHolDate,
            "writer"=>" ",
            "body"=>" ",
            "file"=>" ",
            "image"=>" ",
            "link"=>" "
        );
        if((Newsstu::all()->count())>0){
            $newsstu=Newsstu::take(2)->orderBy("id","desc")->get();
            for($i=0;$i<count($newsstu);$i++){
                $export[]=array(
                    "id"=>" ",
                    "title"=>urlencode(trim($newsstu[$i]->web_main_top_title)),
                    "day"=>urlencode(trim($newsstu[$i]->web_main_top_day)),
                    "writer"=>urlencode(trim($newsstu[$i]->web_main_where)),
                    "body"=>urlencode(base64_encode($newsstu[$i]->web_main_data)),
                    "file"=>urlencode(trim($newsstu[$i]->web_main_link)),
                    "image"=>urlencode(trim($newsstu[$i]->web_main_file)),
                    "link"=>urlencode(trim($newsstu[$i]->web_main_outside_link))
                );
            }
        }
        if(Topic::all()->count()>0){
            $topics=Topic::take(2)->orderBy("sn","desc")->get();
            for($i=0;$i<count($topics);$i++){
                $writer=Student::find($topics[$i]->stu_id);
                $export[]=array(
                    "id"=>urlencode($topics[$i]->id),
                    "title"=>urlencode(addslashes($topics[$i]->title)),
                    "day"=>" ",
                    "writer"=>urlencode(addslashes($writer->nick)),
                    "body"=>urlencode(base64_encode($topics[$i]->body)),
                    "file"=>urlencode(addslashes($topics[$i]->file)),
                    "image"=>" ",
                    "link"=>" "
                );
            }
        }
        return urldecode(json_encode($export));
    }

	public function register()
	{
		$id=Input::get('stu_id');
		$name=Input::get('stu_name');
        $nick=Input::get('stu_nick');
        $email=Input::get('stu_email');
		if(Student::where("account", "=", $id)->count()>0){
			$student=Student::where("account", "=", $id)->first();
			$student->name=$name;
			$student->nick=str_replace("root","**",str_replace("admin","*",str_replace("管理員","***",$nick)));
			$student->email=$email;
			$student->account=$id;
            $auth=$student->auth;
            $student->save();
			return $auth;
		}else{
			$student=new Student;
			$student->name=$name;
			$student->nick=str_replace("root","**",str_replace("admin","*",str_replace("管理員","***",$nick)));
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

    public function nickWrite(){
        $auth=Input::get('auth');
        $nick=Input::get('nick');
        $student=Student::where("auth", "=", $auth)->first();
        $student->nick=str_replace("root","**",str_replace("admin","*",str_replace("管理員","***",$nick)));
        $student->save();

        return "suc";
    }

    public function feedback(){
        $writer=Student::where('auth','=',Input::get('auth'))->first();
        $feedClass=Input::get('class');
        $commit=Input::get('commit');
        $system=Input::get('system');

        $feedback=new Feedback;
        $feedback->feedClass=$feedClass;
        $feedback->commit=$commit;
        $feedback->stu_id=$writer->id;
        $feedback->system=$system;
        $feedback->checked=0;
        $feedback->save();

        return "suc";
    }
}
