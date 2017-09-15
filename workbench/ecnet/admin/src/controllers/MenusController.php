<?php

class MenusController extends BaseController {

    /**
     * Menus Repository
     *
     * @var Menus
     */
    public $cunit_id = 9;
    protected $menus;

    public function __construct(Menu $menus)
    {
        parent::__construct();
        $this->menus = $menus;
        Session::flash('cunit_id',$this->cunit_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($menuspacks)
    {
        $pack = Menuspack::find($menuspacks);
        if(is_null($pack)){
            return Redirect::route('admin.menuspacks');
        }
        $menus = Menu::wherepack($menuspacks)->whereparent(0)->orderBy('order')->get();

        return View::make('admin::menus.index', compact('menus'))
        ->with('pack',$pack);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($menuspacks)
    {   
        $pack = Menuspack::find($menuspacks);
        if(is_null($pack)){
            return Redirect::route('admin.menuspacks')->with('message','Không tìm thấy dữ liệu cần tìm');
        }

        $parents = Menu::child_list(0,0,array($pack->id));
        $postion = Config::get('admin.menus.postion');
        return View::make('admin::menus.create')
            ->with('postion',$postion)
            ->with('parents',$parents)
            ->with('pack',$pack);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($menuspacks)
    {
        $input = Input::all();
        $validation = Validator::make($input, Menu::$rules);
        $pack = Menuspack::find($menuspacks);
        if(is_null($pack)){
            return Redirect::route('admin.menuspacks');
        }
        if (!$validation->fails())
        {
            $this->menus->create($input);

             return Redirect::route('admin.menuspacks.menus.index',$pack->id);
        }

        return Redirect::route('admin.menuspacks.menus.create',array('menuspacks'=>$menuspacks))
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'Có lỗi trong quá trình xử lý.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($menuspacks,$id)
    {
        $menu = $this->menus->findOrFail($id);

        return View::make('admin::menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($menuspacks,$id)
    {
        $pack = Menuspack::find($menuspacks);
        if(is_null($pack)){
            return Redirect::route('admin.menuspacks')->with('message','Không tìm thấy dữ liệu cần tìm');
        }
        $menus = $this->menus->find($id);
	    $parents = Menu::child_list(0,0,array($pack->id));
        $postion = Config::get('admin.menus.postion');

        if (is_null($menus))
        {
            return Redirect::route('admin.menuspacks.menus.index',$pack->id);
        }

        return View::make('admin::menus.edit', compact('menus'))
            ->with('parents',$parents)
            ->with('postion',$postion)
            ->with('pack',$pack);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($menuspacks,$id)
    {
        $pack = Menuspack::find($menuspacks);
        if(is_null($pack)){
            return Redirect::route('admin.menuspacks')->with('message','Không tìm thấy dữ liệu cần tìm');
        }
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Menu::$rules);

        if (!$validation->fails())
        {
            $menus = $this->menus->find($id);
            $menus->update($input);

            return Redirect::route('admin.menuspacks.menus.index',$pack->id);
        }

        return Redirect::route('admin.menus.edit', $id)
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
    public function destroy($menuspacks=0,$id)
    {
        if($this->menus->whereid($id)->count() == 0){
            return Redirect::route('admin.menus.index');
        }

        $this->menus->find($id)->delete_menu();

        return Redirect::back();
    }
     public function delete($id)
    {
        if($this->menus->whereid($id)->count() == 0){
            return Redirect::route('admin.menus.index');
        }

        $this->menus->find($id)->delete_menu();

        return Redirect::back();
    }

}