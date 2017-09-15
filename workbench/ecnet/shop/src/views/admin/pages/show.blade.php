@extends('admin.layouts.master')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Xem Page
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{URL::route('admin')}}">
                            Trang chủ
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="{{URL::route('admin.pages.index')}}">
                            pages
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            Xem Page
                        </a>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
<p>{{ link_to_route('admin.pages.index', 'Return to all pages') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Title</th>
				<th>Slug</th>
				<th>File</th>
				<th>Description</th>
				<th>Type</th>
				<th>Homepage</th>
				<th>Meta_title</th>
				<th>Meta_keywords</th>
				<th>robots</th>
				<th>Activated</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $page->title }}}</td>
					<td>{{{ $page->slug }}}</td>
					<td>{{{ $page->file }}}</td>
					<td>{{{ $page->description }}}</td>
					<td>{{{ $page->type }}}</td>
					<td>{{{ $page->homepage }}}</td>
					<td>{{{ $page->meta_title }}}</td>
					<td>{{{ $page->meta_keywords }}}</td>
					<td>{{{ $page->robots }}}</td>
					<td>{{{ $page->activated }}}</td>
                    <td>{{ link_to_route('pages.edit', 'Edit', array($page->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('pages.destroy', $page->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
