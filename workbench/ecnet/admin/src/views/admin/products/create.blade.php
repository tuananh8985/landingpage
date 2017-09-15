@extends('admin::layouts.scaffold')
@section('head')
<link rel="stylesheet" href="{{URL::to('/')}}/packages/ecnet/admin/assets/css/jquery.Jcrop.min.css" />

<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
@endsection
@section('footer')
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/jquery.Jcrop.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script type="text/javascript">
var jcrop_val;
var form = $('#upload_image').ajaxForm();
// hàm này sẽ gọi ra khi crop ảnh
function config_crop(coords)
  {
    $('#cx').val(coords.x);
    $('#cy').val(coords.y);
    $('#cw').val(coords.w);
    $('#ch').val(coords.h);
    $('#fixed_width').val({{$img_option['w_t']}});
  }

$('#crop_button').click(function(){
    console.log($('#jcrop_target').width());
     $('#jcrop_target').Jcrop({
            setSelect: [0,0,{{$img_option['w_t']}},{{$img_option['h_t']}}],
            onSelect:    config_crop,
            aspectRatio: {{$img_option['w']}} / {{$img_option['h']}}
            },function(){
                jcrop_val = this;
            });
    $('#uncrop_button').css('display','');
    $('#crop').val('yes');
});
$('#uncrop_button').click(function(){
    jcrop_val.destroy();

});

$('#upload_btn').click(function(){
     form.ajaxSubmit(function(result){
        //Xử lý vấn đề Upload
        jcrop_val.destroy() ;
        $()
        $('#jcrop_target').width({{$img_option['w_t']}});
        $('#jcrop_target').height({{$img_option['h_t']}});
        $('#jcrop_target').attr('src','{{URL::to('/')}}'+'/'+result);
        $('#pr_image').val('{{URL::to('/')}}'+'/'+result);
     });
});
</script>
@endsection
@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Create Product</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/products')}}">products</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Create Product
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Create Product
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
        <div class="portlet-body">
<!-- Upload Image -->
{{Form::open(array('url'=>'admin/images/upload-with-crop','files'=>'true','id'=>'upload_image'))}}
{{Form::hidden('crop','no',array('id'=>'crop'))}}
{{Form::hidden('cx',0,array('id'=>'cx'))}}
{{Form::hidden('cy',0,array('id'=>'cy'))}}
{{Form::hidden('cw',0,array('id'=>'cw'))}}
{{Form::hidden('ch',0,array('id'=>'ch'))}}
{{Form::hidden('fixed_width',0,array('id'=>'fixed_width'))}}
<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('image', 'Ảnh đại diện cho bài viết:') }}</div>
            <div class="controls">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div>
                        <span class="btn btn-file">
                            <span class="fileupload-new">Select image</span>
                            <span class="fileupload-exists">Change</span>

                            <input type="file" id="image_input" name="post_image" class="default" />
                        </span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                        <a id="crop_button" class="btn fileupload-exists" >Crop</a>
                        <a id="upload_btn" class="btn fileupload-exists red" >Upload</a>
                        <a id="uncrop_button" class="btn fileupload-exists" style="display:none">Không Crop</a>
                    </div>
                    <br/>
                    <div class="fileupload-new thumbnail" style="width: {{$img_option['w_t']}}px; ">
                        <img src="http://www.placehold.it/{{$img_option['w']}}x{{$img_option['h']}}" alt="" />
                    </div>
                    <div id="crop_div" class="fileupload-preview fileupload-exists thumbnail" style="max-width: {{$img_option['w_t']}}px;overflow: hidden;  "></div>
                </div>
                <span class="label label-important">NOTE!</span>
                <span>Sau khi chọn hỉnh ảnh và crop xong bạn ấn <strong>Upload</strong> để thêm hình ảnh vào sản phẩm. ( Nên dùng Firefox hoặc Chrome để hỗ trợ tốt nhất cho Websites.)
                </span>
            </div>
        </div>
    </div>
</div>
{{Form::close()}}
<!-- End upload image -->

{{ Form::open(array('route' => 'admin.products.store')) }}
{{Form::hidden('image','',array('id'=>'pr_image'))}}
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('name', 'Tên sản phẩm:') }}</div>
                        <div class="controls">{{ Form::text('name',Input::old('name'),array('class'=>'m-wrap span6')) }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('cat_id', 'Danh mục:') }}</div>
                        <div class="controls">{{ Form::select('cat_id',Productcat::list_array(),Input::old('cat_id'),array('class'=>'m-wrap span6')) }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('price', 'Price:') }}</div>
                        <div class="controls">
                            <div class="input-append">
                            {{ Form::input('number', 'price',Input::old('price'),array('class'=>'m-wrap span12')) }}<span class="add-on">VNĐ</span>
                        </div>
                            <p class="help-block">Đặt giá bằng  <strong>0</strong> nếu bạn muốn liên hệ để biết giá</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('description', 'Mô tả sản phẩm:') }}</div>
                        <div class="controls">{{ Form::textarea('description',Input::old('description'),array('class'=>'m-wrap span6')) }}</div>
                    </div>
                </div>
            </div>

        <div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="controls">{{ Form::submit('Submit', array('class' => 'btn green')) }}</div>
        </div>
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

