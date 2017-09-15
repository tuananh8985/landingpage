@extends('admin::layouts.scaffold')
@section('footer')
    <script src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/jquery.form.js" ></script>

@endsection

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Sliders</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/sliderspacks')}}">Sliders</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>{{$pack->name}}</li>
        </ul>
    </div>
</div>
@if(Session::has('message'))
<div class="row-fluid">
    <div class="span12">
        <div class="alert alert-success">
            <button data-dismiss="alert" class="close"></button>
            {{Session::get('message')}}
        </div>
    </div>
</div>
@endif
<div class="portlet span12">
<!--     <div class="span8">
        <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                Tools
                <i class="icon-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#">Settings</a>
                    <a href="#" title="">D</a>
                </li>
                <li>
                    <a href="#">Preferences</a>
                </li>
                <li>
                    <a href="#">Window Options</a>
                </li>
                <li>
                    <a href="#">Help</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn red" title="Delete">
            Xóa
            <i class=" icon-remove"></i>
        </a>

    </div> -->
    <div class="span4">

        <a href="{{URL::route('admin.sliderspacks.sliders.create',array('sliderspacks'=>$pack->id))}}" class="btn green" title="Add new Sliders">
            Thêm mới
            <i class="icon-plus"></i>
        </a>
    </div>
</div>


<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Quản lý Sliders
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
                @if ($sliders->count())
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr>
                            <td>{{{ $slider->order }}}</td>
                            <td>{{{ $slider->title }}}</td>
                            <td>{{{ $slider->description }}}</td>
                            <td>
                                <img class = "thumbnail" style="width:90px" src="{{URL::to($slider->image)}}" alt=""></td>
                            <td>
                                <a href="{{URL::to('admin/sliderspacks/'.$pack->id.'/sliders/'.$slider->id.'/edit')}}" title="" class="btn blue">EDIT</a>
                            </td>
                            <td>
                                {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.sliderspacks.sliders.destroy','sliderspacks'=>$pack->id,'sliders'=>$slider->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
    There are no sliders
@endif
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="create-new-pack" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel1">Tạo bộ slider mới</h3>
    </div>
    <div class="modal-body">
        {{ Form::open(array('route' => 'admin.sliderspacks.store','class'=>'form-horizontal','id'=>'create_sliders_pack_form')) }}

        <div class="span12">
            <div class="row-fluid">
                <div class=" control-group">
                    <div class="control-label">
                        {{Form::label('name','Tên bộ slider',array('class'=>'control-label'))}}
                    </div>
                    <div class="controls">{{Form::text('name',"",array('class'=>'m-wrap span8'))}}</div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group">
                    <div class="control-label">
                        {{Form::label('description','Chú giải',array('class'=>'control-label'))}}
                    </div>
                    <div class="controls">
                        {{Form::textarea('description',"",array('class'=>'m-wrap span8','rows'=>3))}}
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group">
                    <div class="control-label">
                        {{Form::label('','Kích thước của ảnh',array('class'=>'control-label'))}}
                    </div>
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on">Width:</span>
                            {{Form::text('image_width',0,array('class'=>'m-wrap span2'))}}

                            <span class="add-on">Height:</span>
                            {{Form::text('image_height',0,array('class'=>'m-wrap span2'))}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        {{Form::submit('Tạo',array('class'=>'btn green'))}}
        {{Form::close()}}
    </div>
</div>
@stop