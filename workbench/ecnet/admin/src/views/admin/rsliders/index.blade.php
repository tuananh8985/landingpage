@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Rsliders</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/rsliders')}}">rsliders</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách rsliders
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
<p><a href="{{URL::route('admin.rsliders.create')}}" class="btn green" title="Add new Rsliders">Add new Rsliders <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý Rsliders
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($rsliders->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>Transiton</th>
				<th>Thumb</th>
				<th>Order</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($rsliders as $rslider)
                <tr>
                    <td><a class="btn green mini" href="{{URL::to('admin/rsliders/'.$rslider->id)}}" title="Add Element">Add Element</a></td>
                    <td>{{{ $rslider->transiton }}}</td>
					<td>{{{ $rslider->thumb }}}</td>
					<td>{{{ $rslider->order }}}</td>
                    <td>{{ link_to_route('admin.rsliders.edit', 'Edit', array($rslider->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.rsliders.destroy', $rslider->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no rsliders
@endif
</div>
        </div>
    </div>
</div>

@stop