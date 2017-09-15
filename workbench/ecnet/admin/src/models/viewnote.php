<?php
class Viewnote extends Eloquent
{
	public $timestamps = false;
	public static function result(){
		$string = "[";
	$content="";
	$current_note = Viewnote::orderBy('time','DESC');
	if($current_note->count() >0){
		$last_note = $current_note->first();
		if(date('Y-m-d H:00:00',time()) == $last_note->time){

			$content= $content."\n[".time().",".$last_note->views."],";
		}
		else{
			$content= $content."\n[".time().",0],";
		}

			$current_time =strtotime(date('Y-m-d H:00:00',time()));
		for($i=1;$i<=80;$i++){
			$current_time = $current_time-3600;
			$current_note = Viewnote::wheretime(date('Y-m-d H',$current_time));
			if($current_note->count() == 0){
				$content=$content."\n[".$current_time.",0],";
			}
			else{
				$current_note =$current_note->first();
				$content=$content."\n[".$current_time.",".$current_note->views."],";
			}
		}

	} 
	$string = $string.rtrim($content,",")."]";
	return $string;
	}
	public static function toDayViews(){
		$start = new \Carbon\Carbon();
		$start->hour = 0 ;
		$start->minute = 0 ;
		$end = new \Carbon\Carbon();
		$end->hour = 23 ;
		$end->minute = 59 ;

		$notes = self::where('time','>=',$start)
			->where('time','<=',$end);

		$sum = 0;
		foreach($notes as $note){
			$sum+=$note->views;
		}
		return $sum;

	}
}