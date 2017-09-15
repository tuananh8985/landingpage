<?php

class Productcat extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'title' => 'required',
	);
	public static function list_array(){
		$list = array();
		$list[0]='Chưa phân mục';
		foreach (Productcat::orderby('title')->get() as $cat){
			$list[$cat->id] = $cat->title;
		}
		return $list;
	}
}