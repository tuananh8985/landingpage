<?php

class ProductsController extends BaseController {

    /**
     * Product Repository
     *
     * @var Product
     */
    public $cunit_id = 24;
    protected $product;
    public $img_option;

    public function __construct(Product $product)
    {
        parent::__construct();
        $this->product = $product;
        Session::flash('cunit_id',$this->cunit_id);
        $this->img_option = Config::get('admin::website.products.image');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->product->all();

        return View::make('admin::admin.products.index', compact('products'))
        ->with('title','products Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.products.create')
            ->with('title','Create a new products')
            ->with('img_option',$this->img_option);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Product::$rules);

        if ($validation->passes())
        {
            $this->product->create($input);

            return Redirect::route('admin.products.index');
        }

        return Redirect::route('admin.products.create')
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
        $product = $this->product->findOrFail($id);

        return View::make('admin::admin.products.show', compact('product'))
        ->with('title','products: '.$product->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);

        if (is_null($product))
        {
            return Redirect::route('admin.products.index')
                ->with('title','products: '.$id);
        }

        return View::make('admin::admin.products.edit', compact('product'));
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
        $validation = Validator::make($input, Product::$rules);

        if ($validation->passes())
        {
            $product = $this->product->find($id);
            $product->update($input);

            return Redirect::route('admin.products.show', $id);
        }

        return Redirect::route('admin.products.edit', $id)
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
        $this->product->find($id)->delete();

        return Redirect::route('admin.products.index');
    }

}