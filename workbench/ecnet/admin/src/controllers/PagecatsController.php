<?php

class PagecatsController extends BaseController {

    /**
     * Pagecat Repository
     *
     * @var Pagecat
     */
    public $cunit_id = 21;
    protected $pagecat;

    public function __construct(Pagecat $pagecat)
    {
        $this->pagecat = $pagecat;
        Session::flash('cunit_id',$this->cunit_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pagecats = $this->pagecat->all();

        return View::make('admin::admin.pagecats.index', compact('pagecats'))
        ->with('title','pagecats Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.pagecats.create')
            ->with('title','Create a new pagecats');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Pagecat::$rules);

        if ($validation->passes())
        {
            $this->pagecat->create($input);

            return Redirect::route('admin.pagecats.index');
        }

        return Redirect::route('admin.pagecats.create')
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
        $pagecat = $this->pagecat->findOrFail($id);

        return View::make('admin::admin.pagecats.show', compact('pagecat'))
        ->with('title','pagecats: '.$pagecat->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $pagecat = $this->pagecat->find($id);

        if (is_null($pagecat))
        {
            return Redirect::route('admin.pagecats.index')
                ->with('title','pagecats: '.$id);
        }

        return View::make('admin::admin.pagecats.edit', compact('pagecat'));
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
        $validation = Validator::make($input, Pagecat::$rules);

        if ($validation->passes())
        {
            $pagecat = $this->pagecat->find($id);
            $pagecat->update($input);

            return Redirect::route('admin.pagecats.show', $id);
        }

        return Redirect::route('admin.pagecats.edit', $id)
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
        $this->pagecat->find($id)->delete();

        return Redirect::route('admin.pagecats.index');
    }

}