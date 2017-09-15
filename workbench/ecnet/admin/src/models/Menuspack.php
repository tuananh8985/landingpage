<?php

class Menuspack extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'name' => 'required'
	);
	public static function list_array(){
		$arr = array();
		foreach(Menuspack::orderBy('name')->get() as $item){
			$arr[$item->id] = $item->name; 
		}
		return $arr ;
	}
	public static function quickorder($parent=0,$arr){
		$order = 0;

		foreach($arr as $item){
			Menu::whereid($item['id'])
				->update(array('order'=>$order,'parent'=>$parent));
			if(isset($item['children'])){
				Menuspack::quickorder($item['id'], $item['children']);
			}
		$order++;
		}
	}
}