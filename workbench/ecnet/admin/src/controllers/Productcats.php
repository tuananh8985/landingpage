<?php

class ProductcatsController extends BaseController {

    /**
     * Productcat Repository
     *
     * @var Productcat
     */
    public $cunit_id = 23;
    protected $productcat;

    public function __construct(Productcat $productcat)
    {
        $this->productcat = $productcat;
        Session::flash('cunit_id',$this->cunit_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $productcats = $this->productcat->all();

        return View::make('admin::admin.productcats.index', compact('productcats'))
        ->with('title','productcats Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.productcats.create')
            ->with('title','Create a new productcats');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Productcat::$rules);

        if ($validation->passes())
        {
            $this->productcat->create($input);

            return Redirect::route('admin.productcats.index');
        }

        return Redirect::route('admin.productcats.create')
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
        $productcat = $this->productcat->findOrFail($id);

        return View::make('admin::admin.productcats.show', compact('productcat'))
        ->with('title','productcats: '.$productcat->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $productcat = $this->productcat->find($id);

        if (is_null($productcat))
        {
            return Redirect::route('admin.productcats.index')
                ->with('title','productcats: '.$id);
        }

        return View::make('admin::admin.productcats.edit', compact('productcat'));
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
        $validation = Validator::make($input, Productcat::$rules);

        if ($validation->passes())
        {
            $productcat = $this->productcat->find($id);
            $productcat->update($input);

            return Redirect::route('admin.productcats.show', $id);
        }

        return Redirect::route('admin.productcats.edit', $id)
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
        $this->productcat->find($id)->delete();

        return Redirect::route('admin.productcats.index');
    }

}