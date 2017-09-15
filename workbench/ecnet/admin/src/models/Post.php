<?php

class Post extends Page
{
    protected $guarded = array();
    protected $softDelete = false;
    protected $table = "pages";
    public $type = '2';

    public static function getLatestNews($cat_id = 0, $num = 3, $skip = 0)
    {
        $query = Post::wheretype(2)->wherepublished(1)->whereLang(Lang::getLocale());
        if ($cat_id != 0)
            $query = $query->whereIn('parent', Page::array_child($cat_id));
        if ($skip != 0) {
            return $query->where('id', '!=', $skip)->orderBy('created_at', 'DESC')->take($num)->get();
        } else
            return $query->orderBy('created_at', 'DESC')->take($num)->get();
    }

    public static function getFeaturedNews($cat_id = 0, $num = 10, $skip = 0)
    {
        $query = Post::wheretype(2)->whereLang(Lang::getLocale())->wherepublished(1);
        if ($cat_id != 0)
            $query = $query->whereIn('parent', Page::array_child($cat_id));
        if ($skip != 0) {
            return $query->where('id', '!=', $skip)->orderBy('featured', 'DESC')->orderBy('created_at', 'DESC')->take($num)->get();
        } else
            return $query->orderBy('featured', 'DESC')->orderBy('created_at', 'DESC')->take($num)->get();
    }

    public function setTypeAttributes()
    {
        $this->attributes['type'] = 2;
        return;

    }
    public function setSlugAttribute($string,$id=0){
        $slug = Str::slug($string);
        if($id){
            while(Post::where('id','!=',$id)->whereslug($slug)->count() >0){
                $slug = $slug."_".Str::random(3);
            }
        }else{
            while(Post::whereslug($slug)->count() >0){
                $slug = $slug."_".Str::random(3);
            }
        }
        $this->attributes['slug']= $slug;
    }

	/**
     * Delete a Post
     * @return bool
     */
    public function deletePost(){
        if(File::isFile(public_path().'/'.$this->image)){
            File::delete(public_path().'/'.$this->image);
        }
        $this->delete();
        return false;
    }
	public static function order( $parent = 0, $arr ) {
		$order = 0;

		foreach ( $arr as $item ) {
			Page::whereid( $item['id'] )
			    ->update( array( 'order' => $order));
			$order ++;
		}
	}
	public function scopeProduct(){
	    return $this->whereSubtype('product');
	}

}