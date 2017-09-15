<?php
class Analytics extends BaseController{
	public function __construct(){
	}
	//Cập nhật bản ghi Views
	public function pageviews(){
		if(Input::has('time')){
			$str_time = (date('Y-m-d H',Input::get('time')));
			$current_page = Page::find(Input::get('page'));
			if($current_page){
				$current_link = $current_page->link();
			}
			if(Viewnote::wheretime($str_time)->count() >0 ){
				$note = Viewnote::wheretime($str_time);
				$views = $note->first()->views +1;
				Viewnote::wheretime($str_time)->update(array('views'=>$views));
			}else{
				Viewnote::insert(array('time'=>$str_time,'views'=>1));
			}
		}
		$this->logIP($current_link);

		return;
	}
	public function logIP($current_link = ""){
	    $remote_ip = (isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'0.0.0.0');
		$request_time = \Carbon\Carbon::now();

		$log_content = 'Request from:'.$remote_ip.' at: '.$request_time.' to: '.$current_link."||";
		$this->online_guest();
		return $this->addLog($log_content);

	}
	public function addLog($string = "",$month = 0,$year= 0){
		$logs_path = app_path('storage/logs/ip_logs');
		if(!$month){
			$month = \Carbon\Carbon::now()->month;
		}
		if(!$year){
			$year = \Carbon\Carbon::now()->year;
		}

		$logs_name = 'ip_logs_'.$month.'_'.$year.'.txt';
		if(!File::isDirectory($logs_path)){
			File::makeDirectory($logs_path);
		}
		return File::append($logs_path.'/'.$logs_name,$string);

	}
	public function online_guest(){
		$online_quest = new stdClass();
		$online_quest->time = time();
		$remote_ip = (isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'0.0.0.0');

		$online_quest->ip = $remote_ip;
		//Get Onlines Guest arrays from Cache
	    if(!Cache::has('online_guests')){
		    Cache::forever('online_guests',[]);
	    }
		$old_guest = 0;
		$online_quests = Cache::get('online_guests');

		//Remove old Guest;
		foreach($online_quests as $i=>$guest){
			try{
				$guest = $online_quests[$i];
			}catch (Exception $e){

				break;
			}
			if($guest->time < time() - 30){
				unset($online_quests[$i]);
			}
			if($guest->ip == $remote_ip && !$old_guest){
				$guest->time = time();
				$online_quests[$i] = $guest;
				$old_guest = 1;
			}
		}
		if($old_guest){
			Cache::forever('online_guests',$online_quests);
			return;
		}
		$online_quests[] = $online_quest;
		Cache::forever('online_guests',$online_quests);

		return;
	}


}