@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý RslidersElements</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/rslidersElements')}}">rslidersElements</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách rslidersElements
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
<p><a href="{{URL::route('admin.rslidersElements.create')}}" class="btn green" title="Add new RslidersElements">Add new RslidersElements <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý RslidersElements
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($rslidersElements->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Class</th>
				<th>X</th>
				<th>Y</th>
				<th>Speed</th>
				<th>Start</th>
				<th>Easing</th>
				<th>Order</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($rslidersElements as $rslidersElement)
                <tr>
                    <td>{{{ $rslidersElement->class }}}</td>
					<td>{{{ $rslidersElement->x }}}</td>
					<td>{{{ $rslidersElement->y }}}</td>
					<td>{{{ $rslidersElement->speed }}}</td>
					<td>{{{ $rslidersElement->start }}}</td>
					<td>{{{ $rslidersElement->easing }}}</td>
					<td>{{{ $rslidersElement->order }}}</td>
                    <td>{{ link_to_route('admin.rslidersElements.edit', 'Edit', array($rslidersElement->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.rslidersElements.destroy', $rslidersElement->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no rslidersElements
@endif
</div>
        </div>
    </div>
</div>

@stop