<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 11/14/2014
 * Time: 4:07 PM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class CameraDomainForm extends FormValidator {
	protected $rules = [
		'name'=>'required',
		'domain'=>'required',
	];
}