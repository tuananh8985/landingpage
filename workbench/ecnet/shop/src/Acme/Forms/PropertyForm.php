<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 5/13/2015
 * Time: 4:10 PM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class PropertyForm extends  FormValidator{
	protected $rules = [
		'name'=>'required|unique:property_templates,name',
		'label'=>'required',
		'group'=>'required',
		'type'=>'required',
//		'value'=>'required',
	];
	protected $rules_update = [
		'name'=>'required',
		'label'=>'required',
		'group'=>'required',
		'type'=>'required',
//		'value'=>'required',
	];

	public function updateValidate($inputData){
		$this->rules = $this->rules_update;
		return $this->validate($inputData);
	}
}