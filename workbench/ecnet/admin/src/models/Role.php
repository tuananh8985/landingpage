<?php
class Role extends Eloquent{
	protected $guarded = array();
	public static $rules =array(
		'name'=>'required|max:100'
	);
}