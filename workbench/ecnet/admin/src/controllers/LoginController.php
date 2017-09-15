<?php
class LoginController extends Controller {

	public function getIndex(){
		return View::make('admin::admin.login');
	}
	public function postIndex(){
		// return dd(Input::all());
		$Valid = Validator::make(Input::all(),User::$rules_login);
		if($Valid->passes()){
			try
			{

		    	// Set login credentials
		    	$credentials = array(
		        	'email'    => Input::get('email'),
		        	'password' => Input::get('password'),
		    	);		

		    	// Try to authenticate the user
		   	 	$user = Sentry::authenticate($credentials, false);
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
		    	return Redirect::to('admin/login')->with('message','Bạn hãy nhập đầy đủ thông tin');
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
		    	return Redirect::to('admin/login')->with('message','Bạn chưa nhập mật khẩu');
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
			{
		    	return Redirect::to('admin/login')->with('message','Bạn nhập sai mật khẩu');
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
		    	return Redirect::to('admin/login')->with('message','Không tìm thấy tài khoản của bạn');
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
		    	return Redirect::to('admin/login')->with('message','Tài khoản của bạn chưa kích hoạt');
			}		

			// The following is only required if throttle is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
		    	return Redirect::to('admin/login')->with('message','Tài khoản bị tạm khóa');
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
		    	return Redirect::to('admin/login')->with('message','Tài khoản bị khóa');
			}
			if(Input::has('remember')){
				Sentry::authenticateAndRemember($credentials);
			}
			return Redirect::to('admin');

		}else{
			return Redirect::to('admin/login')->with('message','Bạn hãy nhập đầy đủ thông tin');
		}
			
	}


}