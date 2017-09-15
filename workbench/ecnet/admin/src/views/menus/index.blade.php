@extends('admin::layouts.scaffold')
@section('head')
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/packages/ecnet/admin/assets/jquery-nestable/jquery.nestable.css" />
@stop
@section('footer')
<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/jquery-nestable/jquery.nestable.js"></script>
<script type="text/javascript">
    var output_json;
    function update_order(data){
        $.ajax({
            type: "POST",
            url: '{{URL::to('admin/menuspacks/update-order/'.$pack->id)}}',
            data: data,
            contentType:'application/json',
            success: function(e){console.log(e)},
            dataType: JSON
        });

    }
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target);
        if (window.JSON) {
            data = window.JSON.stringify(list.nestable('serialize'));
            update_order(data);
        } else {
            console.log('JSON browser support required for this demo.');
        }
    };
    $('#nestable_list_1').nestable({})
    .on('change', updateOutput);
</script>

@stop

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý menu</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/menuspacks')}}">Menus</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                {{$pack->name}}
            </li>
        </ul>
    </div>
</div>

<p><a style="display:none;" href="{{URL::route('admin.menuspacks.menus.create',array('menuspacks'=>$pack->id))}}" class="btn green" title="Add new Menu">Thêm menu mới <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>Admin Menus</h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">

                @if ($menus->count())
                <div class="dd" id="nestable_list_1">
                    <ol class="dd-list">
                        @foreach ($menus as $menu)
                        <li class="dd-item dd3-item" data-id="{{$menu->id}}">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content"><strong><a href="{{URL::to($menu->link)}}" class="tooltips" data-original-title="Xem thử đường dẫn" data-placement="right" title="">{{$menu->title}} // {{$menu->icon}} </a><a style="display:none;" class="pull-right tooltips" data-original-title="Xóa menu" data-placement="left"  href="{{URL::to('admin/menus/delete/'.$menu->id)}}" title=""><i class="icon-remove"></i>Delete</a>  <a style="display:none;" href="{{URL::to('admin/menuspacks/'.$pack->id.'/menus/'.$menu->id.'/edit')}}" class="pull-right tooltips" data-original-title="Edit" data-placement="left"><i class="icon-wrench"></i>Edit</a></strong></div>
                            @if($menu->childs()->count() > 0 )
                            <ol class="dd-list">
                                @foreach ($menu->childs()->orderBy('order')->get() as $menu)
                                <li class="dd-item dd3-item" data-id="{{$menu->id}}">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content"><strong><a href="{{URL::to($menu->link)}}" class="tooltips" data-original-title="Xem thử đường dẫn" data-placement="right" title="">{{$menu->title}} {{$menu->icon}}</a><a style="display:none;" class="pull-right tooltips" data-original-title="Xóa menu" data-placement="left"  href="{{URL::to('admin/menus/delete/'.$menu->id)}}" title=""><i class="icon-remove"></i>Delete</a>  <a style="display:none;" href="{{URL::to('admin/menuspacks/'.$pack->id.'/menus/'.$menu->id.'/edit')}}" class="pull-right tooltips" data-original-title="Edit" data-placement="left"><i class="icon-wrench"></i>Edit</a></strong></div>
                                    @if($menu->childs()->count() > 0 )
                                    <ol class="dd-list">
                                        @foreach ($menu->childs()->orderBy('order')->get() as $menu)
                                        <li class="dd-item dd3-item" data-id="{{$menu->id}}">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content"><strong><a href="{{URL::to($menu->link)}}" class="tooltips" data-original-title="Xem thử đường dẫn" data-placement="right" title="">{{$menu->title}} {{$menu->icon}}</a><a style="display:none;" class="pull-right tooltips" data-original-title="Xóa menu" data-placement="left"  href="{{URL::to('admin/menus/delete/'.$menu->id)}}" title=""><i class="icon-remove"></i>Delete</a>  <a style="display:none;" href="{{URL::to('admin/menuspacks/'.$pack->id.'/menus/'.$menu->id.'/edit')}}" class="pull-right tooltips" data-original-title="Edit" data-placement="left"><i class="icon-wrench"></i>Edit</a></strong></div>
                                        </li>
                                        @endforeach
                                    </ol>
                                    @endif
                                </li>
                                @endforeach
                            </ol>
                            @endif
                        </li>
                        @endforeach
                        
                    </ol>
                </div>

                @else
                There are no menus
                @endif
            </div>
        </div>
    </div>
</div>
<p><a style="display:none;" href="{{URL::route('admin.menuspacks.menus.create',array('menuspacks'=>$pack->id))}}" class="btn green" title="Add new Menu">Add new Menu <i class="icon-plus"></i></a></p>
@stop

