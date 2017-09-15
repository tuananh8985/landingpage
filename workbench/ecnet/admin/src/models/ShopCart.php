<?php

class ShopCart extends Eloquent {
	public $table = "shopcarts";
    protected $guarded = array();

    public static $rules = array(
		'email' => 'required',
		'phone_number' => 'required',
		// 'first_name' => 'required',
		'last_name' => 'required',
		// 'city' => 'required',
		'address' => 'required',
	);

	public function detail(){
		$detail = DetailCart::where('cart_id', $this->id)->get();
		return $detail;
	}
}