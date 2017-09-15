@extends('admin::layouts.scaffold')

@section('head')

@stop
@section('footer')

@stop

@section('main')
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">Thư viện hỉnh ảnh: {{$post->title}}</h3>
            <ul class="breadcrumb">
                <li><i class="icon-home"></i>
                    <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="{{URL::to('admin/posts')}}">Quản lý bài viết</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="{{URL::route('admin.posts.edit',$post->id)}}">{{$post->title}}</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="#">Thư viện hình ảnh</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <h4>
                        <i class="icon-reorder"></i>
                        Thư viện hình ảnh
                    </h4>

                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    {{Form::open([
    'route'=>['admin.posts.gallery.add',$post->id],
    'files'=>'true',
])}}
                    <div class="row-fluid">
                        <div class="span12">
                            {{Form::file('image')}}
                            {{ Form::submit('Thêm ảnh',['class'=>'btn green']) }}
                            <hr/>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Thumbnail</th>
                                        <th>Link</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($post->images() as $image)
                                <tr>
                                    <td><img class="thumbnail" src="{{$image->getThumb(70,60)}}" alt=""/></td>
                                    <td><a target="_blank" href="{{URL::to($image->link)}}">{{$image->name}}</a></td>
                                    <td><a class="btn red" href="{{URL::route('admin.posts.gallery.delete',$image->id)}}">Delete</a></td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>





                    {{Form::close()}}
                </div>
        </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <div class="controls offset4">{{ Form::submit('Cập nhật bài viết', array('class' => 'btn blue')) }}</div>
                </div>
            </div>
        </div>
    </div>

    {{Form::close()}}

@stop
