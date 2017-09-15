<?php

class SlidersController extends BaseController {

    /**
     * Slider Repository
     *
     * @var Slider
     */
    public $cunit_id = 17;
    protected $slider;
    public $img_option;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
        Session::flash('cunit_id',$this->cunit_id);
        $this->img_option = Config::get('admin::website.slider.image');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($Sliderspacks)
    {
        $pack = Sliderspack::find($Sliderspacks);
        if(is_null($pack)){
            return Redirect::route('admin.sliderspacks')
            ->with('title','Quản lý slider');
        }
        
        $sliders = $this->slider->wherepack($pack->id)->get();

        return View::make('admin::admin.sliders.index', compact('sliders'))
        ->with('title','sliders Manage')
        ->with('pack',$pack);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($Sliderspacks)
    {
        // Slider image option
        $pack = Sliderspack::find($Sliderspacks);
        if(is_null($pack)){
            return Redirect::route('admin.sliderspacks')
            ->with('title','Quản lý slider');
        }
        $img_option = array(
            'w'=>$pack->image_width,
            'h'=>$pack->image_height,
            'name'=>'slider_image',
            'locate'=>'slider',
            'w_t'=>$pack->image_width/2,
            'h_t'=>$pack->image_height/2,
            );

        // return dd($pack);

        return View::make('admin::admin.sliders.create')
        ->with('title','Tạo slider mới')
        ->with('img_option',$img_option)
        ->with('pack',$pack);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($Sliderspacks)
    {
        $input = Input::all();
        $validation = Validator::make($input, Slider::$rules);

        if ($validation->passes())
        {

            $image_input = Input::get('image');
            //Kiểm tra sự tồn tại của link ảnh
            if($image_input == '' or !File::isFile( public_path().'/'.$image_input)){
                return Redirect::back()->with('message','Bạn chưa upload ảnh cho Slider');
            }
            $img_ex = File::extension($image_input);
            $image_name = Str::slug(Input::get('title')).".".$img_ex;
            if(!File::isDirectory( public_path().'/images/sliders')){
                File::makeDirectory( public_path().'/images/sliders');
            }
            while(File::isFile(public_path()."/images/sliders/".$image_name)){
                $image_name = Str::random(3).'_'.Str::slug(Input::get('title')).".".$img_ex;
            }
            if(Image::copy($image_input,'images/sliders/'.$image_name)==false){
                return "wrong with IMG COPY";
            };

            $data = array(
                'title'=>Input::get('title'),
                'order'=>Input::get('order'),
                'body'=>Input::get('body'),
                'link'=>Input::get('link'),
                'pack'=>Input::get('pack'),
                'description'=>Input::get('description'),
                'image'=>'images/sliders/'.$image_name,
                );
            $this->slider->create($data);
            return Redirect::route('admin.sliderspacks.sliders.index',array('sliderspacks'=>$Sliderspacks));
        }
        return Redirect::route('admin.sliderspacks.sliders.create',$Sliderspacks)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'Có lỗi xảy ra.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $slider = $this->slider->findOrFail($id);

        return View::make('admin::admin.sliders.show', compact('slider'))
        ->with('title','sliders: '.$slider->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($Sliderspacks,$sliders)
    {

        $pack = Sliderspack::whereid($Sliderspacks);


        $slider = Slider::whereid($sliders);
        
        if (($slider->count() == 0) or ($pack->count() ==0))
        {
            return Redirect::route('admin.sliderspacks.index')
            ->with('title','Quản lý Slider');
        }
        
        $pack= $pack->first();
        $slider= $slider->first();
        $img_option = array(
            'w'=>$pack->image_width,
            'h'=>$pack->image_height,
            'name'=>'slider_image',
            'locate'=>'slider',
            'w_t'=>$pack->image_width/2,
            'h_t'=>$pack->image_height/2,
            );
        return View::make('admin::admin.sliders.edit', compact('slider'))->with('img_option',$img_option)
        ->with('pack',$pack);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($Sliderspacks,$id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Slider::$rules);
        $slider = Slider::whereid($id);
        $pack = Sliderspack::find($Sliderspacks);
        if(is_null($pack)){
            return Redirect::route('admin.sliderspacks')
            ->with('title','Quản lý slider');
        }

        if ($validation->passes())
        {
            $slider = $this->slider->find($id);
            if(Input::has('image')){
                File::delete( public_path().'/'.Input::get('old_image'));
            }
            $data = array(
                'title'=>Input::get('title'),
                'order'=>Input::get('order'),
                'body'=>Input::get('body'),
                'link'=>Input::get('link'),
                'pack'=>Input::get('pack'),
                'description'=>Input::get('description'),
                );
            $image_input = Input::get('image');
            //Kiểm tra sự tồn tại của link ảnh
            if($image_input != '' && File::isFile( public_path().'/'.$image_input)){
                $img_ex = File::extension($image_input);
                $image_name = Str::slug(Input::get('title')).".".$img_ex;
                if(!File::isDirectory( public_path().'/images/sliders')){
                    File::makeDirectory( public_path().'/images/sliders');
                }
                while(File::isFile(public_path()."/images/sliders/".$image_name)){
                    $image_name = Str::random(3).'_'.Str::slug(Input::get('title')).".".$img_ex;
                }
                if(Image::copy($image_input,'images/sliders/'.$image_name)==false){
                    return "wrong with IMG COPY";
                };
                $data['image']='images/sliders/'.$image_name;
            }
            

            

            $slider->update($data);

            return Redirect::route('admin.sliderspacks.sliders.index',array('sliderspacks'=>$pack->id))
            ->with('message','Bạn cập nhật thành công!!');
        }

        return Redirect::route('admin.sliderspacks.sliders.edit',array('sliderspacks'=>$pack->id,'sliders'=>'id'))
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'Có lỗi xảy ra.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($Sliderspacks,$id)
    {
     $slider = $this->slider->whereid($id);

     $pack = Sliderspack::find($Sliderspacks);
     if(is_null($pack)){
        return Redirect::route('admin.sliderspacks.index')
        ->with('title','Quản lý slider')
        ->with('message','Không tim thấy slider cần xóa');
    }
    $pack =$pack->first();  
    if($slider->count() == 0){
        return Redirect::route('admin.sliderspacks.sliders.index',array('sliderspacks'=>$pack->id));
    }
    $slider = $slider->first();
    File::delete( public_path().'/'.$slider->image);
    $slider->delete();

    return Redirect::route('admin.sliderspacks.sliders.index',array('sliderspacks'=>$pack->id))
    ->with('message','Xoá thành công!');
}

}