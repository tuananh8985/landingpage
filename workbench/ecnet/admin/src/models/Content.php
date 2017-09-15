<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 3/13/2015
 * Time: 10:27 AM
 */

class Content extends Eloquent {
	protected $fillable = [
		'slug',
		'title',
		'body',
		'lang',
	];
	public static function getContent($slug){
	   return self::whereSlug($slug)->first();
	}
}