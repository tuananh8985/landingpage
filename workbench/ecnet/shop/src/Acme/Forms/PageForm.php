<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 11/17/2014
 * Time: 3:23 PM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class PageForm extends FormValidator {
	protected $rules = [
		'title'=>'required:max:250',
		'description:required'
	];
}