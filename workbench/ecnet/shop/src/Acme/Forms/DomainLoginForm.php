<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 11/5/2014
 * Time: 11:32 AM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class DomainLoginForm extends FormValidator{
	protected $rules = [
		'domain' =>'required|between:4,100',
		'password'=>'required|between:6,15',
	];
}