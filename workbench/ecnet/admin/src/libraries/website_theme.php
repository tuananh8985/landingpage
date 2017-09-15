<?php
class Website_theme {
	public static function portfolio_four($array=null,$num = 0){
		if($array == null or $num == 0){
			return;
		}

		echo '<ul class="gallery clearfix">
                <li>
                    <ul class="gallery clearfix">
                    ';
        for($i=0; $i<$num;$i++){
            if(($i+1)%3 == 0){
                echo '<li class="border_threecol last">';
            }
            else{
                echo '<li class="border_threecol">';
            }

            echo '<a href="'.URL::to($array[$i]->full_link()).'" title="hình ảnh '.$array[$i]->title.'">
                    <img src="'.URL::to($array[$i]->image).'" alt="" />
                  </a> <strong>'.$array[$i]->title.'</strong>
                            <p>
                                '.Str::limit($array[$i]->description,100).'
                            </p>
                        </li>';
        }


        echo '
                    </ul>
                </li>
            </ul>';
        return;
	}
}