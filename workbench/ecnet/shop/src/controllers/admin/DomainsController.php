<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: simkbaio@gmail.com
 * Date: 10/28/2014
 * Time: 12:26 PM
 */

namespace admin;


class DomainsController extends \BaseController {
	public function index(){
	    return \View::make('admin.domains.index');
	}
	public function show($id){
	    return \View::make('admin.domains.show');
	}

	public function edit($id){
	    return \View::make('admin.domains.edit');
	}
	public function update($id){
	    //
	}
	public function destroy($id){

	}
}