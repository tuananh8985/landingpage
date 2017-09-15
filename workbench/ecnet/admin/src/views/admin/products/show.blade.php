@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Product</h1>

<p>{{ link_to_route('admin.products.index', 'Return to all products') }}</p>

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
    </tbody>
</table>

@stop