@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Medias</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/medias')}}">medias</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách medias
            </li>
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
<p><a href="{{URL::route('admin.medias.create')}}" class="btn green" title="Add new Medias">Add new Medias <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý Medias
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($medias->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
				<th>Cat</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($medias as $media)
                <tr>
                    <td>{{{ $media->name }}}</td>
					<td>{{{ $media->cat }}}</td>
                    <td>{{ link_to_route('admin.medias.edit', 'Edit', array($media->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.medias.destroy', $media->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no medias
@endif
</div>
        </div>
    </div>
</div>

@stop