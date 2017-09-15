<?php
use Laracasts\Flash\Flash;
class PagesController extends BaseController {

    protected $page;
    public $fe_path ;
	public $current_theme;

    public function __construct(Page $page)
    {
	    $this->current_theme = EConfig::getValue('website','theme');
        $this->page = $page;
	    if(!File::isDirectory(app_path().'/views/frontend/'.$this->current_theme)){
		    File::makeDirectory(app_path().'/views/frontend/'.$this->current_theme);
	    }
        $this->fe_path = app_path().'/views/frontend/'.$this->current_theme.'/pages';
    }

    /**
     * Display a listing of the Page.
     *
     * @return Response
     */
    public function index()
    {
        $pages = $this->page->all();

        return View::make('admin::admin.pages.index', compact('pages'))
        ->with('title','pages Manage');
    }

    /**
     * Show the form for creating a new Page.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.pages.create')
            ->with('title','Create a new pages');
    }

    /**
     * Store a newly created Page in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Page::$rules);

        if ($validation->passes())
        {
	        $slug = Input::get('slug');


	        $this->createViewPage( $slug );
            // Set homepage
            if(Input::has('homepage') && Input::get('homepage') == 1){
                Page::wherehomepage(1)->update(array('homepage'=>0));
            }
            $this->page->create($input);

            return Redirect::route('admin.pages.index');
        }

        return Redirect::route('admin.pages.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified Page.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $page = $this->page->findOrFail($id);

        return View::make('admin::admin.pages.show', compact('page'))
        ->with('title','pages: '.$page->id);
    }

    /**
     * Show the form for editing the specified Page.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $page = $this->page->find($id);

        if (is_null($page))
        {
            return Redirect::route('admin.pages.index')
                ->with('title','pages: '.$id);
        }

        return View::make('admin::admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified Page in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //return dd(File::allFiles($this->fe_path));
        $input = array_except(Input::all(), array('_method','body'));
        $validation = Validator::make($input, Page::$rules);

        if ($validation->passes())
        {

            $page = $this->page->find($id);
            if(Input::has('homepage') && Input::get('homepage') == 1){
                Page::wherehomepage(1)->update(array('homepage'=>0));
            }
            $page->update($input);

            return Redirect::route('admin.pages.index')
            ->with('message','Bạn đã cập nhật thành công!');
        }

        return Redirect::route('admin.pages.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified Page from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $page = $this->page->find($id);
	    if($page){
		    File::delete($this->fe_path.'/'.$page->slug.'.blade.php');

		    $page->delete_tree();
	    }
	    Flash::success('Bạn đã xóa thành công trang: '.$page->title);
        return Redirect::route('admin.pages.index');
    }
    public function order(){
        $data = (Input::json());
         Page::order(0,$data);
         return "OK";
    }
    public function delete($id){
        $page = $this->page->whereid($id);
        if($page->count() == 0)
            return Redirect::back();
        $page = $page->first();
        $page->delete_tree();
        return Redirect::back();
    }

	/**
	 * Create a view file for page
	 * @param $slug
	 */
	public function createViewPage( $slug ) {
		if ( ! File::isDirectory( $this->fe_path ) ) {
			File::makeDirectory( $this->fe_path );
		}
		if ( File::isFile( $this->fe_path . '/' . $slug . ".blade.php" ) ) {
			File::delete( $this->fe_path . '/' . $slug . ".blade.php" );
		}

		$content = "@extends('frontend." . $this->current_theme . ".layouts.master')";
		if ( Input::has( 'custom_head' ) ) {

			$content = "@extends('frontend.layouts.master')";
		}
		if ( Input::has( 'custom_head' ) ) {

			$content = "\n@section('head')" . $content . Input::get( 'custom_head' ) . "\n@stop";
		}
		if ( Input::has( 'custom_footer' ) ) {
			$content = "\n@section('footer')" . $content . Input::get( 'custom_footer' ) . "\n@stop";
		}

		$content = $content . "\n@section('content')
            " . Input::get( 'body' ) . "
            \n@stop";
		File::append( $this->fe_path . '/' . $slug . ".blade.php", $content );
	}

	public function createMenu($pageId){

		try{
			$page = Page::findOrFail($pageId);
		}catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e){
			Flash::error('Object not Found!');
		}

		Menu::create([
			'title'=>$page->title,
			'link' =>$page->slug,
			'pack' =>2,
		]);
		Flash::error('Tạo menu thành công!');

		return Redirect::back();
	}

}