<?php
use App\Http\Requests;
require_once public_path() . '/min/lib/Minify/HTML.php';
// Bảng page gồm có type,subtype,template
// type=1,subtype=(post,product),template = (category,category_product)
// type=2,subtype=(post,product),template = (post,post_product)
class Pages extends BaseController {
	public $theme_path = 'frontend';
//	public $currentTheme = 'default';

	function __construct() {
		// tab_meta_them
		$omg_image_default = 'http://rikagaku.vn/images/logo_600_315.jpg';
		// tab_meta_them
		// get view layouts templade
		$this->currentTheme =  EConfig::getValue('website','theme');
		$this->theme_path = $this->theme_path.'.'.$this->currentTheme;
		// 1.Bài viết giới thiệu
		$intro =  Page::whereType( 2 )
		->whereSubtype('post')
		->where('featured',1)
		->orderBy( 'created_at', 'DESC' )
		->take(3)
		->get();
		// End 1.Bài viết giới thiệu
		// 2.Bài viết Ban Quản lý
		$manager =  Page::whereType( 2 )
		->whereSubtype('post')
		->where('featured',2)
		->orderBy( 'created_at', 'DESC' )
		->take(8)
		->get();
		// End 2.Bài viết Ban Quản lý
		// 3.Bài viết Tin Tức
		$news =  Page::whereType( 2 )
		->whereSubtype('post')
		->where('featured',3)
		->orderBy( 'created_at', 'DESC' )
		->take(4)
		->get();
		// End 2.Bài viết Ban Quản lý

		// ok top_news
		$top_news = Page::whereType( 2 )
		->whereSubtype( 'post' )
		->orderBy( 'created_at', 'DESC' )
		->where('featured',1)
		->where('slug', 'NOT LIKE', '%'.'lien-he'.'%')
		->where('slug', 'NOT LIKE', '%'.'gioi-thieu'.'%')
		->where('slug', 'NOT LIKE', '%'.'huong-dan-mua-hang'.'%')
		->whereNotIn('parent',[379])
		->get();

		// 2.Lay ra danh sach menu
		$menus = Menu::wherePack(2)->whereParent(0)
		-> orderBy('order')
		-> get();

		// echo "<pre>";
		// dd($menus);
		// 3.Lay ra bai viet top safe
		$top_safe = Page::whereType(2)
		->whereSubtype('post')
		->whereParent('379')
		->orderBy('created_at','DESC')
		->take(2)
		->get();
		// 4.Lay ra hang xe,va nhom theo value.
		$brands = Property::whereName('hangxe')
		->groupBy('value')
		->get();
		//5.ok.Lay ra danh sach menu sidebar co parent = 306
		// $productCategories = Page::whereType(1)
		// ->whereSubtype('product')
		// ->where('parent',0)
		// ->orderBy('id')->get();

		$productCategories = Page::whereType(1)
		->whereSubtype('product')
		->whereParent('306')
		->whereNotIn('id',[260])
		->orderBy('id')->get();
		// 6.Danh sách slide
		// $sliders = Slider::orderBy( 'order' )->get();
		$sliders = Slider::wherePack( 1 )->orderBy( 'order' )->take(12)->get();
		// 7.Lay ra các sản phẩm 
		$featuredPosts = Page::products()->orderBy('featured','DESC')
		->whereSubtype('product')
		->whereType(2);
		//8.Danh sách các sản phẩm nổi bật_Featured

		$featured_products = Page::whereType(2)
		->whereSubtype('product')
		->where('featured',1)
		->take(6)
		->orderBy('created_at','DESC')
		->get();
		// 9.Danh sách tin tức nổi bật
		$featured_news = Page::whereType(2)
		->whereSubtype('post')
		->where('featured',1)
		->where('slug', 'NOT LIKE', '%'.'lien-he'.'%')
		->where('slug', 'NOT LIKE', '%'.'gioi-thieu'.'%')
		->where('slug', 'NOT LIKE', '%'.'huong-dan-mua-hang'.'%')
		->whereNotIn('parent',[379])
		->take(6)
		->orderBy('created_at','DESC')
		->get();
		// 10.banner
		$banners = Slider::wherePack( 2 )->orderBy( 'order' )->take(12)->get();
		View::share('top_news', $top_news);
		View::share('menus', $menus);
		View::share('top_safe', $top_safe);
		View::share('brands', $brands);
		View::share('productCategories', $productCategories);
		View::share('sliders', $sliders);
		View::share('featuredPosts', $featuredPosts);
		View::share('featured_products', $featured_products);
		View::share('featured_news', $featured_news);
		View::share('banners', $banners);

		// templade landing page
		View::share('intro', $intro);
		View::share('manager', $manager);
		View::share('news', $news);

		// End templade landing page
		// tab_meta_them
		View::share('omg_image_default', $omg_image_default);
		// tab_meta_them
	}

	
	public function gioithieu(){
		$data =  Page::whereType( 2 )
		->whereSubtype('post')
		->where('featured',1)
		->orderBy( 'created_at', 'DESC' )
		->paginate(2);
		return View::make('frontend.default.element.menu.gioithieu',compact('data'));	
	}
	public function bandieuhanh(){
		$data =  Page::whereType( 2 )
		->whereSubtype('post')
		->where('featured',2)
		->orderBy( 'created_at', 'DESC' )
		->paginate(2);
		return View::make('frontend.default.element.menu.dieuhanh',compact('data'));	
	}

	public function tintuc(){
		$data =  Page::whereType( 2 )
		->whereSubtype('post')
		->where('featured',3)
		->orderBy( 'created_at', 'DESC' )
		->paginate(2);
		return View::make('frontend.default.element.menu.tintuc',compact('data'));	
	}

	public function huongdanmuahang(){
		$data = Page::where('slug','LIKE','%'.'huong-dan-mua-hang'.'%')->first();
		if($data){
			return View::make('frontend.default.element.menu.huongdanmuahang',compact('data'));	
		}else{
			return Redirect::to('/');
		}		
	}
	public function lienhe(){
		$data = Page::where('slug','LIKE','%'.'lien-he'.'%')->first();
		if($data){
			return View::make('frontend.default.element.menu.lienhe',compact('data'));	
		}else{
			return Redirect::to('/');
		}		
	}
	public function sanpham(){
		$data = Page::where('type',2)->where('subtype','product')->paginate(9);
		if($data){
			return View::make('frontend.default.element.menu.sanpham',compact('data'));	
		}else{
			return Redirect::to('/');
		}		
	}
	// public function tintuc(){
	// 	$data = Page::where('type',2)->where('subtype','post')
	// 	->where('slug', 'NOT LIKE', '%'.'lien-he'.'%')
	// 	->where('slug', 'NOT LIKE', '%'.'gioi-thieu'.'%')
	// 	->where('slug', 'NOT LIKE', '%'.'huong-dan-mua-hang'.'%')
	// 	->whereNotIn('parent',[379])
	// 	->orderBy('id','DESC')
	// 	->paginate(9);
	// 	if($data){
	// 		return View::make('frontend.default.element.menu.tintuc',compact('data'));	
	// 	}else{
	// 		return Redirect::to('/');
	// 	}		
	// }

	public function slug1( $slug ) {
		return $this->page( $slug );
	}

	public function slug2( $slug1, $slug ) {
		return $this->page( $slug );
	}

	public function slug3( $slug2, $slug1, $slug ) {
		return $this->page( $slug );
	}

	public function homepage() {
		$page = Page::wherehomepage( 1 );
		if ( $page->count() == 0 ) {
			return "Bạn chưa thiết lập trang chủ";
		} else {
			$page    = $page->first();

			$new_Posts = Page::Posts()->orderBy('created_at','DESC')
			->take(5)
			->get();
			$content = View::make( $this->theme_path.'.pages.' . $page->slug )
			->with( 'title', $page->meta_title )
			->with( 'description', $page->meta_description )
			->with( 'keywords', $page->meta_keywords )
			->with( 'page', $page )
			->with( 'robots', 'index,follow' )
			->with('new_Posts', $new_Posts);
			return $content;
			return Minify_HTML::minify( $content );
		}
	}

	public function page( $slug ) {
		// Cache giá trị tìm kiếm page
		if( Cache::has( 'page_' . $slug ) ) {
			$page = Cache::get( 'page_' . $slug );
		}else {
			$page = Page::whereslug( $slug );
			if ( $page->count() == 0 ) {
				return Redirect::to( '/' );
			} else {
				$page = $page->first();
			}
			Cache::add( 'page_' . $slug, $page, 1 );
		}

		// End
		if ( $page->type == 0 ) {
			// view frontend.default.pages.lien-he
			$content = View::make( $this->theme_path.'.pages.' . $page->slug )
			->with( 'page', $page )
			->with( 'title', $page->meta_title )
			->with( 'description', $page->meta_description )
			->with( 'robots', 'index,nofollow' )
			->with( 'keywords', $page->meta_keywords );
			//Return Bug if In Dev Environment
			if(Config::get('app.debug') == true);
			return $content;
			return  Minify_HTML::minify( $content );
		}
		if ( $page->type == 1 ) {
			if ($page->template == "" ) {
				//=>view frontend.default.layouts.category
				$template = 'frontend.'.$this->currentTheme.'.layouts.category';
			} else {
				// view frontend.default.layouts.category
				// or view frontend.default.layouts.category_product
				$template = 'frontend.'.$this->currentTheme.'.layouts.'.$page->template;

			}
			
			$content = View::make( $template )
			->with( 'page', $page )
			->with( 'title', $page->meta_title )
			->with( 'robots', 'noindex,follow' )
			->with( 'description', $page->meta_description )
			->with( 'keywords', $page->meta_keywords );
			//Return Bug if In Dev Environment
			if(Config::get('app.debug') == true);
			return $content;
			return  Minify_HTML::minify( $content );
		}
		if ( $page->type == 2 ) {
			if ( $page->template == "" ) {

				$template = 'frontend.'.$this->currentTheme.'.layouts.post';
				// view frontend.default.layouts.post
			} else {
				$template = 'frontend.'.$this->currentTheme.'.layouts.'.$page->template;
				// dd($template);
				// chi tiết bài viết:view frontend.default.layouts.post

				// or chi tiết sản phẩm:view frontend.default.layouts.post_product
			}
			// tab_meta_them=>thay lai link web tuong ung
			$omg_image = 'http://rikagaku.vn/'.$page->image;
			View::share('omg_image', $omg_image);
			// tab_meta_them
			$content = View::make( $template )
			->with( 'page', $page )
			->with( 'title', $page->meta_title )
			->with( 'description', $page->meta_description )
			->with( 'robots', 'index,nofollow' )
			->with( 'keywords', $page->meta_keywords );

			//Return Bug if In Dev Environment
			if(Config::get('app.debug') == true);
			return $content;
			return  Minify_HTML::minify( $content );
		}


		return "Có lỗi trong Cơ Sở Dữ liệu";
	}

	public function brand($hang){

		$properties = Property::whereTemplateId(7)
		->wherevalue($hang)
		->get();
		$products =[];
		foreach ( $properties as $property ) {
			$products[] = $property->page;
		}
		$page = new Page();


		return View::make('frontend.default.layouts.brain',compact('page','products','hang'));
	}
	// public function search(){

	// }

	// Nu
	public function giohang_update(){
		// Khi cập nhật lại giỏ hàng
		$cart = Session::get('cart.product');
		$all_list = Input::all();
		$id_list = Input::get('id');
		$quality_list = Input::get('quality');
		// Duyệt list id để lấy ra tương ứng
		foreach ($id_list as $key => $id) {
			if(array_key_exists ($id , $cart )){
				$quality = $quality_list[$id];
				$product = Page::whereType( 2 )
				->whereSubtype('product')
				->where('id', $id)
				->first();
				Session::put('cart.product.'.$id.'.id', $id);
				Session::put('cart.product.'.$id.'.quality', $quality);
				Session::put('cart.product.'.$id.'.price', (int)$product->getProperty('price'));
				Session::put('cart.product.'.$id.'.total', (int)($quality*$product->getProperty('price')));
			}
		}

		$cart = Session::get('cart.product');
		$total =0;
		foreach ($cart as $key) {
			$total += $key['total'];
		}
		Session::put('cart.total', $total);
		return View::make('frontend.default.pages.giohang');
	}
	public function cart(){
		$method = Request::method();
		// Khi thực hiện mua sản phẩm
		if (Request::isMethod('post'))
		{
			$product_id = Input::get('id');
			$quantity = Input::get('quantity');

			$page = new Page();
			$page->title = 'shopping cart';
			$product = Page::whereType( 2 )
			->whereSubtype('product')
			->where('id', $product_id)
			->first();
			if(!$product){
				return Redirect::route( 'home');
			}
		// Session::forget('cart');
			$cart = Session::get('cart.product');
			if(count($cart) > 0 && array_key_exists ($product->id , $cart )){
			// Nếu tồn tại sản phẩm =>Add thêm số lượng input
				$quality_curr = Session::get('cart.product.'.$product->id.'.quality') + $quantity;
				$total = $quality_curr*(int)$product->getProperty('price');
				

				Session::put('cart.product.'.$product->id.'.id', $product->id);
				Session::put('cart.product.'.$product->id.'.image', $product->image);
				Session::put('cart.product.'.$product->id.'.name', $product->title);
				Session::put('cart.product.'.$product->id.'.slug', $product->slug);
				Session::put('cart.product.'.$product->id.'.quality', $quality_curr);
				Session::put('cart.product.'.$product->id.'.price', (int)$product->getProperty('price'));
				Session::put('cart.product.'.$product->id.'.total', $total);

			}
			else{
			// Nếu chưa tồn tại sản phẩm=>Tạo mới và Add thêm số lượng input
				$quality_curr = $quantity;
				$total = $quality_curr*(int)$product->getProperty('price');
				Session::put('cart.product.'.$product->id.'.id', $product->id);
				Session::put('cart.product.'.$product->id.'.name', $product->title);
				Session::put('cart.product.'.$product->id.'.image', $product->image);
				Session::put('cart.product.'.$product->id.'.slug', $product->slug);
				Session::put('cart.product.'.$product->id.'.quality', $quantity);
				Session::put('cart.product.'.$product->id.'.price', (int)$product->getProperty('price'));
				Session::put('cart.product.'.$product->id.'.total',$total);
			}
			$cart = Session::get('cart.product');

			// echo "<pre>";
			// dd($cart);
			$total = 0;
			$quality = 0;
			foreach ($cart as $key) {
				$total += $key['total'];
				$quality += $key['quality'];
			}

			Session::put('cart.total', $total);
			Session::put('cart.quality', $quality);
			return View::make('frontend.default.pages.giohang', ['page' => $page]);
		}

		
	}
	public function shippingCart(){
		$page = new Page();
		$page->title = 'shopping cart';
		return View::make('frontend.default.pages.giohang', ['page' => $page]);
	}

	public function removeSesstion(){
		Session::forget('cart');
		return Redirect::route( 'shippingCart');
	}
	public function removeItem($product_id){
		$product = Page::whereType( 2 )
		->whereSubtype('product')
		->where('id', $product_id)
		->first();
		if(!$product){
			return Redirect::route( 'home' );
		}
		Session::forget('cart.product.'.$product_id);
		$cart = Session::get('cart.product');
		
		$total = 0;
		foreach($cart as $key) {
			$total += $key['total'];
		}

		Session::put('cart.total', $total);
		return Redirect::route( 'shippingCart');
	}



	public function register(){
		$input = Input::all();
		$validator = Validator::make($input, User::$rules_register_event, User::$mess_register_event);
		if ($validator->passes())
		{
			// lay ra ten ảnh
			$file_name = $input['image']->getClientOriginalName();
			// Lấy ra tên ảnh xem có tồn tại ko,nếu ko tồn tai=>tạo,Nếu tồn tại =>rename lại ảnh.
			$img_current = 'images/posts/'.$file_name;
			if(File::exists($img_current)){
				$length = 10;
				$randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);
				$file_name = $randomletter.'-'.$file_name;
				$input['image']->move('images/posts/',$file_name);
			}
			$url_image = 'image/posts/'.$file_name;
			$data = array(
				'name' => $input['name'],
				'email'  => $input['email'],
				'password'   => $input['password'],
				'phone'      => $input['phone'],
				'identification'      => $input['identification'],
				'address'      => $input['address'],
				'image'      => $url_image,
				'role'  =>0,
				'activated'  => 0,
				// role = 1 và activated = 1 =>admin đã active
				// role = 1 và activated = 0 =>admin chưa active
				// role = 0 và activated = 0 =>user chưa active
				// role = 0 và activated = 1 =>user đã active
			// 1 la admin
			// 0 la user
				);
			$user  = Sentry::createUser($data);
			return Redirect::route('home')->with('message_alert','Đăng ký thành viên thành công');
		}else{
			return Redirect::route('home')
			->withInput()
			->withErrors($validator)
			->with('message_alert','Kiểm tra lại thông tin đăng ký');
		}
		return View::make('frontend.default.pages.register');
	}

	public function registed(){

		$input = Input::all();
// Get email
		// 1.Email admin
		// $email_server = EConfig::getValue('contact','email_server');

		// if(empty($email_server)){
		// 	$email_server = 'mail_default.com.vn';
		// }
		$email_admin  = Contact::all();
		$email_client = Input::get('email');

		//2.Email Client
// Get email
		$rules = ShopCart::$rules;
		$cart = Session::get('cart');
		$list_mail_admin = Contact::where('readed',5)->get()->toArray();
		if(count($list_mail_admin) == 0){
			// Email admin mặc định khi chưa đăng ký
			$list_mail_admin = 'mail_default.com.vn';
		}

		$validation = Validator::make( $input, $rules);

		if ($validation->passes()){
			// 1.Send email admin
			Mail::send('emails.muahang.send_admin',['input'=>$input,'cart'=>$cart], function($message) use ($list_mail_admin)
			{

				if(is_array($list_mail_admin)){
					foreach ($list_mail_admin as $key => $value) {
						// $message->from($email_server, 'rikagaku.vn');
						$message->to($value['email']);
						$message->subject("Rikagaku-Thông báo đăng ký mua hàng thành công");
					}
				}else{
					// $message->from($email_server, 'rikagaku.vn');
					$message->to($list_mail_admin);
					$message->subject("Rikagaku-Thông báo đăng ký mua hàng thành công");
				}
			});
			// 2.Send email client
			Mail::send('emails.muahang.send_user',['input'=>$input,'cart'=>$cart], function($message) use ($email_client)
			{
				// $message->from($email_server, 'rikagaku.vn');

				$message->to($email_client);
				$message->subject("Rikagaku-Thông báo đăng ký mua hàng thành công");

			});

			if(isset($cart['product']) && count($cart['product'])> 0){
				$input['total'] = $cart['total'];
				$create = ShopCart::create($input);

				foreach ($cart['product'] as $key) {
					DetailCart::create([
						'cart_id' => $create->id,
						'product_id' => $key['id'],
						'quantity' => $key['quality'],
						'price' => $key['price']
						]);
				}
				Session::forget('cart');
				return Redirect::route('home')->with('cart_success', 'Bạn đăng ký thông tin thành công');
			}
		}
		return Redirect::back();
	}
	public function lienhe_post(){

		$input = Input::all();
		$rules = [
		'name'=>'required',
		'email'=>'required|email',
		'address'=>'required',
		'tel'=>'required',
		'title'=>'required',
		'message'=>'required',

		];
		$messages = array(
			'name.required'    => 'Vui lòng nhập họ và tên',
			'email.required'    => 'Vui lòng nhập email',
			'email.email'    => 'Vui lòng nhập đúng định dạng email',
			'address.required'    => 'Vui lòng nhập địa chỉ',
			'tel.required'    => 'Vui lòng nhập số điện thoại',
			'title.required'    => 'Vui lòng nhập tiêu đề',
			'message.required'    => 'Vui lòng nhập nội dung',
			);
		$list_mail_admin = Contact::where('readed',5)->get()->toArray();
		$email_client = Input::get('email');
		// $email_server = EConfig::getValue('contact','email_server');
		// if(empty($email_server)){
		// 	$email_server = 'mail_default.com.vn';
		// }
		if(count($list_mail_admin) == 0){
			// Email admin mặc định khi chưa đăng ký
			$list_mail_admin = 'mail_default.com.vn';
		}
		$valid = Validator::make($input, $rules, $messages);
		if($valid->passes()){
			// 1.Send email admin
			Mail::send('emails.lienhe.send_admin',['input'=>$input], function($message) use ($list_mail_admin)
			{
				if(is_array($list_mail_admin)){
					foreach ($list_mail_admin as $key => $value) {
						// $message->from($email_server, 'rikagaku.vn');
						$message->to($value['email']);
						$message->subject("Rikagaku-Thông báo gửi liên hệ thành công");
					}
				}else{
					// $message->from($email_server, 'rikagaku.vn');
					$message->to($list_mail_admin);
					$message->subject("Rikagaku-Thông báo gửi liên hệ thành công");
				}
			});
			// 2.Send email client
			Mail::send('emails.lienhe.send_user',['input'=>$input], function($message) use ($email_client)
			{
				$message->to($email_client);
				$message->subject("Rikagaku-Thông báo gửi liên hệ thành công");
			});
		}else{
			return Redirect::back()->withInput()
			->withErrors($valid);
		}
		Session::flash('send_contact_successs','Gửi liên hệ thành công');
		return Redirect::back();
	}
	// End Nu
	public function search(){
		$input_search = Input::get('keyword');
		$category_id = Input::get('category_id');

		$parent_category = Page::where('parent',0)->where('subtype','product')->first();
		if($parent_category){
			$parent_category_id = $parent_category->id;
		}
		// Seach theo tất cả
		if($category_id == 0){
			$product = Page::where('Subtype','product')
			->where('title','like','%'.$input_search.'%')
			->whereNotIn('parent',[0,$parent_category_id])
			->paginate(9);

			$product_all = Page::where('Subtype','product')
			->where('title','like','%'.$input_search.'%')
			->whereNotIn('parent',[0,$parent_category_id])
			->get();
		}else{
			// check category có tồn tại ko
			$category_exit = Page::where('id',$category_id)->where('parent',$parent_category_id)
			->get();
			if(count($category_exit) == 0){
				return Redirect::route('home');
			}else{
				$product = Page::where('Subtype','product')
				->where('title','like','%'.$input_search.'%')
				->whereNotIn('parent',[0])
				->where('parent',$category_id)
				->paginate(9);

				$product_all = Page::where('Subtype','product')
				->where('title','like','%'.$input_search.'%')
				->whereNotIn('parent',[0])
				->where('parent',$category_id)
				->get();
			}
			// Search theo danh mục

		}
		return View::make('frontend.default.element.menu.sanpham_search',compact('product','category_id','input_search','product_all'));

	}
}