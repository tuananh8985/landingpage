<?php

class RslidersController extends BaseController {

    /**
     * Rslider Repository
     *
     * @var Rslider
     */
    public $cunit_id = 27;
    protected $rslider;

    public function __construct(Rslider $rslider)
    {
        parent::__construct();
        $this->rslider = $rslider;
        Session::flash('cunit_id',$this->cunit_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rsliders = $this->rslider->all();

        return View::make('admin::admin.rsliders.index', compact('rsliders'))
        ->with('title','rsliders Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.rsliders.create')
            ->with('title','Create a new rsliders');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Rslider::$rules);

        if ($validation->passes())
        {
            $this->rslider->create($input);

            return Redirect::route('admin.rsliders.index');
        }

        return Redirect::route('admin.rsliders.create')
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
        $rslider = $this->rslider->findOrFail($id);

        return View::make('admin::admin.rsliders.show', compact('rslider'))
        ->with('title','rsliders: '.$rslider->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $rslider = $this->rslider->find($id);

        if (is_null($rslider))
        {
            return Redirect::route('admin.rsliders.index')
                ->with('title','rsliders: '.$id);
        }

        return View::make('admin::admin.rsliders.edit', compact('rslider'));
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
        $validation = Validator::make($input, Rslider::$rules);

        if ($validation->passes())
        {
            $rslider = $this->rslider->find($id);
            $rslider->update($input);

            return Redirect::route('admin.rsliders.show', $id);
        }

        return Redirect::route('admin.rsliders.edit', $id)
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
        $this->rslider->find($id)->delete();

        return Redirect::route('admin.rsliders.index');
    }

}