<?php

class Comment extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'time' => 'required',
		'user' => 'required',
		'content' => 'required|max:300'
	);
}