<?php
Class adm_theme {
	public static function top_nav(){
		echo '<li class="divider-vertical"></li>';
        foreach(Menu::whereparent(0)->wherepostion(0)->orderby('order')->get() as $menu){
        	
        	if($menu->childs()->count()!=0){
        		echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="'.URL::to($menu->link).'" title="'.$menu->title.'">'.$menu->title.'<b class="caret"></b></a>';
        		echo '<ul class="dropdown-menu">';
        		foreach($menu->childs()->wherepostion(0)->get() as $menu){
        			echo '<li><a href="'.URL::to($menu->link).'" title="'.$menu->title.'">'.$menu->title.'</a></li>';
        		}
        		echo '</ul>';
        		echo '</li>';
        		echo'<li class="divider-vertical"></li>';
        	}else{
        		echo '<li><a href="'.URL::to($menu->link).'" title="'.$menu->title.'">'.$menu->title.'</a></li>';
                        echo'<li class="divider-vertical"></li>';
        	}
                }
	}
        public static function menus_order_render($arr){
                
        }

}