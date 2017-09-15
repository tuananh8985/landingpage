<?php

class TemplatesController extends BaseController {

    /**
     * Template Repository
     *
     * @var Template
     */
    public $cunit_id = 23;
    public $fe_path; // Frontend Path
    protected $template;

    public function __construct(Template $template)
    {
        $this->template = $template;
        Session::flash('cunit_id',$this->cunit_id);
        $this->fe_path = $_SERVER['DOCUMENT_ROOT'].'/../app/views/frontend/templates/';

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $templates = $this->template->all();

        return View::make('admin::admin.templates.index', compact('templates'))
        ->with('title','templates Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin::admin.templates.create')
            ->with('title','Create a new templates');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Template::$rules);

        if ($validation->passes())
        {
            $title = Input::get('title');
            $dir = Input::get('directory');
            if(File::isDirectory($this->fe_path.$dir)){
                File::deleteDirectory($this->fe_path.$dir);
            }
            File::makeDirectory($this->fe_path.$dir);
            File::makeDirectory($this->fe_path.$dir.'/layouts');
            $this->template->create($input);

            return Redirect::route('admin.templates.index');
        }

        return Redirect::route('admin.templates.create')
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
        $template = $this->template->findOrFail($id);

        return View::make('admin::admin.templates.show', compact('template'))
        ->with('title','templates: '.$template->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $template = $this->template->find($id);

        if (is_null($template))
        {
            return Redirect::route('admin.templates.index')
                ->with('title','templates: '.$id);
        }

        return View::make('admin::admin.templates.edit', compact('template'));
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
        $validation = Validator::make($input, Template::$rules);

        if ($validation->passes())
        {
            $template = $this->template->find($id);
            $template->update($input);

            return Redirect::route('admin.templates.show', $id);
        }

        return Redirect::route('admin.templates.edit', $id)
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
        $this->template->find($id)->delete();

        return Redirect::route('admin.templates.index');
    }

    // Upload assets file for Template
    public function upload_asset(){
        $asset = Input::file('asset');
        // return dd(Input::all());
        $template = Template::find(Input::get('id'));
        // return dd($template);
        $rules = array(
            'asset'=>'required',
            );
        $Valid = Validator::make(Input::all(), $rules);
        if($Valid->passes()){
            $asset_file = $asset->move($_SERVER['DOCUMENT_ROOT'].'/temp',str_random(12).'.'.$asset->getClientOriginalExtension());
            $zip = new ZipArchive();
            if($zip->open($asset_file)){
                $asset_folder = $_SERVER['DOCUMENT_ROOT'].'/frontend/templates/'.$template->folder;
                if(File::isDirectory($asset_folder)){
                    File::deleteDirectory($asset_folder);
                }
                File::makeDirectory($asset_folder);
                $zip->extractTo($asset_folder);
                $zip->close();
                $template->update(array('asset_folder'=>'/frontend/templates/'.$template->folder));
            }
            return Redirect::back()->with('message','<strong>Thành công</strong>: Bạn đã upload thành công thư mục asset cho template.');
            
        }
    }
    //Create Layout
        public function create_layout($id){
        $template = Template::whereid($id)->first();

        return View::make('admin/templates/create_layout')
            ->with('template',$template);
    }


}