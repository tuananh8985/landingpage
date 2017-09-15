<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 1/19/2015
 * Time: 10:16 AM
 */

class Contact extends Eloquent {
	protected $guarded = [];
	public static $rules = [
		'name'=>'required|max:40',
		'company'=>'max:40',
		'address'=>'max:254',
		'tel'=>'max:20',
		'title'=>'max:170',
		'message'=>'required|max:255',

	];
	public static function unread(){
		return self::whereReaded(0)->get();
	}

}