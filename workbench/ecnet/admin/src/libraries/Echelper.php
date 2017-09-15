<?php
use PHPImageWorkshop\ImageWorkshop;
class EcHelper {
	public static function getThumb($w,$h,$type,$source_image){
		$path = public_path().'/images/thumbs';
		if(!File::isDirectory($path)){
			File::makeDirectory($path);
		}
		$ext = File::extension($source_image);
		$piture_name =  $type."_".basename($source_image,'.'.$ext);
		$thumb = $path.'/'.$piture_name.'_'.$w."x".$h.".".$ext;

		$thumb_val = 'images/thumbs/'.$piture_name.'_'.$w."x".$h.".".$ext;
		if(File::isFile($thumb)){
			return 'getthumb/'.$piture_name.'_'.$w."x".$h.".".$ext;
		}
		else{
			if(!File::isFile(public_path()."/".$source_image)){
				return "http://placehold.it/".$w."x".$h."&text=No+image";
			}
			$image = new ImageTools(public_path($source_image));
			if($image->getX() > 1600){
				$image->resizeWidth(1600);
				$image->save(public_path()."/".dirname($source_image).'/',basename($source_image,'.'.$ext));
			}

			$thumb_obj = ImageWorkshop::initFromPath(public_path()."/".$source_image);
			$expectedWidth = $w;
			$expectedHeight = $h;
			($expectedWidth > $expectedHeight) ? $largestSide = $expectedWidth : $largestSide = $expectedHeight;
			$thumb_obj->cropMaximumInPixel(0, 0, "MM");
			// Resize the squared layer with the largest side of the expected thumb
			$thumb_obj->resizeInPixel($largestSide, $largestSide);

			// Crop the layer to get the expected dimensions
			$thumb_obj->cropInPixel($expectedWidth, $expectedHeight, 0, 0, 'MM');
			$thumb_obj->save($path,$piture_name.'_'.$w."x".$h.".".$ext,true,null,100);
			return $thumb_val;
		}

	}
	public static function getResize($w,$h,$type,$source_image){
		$path = public_path().'/images/thumbs';
		$ext = File::extension($source_image);
		$piture_name =  $type."_".basename($source_image,'.'.$ext);
		$thumb = $path.'/'.$piture_name.'_'.$w."x".$h.".".$ext;

		$thumb_val = 'images/thumbs/'.$piture_name.'_'.$w."x".$h.".".$ext;
		if(File::isFile($thumb)){
			return 'getthumb/'.$piture_name.'_'.$w."x".$h.".".$ext;
		}
		else{
			if(!File::isFile(public_path()."/".$source_image)){
				return "http://placehold.it/".$w."x".$h."&text=No+image";
			}
			$image = new ImageTools(public_path($source_image));
			if($image->getX() > 1600){
				$image->resizeWidth(1600);
				$image->save(public_path()."/".dirname($source_image).'/',basename($source_image,'.'.$ext));
			}

			$thumb_obj = ImageWorkshop::initFromPath(public_path()."/".$source_image);
			$thumb_obj->resizeInPixel($w,$h,true,0,0,'MM');

			// Crop the layer to get the expected dimensions
			$thumb_obj->save($path,$piture_name.'_'.$w."x".$h.".".$ext,true,null,100);
			return $thumb_val;
		}

	}
}