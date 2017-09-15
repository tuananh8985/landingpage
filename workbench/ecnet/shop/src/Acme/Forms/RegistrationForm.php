<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/8/2014
 * Time: 3:19 PM
 */

namespace Acme\Forms;

use Laracasts\Validation\FormValidator;


class RegistrationForm extends FormValidator
{
    protected $rules = [
	    'first_name'=>'required|max:100',
	    'last_name'=>'required|max:100',
        'email' => 'required|email|max:100|unique:users',
        'password' => 'required|confirmed',

    ];
	public $messages = [
		'first_name.required'=>'Bạn chưa nhập tên',
		'first_name.max'=>'Tên quá dài ( chỉ được nhiều nhât 100 kí tự )',

		'last_name.required'=>'Bạn chưa nhập họ',
		'last_name.max'=>'Họ quá dài ( chỉ được nhiều nhât 100 kí tự )',

		'email.required'=>'Bạn chưa nhập Email',
		'email.max'=>'Email quá dài ( chỉ nhiều nhất 100 kí tự',

	];
} 