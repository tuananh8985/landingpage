<?php

class MediacatsController extends BaseController {

    /**
     * Mediacat Repository
     *
     * @var Mediacat
     */
    public $cunit_id = 26;
    protected $mediacat;
    public  $media_folder;

    public function __construct(Mediacat $mediacat)
    {
        parent::__construct();
        $this->mediacat = $mediacat;
        Session::flash('cunit_id',$this->cunit_id);
        $this->media_folder = public_path().'/images/medias/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $mediacats = $this->mediacat->all();

        return View::make('admin::admin.mediacats.index', compact('mediacats'))
        ->with('title','mediacats Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.mediacats.create')
            ->with('title','Create a new mediacats');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        if(!File::isDirectory($this->media_folder)){
            File::makeDirectory($this->media_folder);
        }
        $validation = Validator::make($input, Mediacat::$rules);

        if ($validation->passes())
        {
            $folder = Str::slug(Input::get('name'));

            $data =array(
            'name'=>Input::get('name'),
            'parent'=>Input::get('parent'),
            'folder'=>$folder,
            );
            if(!File::isDirectory($this->media_folder.$folder))
                File::makeDirectory($this->media_folder.$folder);
            $this->mediacat->create($data);

            return Redirect::route('admin.mediacats.index');
        }

        return Redirect::route('admin.mediacats.create')
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

        $mediacat = $this->mediacat->findOrFail($id);
        $media_folder = $this->media_folder.$mediacat->folder;
        return View::make('admin::admin.mediacats.show', compact('mediacat'))
        ->with('title','mediacats: '.$mediacat->id)
        ->with('media_folder',$media_folder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $mediacat = $this->mediacat->find($id);

        if (is_null($mediacat))
        {
            return Redirect::route('admin.mediacats.index')
                ->with('title','mediacats: '.$id);
        }

        return View::make('admin::admin.mediacats.edit', compact('mediacat'));
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
        $validation = Validator::make($input, Mediacat::$rules);

        if ($validation->passes())
        {
            $mediacat = $this->mediacat->find($id);
            $mediacat->update($input);

            return Redirect::route('admin.mediacats.show', $id);
        }

        return Redirect::route('admin.mediacats.edit', $id)
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
        if(isset($_GET['file']) && isset($_GET['cat'])){
           $cat =  Mediacat::whereid($_GET['cat']);
            if($cat->count() == 0)
                return false;
            $cat = $cat->first();
            $upload_handler = new UploadHandler($cat);
            return;
        }
        $this->mediacat->find($id)->delete();

        return Redirect::route('admin.mediacats.index');
    }
    public function upload($id){
        $cat = Mediacat::whereid($id);
        if($cat->count() == 0) return false;
        $cat = $cat->first();
        $upload_handler = new UploadHandler($cat);
    }

}