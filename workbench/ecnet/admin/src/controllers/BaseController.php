<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public $cunit = 0;
	
	public function __construct() {
		Session::flash('cunit',$this->cunit);
		
	}
	protected function setupLayout()
	{
		
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}