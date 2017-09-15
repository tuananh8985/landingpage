@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Mediacats</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/mediacats')}}">mediacats</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách mediacats
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
<p><a href="{{URL::route('admin.mediacats.create')}}" class="btn green" title="Add new Mediacats">Add new Mediacats <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý Mediacats
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($mediacats->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
				<th>Parent</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($mediacats as $mediacat)
                <tr>
                    <td><a href="{{URL::route('admin.mediacats.show',$mediacat->id)}}" title="">{{{ $mediacat->name }}}</a></td>
					<td>{{{ $mediacat->parent }}}</td>
                    <td>{{ link_to_route('admin.mediacats.edit', 'Edit', array($mediacat->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.mediacats.destroy', $mediacat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no mediacats
@endif
</div>
        </div>
    </div>
</div>

@stop