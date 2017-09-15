<?php

class TagsController extends BaseController {

    /**
     * Tag Repository
     *
     * @var Tag
     */
    public $cunit_id = 25;
    protected $tag;

    public function __construct(Tag $tag)
    {
        parent::__construct();
        $this->tag = $tag;
        Session::flash('cunit_id',$this->cunit_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = $this->tag->all();

        return View::make('admin::admin.tags.index', compact('tags'))
        ->with('title','tags Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.tags.create')
            ->with('title','Create a new tags');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = $input = array_except(Input::all(), '_token');
        $validation = Validator::make($input, Tag::$rules);

        if ($validation->passes())
        {
            $this->tag->create($input);

            return Redirect::route('admin.tags.index');
        }

        return Redirect::route('admin.tags.create')
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
        $tag = $this->tag->findOrFail($id);

        return View::make('admin::admin.tags.show', compact('tag'))
        ->with('title','tags: '.$tag->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tag = $this->tag->find($id);

        if (is_null($tag))
        {
            return Redirect::route('admin.tags.index')
                ->with('title','tags: '.$id);
        }

        return View::make('admin::admin.tags.edit', compact('tag'));
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
        $validation = Validator::make($input, Tag::$rules);

        if ($validation->passes())
        {
            $tag = $this->tag->find($id);
            $tag->update($input);

            return Redirect::route('admin.tags.show', $id);
        }

        return Redirect::route('admin.tags.edit', $id)
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
        $this->tag->find($id)->delete();

        return Redirect::route('admin.tags.index');
    }
    public function add(){
        $tag = Input::get('tag');
        $valid =Validator::make(Input::all(), array('tag'=>'required|max:30|unique:tags,name'));
        if($valid->passes()){
            Tag::insert(array('name'=>$tag));
            return;
        }else
            return "khong add tag";
    }

}