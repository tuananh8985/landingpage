<?php
class ImagesController extends BaseController {
    public function ajax_upload_image(){
//        return dd(Input::all());
        $input = Input::all();
     $rules = array(
            'upload' => 'image|max:3000',
        );  

        $validation = Validator::make($input, $rules);  

        if ($validation->fails())
        {
            echo "File ảnh không đúng định dạng";
            return;
        }   

        $file = Input::file('upload');    

        $directory = public_path().'/images/upload/';
        if(!File::isDirectory($directory)){
            File::makeDirectory($directory);
        }
        $filename = date('s_d_m_Y_',$file->getATime()).$file->getClientOriginalName();

        $upload_success = Input::file('upload')->move( $directory, $filename);
        $image = new ImageTools(public_path().'/images/upload/'.$filename);
        if($image->getX() > 1600){
            $image->resizeWidth(1600);
            $image->save(public_path().'/images/upload/',$filename);
        }

        if( $upload_success ) {
            $funcNum = $_GET['CKEditorFuncNum'] ;
            echo '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.',"'.'/images/upload/'.$filename.'", "Bạn đã upload thành công. \n Ấn Ok để tiến hành chỉnh sửa file ảnh");</script>';
            return;
        } else {
            return Response::json('error', 400);
        }
    }
     public function upload_with_crop(){
        if(File::isFile(public_path()."/".Input::get('current_image'))){
            File::delete(public_path()."/".Input::get('current_image'));
        }
        if(Input::file('post_image')){
         $image = Input::file('post_image');
         $image_ext =  File::extension(Input::file('post_image')->getClientOriginalName());
         $image_name = Str::random('10','alpha').".".$image_ext;
         Input::file('post_image')->move(public_path()."/images/temp",$image_name);
         if(Input::get('crop')=='yes'){
            $crop_img = new ImageTools(public_path()."/images/temp/".$image_name);
	         if($crop_img->getX() > 1800){
		         $crop_img->resizeWidth(1800);
	         }



	         $fix_w = Input::get('fixed_width');
             $tile = $crop_img->getX() / $fix_w;
             $cx = Input::get('cx')*$tile;
             $cy = Input::get('cy')*$tile;
             $cw = Input::get('cw')*$tile;
             $ch = Input::get('ch')*$tile;
             $crop_img->cropImage($cx,$cy,$cw,$ch);
             $crop_img->save(public_path()."/images/temp/",$image_name);
  
         }
         $data ='images/temp/'.$image_name;
         return $data;

        }
        else return "Error";
    }

}
