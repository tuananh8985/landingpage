<?php

class PostcatalogsController extends BaseController {

	/**
	 * Postcatalog Repository
	 *
	 * @var Postcatalog
	 */
	public $cunit_id = 19;
	protected $postcatalog;
	public $img_option;

	public function __construct( Postcatalog $postcatalog ) {
		$this->postcatalog = $postcatalog;
		Session::flash( 'cunit_id', $this->cunit_id );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$homepage= Page::whereParent(0)->whereOrder(2)->wherehomepage(1)->first();
		$type         = $this->getRequestType();
		$postcatalogs = $this->postcatalog
			->whereSubtype( $type )
			->whereType( 1 )
			->whereParent(0)
			->whereLang( Lang::getLocale() )
			->orderBy( 'order' )->get();

//		$postcatalogs = $this->postcatalog->getall();
		return View::make( 'admin::admin.postcatalogs.index', compact( 'postcatalogs','homepage' ) )
		           ->with( 'title', 'postcatalogs Manage' );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		$type     = $this->getRequestType();
		$category = new Postcatalog();
		switch ( $type ) {
			case "product":
				$category->subtype = 'product';
			default:
				$category->subtype = 'post';
		}

		return View::make( 'admin::admin.postcatalogs.create' )
		           ->withCategory( $category )
		           ->with( 'title', 'Create a new postcatalogs' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$input = Input::all();
		// echo "<pre>";
		// dd($input);

		// custom input
		$input['slug'] = Str::slug( $input['title'] );
		$input['type'] = 1;
		$input['homepage'] = 1;
		//End custom inpute

		$validation = Validator::make( $input, Postcatalog::$rules );

		if ( $validation->passes() ) {
			$category = $this->postcatalog->create( $input );

			return Redirect::route( 'admin.postcatalogs.index', [ 'type' => $category->subtype ] );
		}

		return Redirect::route( 'admin.postcatalogs.create' )
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
		$postcatalog = $this->postcatalog->findOrFail( $id );

		return View::make( 'admin::admin.postcatalogs.show', compact( 'postcatalog' ) )
		           ->with( 'title', 'postcatalogs: ' . $postcatalog->id );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit( $id ) {
		$postcatalog = $this->postcatalog->find( $id );
		$parents     = Postcatalog::child_list( 0 );

		if ( is_null( $postcatalog ) ) {
			return Redirect::route( 'admin.postcatalogs.index' )
			               ->with( 'title', 'postcatalogs: ' . $id );
		}

		return View::make( 'admin::admin.postcatalogs.edit', compact( 'postcatalog' ) )
		           ->with( 'parents', $parents );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update( $id ) {
		//UpLoad Base Info
		$input = Input::only( 'title',
			'parent', 'lang', 'order', 'template',
			'description', 'meta_title', 'subtype',
			'meta_description', 'meta_keywords' );
		//Custom Input values
		$input['type'] = 1;
		$input['slug'] = Str::slug( $input['title'] );
		// End Custom Input
		$validation = Validator::make( $input, Postcatalog::$rules );

		if ( $validation->passes() ) {
			$postcatalog = $this->postcatalog->find( $id );
			$postcatalog->update( $input );


			//Upload Image if Exist
			if ( Input::file( 'image' ) ) {
				//create folder if not Exist
				if ( ! File::isDirectory( public_path() . '/images/categories' ) ) {
					File::makeDirectory( public_path() . '/images/categories' );
				}
				//Delete Old File
				if ( File::isFile( public_path( $postcatalog->image ) ) ) {
					File::delete( public_path( $postcatalog->image ) );
				}

				$image_folder = public_path() . '/images/categories';

				$image_input   = Input::file( 'image' );
				$image_exteion = $image_input->getClientOriginalExtension();
				$image_name    = Str::random( 8 ) . "-" . $postcatalog->slug . "." . $image_exteion;
				while ( File::isFile( $image_input . '/' . $image_name ) ) {
					$image_name = Str::random( 8 ) . "-" . $postcatalog->slug . "." . $image_exteion;

				}
				$image_input->move( $image_folder, $image_name );

				$postcatalog->image = '/images/categories/' . $image_name;
				$postcatalog->save();
			}

			//End Upload Image
			return Redirect::route( 'admin.postcatalogs.index' );
		}


		return Redirect::route( 'admin.postcatalogs.edit', $id )
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
		$cat = $this->postcatalog->find( $id );
		if ( $cat ) {
			$cat->delete_tree();
		}

		return Redirect::route( 'admin.postcatalogs.index' );
	}

	function quickdelete( $id ) {
		$cat = $this->postcatalog->find( $id );
		if ( $cat ) {
			$cat->delete_tree();
		}

		return Redirect::route( 'admin.postcatalogs.index' );
	}

	/**
	 * @return mixed|string
	 */
	public function getRequestType() {
		$type = ( Input::has( 'type' ) ) ? Input::get( 'type' ) : 'post';

		return $type;
	}

}