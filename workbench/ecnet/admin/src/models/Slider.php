<?php

class Slider extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		
		);
	public static function getPack($id){
		if(1 == 0)
			return Cache::get('slider_pack_'.$id);
		else{
			$pack = Slider::wherepack($id)->orderBy('order')->get();
			Cache::add('slider_pack_'.$id,$pack,10);
			return $pack;
		}
		
	}
	public function getThumb($w,$h){
		return EcHelper::getResize($w,$h,'slider_'.$this->id,$this->image);
	}
	public function link(){
	    return URL::to($this->link);
	}

	public function image(){
	    return URL::to($this->image);
	}

	public function resizeWidth($w){
		if(!File::isDirectory(public_path().'/thumbs')){
			File::makeDirectory(public_path().'/thumbs');
		}
		$ext = File::extension($this->image);
		$file_name = 'slider_'.Str::slug($this->title).'_resize_'.$w.'.'.$ext;
		if(File::isFile(public_path().'/images/thumbs/'.$file_name)){
			return '/images/thumbs/'.$file_name;
		}
		if(!File::isFile(public_path().'/'.$this->image)){
			return "";
		}
		$image = new ImageTools(public_path().'/'.$this->image);
		$image->resizeWidth($w);
		$image->save(public_path().'/images/thumbs/',$file_name,100,true);
		return '/images/thumbs/'.$file_name;


	}

}