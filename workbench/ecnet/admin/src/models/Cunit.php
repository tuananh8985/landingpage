<?php

class Cunit extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'access_level' => 'required'
	);
	public static function all_array(){
		$data = array();
		$data[0] = 'không tương tác';
		foreach(Cunit::all() as $unit){
			$data[$unit->id] = $unit->name;
		}
		return $data;
	}
}