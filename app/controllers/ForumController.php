<?php

class ForumController extends BaseController {

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

	public function forumget($page){
        if(Topic::all()->count()>($page-1)*10){
            $topics=Topic::take(10)->skip(($page-1)*10)->orderBy("sn","desc")->get();
            for($i=0;$i<count($topics);$i++){
                $writer=Student::find($topics[$i]->stu_id);
                $export[]=array(
		    "id"=>urlencode($topics[$i]->id),
                    "title"=>urlencode(str_replace("\\'","'",addslashes($topics[$i]->title))),
                    "writer"=>urlencode(str_replace("\\'","'",addslashes($writer->nick))),
                    "body"=>urlencode(base64_encode($topics[$i]->body)),
                    "file"=>urlencode(str_replace("\\'","'",addslashes($topics[$i]->file)))
                );
            }
        }else{
            $export[]=array(
		    "id"=>" ",
                    "title"=>" ",
                    "writer"=>" ",
                    "body"=>" ",
                    "file"=>" "
                );
        }
        return urldecode(json_encode($export));
	}

    public function forumWrite(){
        $json=Input::get('json');
        $data=json_decode($json);
        $writer=Student::where('auth','=',$data->auth)->first();
        $sn=Topic::max('sn')+1;
        $body=base64_decode($data->body);

        $topic=new Topic;
        $topic->sn=$sn;
        $topic->title=$data->title;
        $topic->stu_id=$writer->id;
        $topic->day=date("Y/m/d");
        $topic->body=$body;
        $topic->view=0;
        $topic->save();

        return "suc";
    }

    public function forumId($id){
        if(Topic::where('id','=',$id)->count()>0) {
            $topic = Topic::find($id);
	    $topic->view=($topic->view+1);
	    $topic->save();
            if (Commit::where('topic_id', '=', $id)->count() > 0) {
                $commit = Commit::where('topic_id', '=', $id)->get();
            } else {
                $commit = array("無留言");
            }
            $writer = Student::find($topic->stu_id);
            $export[] = array(
                "title" => urlencode(str_replace("\\'","'",addslashes($topic->title))),
                "writer" => urlencode(str_replace("\\'","'",addslashes($writer->nick))),
                "body" => urlencode(base64_encode($topic->body)),
                "file" => urlencode(str_replace("\\'","'",addslashes($topic->file)))
            );
            if($commit[0]!="無留言") {
                for ($i = 0; $i < count($commit); $i++) {
                    $export[] = array(
                        "title" => "",
                        "writer" => urlencode(str_replace("\\'","'",addslashes(Student::find($commit[$i]->stu_id)->nick))),
                        "body" => urlencode(str_replace("\\'","'",addslashes($commit[$i]->body))),
                        "file" => ""
                    );
                }
            }
        }else{
            $export[]=array(
                "title"=>" ",
                "writer"=>" ",
                "body"=>" ",
                "file"=>" "
            );
        }
        return urldecode(json_encode($export));
    }

    public function forumIdWrite($id){
        $json=Input::get('json');
        $data=json_decode($json);
        $writer=Student::where('auth','=',$data->auth)->first();
        $sn=Topic::max('sn')+1;
        $body=base64_decode($data->body);	

	$topics=Topic::find($id);
	$topics->sn=$sn;
	$topics->save();

        $commit=new Commit;
        $commit->stu_id=$writer->id;
        $commit->topic_id=$id;
        $commit->body=$body;
        $commit->save();

        return "suc";
    }
}
