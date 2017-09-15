<?php
if(Input::has('lang') && in_array(Input::get('lang'),['en','vi'])){
    Session::put('lang',Input::get('lang'));
};
if(Session::has('lang')){
    Lang::setLocale(Session::get('lang'));

}
// Link trang chủ
Route::get('/', array('as'=>'home','uses'=>'Pages@homepage'));
// Route::get('/san-pham', array('as'=>'home','uses'=>'Pages@product'));
// /hang-xe/toyota
Route::get('gioi-thieu',array('as' =>'gioithieu','uses'=>'Pages@gioithieu'));
Route::get('ban-dieu-hanh',array('as' =>'bandieuhanh','uses'=>'Pages@bandieuhanh'));
Route::get('tin-tuc',array('as' =>'tintuc','uses'=>'Pages@tintuc'));
Route::post('dang-ky',array('as' =>'register','uses'=>'Pages@register'));


Route::get('tin-tuc',array('as' =>'tintuc','uses'=>'Pages@tintuc'));
Route::get('san-pham',array('as' =>'sanpham','uses'=>'Pages@sanpham'));
Route::get('lien-he',array('as' =>'lienhe','uses'=>'Pages@lienhe'));
Route::get('huong-dan-mua-hang',array('as' =>'huongdanmuahang','uses'=>'Pages@huongdanmuahang'));
Route::get('tim-kiem',array('as'=>'search_all','uses'=>'Pages@search'));


Route::post('lien-he',array('as'=>'lienhe_post','uses'=>'Pages@lienhe_post'));
// Nụ
Route::get('shippingCart', [
    'as' => 'shippingCart',
    'uses' => 'Pages@shippingCart'
    ]);

Route::get('removeSesstion', [
    'as' => 'removeSesstion',
    'uses' => 'Pages@removeSesstion'
    ]);

Route::get('removeItem/{product_id}', [
    'as' => 'removeItem',
    'uses' => 'Pages@removeItem'
    ]);

// Route::get('register', [
//     'as' => 'register',
//     'uses' => 'Pages@register'
//     ]);

// Route::post('registed', [
//     'as' => 'registed',
//     'uses' => 'Pages@registed'
//     ]);
// End Nụ
Route::get('hang-xe/{hang}', [
    'as' => 'brand',
    'uses' => 'Pages@brand'
    ]);
Route::post('gio-hang', [
    'as' => 'giohang',
    'uses' => 'Pages@cart'
    ]);
Route::post('gio-hang/update', [
    'as' => 'giohang_update',
    'uses' => 'Pages@giohang_update'
    ]);
Route::get('mua-hang', [
    'as' => 'muahang',
    'uses' => 'Pages@buy'
    ]);


Route::post('contact',[
    'before'=>'csrf',
    'as'=>'sendContact',
    'uses'=>'ContactsController@sendContact'
    ]);

Route::get('search/',[
    'as'=>'search',
    'uses'=>'SearchController@search',
    ]);

Route::get('facebooklogin',['as'=>'facebooklogin','uses'=>'MembersController@facebook_login']);


Route::get('getcss/{path}',function($path){
    $path = public_path().'/frontend/vp6t1/css/'.$path;

    if ($path){
        $response = Response::make(File::get($path));
        $response->header('Content-Type', 'text/css');
        $response->header('Content-Disposition', 'inline; filename="'.$path.'"');
        $response->header('Content-Transfer-Encoding', 'binary');
        $response->header('Cache-Control', 'public, max-age=864400, pre-check=864400');
        $response->header('Pragma', 'public');
        $response->header('Expires', date(DATE_RFC822,File::lastModified($path)+864400) );
        $response->header('Last-Modified', date(DATE_RFC822, File::lastModified($path)) );
        $response->header('Content-Length', filesize($path));
        return $response;

    }
    else return "";
});
Route::get('getjs/{path}',function($path){
    $path = public_path().'/frontend/vp6t1/js/'.$path;

    if ($path){
        $response = Response::make(File::get($path));
        $response->header('Content-Type', 'application/javascript');
        $response->header('Content-Disposition', 'inline; filename="'.$path.'"');
        $response->header('Content-Transfer-Encoding', 'binary');
        $response->header('Cache-Control', 'public, max-age=864400, pre-check=864400');
        $response->header('Pragma', 'public');
        $response->header('Expires', date(DATE_RFC822,File::lastModified($path)+864400) );
        $response->header('Last-Modified', date(DATE_RFC822, File::lastModified($path)) );
        $response->header('Content-Length', filesize($path));
        return $response;

    }
    else return "";
});
Route::get('getthumb/{path}',function($path){
    $path = public_path().'/images/thumbs/'.$path;

    if ($path){
        $response = Response::make(File::get($path));

        $response->header('Content-Type', 'image/png');
        $response->header('Content-Disposition', 'inline; filename="'.$path.'"');
        $response->header('Content-Transfer-Encoding', 'binary');
        $response->header('Cache-Control', 'public, max-age=864400, pre-check=864400');
        $response->header('Pragma', 'public');
        $response->header('Expires', date(DATE_RFC822,File::lastModified($path)+864400) );
        $response->header('Last-Modified', date(DATE_RFC822, File::lastModified($path)) );
        $response->header('Content-Length', filesize($path));
        return $response;

    }
    else return "";
});
Route::get('frontend_assets/images/{path}',function($path){
    $path = public_path().'/frontend_assets/images_store/'.$path;

    if ($path){
        $response = Response::make(File::get($path));

        $response->header('Content-Type', 'image/png');
        $response->header('Content-Disposition', 'inline; filename="'.$path.'"');
        $response->header('Content-Transfer-Encoding', 'binary');
        $response->header('Cache-Control', 'public, max-age=864400, pre-check=864400');
        $response->header('Pragma', 'public');
        $response->header('Expires', date(DATE_RFC822,File::lastModified($path)+864400) );
        $response->header('Last-Modified', date(DATE_RFC822, File::lastModified($path)) );
        $response->header('Content-Length', filesize($path));
        return $response;

    }
    else return "";
});
Route::get('feed','RssController@all');
Route::get('{slug}/feed','RssController@rss1');
Route::get('{slug1}/{slug}/feed','RssController@rss2');
Route::get('{slug2}/{slug1}/{slug}/feed','RssController@rss3');

Route::get('sitemap.xml','RssController@sitemap');
Route::get('theme',function(){
    return View::make('frontend.layouts.post')
    ->with('description',Config::get('admin::website.description'))
    ->with('title',Config::get('admin::website.title'))
    ->with('keywords',Config::get('admin::website.keywords'));
});
Route::get('thuxem',function(){
    $rootCat = Page::whereType(1)->whereSlug('san-pham')->whereSubtype('product')
    ->first();
    return dd($rootCat->toArray());
});


Route::get('theme',function(){
    return View::make('frontend.default.layouts.master');
});
Route::get('changedb',function(){
    $cats = Page::whereType(2)->get();
    foreach($cats as $cat){
        $cat->template = 'post';
        $cat->save();
    }
    return "OK;";
});
Route::get('feed','RssController@all');
Route::get('sitemap','RssController@sitemap');
Route::get('{slug}/feed','RssController@rss1');
Route::get('{slug1}/{slug}/feed','RssController@rss2');
Route::get('{slug2}/{slug1}/{slug}/feed','RssController@rss3');

Route::post('ec_analytic/pageviews',array('before'=>'csrf','uses'=>'Analytics@pageviews'));
// Link menu cate,danh mục sản phẩm sidebar,chi tiết sản phẩm
Route::get('{slug}',array('uses'=>'Pages@slug1'));
// End Link menu và danh mục sản phẩm sidebar
Route::get('{slug1}/{slug}',array('uses'=>'Pages@slug2'));
Route::get('{slug2}/{slug1}/{slug}',array('uses'=>'Pages@slug3'));

