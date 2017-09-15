<?php

use Acme\Forms\RegistrationForm;

class RegistrationController extends \BaseController
{


    /**
     * @var RegistrationForm
     */
    private $registrationFom;

    function __construct(RegistrationForm $registrationFom)
    {

        $this->registrationFom = $registrationFom;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::check()){
            return Redirect::home();
        }
        return View::make('registration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::only('first_name','last_name','username', 'email', 'password');

        $this->registrationFom->validate(Input::all());

	    // Lựa chọn giữa xác thực email hay không

	    //Tạo tài khoản customer
        $user = User::createUser($input);


        Sentry::login($user);
	    // nội dung thông báo
	    $notice_title = 'Bạn đã đăng kí thành công!';
	    $notice_body = 'Chúng tôi đã gửi mail đến hòm thư bạn đăng kí tài khoản. Xin mời kiểm tra mail để kích hoạt tài khoản của mình';


        return View::make('frontend.layouts.notice')
	        ->withTitle($notice_title)
	        ->withBody($notice_body);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}