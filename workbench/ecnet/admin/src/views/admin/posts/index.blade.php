@extends('admin::layouts.scaffold')
@section('head')
<link rel="stylesheet" href="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/DT_bootstrap.css" />
<style>

</style>
@stop
@section('footer')
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript">
    $('#posts').dataTable({
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
                'aTargets': [3,7,8]
            }]
        });


    </script>
    @stop


    @section('main')
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">Quản lý bài viết</h3>
            <ul class="breadcrumb">
                <li> <i class="icon-home"></i>
                    <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
                </li>
                <li>Danh sách bài viết</li>
            </ul>
        </div>
    </div>
    <p>
        <a href="{{URL::route('admin.posts.create')}}" class="btn green" title="Add new Posts">
            Thêm bài viết tin tức
            <i class="icon-plus"></i>
        </a>
        <a href="{{URL::route('admin.posts.create',['type'=>'product'])}}" class="btn blue" title="Add new Posts">
            Thêm bài viết sản phẩm
            <i class="icon-plus"></i>
        </a>
        <a style="display:none;" class="btn" href="{{URL::route('admin.posts.order')}}">Sắp xếp bài viết <i class="icon-retweet"></i></a>

    </p>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box grey">
                <div class="portlet-title">
                    <h4>
                        <i class="icon-reorder"></i>
                        Quản lý bài viết
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
                    <table class="table table-striped table-bordered" id="posts">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Title</th>
                                <th>Danh mục</th>
                                <th style="display:none;">Image</th>
                                <th>Đăng</th>
                                <th>Danh Mục</th>
                                <th style="display:none;">Ngôn ngữ</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <?php
                        $stt = 1;
                        ?>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$stt}}</td>
                                <td>
                                    <a href="{{URL::to($post->full_link())}}" target="_blank" title="">{{{ $post->title }}}</a>
                                </td>

                                <td>
                                    @if(!$post->parent())
                                    Không thuộc danh mục nào
                                    @else
                                    {{$post->parent()->title}}
                                    @endif
                                </td>
                                <td style="display:none;">
                                    <img class="thumbnail" src="" alt="">
                                </td>
                                <td>
                                    @if($post->published)
                                    <i class="icon-ok"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($post->featured ==1)
                                    Giới Thiệu
                                    @elseif($post->featured ==2)
                                    Ban Điều Hành
                                    @else
                                    Tin Tức
                                    @endif
                                </td>
                                <td style="display:none;">{{$post->lang}}</td>

                                <td>
                                    {{ link_to_route('admin.posts.edit', 'Edit', array($post->id), array('class' => 'btn btn blue')) }}
                                </td>
                                <td>
                                    {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.posts.destroy', $post->id))) }}
                                    {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            <?php
                            $stt++;
                            ?>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    Chưa có bài viết nào.
                    @endif
                </div>
            </div>
        </div>
    </div>
    @stop