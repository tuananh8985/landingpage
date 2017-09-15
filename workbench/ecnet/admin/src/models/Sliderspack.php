<?php

class Sliderspack extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'description' => 'required',
	);
	public static function list_array(){
		$arr = array();
		$arr[0] = 'No pack';
		$list = Sliderspack::orderBy('name')->get();
		foreach ($list as $item) {
			$arr[$item->id] = $item->name;
		}
		return $arr;

	}
}