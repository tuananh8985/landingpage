@extends('admin.layouts.master')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Sửa Page
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
                            Sửa Page
                        </a>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>

{{ Form::model($page, array('method' => 'PATCH', 'route' => array('admin.pages.update', $page->id))) }}

        <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{error_for('title',$errors)}}
            {{ Form::text('title') }}
        </div>

        <div class="form-group">
            {{ Form::label('slug', 'Slug:') }}
            {{error_for('slug',$errors)}}
            {{ Form::text('slug') }}
        </div>

        <div class="form-group">
            {{ Form::label('file', 'File:') }}
            {{error_for('file',$errors)}}
            {{ Form::text('file') }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description:') }}
            {{error_for('description',$errors)}}
            {{ Form::text('description') }}
        </div>

        <div class="form-group">
            {{ Form::label('type', 'Type:') }}
            {{error_for('type',$errors)}}
            {{ Form::input('number', 'type') }}
        </div>

        <div class="form-group">
            {{ Form::label('homepage', 'Homepage:') }}
            {{error_for('homepage',$errors)}}
            {{ Form::checkbox('homepage') }}
        </div>

        <div class="form-group">
            {{ Form::label('meta_title', 'Meta_title:') }}
            {{error_for('meta_title',$errors)}}
            {{ Form::text('meta_title') }}
        </div>

        <div class="form-group">
            {{ Form::label('meta_keywords', 'Meta_keywords:') }}
            {{error_for('meta_keywords',$errors)}}
            {{ Form::text('meta_keywords') }}
        </div>

        <div class="form-group">
            {{ Form::label('robots', 'robots:') }}
            {{error_for('robots',$errors)}}
            {{ Form::text('robots') }}
        </div>

        <div class="form-group">
            {{ Form::label('activated', 'Activated:') }}
            {{error_for('activated',$errors)}}
            {{ Form::checkbox('activated') }}
        </div>

		<div class="form-group">
			{{ Form::submit('Update', array('class' => 'btn blue')) }}
			{{ link_to_route('admin.pages.show', 'Cancel', $page->id, array('class' => 'btn')) }}
		</div>
{{ Form::close() }}

	</div>
</div>

@stop
