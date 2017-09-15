<?php

class Template extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'name'  =>'required|alpha',
		'folder' => 'required',
	);
	public static function array_list(){
		$list = Template::orderBy('name')->get();
		$arr = array();
		foreach($list as $i){
			$arr[$i->id] = $i->name;
		}
		return $arr;
	}
}