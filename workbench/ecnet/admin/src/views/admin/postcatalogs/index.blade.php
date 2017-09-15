@extends('admin::layouts.scaffold')
@section('head')
<link rel="stylesheet" type="text/css"
href="{{URL::to('/')}}/packages/ecnet/admin/assets/jquery-nestable/jquery.nestable.css"/>
@endsection
@section('footer')
<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/jquery-nestable/jquery.nestable.js"></script>
<script type="text/javascript">
    var output_json;
    function update_order(data) {
        $.ajax({
            type: "POST",
            url: '{{URL::to('admin/pages/order')}}',
            data: data,
            contentType: 'application/json',
            success: function (e) {
                console.log(e)
            },
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
    $('#nestable_list_1').nestable({'maxDepth': 2})
    .on('change', updateOutput);
</script>
@stop

@section('main')
<div class="row-fluid">
    <div class="span12">
        @if(Input::has('type'))
        @if(Input::get('type') == 'product')
        <h3 class="page-title">Quản lý Danh mục sản phẩm</h3>
        @endif
        @else
        <h3 class="page-title">Quản lý Danh mục bài viết</h3>
        @endif
        <ul class="breadcrumb">
            <li><i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                @if(Input::has('type'))
                @if(Input::get('type') == 'product')
                <a href="{{URL::to('admin/postcatalogs')}}">Danh mục sản phẩm</a>
                @endif
                @else
                <a href="{{URL::to('admin/postcatalogs')}}">Danh mục bài viết</a>
                @endif
            </li>
        </ul>
    </div>
</div>
<?php
$type = ( Input::has( 'type' ) ) ? Input::get( 'type' ) : 'post';
$get_type=Input::get('type'); 
?>
<p>
    @if($get_type === 'product')
    <a href="{{URL::route('admin.postcatalogs.create',['type'=>$type])}}" class="btn green"
      title="Add new Postcatalogs">Thêm danh
      mục <i class="icon-plus"></i></a>
      @endif

  </p>
  <div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>
                    Các danh mục đã tạo
                </h4>

                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
                @include('flash::message')

                @if ($postcatalogs->count())
                <div class="dd" id="nestable_list_1">
                    <ol class="dd-list">
                        @foreach ($postcatalogs as $item)
                        <li class="dd-item dd3-item" data-id="{{$item->
                            id}}">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content"><strong>
                                <a href="" class="tooltips"
                                data-original-title="Xem thử đường dẫn" data-placement="right"
                                title="">
                                {{$item->title}} ({{$item->all_posts(false)->count()}})
                                // {{$item->getLang()}}
                            </a>
                            @if($get_type === 'product')
                            <a class="pull-right tooltips" data-original-title="Xóa menu"
                            data-placement="left" href="{{URL::to('admin/postcatalogs/delete/'.$item->
                            id)}}" title="">
                            <i class="icon-remove"></i>
                            Delete
                        </a>
                        @endif
                       @if($get_type === 'product')
                        <a href="{{URL::route('admin.postcatalogs.edit',$item->
                            id)}}" class="pull-right tooltips" data-original-title="Edit"
                            data-placement="left">
                            <i class="icon-wrench"></i>
                            Edit
                        </a>
                        @endif
                    </a>
                 <!--   @if($get_type === 'product')
                    <a href="/admin/pages/{{$item->id}}/create-menu" class="pull-right"><i class="icon-external-link"></i>Tạo menu
                    </a>
                    @endif -->
                </strong>
            </div>
            @if($item->child()->count() >0 )
            <ol class="dd-list">
                @foreach($item->child()->orderBy('order')->get() as $item)
                <li class="dd-item dd3-item" data-id="{{$item->
                    id}}">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content"><strong>
                        <a href="{{URL::to($item->full_link())}}"
                           class="tooltips"
                           data-original-title="Xem thử đường dẫn"
                           data-placement="right" title="">
                           {{$item->title}}
                           ({{$item->all_posts(false)->count()}})
                           // {{$item->getLang()}}
                       </a>
                      @if($get_type === 'product')
                       <a class="pull-right tooltips"
                       data-original-title="Xóa menu" data-placement="left"
                       href="{{URL::to('admin/postcatalogs/delete/'.$item->
                       id)}}" title="">
                       <i class="icon-remove"></i>
                       Delete
                   </a>
                   @endif
                  @if($get_type === 'product')
                   <a href="{{URL::route('admin.postcatalogs.edit',$item->
                    id)}}" class="pull-right tooltips" data-original-title="Edit"
                    data-placement="left">
                    <i class="icon-wrench"></i>
                    Edit
                </a>
                @endif
                <!-- <a href="{{URL::route('admin.pages.create_menu',$item->id)}}" class="pull-right"><i class="icon-external-link"></i>Tạo menu
                </a> -->
            </strong>
        </div>
        @if($item->child()->count() >0 )
        <ol class="dd-list">
            @foreach($item->child()->orderBy('order')->get() as $item)
            <li class="dd-item dd3-item" data-id="{{$item->
                id}}">
                <div class="dd-handle dd3-handle"></div>
                <div class="dd3-content">
                    <strong>
                        <a href="{{URL::to($item->full_link())}}"
                           class="tooltips"
                           data-original-title="Xem thử đường dẫn"
                           data-placement="right" title="">
                           {{$item->title}}
                           ({{$item->all_posts(false)->count()}}
                           ) // {{$item->getLang()}}
                       </a>

                      @if($get_type === 'product')
                       <a class="pull-right tooltips"
                       data-original-title="Xóa menu"
                       data-placement="left" href="{{URL::to('admin/postcatalogs/delete/'.$item->
                       id)}}" title="">
                       <i class="icon-remove"></i>
                       Delete
                   </a>
                   @endif
                  @if($get_type === 'product')
                   <a href="{{URL::route('admin.postcatalogs.edit',$item->
                    id)}}" class="pull-right tooltips" data-original-title="Edit"
                    data-placement="left">
                    <i class="icon-wrench"></i>
                    Edit
                </a>
                @endif
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
There are no postcatalogs
@endif
</div>
</div>
</div>
</div>

@stop