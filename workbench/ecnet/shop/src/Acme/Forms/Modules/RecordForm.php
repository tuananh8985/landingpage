<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 9/20/2014
 * Time: 3:59 PM
 */

namespace Acme\Forms\Modules;


use Laracasts\Validation\FormValidator;

class RecordForm  extends FormValidator{
	protected $rules = [
		'name'=>'required|max:120',
		'content'=>'required|max:255',
		'ttl'=>'required|numeric|between:60,1200',
	];
	protected $update_rules = [
		'name'=>'required|max:120',
		'content'=>'required|max:255',
		'ttl'=>'required|numeric|between:60,1200',
	];

	public function UpdateValidate($input){
	    $this->rules = $this->update_rules;
		return $this->validate($input);

	}
} 