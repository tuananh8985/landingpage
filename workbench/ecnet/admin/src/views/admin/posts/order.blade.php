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
                url: '{{URL::to('admin/posts/ajax-order')}}',
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
        $('#nestable_list_1').nestable({'maxDepth': 1})
                .on('change', updateOutput);
    </script>
@stop

@section('main')
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">Quản lý bài viết</h3>
            <ul class="breadcrumb">
                <li><i class="icon-home"></i>
                    <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
                </li>
                <li><a href="{{URL::route('admin.posts.index')}}">Danh sách bài viết</a> <i
                            class="icon-angle-right"></i></li>
                <li><a href="{{URL::route('admin.posts.index')}}">Xắp xếp bài viết</a></li>
            </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box grey">
                <div class="portlet-title">
                    <h4><i class="icon-reorder"></i>
                        Xắp xếp bài viết
                    </h4>

                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body">


                    @if (1==1)
                        <div class="dd" id="nestable_list_1">
                            <ol class="dd-list">
                                {{--LVL 1--}}
                                @foreach (Post::wheretype(2)->whereLang(Lang::getLocale())->orderBy('order')->get() as $item)
                                    <li class="dd-item dd3-item" data-id="{{$item->
                            id}}">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content"><strong>
                                                <a href="{{URL::to($item->link())}}" class="tooltips"
                                                   data-original-title="Xem thử đường dẫn" data-placement="right"
                                                   title="">
                                                    {{$item->title}} ({{$item->all_posts(false)->count()}})
                                                    // <span class="pull-right">{{$item->getLang()}}</span>
                                                </a>
                                            </strong>
                                        </div>
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
