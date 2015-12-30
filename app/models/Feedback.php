<?php
Class Feedback extends Eloquent {

    protected $table = 'feedback';

    protected $fillable = array('feedClass','commit','stu_id','checked','system');

    public $timestamps=false;
}
