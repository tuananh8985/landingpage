<?php

class Tag extends Eloquent {
	public $table ="tags";
	public static $rules = array(
		'name'=>'required|max:20'
		);

	public static function getall(){
		$string ="";
		foreach(Tag::all() as $tag){
			$string = $string.",".$tag->name;
		}
		if(strlen($string) > 0){
			$string = substr($string,1);
		}
		return $string;
	}
	public static function add_tag($page,$tags){
		
	}
}