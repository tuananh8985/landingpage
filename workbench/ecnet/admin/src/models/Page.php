<?php

class Page extends Eloquent {
	protected $guarded = array();
	protected $table = 'pages';
	protected static $arr_list = array();
	protected static $array_child = array();
	public static $rules = array(
		'title'            => 'required|max:200',
		'slug'             => 'max:200',
		'order'            => 'numeric',
		'description'      => 'max:5000',
		'tags'             => 'max:150',
		'meta_title'       => 'max:170',
		'meta_description' => 'max:250',
		'meta_keywords'    => 'max:170',
		);

	public static $subType = [
	'post'    => 'Bài viết',
	'project' => 'Dự án',
	'product' => 'Sản phẩm',
	];

	public function SoftTrim($text, $count, $wrapText='...'){
		if(strlen($text)>$count){
			preg_match('/^.{0,' . $count . '}(?:.*?)\b/siu', $text, $matches);
			$text = $matches[0];
		}else{
			$wrapText = '';
		}
		return strip_tags($text) . $wrapText;
	}
	public static function array_list( $parent = 0, $hidden = 0, $type = 0 ) {
		Page::$arr_list[0] = 'Không có danh mục mẹ';
		$list              = Page::whereparent( $parent )->wheretype( $type )->where('homepage','!=',1)->get();
		foreach ( $list as $item ) {
			if ( $item->id != $hidden ) {
				Page::$arr_list[ $item->id ] = $item->title;
			}
			if ( $item->child()->wheretype( $type )->count() > 0 ) {
				foreach ( $item->child()->wheretype( $type )->get() as $item ) {
					if ( $item->id != $hidden ) {
						Page::$arr_list[ $item->id ] = " -| " . $item->title;
					}
					if ( $item->child()->wheretype( $type )->count() > 0 ) {
						foreach ( $item->child()->wheretype( $type )->get() as $item ) {
							if ( $item->id != $hidden ) {
								Page::$arr_list[ $item->id ] = " -|-| " . $item->title;
							}
						}
					}
				}
			}

		}

		return Page::$arr_list;
	}

	// Xắp xếp theo mảng từ thông số truyền băng ajax
	public static function order( $parent = 0, $arr ) {
		$order = 0;

		foreach ( $arr as $item ) {
			Page::whereid( $item['id'] )
			->update( array( 'order' => $order, 'parent' => $parent ) );
			if ( isset( $item['children'] ) ) {
				Page::order( $item['id'], $item['children'] );
			}
			$order ++;
		}
	}

	// trả lại các trang con lvl 1
	public function child() {
		return Page::whereparent( $this->id );
	}

	//
	public function parent() {
		$parent = Page::find( $this->parent );

		if ( ! $parent ) {

			return false;
		} else {
			return $parent;
		}

	}

	//delete Page and child of this page
	public function delete_tree() {
		if ( $this->child()->count() > 0 ) {
			foreach ( $this->child()->get() as $item ) {

				$item->delete_tree();
			}
		}
		$fe_path = app_path( '/views/frontend/pages' );
		if ( File::isFile( $fe_path . '/' . $this->slug . '.blade.php' ) ) {
			File::delete( $fe_path . '/' . $this->slug . '.blade.php' );
		}
		if ( File::isFile( public_path( $this->image ) ) ) {
			File::delete( public_path( $this->image ) );
		}
		$this->delete();

		return;
	}

	public function properties() {
		return $this->hasMany( 'Property', 'page_id', 'id' );
	}

	public function setProperties( $data ) {
		if ( is_array( $data ) ) {
			$this->properties()->delete();

			foreach ( $data as $key => $value ) {

				$template = PropertyTemplate::whereName( $key )->first();
				if ( ! $template ) {
					continue;
				}
				$this->properties()->create( [
					'page_id'     => $this->id,
					'template_id' => $template->id,
					'value'       => $value,
					'name'        => $template->name,
					] );

			}


			return false;

		}

		return false;

	}


	public function full_link() {
		$slug = $this->slug;
		$page = $this->parent();
		while ( $page ) {
			$slug = $page->slug . '/' . $slug;
			$page = $page->parent();
		}

		return URL::to( $slug );

	}

	public function link() {
		return URL::to($this->slug);
	}

	// trả lại id của tất cả các con của nó.
	public static function array_child( $id, $lvl = 0 ) {
		$level = $lvl;
		if ( $level == 0 ) {
			Page::$array_child = array();
		}
		$cat = Page::find( $id );
		if ( $cat ) {
			Page::$array_child[] = $cat->id;
		} else {
			if ( self::$array_child ) {
				return Page::$array_child;

			} else {
				return [ 0 ];
			}
		}

		if ( $cat->child()->count() > 0 ) {
			$level ++;
			foreach ( $cat->child()->get() as $cat ) {
				Page::array_child( $cat->id, $level );
			}
		}

		return Page::$array_child;

	}

	public function all_posts( $paginate = false ) {
		$posts = Page::posts( $this->id, $paginate );

		return $posts;
	}


	public static function get( $slug = "" ) {
		$page = Page::whereslug( $slug );
		if ( $page->count() == 0 ) {
			return false;
		} else {
			return $page->first();
		}
	}

	public function created_at() {
		return strtotime( $this->created_at );
	}

	//functions for posts module
	public function next_post() {
		$post = Page::where( 'id', '<', $this->id )->wheretype( 2 )->whereparent( $this->parent );
		if ( $post->count() > 0 ) {
			return $post->first();
		} else {
			return false;
		}
	}

	public function prev_post() {
		$post = Page::where( 'id', '>', $this->id )->wheretype( 2 )->whereparent( $this->parent );
		if ( $post->count() > 0 ) {
			return $post->first();
		} else {
			return false;
		}
	}

	public function related_posts( $num = 4 ) {
		if($this->parent()){
			$parent_id = $this->parent()->id;
		}else{
			$parent_id = 0;
		}
		$posts = Page::where( 'id', '!=', $this->id )->wheretype( 2 )
		->whereIn('parent',self::array_child($parent_id) )
		->take( $num )->get();

		return $posts;
	}

	public function image() {
		return URL::to( $this->image );
	}

	public function getThumb( $w, $h ) {
		try {
			return URL::to( EcHelper::getThumb( $w, $h, 'new_' . $this->id, $this->image ) );
		} catch ( Exception $e ) {
			return "error Image";
		}
	}

	public function imageResize( $w, $h ) {
		return URL::to( EcHelper::getResize( $w, $h, 'resize', $this->image ) );
	}

	public function timestamp() {
		return strtotime( $this->created_at );
	}

	public function images() {
		return PostImage::wherepage( $this->id )->get();
	}

	public function carbon() {
		return Carbon\Carbon::createFromTimeStamp( strtotime( $this->created_at ) );
	}

	public function hasChild() {
		if ( $this->child()->count() ) {
			return true;
		}
	}

	public function getChild() {
		$this->child()->get();
	}

	function getLang() {
		switch ( $this->lang ) {
			case "vi":
			return "Tiếng Việt";
			case "en":
			return "English";
		}
	}

	public function isParentOf( $page_id ) {

		try {
			$page = Page::findOrFail( $page_id );
		} catch ( Exception $e ) {
			return false;
		}

		if ( $page->id == $this->id ) {
			return true;
		}
		while ( $page->id != 0 ) {
			if ( $page->id == $this->id ) {
				return true;
			}
			if ( $page->parent() ) {
				$page = $page->parent();
				continue;
			} else {

				return false;

			}
		}

		return false;

	}

	public function getMetaTitleAttribute() {
		if ( isset( $this->attributes['meta_title'] ) && $this->attributes['meta_title'] ) {
			return $this->attributes['meta_title'];
		} else {
			return EConfig::getValue( 'website', 'title' );
		}
	}

	public function getMetaDescriptionAttribute() {
		if ( isset( $this->attributes['meta_description'] ) && $this->attributes['meta_description'] ) {
			return $this->attributes['meta_description'];
		} else {
			return EConfig::getValue( 'website', 'description' );
		}
	}

	public function getMetaKeyWordsAttribute() {
		if ( isset( $this->attributes['meta_keywords'] ) && $this->attributes['meta_keywords'] ) {
			return $this->attributes['meta_keywords'];
		} else {
			return EConfig::getValue( 'website', 'keywords' );
		}
	}


	//Scopes

	public function scopeProducts() {
		return $this->whereType( 2 )->whereSubtype( 'product' );
	}
	public function scopeProductCategories() {
		return $this->whereType( 1 )->whereSubtype( 'product' );
	}

	/**
	 * @param $template_id
	 */
	public function getProperty( $name ) {
		$pro = Property::wherePageId( $this->id )->whereName( $name )->first();
		if ( $pro ) {
			return $pro->value;
		} else {
			return "";
		}
	}

	public function scopePosts() {
		return $this->whereType( 2 )->whereSubtype( 'post' );
	}

}