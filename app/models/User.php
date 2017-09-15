<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

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
	public static function createUser($input) {
		$data = array(
			'first_name' => $input['first_name'],
			'last_name'  => $input['last_name'],
			'password'   => $input['password'],
			'email'      => $input['email'],
			'activated'  => 1,
		);
		try {
			$user  = Sentry::createUser( $data );
			$group = Sentry::findGroupById( $input['group'] );
			$user->addGroup( $group );

			return true;

		} catch ( Cartalyst\Sentry\Users\LoginRequiredException $e ) {
			return 'Login field is required.';
		} catch ( Cartalyst\Sentry\Users\PasswordRequiredException $e ) {
			return 'Password field is required.';
		} catch ( Cartalyst\Sentry\Users\UserExistsException $e ) {
			return 'User with this login already exists.';
		} catch ( Cartalyst\Sentry\Groups\GroupNotFoundException $e ) {
			return 'Group was not found.';
		}
	}

}
