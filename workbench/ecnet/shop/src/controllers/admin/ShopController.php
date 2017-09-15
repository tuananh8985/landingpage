<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 11/19/2014
 * Time: 9:56 AM
 */

namespace shop\admin;



class ShopController extends AdminController {
	public function index(){
	    return \View::make('shop::admin.pages.dashbroad');
	}
}