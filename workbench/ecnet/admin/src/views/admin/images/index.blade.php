@extends('admin::layouts.scaffold')
@section('head')
<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/dropzone/css/dropzone.css" rel="stylesheet"/>
@stop

@section('footer')

    <script src="{{URL::to('/')}}/packages/ecnet/admin/assets/dropzone/dropzone.js"></script>
    
@stop

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Images</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/images')}}">images</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách images
            </li>
        </ul>
    </div>
</div>
<p><a href="{{URL::route('admin.images.create')}}" class="btn green" title="Add new Images">Add new Images <i class="icon-plus"></i></a></p>

<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý Images
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($images->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Images</th>
				<th>name</th>
				<th>Link</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($images as $image)
                <tr>
                    <td><img src="{{URL::to('/'.$image->link)}}" class="thumbnail" width="90">
                    </td>
                    <td>{{{ $image->name }}}</td>
					<td>{{{URL::to('/'.$image->link)}}}</td>
                    <td>{{ link_to_route('admin.images.edit', 'Edit', array($image->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.images.destroy', $image->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no images
@endif
</div>
        </div>
    </div>
</div>

@stop