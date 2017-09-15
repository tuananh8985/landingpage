<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 1/19/2015
 * Time: 9:58 AM
 */

class ContactsController extends BaseController {
	public function index(){
		$contacts = Contact::orderBy('readed')->orderBy('created_at','DESC')->get();
		return View::make('admin::admin.contacts.index')
		           ->withContacts($contacts);
	}
	public function edit($id){
		$contact = Contact::findOrFail($id);
		$contact->readed = 1;
		$contact->save();
		return View::make('admin::admin.contacts.edit')
		           ->withContact($contact);
	}

	public function sendContact(){

		$valid = Validator::make(Input::all(),Contact::$rules);
		if($valid->passes()){
			$base_input = Input::only('name','company','address','tel','email','title','message');
			$message = Contact::create($base_input);
			return Redirect::back()
			               ->withFlashMessage('Cảm ơn bạn đã quan tâm tới chúng tôi! Chúng tôi sẽ trả lời lại bạn sớm nhất có thể!');
		}else{
			return Redirect::back()
			               ->withErrors($valid);
		}
	}

}