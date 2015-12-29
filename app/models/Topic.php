<?php
Class Topic extends Eloquent {

    protected $table = 'topic';

    protected $fillable = array('sn','title', 'stu_id', 'body','view','day');

}
