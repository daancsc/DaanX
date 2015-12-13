<?php
Class Topic extends Eloquent {

    protected $table = 'topic';

    protected $fillable = array('title', 'stu_id', 'body','view');

}
