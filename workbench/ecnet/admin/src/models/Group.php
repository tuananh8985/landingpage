<?php
	class Group extends Eloquent{
		protected $guarded = array();
		public static $rules =array(
			'name'=>'required|max:100'
		);
		public static function arrayAll(){
			$arr =array();
			foreach(Group::orderBy('name')->get() as $g){
				$arr[$g->id] = $g->name;
			}
			return $arr;
		}
		public static function createGroup($name,$roles_input){
			$permis = array();
            $roles = $roles_input;
            foreach(Role::all() as $role){
                if(in_array($role->name, $roles_input)){
                	$permis[$role->name]=1;
                }else{
                	$permis[$role->name]=0;
                }
            }
            try
			{
			    // Create the group
			    Sentry::createGroup(array(
			        'name'        => $name,
			        'permissions' => $permis,
			    ));
			    return true;
			}
			catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
			{
			    return 'Bạn chưa nhập tên cho group.';
			}
			catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
			{
			    return 'Tên nhóm đã tồn tại.';
			}
		}
		public static function updateGroup($id,$name,$roles_input){
			$group  = Sentry::findGroupById($id);
			$permis = array();
            $roles = $roles_input;
            foreach(Role::all() as $role){
                if(in_array($role->name, $roles_input)){
                	$permis[$role->name]=1;
                }else{
                	$permis[$role->name]=0;
                }
            }
            try
			{
			    // Create the group
			    $group->name = $name;
    			$group->permissions = $permis;
    			if($group->save())
			    	return true;
			    else{
			    	return "Có lỗi trong quá trình cập nhật";
			    }
			}
			catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
			{
			    return 'Group already exists.';
			}
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
			{
			    return 'Group was not found.';
			}
		}
	}