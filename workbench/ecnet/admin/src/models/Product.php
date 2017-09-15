<?php

class Product extends Eloquent {
	public $table = "pages";
    protected $guarded = array();

    public static $rules = array(
		'name' => 'required',
		'price' => 'required',
		'description' => 'required'
	);
}