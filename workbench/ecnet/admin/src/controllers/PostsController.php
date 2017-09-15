<?php

class PostsController extends BaseController {

	protected $post;

	public function __construct( Post $post ) {
		$this->post = $post;
		if ( Input::has( 'type' ) && Input::get( 'type' ) == 'product' ) {
			$this->img_option = [
			'w'      => EConfig::getValue( 'product', 'image_width' ),
			'h'      => EConfig::getValue( 'product', 'image_height' ),
			'w_t'    => EConfig::getValue( 'product', 'image_thumb_width' ),
			'h_t'    => EConfig::getValue( 'product', 'image_thumb_height' ),
			'locate' => EConfig::getValue( 'product', 'image_locate' ),
			];

		} else {
			$this->img_option = [
			'w'      => EConfig::getValue( 'posts', 'image_width' ),
			'h'      => EConfig::getValue( 'posts', 'image_height' ),
			'w_t'    => EConfig::getValue( 'posts', 'image_thumb_width' ),
			'h_t'    => EConfig::getValue( 'posts', 'image_thumb_height' ),
			'locate' => EConfig::getValue( 'posts', 'image_locate' ),
			];

		}

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function delete_image_ajax(){
		if(Request::ajax()){
			$id = Input::get('id_image');
			$image = PostImage::find($id);
			$page_id = $image->page;
			// echo "<pre>";
			// dd($image);
			if(!empty($image)){
				$img = 'images/posts/'.$image->image;
				if(File::exists($img)){
					File::delete($img);
				}else{
					exit;
				}
				$image->delete();
				$image_all = PostImage::where('page',$page_id)->get();
				$HTML = View::make('admin::admin.posts.image_related', ['image_all' => $image_all])->render();
				return json_encode($HTML); 
				

			}


		}
	}
	public function index() {
		$subType = (Input::has('type'))?Input::get('type'):'post';
		switch($subType){
			case 'post':
			$posts = $this->post->wheretype(2)->whereSubtype('post')->orderBy( 'created_at', 'DESC' )->get();
			break;
			case 'product':
			$posts = $this->post->product()->wheretype(2)->orderBy( 'created_at', 'DESC' )->get();
			break;
		}

		return View::make( 'admin::admin.posts.index', compact( 'posts' ) )
		->with( 'img_option', $this->img_option )
		->with( 'title', 'Quản lý bài viết' );
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		$post = new Post();
		if(Input::has('type')){
			$type = Input::get('type');
			switch($type){
				case 'product':
				$post->subtype = 'product';
				$post->template = 'post_product';
			}
		}

		$categories = Page::whereType(1)
		->whereSubtype('product')
		->whereParent('306')
		->whereNotIn('id',[260])
		->orderBy('title')->lists('title', 'id');

		$post->subtype = (Input::has('type'))?Input::get('type'):'post';
		return View::make( 'admin::admin.posts.create' )
		->with( 'title', 'Tạo bài viết mới' )
		->with('post',$post)
		->with('categories', $categories)
		->with( 'img_option', $this->img_option );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$input = Input::all();
		$featured = Input::get( 'featured' );
		// if(is_null(Input::get( 'featured' ))){
		// 	$featured = 0;
		// }else{
		// 	$featured =1;
		// }

		// $a = Input::get( 'featured' );

		if ( ! File::isDirectory( public_path() . '/images/posts' ) ) {
			File::makeDirectory( public_path() . '/images/posts' );
		}
		$validation = Validator::make( $input, Post::$rules );

		if ( $validation->passes() ) {
			$image_input = Input::get( 'image' );
			// lưu ảnh vào folder ảnh cho bài post

			//Kiểm tra sự tồn tại của link ảnh nguồn
			if ( $image_input == '' or ! File::isFile( public_path() . '/' . $image_input ) ) {
				return Redirect::back()
				->with( 'message', 'Bạn chưa upload ảnh cho bài viết' )
				->withInput();
			}
			$img_ex = File::extension( $image_input );
			// tạo tên cho file ảnh
			$image_name = Str::slug( Input::get( 'title' ) ) . "." . $img_ex;
			while ( File::isFile( public_path() . '/images/posts/' . $image_name ) ) {
				$image_name = Str::random( 3 ) . "_" . Str::slug( Input::get( 'title' ) ) . "." . $img_ex;

			}
			
			//Upload ảnh

			if ( Image::copy( $image_input, 'images/posts/' . $image_name ) == false ) {
				return "wrong with IMG COPY";
			};
			// Kết thúc lưu hình ảnh

			// Lưu bài viết
			$input = array(
				'title'            => Input::get( 'title' ),
				'type'             => 2,
				'subtype'          => Input::get( 'subtype' ),
				'parent'           => Input::get( 'parent' ),
				'body'             => Input::get( 'body' ),
				'lang'             => Input::get( 'lang' ),
				'featured'         => $featured,
				'published'        => 1,
				'description'      => strip_tags( Input::get( 'description' ) ),
				'meta_keywords'    => Input::get( 'meta_keywords' ),
				'meta_description' => Input::get( 'meta_description' ),
				'meta_title'       => Input::get( 'meta_title' ),
				'template'         => Input::get( 'template' ),
				'image'            => 'images/posts/' . $image_name,
				'slug'             => Input::get( 'title' ),
				);

			
			//Phần mở rộng

			if ( Input::has( 'youtube_id' ) ) {
				$input['youtube_id'] = Input::get( 'youtube_id' );

			}


			$post = $this->post->create( $input );

			if( Input::file('input_images') != null ){
				$uploadcount = 0;
				$files = Input::file('input_images');
				$file_count = count($files);
				if($file_count > 0 && $files[0] != null){
					foreach($files as $file) {
				        $rule_image = array('file' => 'mimes:jpeg,bmp,png,jpg'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
				        $validator = \Validator::make(array('file'=> $file), $rule_image);
				        if($validator->passes()){
				        	$destinationPath = 'images/posts';
				        	$extension = $file->getClientOriginalExtension();

				        	$filename = md5($file->getClientOriginalName() . date('Y-m-d H:i:s')) . '.' . $extension;
				        	$file->move($destinationPath, $filename);
				        	// move_uploaded_file($file->getClientOriginalName(), $destinationPath."/".$filename);
				        	$image_product = PostImage::create([
				        		'link' => '/'.$destinationPath."/".$filename,
				        		'name' => $filename,
				        		'page' => $post->id
				        		]);
				        	$uploadcount ++;
				        }

				        else {

				        	return Redirect::route( 'admin.posts.create' )
				        	->withInput()
				        	->withErrors( $validation )
				        	->with( 'message', 'There were validation errors.' );
				        }
				    }


				}
			}
			if(Input::has('properties')){
				$post->setProperties(Input::get('properties'));
			}

			// kết thúc phần mở rộng
			return Redirect::route( 'admin.posts.index', ['type' => $post->subtype]);
		}

		return Redirect::route( 'admin.posts.create' )
		->withInput()
		->withErrors( $validation )
		->with( 'message', 'There were validation errors.' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show( $id ) {
		return Redirect::route( 'admin.posts.index' );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit( $id ) {
		
		$post = $this->post->find( $id );
		if ( $post->subtype == 'product' ) {
			$this->img_option = [
			'w'      => EConfig::getValue( 'product', 'image_width' ),
			'h'      => EConfig::getValue( 'product', 'image_height' ),
			'w_t'    => EConfig::getValue( 'product', 'image_thumb_width' ),
			'h_t'    => EConfig::getValue( 'product', 'image_thumb_height' ),
			'locate' => EConfig::getValue( 'product', 'image_locate' ),
			];

		}
		if ( is_null( $post ) ) {
			return Redirect::route( 'admin.posts.index' )
			->with( 'title', 'posts: ' . $id );
		}
		$categories = Page::whereType(1)
		->whereSubtype('product')
		->whereParent('306')
		->whereNotIn('id',[260])
		->orderBy('title')->lists('title', 'id');

		return View::make( 'admin::admin.posts.edit', compact( 'post', 'categories' ) )
		->with( 'img_option', $this->img_option );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update( $id ) {
		$data = input::all();
		$input      = Input::except( '_method', 'tag', '_token', 'old_image','properties' );
		$input['featured'] = Input::get( 'featured' );
		// if(!Input::has('featured')){
		// 	$input['featured'] = 0;
		// }
		$validation = Validator::make( $input, Post::$rules );

		if ( $validation->passes() ) {
			$post        = $this->post->find( $id );
			$image_input = Input::get( 'image' );
			if ( $image_input ) {
				//Kiểm tra sự tồn tại của link ảnh
				if ( $image_input == '' or ! File::isFile( public_path() . '/' . $image_input ) ) {
					return Redirect::back()->with( 'message', 'Mời bạn Upload lại ảnh cho bài viết' );
				}
				//Tạo tên ảnh mới
				$img_ex     = File::extension( $image_input );
				$image_name = Str::slug( Input::get( 'title' ) ) . "." . $img_ex;
				$i          = 1;
				while ( File::isFile( public_path() . '/images/posts/' . $image_name ) ) {
					$image_name = Str::slug( Input::get( 'title' ) ) . "_" . $i . "." . $img_ex;
					$i ++;

				}
				if ( ! File::isDirectory( public_path() . '/images' ) ) {
					File::makeDirectory( public_path() . '/images' );
				}
				if ( ! File::isDirectory( public_path() . '/images/posts' ) ) {
					File::makeDirectory( public_path() . '/images/posts' );
				}

				//Xóa file ảnh cũ
				if ( File::isFile( public_path() . '/' . Input::get( 'old_image' ) ) ) {
					File::delete( public_path() . '/' . Input::get( 'old_image' ) );
				}

				if ( Image::copy( $image_input, 'images/posts/' . $image_name ) == false ) {
					return "wrong with IMG COPY";
				};
				$input['image'] = 'images/posts/' . $image_name;

			} else {
				$input['image'] = Input::get( 'old_image' );
			}


			// Lưu bài viết
			// echo "<pre>";
			// dd($input['featured']);
			$post->featured = $input['featured'];
			$post->title = $input['title'];
			$post->slug = $input['slug'];
			$post->description = $input['description'];
			$post->parent = $input['parent'];
			$post->body = $input['body'];
			$post->image = $input['image'];
			// $post->meta_title = $input['meta_title'];
			// $post->meta_keywords = $input['meta_keywords'];
			// $post->meta_description = $input['meta_description'];
			$post->save();

			if(Input::has('properties')){
				$post->setProperties(Input::get('properties'));
			}

			if( Input::file('input_images') != null ){
				$uploadcount = 0;
				$files = Input::file('input_images');
				$file_count = count($files);
				if($file_count > 0 && $files[0] != null){
					foreach($files as $file) {
				        $rule_image = array('file' => 'mimes:jpeg,bmp,png,jpg'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
				        $validator = \Validator::make(array('file'=> $file), $rule_image);
				        if($validator->passes()){
				        	$destinationPath = 'images/posts';
				        	$extension = $file->getClientOriginalExtension();
				        	$filename = md5($file->getClientOriginalName() . date('Y-m-d H:i:s')) . '.' . $extension;
				        	$file->move($destinationPath, $filename);
				        	$image_product = PostImage::create([
				        		'link' => "/".$destinationPath."/".$filename,
				        		'name' => $filename,
				        		'page' => $post->id
				        		]);
				        	$uploadcount ++;
				        }
				        else {
				        	return redirect()->back()
				        	->withErrors($validator)
				        	->withInput();
				        }
				    }
				}
			}

			if(Input::has('properties')){
				$post->setProperties(Input::get('properties'));
			}
			return Redirect::route( 'admin.posts.index', ['type' => $post->subtype])
			->with( 'message', 'Bạn đã sửa thành công bài viết: ' . $input['title'] );
		}

		return Redirect::route( 'admin.posts.edit', $id )
		->withInput()
		->withErrors( $validation )
		->with( 'message', 'There were validation errors.' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy( $id ) {
		$post = $this->post->find( $id );
		// File::delete(public_path().'/'.$post->image);
		$post->delete();

		return Redirect::route( 'admin.posts.index' )
		->with( 'message', 'Bạn đã xóa thành công bài viết: ' . $post->title );
	}

	public function trashed() {
		$posts = Post::onlyTrashed()->wheretype( 2 )->orderBy( 'created_at', 'DESC' )->get();

		return View::make( 'admin::admin.posts.trashed', compact( 'posts' ) )
		->with( 'img_option', $this->img_option )
		->with( 'title', 'Các viết đã xóa' );
	}

	public function restore( $id ) {
		$post = Post::onlyTrashed( $id );
		if ( $post->count() == 0 ) {
			return Redirect::back()
			->with( 'message', 'Không tìm thấy bài viết cần khôi phục' );
		}
		$post = $post->first();
		$slug = $post->slug;
		$i    = 1;
		while ( Post::whereslug( $post->slug )->count() > 0 ) {
			$post->slug = $slug . "_" . $i;
			$i ++;
		}
		$title = $post->title;
		$i     = 1;
		while ( Post::wheretitle( $post->title )->count() > 0 ) {
			$post->title = $title . "(" . $i . ")";
			$i ++;
		}

		$post->restore();

		return Redirect::route( 'admin.posts.trashed' )
		->with( 'message', 'Bạn đã khôi phục thành công bài viết' );
	}

	public function forcedelete( $id ) {
		$post = Post::onlyTrashed( $id );
		if ( $post->count() == 0 ) {
			return Redirect::back()
			->with( 'message', 'Không tìm thấy bài viết cần xóa' );
		}
		$post = $post->first();
		File::delete( public_path() . '/' . $post->image );
		$post->forceDelete();

		return Redirect::route( 'admin.posts.trashed' )
		->with( 'message', 'Bạn đã xóa hẳn bài viết: ' . $post->title );
	}

	public function copy( $id ) {

		$post = Post::find( $id );
		if ( $post->count() == 0 ) {
			return Redirect::route( 'admin.posts.index' )
			->with( 'message', 'Không tìm thấy bài viết cần copy' );
		}
		$i = 1;
		while ( Post::wheretitle( $post->title . '(' . $i . ')' )->count() > 0 ) {
			$i ++;
		}
		$post->title = $post->title . '(' . $i . ')';

		return View::make( 'admin::admin.posts.copy', compact( 'post' ) )
		->with( 'img_option', $this->img_option );
	}

	public function copy_post() {

		$input = Input::all();
		// return dd($input);
		$duong_dan_anh = public_path() . $this->img_option['locate'];
		//tao folder chua anh neu chua co
		if ( ! is_dir( $duong_dan_anh ) ) {
			mkdir( $duong_dan_anh );
		}

		$validation = Validator::make( $input, Post::$rules );

		if ( $validation->passes() ) {
			// Tạo slug
			$slug = Str::slug( Input::get( 'title' ) );
			if ( Post::whereslug( $slug )->count() > 0 ) {
				$slug = $slug . "_" . Str::random( 3 );
			}
			//Kiem tra su ton tai cua thu muc up anh bai viet
			$image_input = Input::get( 'image' );
			if ( ! File::isDirectory( public_path() . '/images/posts' ) ) {
				File::makeDirectory( public_path() . '/images/posts' );
			}
			// lưu ảnh vào folder ảnh cho bài post
			//Kiểm tra sự tồn tại của link ảnh
			if ( $image_input == '' or ! File::isFile( public_path() . "/" . $image_input ) ) {
				$ext = File::extension( Input::get( 'old_image' ) );

				$image = 'images/posts/' . $slug . '.' . $ext;
				$i     = 1;
				while ( File::isFile( public_path() . '/' . $image ) ) {
					$image = 'images/posts/' . $slug . $i . '.' . $ext;
					$i ++;
				}
				File::copy( Input::get( 'old_image' ), public_path() . '/' . $image );
			} else {

				$img_ex     = File::extension( $image_input );
				$image_name = $slug . "." . $img_ex;
				$i          = 1;
				while ( File::isFile( public_path() . '/images/posts/' . $image_name ) ) {
					$image_name = $slug . "_" . $i . "." . $ext;
					$i ++;

				}
				if ( Image::copy( $image_input, 'images/posts/' . $image_name ) == false ) {
					return "wrong with IMG COPY";
				}
				$image = 'images/posts/' . $image_name;

			}
			// Kết thúc lưu hình ảnh
			// Lưu bài viết
			$input = array(
				'title'       => Input::get( 'title' ),
				'type'        => 2,
				'parent'      => Input::get( 'parent' ),
				'body'        => Input::get( 'body' ),
				'featured'    => Input::get( 'featured' ),
				'published'   => Input::get( 'published' ),
				'description' => strip_tags( Input::get( 'description' ) ),
				'keywords'    => Input::get( 'keywords' ),
				'image'       => $image,
				'slug'        => $slug,
				);

			//Kết thúc tạo slug
			$this->post->create( $input );

			return Redirect::route( 'admin.posts.index' )
			->with( 'message', 'Bạn đã tạo thành công bài viết: ' . $input['title'] );
		}

		return Redirect::route( 'admin.posts.create' )
		->withInput()
		->withErrors( $validation )
		->with( 'message', 'There were validation errors.' );
	}

	/**
	 *Gallery Images Manager
	 */
	public function images($id){
		$post = Post::findOrFail($id);
		return View::make('admin::admin.posts.images')
		->withPost($post);
	}


	public function add_image_gallery( $id ) {
		if ( PostImage::uploadImage( $id, Input::file( 'image' ) ) ) {
			return Redirect::back()
			->with( 'message', 'Bạn đã thêm ảnh thành công vào thư viện ảnh.' );
		}
	}

	public function delete_image_gallery( $id ) {
		$image = PostImage::find( $id );
		if ( $image->count() > 0 ) {
			$image->deleteImage();

			return Redirect::back()
			->with( 'message', 'Bạn đã xóa ảnh thành công.' );
		} else {
			return Redirect::back()
			->with( 'message', 'Không tìm thấy ảnh cần xóa.' );
		}
	}
	public function order(){
		return View::make('admin::admin.posts.order');
	}

	public function ajaxOrder(){
		$data = (Input::json());
		Post::order($data);
		return "OK";
	}

}