<?php

class RSlidersElementsController extends BaseController {

    /**
     * Rsliderselement Repository
     *
     * @var Rsliderselement
     */
    public $cunit_id = 28;
    protected $rsliderselement;

    public function __construct(Rsliderselement $rsliderselement)
    {
        parent::__construct();
        $this->rsliderselement = $rsliderselement;
        Session::flash('cunit_id',$this->cunit_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rsliderselements = $this->rsliderselement->all();

        return View::make('admin::admin.rsliderselements.index', compact('rsliderselements'))
        ->with('title','rsliderselements Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.rsliderselements.create')
            ->with('title','Create a new rsliderselements');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Rsliderselement::$rules);

        if ($validation->passes())
        {
            $this->rsliderselement->create($input);

            return Redirect::back()
                ->with('message','Bạn đã thêm phần tử thành công');
        }

        return Redirect::back()
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'Có lỗi khi bạn nhập dữ liệu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $rsliderselement = $this->rsliderselement->findOrFail($id);

        return View::make('admin::admin.rsliderselements.show', compact('rsliderselement'))
        ->with('title','rsliderselements: '.$rsliderselement->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $rsliderselement = $this->rsliderselement->find($id);

        if (is_null($rsliderselement))
        {
            return Redirect::route('admin.rsliders.index')
                ->with('title','rsliderselements: '.$id.'Không tồn tại');
        }

        return View::make('admin::admin.rsliderselements.edit', compact('rsliderselement'));
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
        $validation = Validator::make($input, Rsliderselement::$rules);

        if ($validation->passes())
        {
            $rsliderselement = $this->rsliderselement->find($id);
            $rsliderselement->update($input);

            return Redirect::route('admin.rsliders.show',$rsliderselement->slider)
                ->with('message','Bạn đã cập nhật thành công');
        }

        return Redirect::route('admin.rsliderselements.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'Có lỗi trong vấn đề nhập liệu.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->rsliderselement->find($id)->delete();

        return Redirect::back()
        ->with('message','Bạn đã xóa thành công!!');
    }

}