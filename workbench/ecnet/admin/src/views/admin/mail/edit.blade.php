@extends('admin::layouts.scaffold')
@section('main')
<div class="row-fluid">
	<div class="span12">
		<h3 class="page-title">Quản lý nội dung</h3>
		<ul class="breadcrumb">
			<li> <i class="icon-home"></i>
				<a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
			</li>
			<li>
				<a href="{{URL::to('admin/contents')}}">Nội dung</a>
				<i class="icon-angle-right"></i>
			</li>
			<li>
				<a href="{{URL::route('admin.contents.index')}}">Danh sách nội dung</a>
			</li>
		</ul>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Tạo nội dung mới
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
			<div class="portlet-body">

				{{ Form::model($content,array('route' =>['admin.mail.update',$content->id],'method'=>'PATCH')) }}
				<div class="control-group">
					<label for="group" class="control-label col-sm-2">Tên</label>
					<div class="controls col-sm-10">
						{{Form::text('name',Input::old('name'),
						['class'=>'m-wrap span6','placeholder'=>"Tiêu đề"])}}

					</div>
				</div>

				<div class="control-group">
					<label for="value" class="control-label col-sm-2">Email</label>
					<div class="controls col-sm-10">
						{{Form::email('email',Input::old('email'),
						['class'=>'m-wrap span12','placeholder'=>"Nội dung",'style'=>'height:200px;'])}}

					</div>
				</div>


				<div class="row-fluid">
					<div class="span12">
						<div class="control-group">
							<div class="controls">{{ Form::submit('Cập nhật', array('class' => 'btn blue')) }}</div>
						</div>
					</div>
				</div>

				{{ Form::close() }}

				@if ($errors->any())
				<ul>
					{{ implode('', $errors->all('<li class="error">:message</li>')) }}
				</ul>
				@endif

				@if(Session::has('email_exit'))
					{{Session::get('email_exit')}}
				@endif
			</div>
		</div>
	</div>
</div>
@stop

