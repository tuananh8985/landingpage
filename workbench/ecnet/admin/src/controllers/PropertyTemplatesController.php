<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 5/13/2015
 * Time: 11:15 AM
 */

class PropertyTemplatesController extends BaseController{
	protected $formValid;

	function __construct(\Acme\Forms\PropertyForm $formValid ) {
		$this->formValid = $formValid;
	}

	public function index(){
		$properties = PropertyTemplate::orderBy('label')->get();
	    return View::make('admin::admin.propertytemplates.index',compact('properties'));
	}

	public function create(){
		$property = new PropertyTemplate();
	    return View::make("admin::admin.propertytemplates.create",compact('property'));
	}
	public function store(){
		$input = Input::all();
		$this->formValid->validate($input);
		$property = PropertyTemplate::create($input);
		return Redirect::route('admin.propertytemplates.index');
	}

	public function edit($id){
		$property = PropertyTemplate::find($id);
	    return View::make('admin::admin.propertytemplates.edit',compact('property'));
	}

	public function update($id){
		$property = PropertyTemplate::find($id);
		$input = Input::all();
		$this->formValid->updateValidate($input);
		$property->update($input);
		return Redirect::route('admin.propertytemplates.index');
	}
	public function destroy( $id ) {
		$property = PropertyTemplate::find($id);
		// File::delete(public_path().'/'.$post->image);
		$property->delete();

		return Redirect::route( 'admin.propertytemplates.index' )
		               ->with( 'message', 'Bạn đã xóa thành công bài viết');
	}
}