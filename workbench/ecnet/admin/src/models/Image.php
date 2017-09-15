<?php

class Image extends Eloquent 
{

	//Ham nay se copy file ra cho khac va xoa file source
	public static function copy($source,$target){
		
		$server = public_path().'/';
		if(!File::isFile($server.$source) or !!File::isDirectory($server.$target)){
			return false;
		}
		try {
			File::copy($server.$source,$server.$target);
			File::delete($server.$source);
		} catch (Exception $e) {
			return false;
		}
		return true;
	}
}
