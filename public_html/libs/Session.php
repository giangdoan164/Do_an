<?php

class Session {
    public static function init(){
        session_start();
    }

    public static function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key]: null ;
    }

    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    public static function destroy(){
        session_destroy();
    }
//    
     public static function check_login()
    {
        Session::init();
        $login = Session::get('loggedIn');
       
        if ($login == null)
        {
            Session::destroy();
            header('location:'.SITE_URL.'user/login');
            return FALSE;
        }
        return TRUE;
    }
}
