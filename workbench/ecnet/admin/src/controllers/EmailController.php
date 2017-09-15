<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 3/13/2015
 * Time: 10:54 AM
 */

class EmailController extends BaseController {


	public function index(){
		// $contents = Content::orderBy('title')->whereLang(Lang::getLocale())->get();

		$data = Contact::where('readed',5)->get();
		// echo "<pre>";
		// dd($data);
		return View::make('admin::admin.mail.index',compact('data'));
	}


	public function create(){
		return View::make('admin::admin.mail.create');
		   //  ->withTitle('Tạo nội dung mới');
	}

	public function store(){
		$input = Input::all();
		$rules = [
		'name'=>'required',
		'email'=>'required|unique:contacts'
		];
		$messages = array(
			'name.required'    => 'Vui lòng nhập tên',
			'email.required'    => 'Vui lòng nhập email',
			'email.unique'    => 'Email này đã tồn tại',
			);
		$valid = Validator::make($input, $rules, $messages);
		if($valid->passes()){
			$data = new Contact;
			$data->name = $input['name'];
			$data->email = $input['email'];
			$data->readed = 5;
			$data->save();
		}else{
			return Redirect::back()->withInput()
			->withErrors($valid);
		}
		return Redirect::route('admin.mail.index');
	}

	public function edit($id){
		$content = Contact::find($id);
		return View::make('admin::admin.mail.edit',compact('content'));
	}

	public function update($id){
		$input = Input::all();
		$rules = [
		'name'=>'required',
		'email'=>'required'
		];
		$messages = array(
			'name.required'    => 'Vui lòng nhập tên',
			'email.required'    => 'Vui lòng nhập email',
			);
		
		$valid = Validator::make($input, $rules, $messages);

		if($valid->passes()){
			// email ton tai
			$email_exit = Contact::where('email',Input::get('email'))->where('id','!=',$id)->get();
			if(count($email_exit) > 0){
				Session::flash('email_exit','Email này đã tồn tại');
				return Redirect::back()->withInput();
			}else{
				$content = Contact::findOrFail($id);
				$content->update($input);
			}
			// email ko ton tai

			
			return Redirect::route('admin.mail.index');

		}else{
			return Redirect::back()
			->withErrors($valid)->withInput();
		}

	}


	public function delete($id)
	{
		Contact::find($id)->delete();
		return Redirect::route('admin.mail.index');
	}
}