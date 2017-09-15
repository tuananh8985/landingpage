<?php

class Menu extends Eloquent {
	protected $guarded = array();
	public static $list = array();
	public static $rules = array(
		'title'       => 'required|max:100',
		'link'        => 'max:180',
		'order'       => 'numeric',
		'icon'        => 'max:200',
		'description' => 'max:250',
	);

	public static function child_list( $id, $level = 0, $pack = null ) {
		$root = Menu::whereparent( $id );
		if ( $pack ) {
			$root = $root->whereIn( 'pack', $pack )->orderBy( 'order' )->get();
		} else {
			$root = $root->get();
		}
		$level_c = "";
		for ( $i = 0; $i < $level; $i ++ ) {
			$level_c = $level_c . " |->";
		}
		foreach ( $root as $item ) {
			if ( $item->parent == 0 ) {
				Menu::$list[0] = 'No parent';
			}
			Menu::$list[ $item->id ] = $level_c . $item->title;
			if ( $item->childs()->count() != 0 ) {
				$l = $level + 1;
				Menu::child_list( $item->id, $l );
			}
		}

		return Menu::$list;

	}

	public function childs() {
		return Menu::whereparent( $this->id )->orderBy( 'order' );
	}

	public function child() {
		return Menu::whereparent( $this->id )->orderBy( 'order' );
	}

	public function parent() {
		return Menu::whereid( $this->parent );
	}

	function pack() {
		$post_value = Config::get( 'admin.menus.pack' );

		return isset( $post_value[ $this->pack ] ) ? $post_value[ $this->pack ] : 'No pack';
	}

	public function cunit() {
		$data = Cunit::whereid( $this->cunit );
		if ( $data->count() != 0 ) {
			return $data->first();
		} else {
			return false;
		}

	}

	public static function active_menu() {
		if ( isset( $_SERVER['REQUEST_URI']) ) {

			$request_url = $_SERVER['REQUEST_URI'];
			$query_str   = (isset($_SERVER['QUERY_STRING']))?$_SERVER['QUERY_STRING']:"";
			$act_link    = str_replace( '?' . $query_str, '', substr( $request_url, 1 ) );
			if($act_link == ""){
				$act_link ="/";
			}

			$act_menu = Menu::wherelink( $act_link );
			if ( $act_menu->count() > 0 ) {
				$act_menu = $act_menu->first();
				while ( $act_menu->parent != 0 ) {
					$act_menu = Menu::whereid( $act_menu->parent )->first();
				}

				return $act_menu->id;
			} else {
				$params = explode( '/', $act_link );
				if ( count( $params ) >= 3 ) {
					$act_menu = Menu::whereLink( $params[0] . '/' . $params[1] .'/'.$params[2] )->first();
					if ( $act_menu ) {
						while ( $act_menu->parent != 0 ) {
							$act_menu = Menu::whereid( $act_menu->parent )->first();
						}

						return $act_menu->id;

					}
				}
				if ( count( $params ) >= 2 ) {
					$act_menu = Menu::whereLink( $params[0] . '/' . $params[1])->first();
					if ( $act_menu ) {
						while ( $act_menu->parent != 0 ) {
							$act_menu = Menu::whereid( $act_menu->parent )->first();
						}

						return $act_menu->id;

					}
				}


			}
		}else{
			return 0;
		}

		return 0;

	}

	public static function currentActive() {
		return self::active_menu();
	}

	public function delete_menu() {

		if ( $this->childs()->count() == 0 ) {
			$this->delete();

			return;
		} else {
			foreach ( $this->childs()->get() as $menu ) {
				$menu->delete_menu();
			}
			$this->delete();
		}
	}

	public static function root() {
		return Menu::whereparent( 0 );
	}

	public function link() {
		return URL::to( $this->link );
	}
//    public function getLinkAttribute(){
//        return URL::to($this->attributes['link']);
//    }
	public function rend_link( $data, $n = 0 ) {
		$link_arr = [ ];
		for ( $i = 0; $i <= $n; $i ++ ) {
			$link_arr[] = $data[ $i ];
		}

		return @join( "/", $link_arr );
	}

}