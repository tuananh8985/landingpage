<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 11/18/2014
 * Time: 1:51 PM
 */

namespace admin;
use Input;
use Redirect;
use View;

class ConfigsController extends AdminController {
	public function index(){
		if(Input::has('group')){
			$configs = \EConfig::whereGroup(Input::get('group'))->get();
			$group = Input::get('group');
		}else{
			$configs = \EConfig::orderBy('group')->get();
			$group = "";

		}
		return View::make('admin::admin.configs.index')
			->withConfigs($configs)
			->withGroup($group);
	}
	public function create(){
	    return View::make('admin::admin.configs.create');
	}
	public function store(){
	    $input = Input::only('group','key','value');
		$config = \EConfig::create($input);

		return Redirect::back()
			->withMessage('Create new Config done!');


	}
	public function ajaxUpdateConfig(){
	    if(Input::has('id')){
		    \EConfig::find(Input::get('id'))->update([
			   'group'=>Input::get('group'),
			   'key'=>Input::get('key'),
			   'value'=>Input::get('value'),
		    ]);
		    return json_encode(true);
	    }else{
		    return json_encode(false);
	    }
	}
public function ajaxDeleteConfig(){
	    if(Input::has('id')){
		    \EConfig::find(Input::get('id'))->delete();
		    return json_encode(true);
	    }else{
		    return json_encode(false);
	    }
	}

}