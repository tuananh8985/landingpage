<?php

/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 5/13/2015
 * Time: 11:17 AM
 */
class PropertyTemplate extends Eloquent {
	protected $table = 'property_templates';
	protected $fillable = [
		'name',
		'label',
		'group',
		'type',
		'value',
	];

	public function render($page = null) {
		switch ( $this->type ) {
			case "string":
				return $this->renderString($page);
			case "array":
				return $this->renderArray($page);

		}
	}

	/**
	 * @return string
	 */
	public function renderString($page =null) {
		$valueForm = null;
		if($page) {
			$valueForm = $page->getProperty( $this->name );
		}


			return '
			    <!-- ' . $this->label . ' Field -->
			    <div class="row-fluid">
			        <div class="span12">
			             <div class="control-group">
			                   <div class="control-label">' . Form::label('properties[' . $this->name . ']', $this->label ) . '</div>
			                   <div class="controls">' . Form::text( 'properties[' . $this->name . ']', $valueForm, array( "class" => "m-wrap span12" ) ) . '
			                   </div>
			              </div>
			         </div>
			    </div>
			    <!-- End ' . $this->label . ' Field -->
			    ';
	}

	public function renderArray($page =null) {
		$arrValue = null;
		$valueForm = null;
		if($page){
			$valueForm = $page->getProperty($this->name);
		}


		$arrValueArr = explode( ',', $this->value );
		$arrValue = [];
		foreach($arrValueArr as $value){
			$arrValue[$value] = $value;
		}


		return '
			    <!-- ' . $this->label . ' Field -->
			    <div class="row-fluid">
			        <div class="span12">
			             <div class="control-group">
			                   <div class="control-label">' . Form::label( 'properties[' . $this->name . ']', $this->label ) . '</div>
			                   <div class="controls">' . Form::select( 'properties[' . $this->name . ']', $arrValue, $valueForm, array( "class" => "m-wrap span12" ) ) . '
			                   </div>
			              </div>
			         </div>
			    </div>
			    <!-- End ' . $this->label . ' Field -->
			    ';
	}

	public static function projectProperties() {
		return self::whereGroup( 'project' )->orderBy( 'label' )->get();
	}public static function productProperties() {
		return self::whereGroup( 'product' )->orderBy( 'label' )->get();
	}
}