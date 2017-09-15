<?php

class RolesController extends BaseController {

    /**
     * Role Repository
     *
     * @var Role
     */
    public $cunit_id = 28;
    protected $role;

    public function __construct(Role $role)
    {
        parent::__construct();
        $this->role = $role;
        Session::flash('cunit_id',$this->cunit_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = $this->role->all();

        return View::make('admin::admin.roles.index', compact('roles'))
        ->with('title','roles Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.roles.create')
            ->with('title','Create a new roles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Role::$rules);

        if ($validation->passes())
        {
            $this->role->create($input);

            return Redirect::route('admin.roles.index');
        }

        return Redirect::route('admin.roles.create')
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
        $role = $this->role->findOrFail($id);

        return View::make('admin::admin.roles.show', compact('role'))
        ->with('title','roles: '.$role->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->role->find($id);

        if (is_null($role))
        {
            return Redirect::route('admin.roles.index')
                ->with('title','roles: '.$id);
        }

        return View::make('admin::admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Role::$rules);

        if ($validation->passes())
        {
            $role = $this->role->find($id);
            $role->update($input);

            return Redirect::route('admin.roles.show', $id);
        }

        return Redirect::route('admin.roles.edit', $id)
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
        $this->role->find($id)->delete();

        return Redirect::route('admin.roles.index');
    }

}