@extends('admin::layouts.scaffold')
@section('head')
    <link rel="stylesheet" href="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/DT_bootstrap.css" />
@stop
@section('footer')

<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/DT_bootstrap.js"></script>
    <script type="text/javascript">
        $('#sample_1').dataTable({
            "aLengthMenu": [
                [20, 30, 50, -1],
                [20, 30, 50, "All"]
            ],
            // set the initial value
            "iDisplayLength": 20,
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ Bài viết mỗi trang",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [2,5,6]
            }]
        });


    </script>
@stop
@section('head')
    <link rel="stylesheet" href="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/DT_bootstrap.css" />
@stop
@section('footer')

<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/DT_bootstrap.js"></script>
    <script type="text/javascript">
        $('#sample_1').dataTable({
            "aLengthMenu": [
                [20, 30, 50, -1],
                [20, 30, 50, "All"]
            ],
            // set the initial value
            "iDisplayLength": 20,
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ Bài viết mỗi trang",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [2,5,6]
            }]
        });


    </script>
@stop

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý bài viết đã xóa</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/posts')}}">Quản lý bài viết</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách bài viết đã xóa
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý quản lý bài viết
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
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
@if ($posts->count())
    <table class="table table-striped table-bordered" id="sample_1">
        <thead>
            <tr>
                <th>Title</th>
				<th>Danh mục</th>
				<th>Image</th>
                <th>Đăng</th>
                <th>Nổi bật</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td><a href="{{URL::to($post->full_link())}}" title="">{{{ $post->title }}}</a></td>
					
                        <td>
                            @if($post->parent == 0 || !$post->parent())
                            Không thuộc danh mục nào
                            @else
                            {{$post->parent()->title}}
                            @endif
                        </td>
					<td><img class="thumbnail" style="width:{{$img_option['w_t']/3}}px;height: {{$img_option['h_t']/3}}px;" src="{{{URL::to('/'.$post->image) }}}" alt=""></td>
                    <td>
                        @if($post->published)
                        <i class="icon-ok"></i>
                        @endif
                    </td>
                    <td>
                        @if($post->featured)
                        <i class="icon-ok"></i>
                        @else
                        <a href="#"><span class="badge">bình thường</span></a>
                        @endif
                    </td>

                    <td><a href="{{URL::to('admin/posts/restore/'.$post->id)}}" title="Khôi phục bài viết" class="btn green">Khôi phục</a></td>
                    <td><a href="{{URL::to('admin/posts/forcedelete/'.$post->id)}}" title="Khôi phục bài viết" class="btn red">Xóa hẳn</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no posts
@endif
</div>
        </div>
    </div>
</div>

@stop