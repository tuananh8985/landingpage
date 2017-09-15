<?php
class PostImage extends Eloquent{
	public $table = 'page_images';
	protected $guarded = array();

	public static function uploadImage($page,$input){
		$path = public_path().'/images/posts';

		$page = Post::find($page);
		if($page->count() > 0){
			if($input){
				$input_name = $input->getClientOriginalName();
				$input_ext = File::extension($input_name);
				$new_name = $page->slug.".".$input_ext;
				while(File::isFile($path.'/'.$new_name)){
					$new_name =$page->slug.'.'.Str::random(3).'.'.$input_ext;
				}
				$input->move($path,$new_name);
				PostImage::create(array('page'=>$page->id,'name'=>$new_name,'link'=>'images/posts/'.$new_name));
				return true;
			}
		}
		return false;
	}
	public function deleteImage(){
		if(File::isFile(public_path().'/'.$this->link)){
			File::delete(public_path().'/'.$this->link);
		}
		$this->delete();
	}
	public function getThumb($w,$h){
        return URL::to(EcHelper::getThumb($w,$h,'post_gallery_'.$this->id,$this->link));
    }
}