<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 11/19/2014
 * Time: 11:01 AM
 */
Route::group( [ 'before' => 'auth_admin' ], function () {

	Route::get( 'admin/shop', '\shop\admin\ShopController@index' );

	Route::get('admin/shop/categories/delete/{id}',
		[
			'as'=>'admin.shop.categories.quickDelete',
			'uses'=>'\shop\admin\CategoriesController@quickDelete',
		]);

	Route::resource( 'admin/shop/categories', '\shop\admin\CategoriesController' );


	Route::resource( 'admin/shop/products', '\shop\admin\ProductsController' );
	Route::any( 'admin/shop/products/ajax/get-all-products', [
		'as'   => 'admin.products.ajax.products',
		'uses' => '\shop\admin\ProductsController@ajaxGetAllProducts'
	] );

	Route::any( 'admin/shop/products/upload-images', [
		'as'   => 'admin.shop.products.upload-images',
		'uses' => '\shop\admin\ProductsController@ajaxImageUpload',
	] );
} );
