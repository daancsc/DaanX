<?php
Class Commit extends Eloquent {

    protected $table = 'commit';

    protected $fillable = array('stu_id','topic_id','body');

}
