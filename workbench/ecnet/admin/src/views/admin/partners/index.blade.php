@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý đối tác</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/partners')}}">đối tác</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách đối tác
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
<p><a href="{{URL::route('admin.partners.create')}}" class="btn green" title="Add new Partners">Add new Partners <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý Partners
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($partners->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
				<th>Logo</th>
				<th>Description</th>
				<th>Link</th>
				<th>Order</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($partners as $partner)
                <tr>
                    <td>{{{ $partner->name }}}</td>
					<td><img style="width:130px" src="{{URL::to($partner->logo)}}" alt=""></td>
					<td>{{{ $partner->description }}}</td>
					<td>{{{ $partner->link }}}</td>
					<td>{{{ $partner->order }}}</td>
                    <td>{{ link_to_route('admin.partners.edit', 'Edit', array($partner->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.partners.destroy', $partner->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no partners
@endif
</div>
        </div>
    </div>
</div>

@stop