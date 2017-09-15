<?php


class Member extends Eloquent {
    public $table ="facebook_members";
    public $timestamps =false;
    public static function createMember($input){
        $member = new Member() ;
        $data_array = ['id','email','first_name','last_name','gender','link','name','picture'];
        foreach($data_array as $element){
            if(isset($input[$element])){
                $member->$element = $input[$element];
            }
        }
        if(isset($input['hometown'])){
            $member->hometown = $input['hometown']['name'];
        }
        if(isset($input['location'])){
            $member->location = $input['location']['name'];
        }
        if($member->save()) {
            return $member;
        }

        return false;

    }
    // Login User
    public function login(){
        if(Session::has('member_id')){
            return true;
        }else{
            Session::put('member_id',$this->id);
            return true;
        }
    }
//    Kiểm tra đăng nhập
    public static function checkLogin(){
        if(Session::has('member_id')){
            return true;
        }else{
            return false;
        }
    }
    //Lấy thông tin user đang đăng nhập
    public static function user(){
        if(Session::has('member_id')){
            $member = Member::findOrFail(Session::get('member_id'));
            return $member;
        }else{
            return Redirect::to('facebooklogin');
        }
    }


} 