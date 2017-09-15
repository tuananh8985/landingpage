<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 12/3/2014
 * Time: 3:11 PM
 */

namespace Acme\Forms\Shop;

use Laracasts\Validation\FormValidator;

class CategoryForm extends FormValidator {
	public  $rules = [];
	public $rules_update = [
		'title'=>'required|max:253',
		'description'=>'required|max:500',
		'meta_title'=>'required|max:253',
		'meta_description'=>'required|max:253',
		'meta_keywords'=>'required|max:253',
	];
	public function updateValidate($input){
	    $this->rules = $this->rules_update;
		return $this->validate($input);
	}
}