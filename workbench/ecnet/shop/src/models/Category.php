<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 12/2/2014
 * Time: 3:10 PM
 */

namespace shop;


class Category extends \Page {
	public $table = 'pages';
	public static  $pagetype = '3';

	public static function createCategory($input){
	    $input['type'] = self::$pagetype;
		return self::create($input);
	}
	public static function getSelectData($hidden = 0){
	    return self::array_list(0,$hidden,3);
	}

	public function getProductsAttribute(){
		$products = Product::join('category_product','pages.id','=','product_id')
			->where('pages.type','=',4)
			->where('category_id','=',$this->id);
		return $products;
	}


}