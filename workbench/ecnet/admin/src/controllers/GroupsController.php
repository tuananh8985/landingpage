<?php

class GroupsController extends BaseController {

    /**
     * Group Repository
     *
     * @var Group
     */
    public $cunit_id = 27;
    protected $group;

    public function __construct(Group $group)
    {
        parent::__construct();
        $this->group = $group;
        Session::flash('cunit_id',$this->cunit_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $groups = $this->group->all();

        return View::make('admin::admin.groups.index', compact('groups'))
        ->with('title','groups Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.groups.create')
            ->with('title','Create a new groups');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Group::$rules);

        if ($validation->passes())
        {
            $result =Group::createGroup(Input::get('name'),Input::get('roles'));
           if($result == true){
                return Redirect::route('admin.groups.index')
                    ->with('message','Bạn đã tạo thành công nhóm: '.Input::get('name'));
            }
            else{
                return Redirect::route('admin.groups.create')
                    ->withInput()
                    ->with('message', $result);
            }
        }

        return Redirect::route('admin.groups.create')
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
        $group = $this->group->findOrFail($id);

        return View::make('admin::admin.groups.show', compact('group'))
        ->with('title','groups: '.$group->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $group = Sentry::findGroupById($id);

        if (is_null($group))
        {
            return Redirect::route('admin.groups.index')
                ->with('title','groups: '.$id);
        }

        return View::make('admin::admin.groups.edit', compact('group'));
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
        $validation = Validator::make($input, Group::$rules);

        if ($validation->passes())
        {
            $mess = Group::updateGroup($id,Input::get('name'),Input::get('roles')); 
            if($mess == true){
                return Redirect::route('admin.groups.index')
                ->with('message','Bạn đã sửa thông tin thành công');
            }
            else
            {
                return Redirect::route('admin.groups.edit', $id)
                    ->withInput()
                    ->with('message',$mess);
            }
        }

        return Redirect::route('admin.groups.edit', $id)
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
        $this->group->find($id)->delete();

        return Redirect::route('admin.groups.index');
    }

}