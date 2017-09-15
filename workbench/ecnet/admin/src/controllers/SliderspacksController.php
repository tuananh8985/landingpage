<?php

class SliderspacksController extends BaseController {

    /**
     * Sliderspack Repository
     *
     * @var Sliderspack
     */
    public $cunit_id = 25;
    protected $Sliderspack;

    public function __construct(Sliderspack $Sliderspack)
    {
        parent::__construct();
        $this->Sliderspack = $Sliderspack;
        Session::flash('cunit_id',$this->cunit_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Sliderspacks = $this->Sliderspack->all();

        return View::make('admin::admin.sliderspacks.index', compact('Sliderspacks'))
        ->with('title','Quản lý bộ Slider');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.sliderspacks.create')
            ->with('title','Tạo bộ slider mới');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Sliderspack::$rules);

        if ($validation->passes())
        {
            $this->Sliderspack->create($input);

            return Redirect::route('admin.sliderspacks.index');
        }

        return Redirect::route('admin.sliderspacks.create')
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
        $Sliderspack = $this->Sliderspack->findOrFail($id);

        return View::make('admin::admin.sliderspacks.show', compact('Sliderspack'))
        ->with('title','Sliderspacks: '.$Sliderspack->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $Sliderspack = $this->Sliderspack->find($id);

        if (is_null($Sliderspack))
        {
            return Redirect::route('admin.sliderspacks.index')
                ->with('title','Sliderspacks: '.$id);
        }

        return View::make('admin::admin.sliderspacks.edit', compact('Sliderspack'));
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
        $validation = Validator::make($input, Sliderspack::$rules);

        if ($validation->passes())
        {
            $Sliderspack = $this->Sliderspack->find($id);
            $Sliderspack->update($input);

            return Redirect::route('admin.sliderspacks.index');
        }

        return Redirect::route('admin.sliderspacks.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'Có lỗi trong quá trình xử lý.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->Sliderspack->find($id)->delete();

        return Redirect::route('admin.sliderspacks.index');
    }

}