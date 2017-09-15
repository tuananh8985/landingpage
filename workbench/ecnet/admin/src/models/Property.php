<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 5/26/2015
 * Time: 5:08 PM
 */

class Property extends Eloquent {
	protected $fillable = [
		'page_id',
		'template_id',
		'value',
		'name',


	];
	public function page(){
	    return $this->belongsTo('Page');
	}
	public function template(){
	    return $this->belongsTo('PropertyTemplate','template_id','id');
	}
}