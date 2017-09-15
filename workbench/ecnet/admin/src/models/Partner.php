<?php

class Partner extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'link' => 'required|max:200',
		'description' => 'max:500',
	);
	public static function getAll(){
		return Partner::orderBy('order')->get();
	}
}