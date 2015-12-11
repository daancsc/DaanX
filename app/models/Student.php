<?php
Class Student extends Eloquent {

    protected $table = 'student';

    protected $fillable = array('account', 'nick', 'email','auth','name');

}
