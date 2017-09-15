<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 9/4/2014
 * Time: 12:08 AM
 */

class EConfig extends \Eloquent {
	public $table="configs";
	protected $guarded = [];

	public static  function getValue($group = 'general',$key){
	    $config =  self::whereGroup($group)
		    ->whereKey($key)->first();
		if($config){
			return $config->value;
		}else{
			return false;
		}
	}
	public static function setValue($group,$key,$value){
	    try{
		    $config = self::create([
			    'group'=>Str::slug($group),
			    'key'=>Str::slug($key),
			    'value'=>$value,
		    ]);
		    return $config;
	    }catch (Exception $e){
		    Log::debug($e->getMessage());
		    return false;
	    }
	}
	public static function getByGroup($group){
	    try{
		    $configs = self::whereGroup($group)->get();
		    return $configs;
	    }catch (Exception $e){
		    throw $e;
	    }
	}
} 