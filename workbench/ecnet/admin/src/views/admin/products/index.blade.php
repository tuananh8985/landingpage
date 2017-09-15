@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Products</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/products')}}">products</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách products
            </li>
        </ul>
    </div>
</div>
<p><a href="{{URL::route('admin.products.create')}}" class="btn green" title="Add new Products">Add new Products <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý Products
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($products->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
				<th>Cat_id</th>
				<th>Price</th>
				<th>Description</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{{ $product->name }}}</td>
					<td>{{{ $product->cat_id }}}</td>
					<td>{{{ $product->price }}}</td>
					<td>{{{ $product->description }}}</td>
                    <td>{{ link_to_route('admin.products.edit', 'Edit', array($product->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.products.destroy', $product->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no products
@endif
</div>
        </div>
    </div>
</div>

@stop