<?php
class User extends Eloquent {
	public static $rules_register_event = array(
		'name'=>'required',
		'email'=>'required|unique:users,email',
		'password'=>'required',
		'phone'=>'required|numeric',
		'identification'=>'required',
		'address'=>'required',
		'image'=>'required',
		);
	public static $mess_register_event = array(
		 'name.required' => 'Tên không được để trống',
		 'email.required' => 'Email không được để trống',
		 'password.required' => 'Password không được để trống',
		 'phone.required' => 'Phone không được để trống',
		 'phone.numeric' => 'Phone phải là dáng số',
		 'identification.required' => 'Chứng minh thư hoặc mã số thuế  không được để trống',
		 'address.required' => 'Địa chỉ không được để trống',
		 'image.required' => 'Ảnh không được để trống',
		);

	public static $rules_login = array(
		'email'=>'required|max:30',
		'password'=>'required|max:30',
		'recaptcha_response_field' => 'recaptcha',
		);
	public static $rules_register = array(
		'email'=>'required|max:30|unique:users,email',
		'password'=>'required|max:30|confirmed',
		'first_name'=>'max:20',
		'last_name'=>'max:20',

		);
	public static $rules_edit = array(
		'email'=>'required|max:30',
		'first_name'=>'max:20',
		'last_name'=>'max:20',

		);
	public static $guest_register = array(
		'recaptcha_response_field' => 'required|recaptcha',
		'email'=>'required|max:30|unique:users,email',
		'password'=>'required|max:30|confirmed',
		'first_name'=>'max:10',
		'last_name'=>'max:20',

		);
	public function str_groups(){
		$groups = $this->getGroups();
		$str = "";
		foreach($groups as $group){
		}
	}
	public static function createUser($input){
		$data = array(
			'first_name'=>$input['first_name'],
			'last_name'=>$input['last_name'],
			'password'=>$input['password'],
			'email'=>$input['email'],
			'activated'=>1,
			);
		try {
			$user= Sentry::createUser($data);
			$group = Sentry::findGroupById($input['group']);
			$user->addGroup($group);
			return true;

		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			return 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			return 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			return 'User with this login already exists.';
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			return 'Group was not found.';
		}

	}
}