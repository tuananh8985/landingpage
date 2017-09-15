<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 3/13/2015
 * Time: 10:54 AM
 */

class ContentsController extends BaseController {


	public function index(){
		$contents = Content::orderBy('title')->whereLang(Lang::getLocale())->get();
	    return View::make('admin::admin.contents.index',compact('contents'));
	}


	public function create(){
	    return View::make('admin::admin.contents.create')
		    ->withTitle('Tạo nội dung mới');
	}

	public function store(){
		$input = Input::all();
		$valid = Validator::make($input,[
			'title'=>'required',
			'body'=>'required',
		]);
		if($valid->passes()){
			$content = $this->createContent( $input );

		}else{
			return Redirect::back()
				->withErrors($valid);
		}
		return Redirect::route('admin.contents.index');
	}

	public function edit($id){
	    $content = Content::findOrFail($id);
		return View::make('admin::admin.contents.edit',compact('content'));
	}

	public function update($id){
		$input = Input::all();
		$valid = Validator::make($input,[
			'title'=>'required',
			'body'=>'required',
		]);
		if($valid->passes()){
			$content = Content::findOrFail($id);
			$content->update($input);
			return Redirect::route('admin.contents.index');

		}else{
			return Redirect::back()
			               ->withErrors($valid);
		}

	}


	public function delete($id){
	    try{
		    $content = Content::findOrFail($id);
		    return View::make('admin::admin.contents.delete',compact('content'));
	    }catch (Exception $e){
		    return Redirect::back();
	    }

	}
	public function delete_process($id){
	    try{
		    $content = Content::findOrfail($id)
		    ->delete();
		    return Redirect::route('admin.contents.index');
	    }catch (Exception $e){
		    return Redirect::route('admin.contents.index');
	    }
	}

	/**
	 * @param $input
	 *
	 * @return static
	 */
	public function createContent( $input ) {
		$input['slug'] = Str::slug( $input['title'] );
		while ( Content::whereSlug( $input['slug'] )->count() ) {
			$input['slug'] = Str::slug( $input['title'] . '-' . Str::random( '5' ) );
		}
		$content = Content::create( $input );

		return $content;
	}
}