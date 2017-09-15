<?php

class MenuspacksController extends BaseController {

    /**
     * Menuspack Repository
     *
     * @var Menuspack
     */
    public $cunit_id = 24;
    protected $menuspack;

    public function __construct(Menuspack $menuspack)
    {
        parent::__construct();
        $this->menuspack = $menuspack;
        Session::flash('cunit_id',$this->cunit_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $menuspacks = $this->menuspack->all();

        return View::make('admin::admin.menuspacks.index', compact('menuspacks'))
        ->with('title','menuspacks Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.menuspacks.create')
            ->with('title','Create a new menuspacks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Menuspack::$rules);

        if ($validation->passes())
        {
            $this->menuspack->create($input);

            return Redirect::route('admin.menuspacks.index');
        }

        return Redirect::route('admin.menuspacks.create')
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
        $menuspack = $this->menuspack->findOrFail($id);

        return View::make('admin::admin.menuspacks.show', compact('menuspack'))
        ->with('title','menuspacks: '.$menuspack->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $menuspack = $this->menuspack->find($id);

        if (is_null($menuspack))
        {
            return Redirect::route('admin.menuspacks.index')
                ->with('title','menuspacks: '.$id);
        }

        return View::make('admin::admin.menuspacks.edit', compact('menuspack'));
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
        $validation = Validator::make($input, Menuspack::$rules);

        if ($validation->passes())
        {
            $menuspack = $this->menuspack->find($id);
            $menuspack->update($input);

            return Redirect::route('admin.menuspacks.show', $id);
        }

        return Redirect::route('admin.menuspacks.edit', $id)
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
        $this->menuspack->find($id)->delete();

        return Redirect::back();
    }
    public function updateorder($id){
        $data = (Input::json());
         Menuspack::quickorder(0,$data);
         return "OK";
    }


}