 <link rel="stylesheet" href="{{URL::to('/')}}/packages/ecnet/admin/assets/css/jquery.Jcrop.min.css" /> 
 <link href="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" /> 
 {{Form::open(array('url'=>'admin/images/upload-with-crop','files'=>'true','id'=>'upload_image'))}}
 {{Form::hidden('crop','no',array('id'=>'crop'))}}
 {{Form::hidden('cx',0,array('id'=>'cx'))}}
 {{Form::hidden('cy',0,array('id'=>'cy'))}}
 {{Form::hidden('cw',0,array('id'=>'cw'))}}
 {{Form::hidden('ch',0,array('id'=>'ch'))}}
 {{Form::hidden('fixed_width',0,array('id'=>'fixed_width'))}}

 {{Form::hidden('current_image','',array('id'=>'current_image'))}}
 <div class="row-fluid" id="crop_image">
   <div class="span12">
       <div class="control-group">
           <div class="control-label">{{ Form::label('image', 'Ảnh đại diện:') }}</div>
           <div class="controls">
               <div class="fileupload fileupload-new" data-provides="fileupload" >
                   <div>
                       <span class="btn btn-file">
                           <span id="pick_btn" class="fileupload-new">Chọn ảnh</span>
                           <span id="change_btn" class="fileupload-exists">Thay đổi</span>

                           <input type="file" id="image_input" name="post_image" class="default" required="true"/> 
                       </span>
                       <a id="crop_button" class="btn fileupload-exists" >Crop</a>
                       <a id="upload_btn" class="btn fileupload-exists red" >Tải lên</a>
                       <span id="done_icon" class="label label-success" style="display:none;" >
                           OK <i class="icon-ok"></i>
                       </span>
                       <a id="uncrop_button" class="btn fileupload-exists" style="display:none">Không Crop</a>
                       <br>
                       <div id="proccess" class="progress progress-striped progress-success active "  style="width:300px; display:none;"><div id="proccess_bar"  class="bar" style="width: 0%;"></div>
                   </div>
               </div>
               <br/> 

               <div class="fileupload-new thumbnail">

                   <img id="dummy_image" src="{{isset($image)?URL::to($image):'http://www.placehold.it/'.$img_option['w'].'x'.$img_option['h']}}" alt="" />
               </div>

               <div id="crop_div" class="fileupload-preview fileupload-exists thumbnail"></div>
               @if(isset($post))
               @if($post->subtype == 'product')
               @if(count($post->images()) > 0)
               <div class="img_relate" style="clear:both;">
                   <br/>
                   <p>Ảnh Liên Quan(<span style="color:red">Click vào ảnh để xóa ảnh liên quan nếu có</span>)</p>
                   @foreach($post->images() as $item)
                   <span class="crop_image_item"><img class="{{$item['id']}}" src="{{$item->link}}" width="50px" height="50px" id="{{route('delete_image_ajax')}}"></span>
                   @endforeach
               </div>
               @endif
               @endif
               @endif
               <br/>
           </div>

           <div style="clear: both;"> 
               <span class="label label-important">NOTE!</span>
               <span>
                <span style="color:red">Trường ảnh là bắt buộc!</span> <br/>
                Bạn nhớ ấn nút <strong>Upload</strong>.Nên chọn hình ảnh có kích thước như trên để có ảnh đẹp nhất nhé.
            </span></div>
        </div>
    </div>
</div>
</div>
{{Form::close()}}
<!-- Kết thúc hình ảnh cho slider --> 


