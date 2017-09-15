@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Productcats</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/productcats')}}">productcats</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách productcats
            </li>
        </ul>
    </div>
</div>
<p><a href="{{URL::route('admin.productcats.create')}}" class="btn green" title="Add new Productcats">Add new Productcats <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý Productcats
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($productcats->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
				<th>Parent</th>
				<th>Description</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($productcats as $productcat)
                <tr>
                    <td>{{{ $productcat->title }}}</td>
					<td>{{{ $productcat->parent }}}</td>
					<td>{{{ $productcat->description }}}</td>
                    <td>{{ link_to_route('admin.productcats.edit', 'Edit', array($productcat->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.productcats.destroy', $productcat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no productcats
@endif
</div>
        </div>
    </div>
</div>

@stop