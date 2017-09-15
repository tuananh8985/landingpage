<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 1/19/2015
 * Time: 9:58 AM
 */

class ShopCartController extends BaseController {
	public function index(){

		// $carts = ShopCart:: all();
		$carts = ShopCart::orderBy('id', 'DESC')->get();
		return View::make( 'admin::admin.shopcarts.index' )
		           ->with( 'title', 'Quản lý đơn hàng' )
					->with('carts',$carts);
	}
	public function edit($id){
		$cart = ShopCart::find($id);
		if(!$cart){
			return Redirect::route('admin.shopcart');
		}
		return View::make( 'admin::admin.shopcarts.detail' )
		           ->with( 'title', 'Quản lý đơn hàng' )
					->with('cart',$cart);
		
	}

	

	public function update(){

		$data = Input::all();
		$cart = ShopCart::find($data['id']);

		if(!$cart){
			return Redirect::route('admin.shopcart');
		}
		$cart->last_name = $data['last_name'];
		// $cart->first_name = $data['first_name'];
		$cart->phone_number = $data['phone_number'];
		$cart->status = $data['status'];
		// $cart->city = $data['city'];
		$cart->address = $data['address'];
		$cart->save();
		return Redirect::route('admin.shopcart')->with('mess', 'Cap nhap thanh cong');
	}

	public function destroy( $id ) {
		
		$post = ShopCart::find( $id );
		// File::delete(public_path().'/'.$post->image);
		$post->delete();

		return Redirect::route( 'admin.shopcart' )
		               ->with( 'message', 'Bạn đã xóa thành công đơn hàng của khách hàng: ' . $post->email );
	}

}