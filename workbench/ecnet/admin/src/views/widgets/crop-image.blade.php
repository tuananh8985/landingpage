<link rel="stylesheet" href="{{URL::to('/')}}/assets/css/jquery.Jcrop.min.css"/>
<link href="{{URL::to('/')}}/assets/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet"/>
{{Form::open(array('url'=>'admin/images/upload-with-crop','files'=>'true','id'=>$image_product))}}
{{Form::hidden('crop','no',array('id'=>'crop'))}}
{{Form::hidden('cx',0,array('id'=>'cx'))}}
{{Form::hidden('cy',0,array('id'=>'cy'))}}
{{Form::hidden('cw',0,array('id'=>'cw'))}}
{{Form::hidden('ch',0,array('id'=>'ch'))}}
{{Form::hidden('fixed_width',0,array('id'=>'fixed_width'))}}



{{Form::hidden('current_image','',array('id'=>'current_image'))}}
<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('image', 'Ảnh đại diện:') }}</div>
            <div class="controls">
                <div class="fileupload fileupload-new" data-provides="fileupload" required="true">
                    <div>
                         <span class="btn btn-file">
                             <span id="pick_btn" class="fileupload-new">Chọn ảnh</span>
                             <span id="change_btn" class="fileupload-exists">Thay đổi</span>

                             <input type="file" id="image_input" name="post_image" class="default"/>
                         </span>
                        <a id="crop_button" class="btn fileupload-exists">Crop</a>
                        <a id="upload_btn" class="btn fileupload-exists red">Tải lên</a>
                         <span id="done_icon" class="label label-success" style="display:none;">
                             OK <i class="icon-ok"></i>
                         </span>
                        <a id="uncrop_button" class="btn fileupload-exists" style="display:none">Không Crop</a>
                        <br>

                        <div id="proccess" class="progress progress-striped progress-success active "
                             style="width:300px; display:none;">
                            <div id="proccess_bar" class="bar" style="width: 0%;"></div>
                        </div>
                    </div>
                    <br/>

                    <div class="fileupload-new thumbnail">
                        <img src="{{isset($image)?URL::to($image):'http://www.placehold.it/'.$img_option['w'].'x'.$img_option['h']}}"
                             alt=""/>
                    </div>
                    <div id="crop_div" class="fileupload-preview fileupload-exists thumbnail"></div>
                </div>
                <span class="label label-important">NOTE!</span>
                 <span>
                     Bạn nhớ ấn nút <strong>Upload</strong>
                 </span>
                 <?php

                    dd($img_option['w']);
                 ?>
            </div>
        </div>
    </div>
</div>
{{Form::close()}}
<!-- Kết thúc hình ảnh cho slider -->