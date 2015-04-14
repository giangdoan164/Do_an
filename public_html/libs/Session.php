<?php
class Session {
    const SESSION_INITED = '_session_inited';
    public static function init() {
        if (!isset($_SESSION[static::SESSION_INITED])) {
            session_start();
            $_SESSION[static::SESSION_INITED] = true;
        }
    }
    public static function get($key) {
        static::init();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    public static function set($key, $val) {
        static::init();
        $_SESSION[$key] = $val;
    }
    public static function destroy() {
        static::init();           
        if (isset($_SESSION[static::SESSION_INITED]) && $_SESSION[static::SESSION_INITED] == true) {
            $_SESSION = array();
            session_destroy();
        }
    }
    
    public static function check_login() {
        static::init();
        $login = Session::get('loggedIn');
        if ($login == null) {
            
            Session::destroy();
            header('location:' . SITE_URL . 'user');
            return FALSE;
        }
        return TRUE;
    }
}