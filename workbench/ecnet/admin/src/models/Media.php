<?php

class Media extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'name' => 'required',
		'cat' => 'required'
	);
}