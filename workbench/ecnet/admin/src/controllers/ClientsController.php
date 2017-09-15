<?php

class ClientsController extends BaseController {

    /**
     * User Repository
     *
     * @var User
     */
    public $cunit_id = 14;
    protected $user;

    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    	
        $users = User::where('role',0)->get();
        return View::make('admin::admin.clients.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, User::$rules_register);

        if ($validation->passes())
        {
            $result = User::createUser($input);
            if($result ==true)
                return Redirect::route('admin.clients.index')
            ->with('message','bạn đã tạo thành công thành viên: '.$input['last_name']);
            else{
                return Redirect::route('admin.clients.create')
                ->withInput()
                ->withErrors($validation)
                ->with('message', $result);
            }
        }

        return Redirect::route('admin.clients.create')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        return View::make('admin::admin.clients.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);

        if (is_null($user))
        {
            return Redirect::route('admin.clients.index');
        }

        return View::make('admin::admin.clients.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(),array('_method','_token','group','new_password','new_password_confirmation'));
        $validation = Validator::make($input, User::$rules_edit);

        if ($validation->passes())
        {
            $user = $this->user->find($id);
            User::unguard();
            $user->update($input);

            if(Input::has('new_password')){
              $valid_password = Validator::make(Input::all(),[
                  ''=>'',
                  ]);
                // check pass exit
              $value = trim(Input::get('new_password')," ");

              if(Hash::check($value,Sentry::findUserById($id)->password)){
                    // password ok=>cho cập nhật
               $user = Sentry::findUserById($id);
               $user->update([
                'password'=>Input::get('new_password_confirmation'),
                ]);
           }else{
                    // pass ko đúng return back
            Session::flash('error_pass','Mật khẩu cũ không chính xác.');
            return Redirect::route('admin.clients.edit', $id)
            ->withInput();
        }
                // check pass exit
    }
    return Redirect::route('admin.clients.index');
}

return Redirect::route('admin.clients.edit', $id)
->withInput()
->withErrors($validation)
->with('message', 'There were validation errors.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->user->find($id)->delete();

        return Redirect::route('admin.clients.index');
    }
    public function logout(){
        Sentry::logout();
        return Redirect::to('admin/login');
    }

}