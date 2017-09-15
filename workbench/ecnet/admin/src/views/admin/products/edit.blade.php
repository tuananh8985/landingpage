@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Edit Product</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/products')}}">products</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Edit Product
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Edit Product
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
        <div class="portlet-body">
{{ Form::model($product, array('method' => 'PATCH', 'route' => array('admin.products.update', $product->id))) }}
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('name', 'Name:') }}</div>
                        <div class="controls">{{ Form::text('name') }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('cat_id', 'Cat_id:') }}</div>
                        <div class="controls">{{ Form::input('number', 'cat_id') }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('price', 'Price:') }}</div>
                        <div class="controls">{{ Form::input('number', 'price') }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('description', 'Description:') }}</div>
                        <div class="controls">{{ Form::textarea('description') }}</div>
                    </div>
                </div>
            </div>

<div class="row-fluid">
        <div class="controls">
            {{ Form::submit('Update', array('class' => 'btn btn blue')) }}
            {{ link_to_route('admin.products.show', 'Cancel', $product->id, array('class' => 'btn')) }}
        </div>
</div>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif
</div>
        </div>
    </div>
</div>
@stop