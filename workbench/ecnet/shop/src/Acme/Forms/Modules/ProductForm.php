<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 9/5/2014
 * Time: 3:23 PM
 */

namespace Acme\Forms\Modules;

use Laracasts\Validation\FormValidator;

class ProductForm extends FormValidator {
	public $rules = [
		'name'           => 'required|max:250',
		'domains_amount' => 'numeric',
		'duration'       => 'numeric',
		'price'          => 'numeric',
	];
} 