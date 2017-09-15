<?php

class DetailCart extends Eloquent {
	public $table = "detailcarts";
    protected $guarded = array();

    public static $rules = array(
		'cat_id' => 'required',
		'product_id' => 'required',
		'quantity' => 'required',
		'price' => 'required'
	);

	public function cart(){
		$detail = ShopCart::where('cart_id', $this->id)->first();
		return $detail;
	}
	public function product(){
		return  $product = Product::find($this->product_id);

	}
}