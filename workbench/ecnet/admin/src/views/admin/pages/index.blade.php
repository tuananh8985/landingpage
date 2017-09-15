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
            url: '{{URL::to('admin/pages/order')}}',
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
        $('#nestable_list_1').nestable({'maxDepth':2})
            .on('change', updateOutput);
    </script>
@stop

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Trang đơn</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/pages')}}">pages</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>Danh sách trang đơn</li>
        </ul>
    </div>
</div>
<p>
    <a href="{{URL::route('admin.pages.create')}}" class="btn green" title="Add new Pages">
        Thêm trang mới
        <i class="icon-plus"></i>
    </a>
</p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Quản lý Trang
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
                @if ($pages->count())
                <div class="dd" id="nestable_list_1">
                    <ol class="dd-list">
                        @foreach (Page::whereparent(0)->wheretype(0)->orderBy('order')->get() as $item)
                        <li class="dd-item dd3-item" data-id="{{$item->
                            id}}">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content"> <strong><a href="{{URL::to($item->full_link())}}" class="tooltips" data-original-title="Xem thử đường dẫn" data-placement="right" title="">{{$item->title}}
                                @if($item->homepage)
                                <i class="icon-star"></i>
                                @endif
                            </a>
                                    <a class="pull-right tooltips" data-original-title="Xóa menu" data-placement="left"  href="{{URL::to('admin/pages/delete/'.$item->
                                        id)}}" title="">
                                        <i class="icon-remove"></i>
                                        Delete
                                    </a>
                                    <a href="{{URL::route('admin.pages.edit',$item->
                                        id)}}" class="pull-right tooltips" data-original-title="Edit" data-placement="left">
                                        <i class="icon-wrench"></i>
                                        Edit
                                    </a></strong> 
                            </div>
                            @if($item->child()->count() >0 )
                            <ol class="dd-list">
                                @foreach($item->child()->orderBy('order')->get() as $item)
                                <li class="dd-item dd3-item" data-id="{{$item->
                                    id}}">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content"> <strong><a href="{{URL::to($item->full_link())}}" class="tooltips" data-original-title="Xem thử đường dẫn" data-placement="right" title="">{{$item->title}}
                                        @if($item->homepage)
                                        <i class="icon-star"></i>
                                        @endif
                                    </a>
                                            <a class="pull-right tooltips" data-original-title="Xóa menu" data-placement="left"  href="{{URL::to('admin/pages/delete/'.$item->
                                                id)}}" title="">
                                                <i class="icon-remove"></i>
                                                Delete
                                            </a>
                                            <a href="{{URL::route('admin.pages.edit',$item->
                                                id)}}" class="pull-right tooltips" data-original-title="Edit" data-placement="left">
                                                <i class="icon-wrench"></i>
                                                Edit
                                            </a></strong> 
                                    </div>
                                    @if($item->child()->count() >0 )
                                    <ol class="dd-list">
                                        @foreach($item->child()->orderBy('order')->get() as $item)
                                        <li class="dd-item dd3-item" data-id="{{$item->
                                            id}}">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">
                                                <strong>
                                                    <a href="{{URL::to($item->full_link())}}" class="tooltips" data-original-title="Xem thử đường dẫn" data-placement="right" title="">{{$item->title}}
                                                        @if($item->homepage)
                                                        <i class="icon-star"></i>
                                                        @endif
                                                    </a>
                                                    <a class="pull-right tooltips" data-original-title="Xóa menu" data-placement="left"  href="{{URL::to('admin/pages/delete/'.$item->
                                                        id)}}" title="">
                                                        <i class="icon-remove"></i>
                                                        Delete
                                                    </a>
                                                    <a href="{{URL::route('admin.pages.edit',$item->
                                                        id)}}" class="pull-right tooltips" data-original-title="Edit" data-placement="left">
                                                        <i class="icon-wrench"></i>
                                                        Edit
                                                    </a>
                                                </strong>
                                            </div>
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
    There are no pages
@endif
            </div>
        </div>
    </div>
</div>
@stop