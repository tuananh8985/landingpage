<?php

class Pagecat extends Eloquent {
    protected $guarded = array();
    protected $table="pages";
    public static $list = array();

    public static $rules = array(
		'slug' => 'required',
	);
	public static function child_list($id=0,$level=0){
		$root = Pagecat::whereparent($id)->get();
		$level_c = "";
		for($i=0 ; $i < $level ; $i++){
			$level_c = $level_c." |->";
		}
		foreach($root as $item){
			if($item->parent == 0)
			Pagecat::$list[0]='No parent';
			Pagecat::$list[$item->id]= $level_c.$item->title;
			if($item->childs()->count()!=0){
				$l = $level +1;
				Pagecat::child_list($item->id,$l);
			}
		}
		return Pagecat::$list;

	}
	public function childs(){
		return Pagecat::whereparent($this->id);
	}
	public function parent(){
		return Pagecat::whereid($this->parent);
	}
}