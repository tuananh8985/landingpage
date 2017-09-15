@extends('admin.layouts.master')
@section('content')
<div class="page-content-wrapper">
	<div class="page-content">


		<!-- BEGIN PAGE HEADER-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					<i class="fa fa-file-o fa-2"></i> Quản lý trang đơn
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
						<a href="#">
							Quản lý trang đơn
						</a>
					</li>
					<!-- </ul> -->
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>

			<p>{{ link_to_route('admin.pages.create', 'Tạo trang đơn mới',[],['class'=>'btn green']) }}</p>

			@if ($pages->count())
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Title</th>
						<th>Type</th>
						<th>Homepage</th>
						<th>Activated</th>
						<th colspan="2">
						</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($pages as $page)
					<tr>
						<td>{{{ $page->title }}}</td>
						<td>{{{ $page->type }}}</td>
						<td>{{{ $page->homepage }}}</td>
						<td>{{{ $page->activated }}}</td>
						<td>{{ link_to_route('admin.pages.edit', 'Edit', array($page->id), array('class' => 'btn btn-info')) }}</td>
						<td>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.pages.destroy', $page->id))) }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
							{{ Form::close() }}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			There are no pages
			@endif
		</div>
	</div>

	@stop
