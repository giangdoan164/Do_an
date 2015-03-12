<?php

/**
 * lay du lieu tu mang
 * @param array $array
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function fetch_array($array, $key, $default = NULL) {
    $var = isset($array[$key]) ? $array[$key] : $default;
    return $var;
}

/**
 * 
 * @param string $string
 * @return string
 */
function escape_string($string) {
    return mysql_real_escape_string($string);
}

/** @return User */
//function user() {
//    return Session::get('user', new User);
//}

/** Neu chua dang nhap, redirect den log */
//co ham check_login
//function require_login() {
//    if (!user()->is_logged) {
//        header("location :" . site_url('/login'));
//        exit();
//    }
//}

/** Gui http status forbidden */
function forbidden() {
    header('HTTP/1.0 403 Forbidden');
    die;
}

function site_url($uri = null, $params = array()) {
    $url = SITE_URL . '/' . trim($uri, "\\\/");
    $seperator = '?';
    foreach ($params as $k => $v) {
        $url .= "{$seperator}{$k}=$v";
        if ($seperator == '?') {
            $seperator = '&';
        }
    }
    return $url;
}

function replace_bad_char($str) {
    $str = stripslashes($str);
    $str = str_replace("&", '&amp;', $str);
    $str = str_replace('<', '&lt;', $str);
    $str = str_replace('>', '&gt;', $str);
    $str = str_replace('"', '&#34;', $str);
    $str = str_replace("'", '&#39;', $str);
    return $str;
}

function get_post_var($html_object_name, $default_value = '', $is_replace_bad_char = TRUE) {
    $var = isset($_POST[$html_object_name]) ? $_POST[$html_object_name] : $default_value;

    if ($is_replace_bad_char && !is_array($var)) {
        return replace_bad_char($var);
    }

    return $var;
}

function get_request_var($html_object_name, $default_value = '', $is_replace_bad_char = TRUE) {
    $var = isset($_REQUEST[$html_object_name]) ? $_REQUEST[$html_object_name] : $default_value;

    if ($is_replace_bad_char && !is_array($var)) {
        return replace_bad_char($var);
    }
    return $var;
}

function redirect($controller, $action) {
    header("location:" . SITE_URL . $controller . DS . $action);
    exit();
}

function require_login() {
        Session::init();
        $login = Session::get('loggedIn');
        if ($login == null) {
            Session::destroy();
            header('location:' . SITE_URL . 'user/login');
            return FALSE;
        }
        return TRUE;
}
