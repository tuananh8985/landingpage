<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 12/3/2014
 * Time: 4:58 PM
 */

namespace shop;


class Product extends \Eloquent {
	protected $guarded = [];


	public static  function createProduct($input){
	    return self::create($input);
	}
	public function getCategoriesAttribute(){
		$products = Category::join('category_product','pages.id','=','category_id')
		                   ->where('pages.type','=',4)
		                   ->where('product_id','=',$this->id);
		return $products;
	}
}