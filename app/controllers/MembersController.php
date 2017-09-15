<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 6/8/2014
 * Time: 8:26 AM
 */

class MembersController extends BaseController   {
    public function facebook_login(){
//        if(Session::has('member_id')){
//            return Redirect::to('/');
//        }
        // get data from input
        $code = Input::get( 'code' );
        // get fb service
        $fb = OAuth::consumer( 'Facebook' );
        // check if code is valid
        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken( $code );

            // Send a request with it
            $result =  json_decode($fb->request( '/me' ),true);
            $result['picture'] = 'http://graph.facebook.com/'.$result['id'].'/picture?type=large';
            $member_id = $result['id'];
            $member = Member::find($member_id);
            if($member){
                $member->login();
            }else {
                $member = Member::createMember($result);
                if($member){
                    $member->login();
                }
            }
            if(Session::has('member_id')){
                return Redirect::home();

            }else
                return "Login Fail";

            return Redirect::home();

        }
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return Redirect::to( (string)$url );
        }
    }
} 