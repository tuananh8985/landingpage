<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 9/19/2014
 * Time: 4:47 PM
 */

namespace Acme\Forms\Modules;


use Laracasts\Validation\FormValidator;

class DomainForm extends FormValidator {
	public $rules = [
		'domain'=>'required|max:250',
	];

} 