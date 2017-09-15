<?php

class Postcatalog extends Page {
	protected $fillable = [
		'title',
		'parent',
		'type',
		'slug',
		'lang',
		'image',
		'body',
		'order',
		'template',
		'description',
		'subtype',
		'meta_title',
		'meta_description',
		'meta_keywords',
		'homepage'

	];

	public static $rules = array(
		'title' => 'required',
	);
	protected static $type = 1;

	public static function child_list( $id ) {
		$root = Postcatalog::whereparent( $id )->wheretype( 1 )->get();
		$list = array();
		foreach ( $root as $item ) {
			if ( $item->parent == 0 ) {
				$list[0] = 'không có parent';
			}
			$list[ $item->id ] = $item->title;
			if ( $item->child()->count() != 0 ) {
				$list[ $item->id ] = "--->" . $item->title;
			}
		}

		return $list;

	}

	public function child() {
		return Page::whereparent( $this->id )->wheretype( $this->type );
	}

	public static function getall() {
		return Postcatalog::wheretype( 1 )->orderBy( 'order' )->get();
	}

	public function getDescriptionAttribute() {
		if ( isset( $this->attributes['description'] ) ) {
			return strip_tags( $this->attributes['description'] );
		} else {
			return '';
		}
	}
}