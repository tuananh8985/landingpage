<?php
namespace shop\admin;

use View;

class ProductsController extends AdminController {

	protected $productForm;

	function __construct( \Acme\Forms\Modules\ProductForm $productForm ) {
		$this->productForm = $productForm;
	}


	/**
	 * Display a listing of the products.
	 *
	 * @return Response
	 */
	public function index() {
		return View::make( 'shop::admin.products.index' );

	}

	public function ajaxGetAllProducts() {
		$iTotalRecords  = 2349;
		$iDisplayLength = intval( $_REQUEST['iDisplayLength'] );
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart  = intval( $_REQUEST['iDisplayStart'] );
		$sEcho          = intval( $_REQUEST['sEcho'] );

		$records           = array();
		$records["aaData"] = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		$status_list = array(
			array( "success" => "Publushed" ),
			array( "info" => "Not Published" ),
			array( "danger" => "Deleted" )
		);

		for ( $i = $iDisplayStart; $i < $end; $i ++ ) {
			$status              = $status_list[ rand( 0, 2 ) ];
			$id                  = ( $i + 1 );
			$records["aaData"][] = array(
				'<input type="checkbox" name="id[]" value="' . $id . '">',
				$id,
				'Test Product',
				'Mens/FootWear',
				'185.50$',
				rand( 5, 4000 ),
				'05/01/2011',
				'<span class="label label-sm label-' . ( key( $status ) ) . '">' . ( current( $status ) ) . '</span>',
				'<a href="ecommerce_products_edit.html" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>',
			);
		}

		if ( isset( $_REQUEST["sAction"] ) && $_REQUEST["sAction"] == "group_action" ) {
			$records["sStatus"]  = "OK"; // pass custom message(useful for getting status of group actions)
			$records["sMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}

		$records["sEcho"]                = $sEcho;
		$records["iTotalRecords"]        = $iTotalRecords;
		$records["iTotalDisplayRecords"] = $iTotalRecords;

		return json_encode( $records );
	}


	/**
	 * Show the form for creating a new products.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make( 'shop::admin.products.create' );

	}


	/**
	 * Store a newly created products in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$input = Input::only( 'name', 'domains_amount', 'duration', 'status', 'price' );
		$this->productForm->validate( $input );
		Product::create( $input );

		return Redirect::route( 'admin.products.index' )
		               ->withFlashMessage( 'Tạo sản phẩm mới thành công!' );


	}


	/**
	 * Display the specified products.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show( $id ) {
		//
	}


	/**
	 * Show the form for editing the specified products.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit( $id ) {
		$product = Product::findOrFail( $id );

		return View::make( 'modules.products.edit' )
		           ->withProduct( $product );

	}


	/**
	 * Update the specified products in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update( $id ) {

	}


	/**
	 * Remove the specified products from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy( $id ) {
		//
	}

	public function ajaxImageUpload() {

// Make sure file is not cached (as it happens for example on iOS devices)
		header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
		header( "Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . " GMT" );
		header( "Cache-Control: no-store, no-cache, must-revalidate" );
		header( "Cache-Control: post-check=0, pre-check=0", false );
		header( "Pragma: no-cache" );

		/*
		// Support CORS
		header("Access-Control-Allow-Origin: *");
		// other CORS headers if any...
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			exit; // finish preflight CORS requests here
		}
		*/

// 5 minutes execution time
		@set_time_limit( 5 * 60 );

// Uncomment this one to fake upload time
// usleep(5000);

// Settings
		$targetDir = public_path() . "/images/products";
//$targetDir = 'uploads';
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge       = 5 * 3600; // Temp file age in seconds


// Create target dir
		if ( ! file_exists( $targetDir ) ) {
			@mkdir( $targetDir );
		}

// Get a file name
		if ( isset( $_REQUEST["name"] ) ) {
			$fileName = $_REQUEST["name"];
		} elseif ( ! empty( $_FILES ) ) {
			$fileName = $_FILES["file"]["name"];
		} else {
			$fileName = uniqid( "file_" );
		}

		$fileExt  = pathinfo( $fileName, PATHINFO_EXTENSION );
		$fileName = "file_" . time() . "_" . rand( 1, 10000000 ) . '.' . strtolower( $fileExt );
		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

// Chunking might be enabled
		$chunk  = isset( $_REQUEST["chunk"] ) ? intval( $_REQUEST["chunk"] ) : 0;
		$chunks = isset( $_REQUEST["chunks"] ) ? intval( $_REQUEST["chunks"] ) : 0;


// Remove old temp files
		if ( $cleanupTargetDir ) {
			if ( ! is_dir( $targetDir ) || ! $dir = opendir( $targetDir ) ) {
				die( '{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}' );
			}

			while ( ( $file = readdir( $dir ) ) !== false ) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

				// If temp file is current file proceed to the next
				if ( $tmpfilePath == "{$filePath}.part" ) {
					continue;
				}

				// Remove temp file if it is older than the max age and is not the current file
				if ( preg_match( '/\.part$/', $file ) && ( filemtime( $tmpfilePath ) < time() - $maxFileAge ) ) {
					@unlink( $tmpfilePath );
				}
			}
			closedir( $dir );
		}


// Open temp file
		if ( ! $out = @fopen( "{$filePath}.part", $chunks ? "ab" : "wb" ) ) {
			die( '{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "' . $fileName . '"}' );
		}

		if ( ! empty( $_FILES ) ) {
			if ( $_FILES["file"]["error"] || ! is_uploaded_file( $_FILES["file"]["tmp_name"] ) ) {
				die( '{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "' . $fileName . '"}' );
			}

			// Read binary input stream and append it to temp file
			if ( ! $in = @fopen( $_FILES["file"]["tmp_name"], "rb" ) ) {
				die( '{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "' . $fileName . '"}' );
			}
		} else {
			if ( ! $in = @fopen( "php://input", "rb" ) ) {
				die( '{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "' . $fileName . '"}' );
			}
		}

		while ( $buff = fread( $in, 4096 ) ) {
			fwrite( $out, $buff );
		}

		@fclose( $out );
		@fclose( $in );

// Check if file has been uploaded
		if ( ! $chunks || $chunk == $chunks - 1 ) {
			// Strip the temp .part suffix off
			rename( "{$filePath}.part", $filePath );
		}

// Return Success JSON-RPC response
		die( '{"jsonrpc" : "2.0", "result" : "OK", "id" : "' . $fileName . '"}' );

	}

}
