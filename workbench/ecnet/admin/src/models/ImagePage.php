<?php

class ImagePage extends Eloquent 
{

	public $table = "images";
    protected $fillable = ['id', 'path', 'page_id']; 
    public function page(){
    	return $this->belongTo(Page::class);
    }
}