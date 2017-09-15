<?php
Route::post('contact',[
	'before'=>'csrf',
	'as'=>'sendContact',
	'uses'=>'ContactsController@sendContact'
	]);
Route::group(array('before' => 'auth_admin'), function()
{
	Route::post('product/delete_image_ajax',array('as'=>'delete_image_ajax','uses'=>'PostsController@delete_image_ajax'));


	Route::get('admin/logout',array(
		'as'=>'admin.logout',
		'uses'=>'UsersController@logout'
		));
	Route::get('admin',array('as'=>'admin','uses'=>'Admin@dashbroad'));



	Route::post('admin/menuspacks/update-order/{id}',array('uses'=>'MenuspacksController@updateorder'));

	Route::get('admin/menus/delete/{id}',array('uses'=>'MenusController@delete'));

	Route::resource('admin/menuspacks', 'MenuspacksController');
	Route::resource('admin/menuspacks.menus', 'MenusController');

	Route::resource('admin/mail', 'EmailController',
		array('except' => array('destroy','show')));
	// Route::post('admin/mail/{id}', ['as'=>'admin.mail.delete','uses'=>'EmailController@delete']);

	Route::get('admin/mail/{id}', ['as' => 'admin.mail.delete', 'uses' => 'EmailController@delete']);
	Route::resource('admin/users', 'UsersController');

	Route::resource('admin/clients', 'ClientsController');

	// Slider Routes
	Route::resource('admin/sliderspacks', 'SliderspacksController');
	Route::resource('admin/sliderspacks.sliders', 'SlidersController');

	// End Slider Routes

	Route::get('admin/posts/trashed',array('as'=>'admin.posts.trashed','uses'=>'PostsController@trashed'));
	Route::get('admin/posts/copy/{id}',array('as'=>'admin.posts.copy','uses'=>'PostsController@copy'));
	Route::post('admin/posts/copy_post',array('as'=>'admin.posts.copy_post','uses'=>'PostsController@copy_post'));
	Route::get('admin/posts/forcedelete/{id}',array('uses'=>'PostsController@forcedelete'));
	Route::get('admin/posts/restore/{id}',array('uses'=>'PostsController@restore'));
	Route::post('admin/posts/{id}/gallery/add-image',[
		'as'=>'admin.posts.gallery.add',
		'uses'=>'PostsController@add_image_gallery'
		]);

	Route::get('admin/posts/gallery/delete-image/{id}',[
		'as'=>'admin.posts.gallery.delete',
		'uses'=>'PostsController@delete_image_gallery',
		]);
	Route::get('admin/posts/{id}/gallery',[
		'as'=>'admin.posts.gallery',
		'uses'=>'PostsController@images',
		]);
	Route::get('admin/posts/gallery',array('uses'=>'PostsController@images'));
	Route::get('admin/posts/order',[
		'as'=>'admin.posts.order',
		'uses'=>'PostsController@order',
		]);
	Route::post('admin/posts/ajax-order',array('uses'=>'PostsController@ajaxOrder'));

	Route::resource('admin/posts', 'PostsController');


	Route::resource('admin/postcatalogs', 'PostcatalogsController');

	Route::get('admin/postcatalogs/delete/{id}',array('uses'=> 'PostcatalogsController@quickdelete'));

	Route::get('admin/pages/delete/{id}',array('uses'=>'PagesController@delete'));
	Route::resource('admin/pages', 'PagesController');

	Route::get('admin/pages/{pages}/create-menu',[
		'as'=>'admin.pages.create_menu',
		'uses'=>'PagesController@createMenu',
		]);
	Route::post('admin/pages/order',array('uses'=>'PagesController@order'));



	Route::resource('admin/pagecats', 'PagecatsController');

	Route::resource('admin/images', 'ImagesController');

	Route::get('admin/upload_image',array('uses'=>'ImagesController@upload'));

	Route::post('admin/upload_image',array('uses'=>'ImagesController@ajax_upload_image'));
	Route::post('admin/images/upload-with-crop',array('uses'=>'ImagesController@upload_with_crop'));

	//Template Routes
	Route::resource('admin/templates', 'TemplatesController');
	Route::post('admin/templates/upload_asset',array('uses'=>'TemplatesController@upload_asset'));
	Route::get('admin/templates/create-layout/{id}',array('uses'=>'TemplatesController@create_layout'));



	Route::get('admin/mediacats/upload/{id}',array('uses'=>'MediacatsController@upload'));
	Route::post('admin/mediacats/upload/{id}',array('uses'=>'MediacatsController@upload'));
	Route::resource('admin/mediacats', 'MediacatsController');

	Route::resource('admin/medias', 'MediasController');
	Route::resource('admin/comments', 'CommentsController');
	Route::post('admin/tags/add',array('uses'=>'TagsController@add'));
	Route::resource('admin/tags', 'TagsController');
	Route::resource('admin/rsliders', 'RslidersController');
	Route::resource('admin/rsliderselements', 'RSlidersElementsController');
	Route::resource('admin/groups', 'GroupsController');
	Route::resource('admin/roles', 'RolesController');
	Route::resource('admin/contacts', 'ContactsController');
	Route::resource('admin/contents','ContentsController');
	// shopcart
	Route::get('admin/shopcart/',[
		'as'=>'admin.shopcart',
		'uses'=>'ShopCartController@index'
		]);
	
	Route::get('admin/shopcart/detail/{id}',[
		'as'=>'admin.detail_shopcart',
		'uses'=>'ShopCartController@edit'
		]);
	Route::post('admin/shopcart/update', [
		'as' => 'admin.cart.update',
		'uses' => 'ShopCartController@update'
		]);
	Route::post('admin/shopcart/{id}', [
		'as' => 'admin.cart.destroy',
		'uses' => 'ShopCartController@destroy'
		]);
// shopcart

	Route::get('admin/contents/{id}/delete',[
		'as'=>'admin.contents.delete-confirm',
		'uses'=>'ContentsController@delete']);

	Route::get('admin/contents/{id}/delete-process','ContentsController@delete_process');

	//Config Routes
	Route::resource('admin/configs','\admin\ConfigsController');
	Route::post('api/update-config',[
		'as'=>'api.update-config',
		'uses'=>'\admin\ConfigsController@ajaxUpdateConfig',
		]);
	Route::post('api/delete-config',[
		'as'=>'api.delete-config',
		'uses'=>'\admin\ConfigsController@ajaxDeleteConfig',
		]);
	//End Config Routes

	// Route::model('propertytemplates','Property');
	Route::resource('admin/propertytemplates','PropertyTemplatesController');
	Route::get('admin/propertytemplates/{id}/delete',[
		'as'=>'admin.propertytemplates.delete',
		'uses'=>'PropertyTemplatesController@destroy']);
});

Route::controller('admin/login','LoginController');

// Route::get('{slug}',array('uses'=>'Pages@slug1'));
// Route::get('{slug1}/{slug}',array('uses'=>'Pages@slug2'));
// Route::get('{slug2}/{slug1}/{slug}',array('uses'=>'Pages@slug3'));
// Route::get('tim-kiem',array('before'=>'csrf','uses'=>'Search@standard'));
// Route::post('ec_analytic/pageviews',array('before'=>'csrf','uses'=>'Analytics@pageviews'));

Route::filter('auth_admin', function()
{

	if (!Sentry::check() or !Sentry::getUser()->hasAccess('admin'))
		return Redirect::to('admin/login')
	->with('message','Bạn không đủ quyền hạn truy cập phần này');
});

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		return "Có lỗi trong vấn đề bảo mật! Mời bạn quay lại trang trước đó!!";
	}
});