@extends('shop::admin.layouts.master')
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
        $('#nestable_list_1').nestable({'maxDepth': 3})
                .on('change', updateOutput);
    </script>
@stop

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">


            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Quản lý danh mục mặt hàng
                    </h3>
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="{{URL::route('admin')}}">
                                Trang chủ
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">
                                Danh mục mặt hàng
                            </a>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @include('flash::message')
                </div>
            </div>
            {{portlet_open('Danh mục mặt hàng','blue')}}
            <div class="row">
                <div class="col-md-12">
                    <a class="btn green" href="{{URL::route('admin.shop.categories.create')}}">Tạo danh mục mới</a>
                </div>
            </div>
            <hr/>

            @if ($categories->count())
                <div class="dd" id="nestable_list_1">
                    <ol class="dd-list">
                        @foreach ($categories as $item)
                            <li class="dd-item dd3-item" data-id="{{$item->
                            id}}">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content"><strong><a href="{{URL::to($item->full_link())}}"
                                                                    class="tooltips"
                                                                    data-original-title="Xem thử đường dẫn"
                                                                    data-placement="right"
                                                                    title="">{{$item->title}}
                                            ({{$item->all_posts(false)->count()}})</a>
                                        <a class="pull-right tooltips delete-button" data-original-title="Xóa menu" href=""
                                           data-placement="left" class="delete-button" data-src="{{URL::to('admin/shop/categories/delete/'.$item->
                                        id)}}" title="">
                                            <i class="fa fa-trash-o"></i>
                                            Delete
                                        </a>
                                        <a href="{{URL::route('admin.shop.categories.edit',$item->
                                        id)}}" class="pull-right tooltips" data-original-title="Edit"
                                           data-placement="left">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a></strong>
                                </div>
                                @if($item->child()->count() >0 )
                                    <ol class="dd-list">
                                        @foreach($item->child()->orderBy('order')->get() as $item)
                                            <li class="dd-item dd3-item" data-id="{{$item->
                                    id}}">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content"><strong><a
                                                                href="{{URL::to($item->full_link())}}"
                                                                class="tooltips"
                                                                data-original-title="Xem thử đường dẫn"
                                                                data-placement="right" title="">{{$item->title}}
                                                            ({{$item->all_posts(false)->count()}})</a>
                                                        <a class="pull-right tooltips delete-button"
                                                           data-original-title="Xóa menu" href="" data-placement="left"
                                                           class="delete-button" data-src="{{URL::to('admin/shop/categories/delete/'.$item->
                                                id)}}" title="">
                                                            <i class="fa fa-trash-o"></i>
                                                            Delete
                                                        </a>
                                                        <a href="{{URL::route('admin.shop.categories.edit',$item->
                                                id)}}" class="pull-right tooltips" data-original-title="Edit"
                                                           data-placement="left">
                                                            <i class="fa fa-edit"></i>
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
                                                                        <a href="{{URL::to($item->full_link())}}"
                                                                           class="tooltips"
                                                                           data-original-title="Xem thử đường dẫn"
                                                                           data-placement="right"
                                                                           title="">{{$item->title}}
                                                                            ({{$item->all_posts(false)->count()}}
                                                                            )</a>
                                                                        <a class="pull-right tooltips delete-button"
                                                                           data-original-title="Xóa menu" href=""
                                                                           data-placement="left" class="delete-button" data-src="{{URL::to('admin/shop/categories/delete/'.$item->
                                                        id)}}" title="">
                                                                            <i class="fa fa-trash-o"></i>
                                                                            Delete
                                                                        </a>
                                                                        <a href="{{URL::route('admin.shop.categories.edit',$item->
                                                        id)}}" class="pull-right tooltips" data-original-title="Edit"
                                                                           data-placement="left">
                                                                            <i class="fa fa-edit"></i>
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
                There are no shop/categories
            @endif

            {{portlet_close()}}

            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
    </div>


@stop