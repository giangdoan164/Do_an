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
    function get_request_var($html_object_name, $default_value = '', $is_replace_bad_char = TRUE)
{
    $var = isset($_REQUEST[$html_object_name]) ? $_REQUEST[$html_object_name] : $default_value;
    
    if ($is_replace_bad_char && !is_array($var))
    {
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

function show_error($msg){
    echo "<b>Đã xảy ra lỗi ".$msg."</b><a href='#'>Quay lại trang chủ</a>";
}


function page_calc(&$v_start, &$v_end)
{
    //Luu dieu kien loc
    $v_page          = isset($_POST['sel_goto_page']) ? replace_bad_char($_POST['sel_goto_page']) : 1;
    $v_rows_per_page = isset($_POST['sel_rows_per_page']) ? replace_bad_char($_POST['sel_rows_per_page']) : _CONST_DEFAULT_ROWS_PER_PAGE;
    $v_page          = ($v_page >0)  ? $v_page : 1;
    $v_rows_per_page = ($v_rows_per_page > 0)  ? $v_rows_per_page : _CONST_DEFAULT_ROWS_PER_PAGE;
    
    $v_start = $v_rows_per_page * ($v_page - 1) + 1;
    $v_end   = $v_start + $v_rows_per_page - 1;
}

function vn2latin($cs, $tolower = false)
{
        /*Mảng chứa tất cả ký tự có dấu trong Tiếng Việt*/
        $marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
        "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề",
        "ế","ệ","ể","ễ",
        "ì","í","ị","ỉ","ĩ",
        "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ",
        "ờ","ớ","ợ","ở","ỡ",
        "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
        "ỳ","ý","ỵ","ỷ","ỹ",
        "đ",
        "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă",
        "Ằ","Ắ","Ặ","Ẳ","Ẵ",
        "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
        "Ì","Í","Ị","Ỉ","Ĩ",
        "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
        "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
        "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
        "Đ"," ");

        /*Mảng chứa tất cả ký tự không dấu tương ứng với mảng $marTViet bên trên*/
        $marKoDau=array("a","a","a","a","a","a","a","a","a","a","a",
        "a","a","a","a","a","a",
        "e","e","e","e","e","e","e","e","e","e","e",
        "i","i","i","i","i",
        "o","o","o","o","o","o","o","o","o","o","o","o",
        "o","o","o","o","o",
        "u","u","u","u","u","u","u","u","u","u","u",
        "y","y","y","y","y",
        "d",
        "A","A","A","A","A","A","A","A","A","A","A","A",
        "A","A","A","A","A",
        "E","E","E","E","E","E","E","E","E","E","E",
        "I","I","I","I","I",
        "O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
        "U","U","U","U","U","U","U","U","U","U","U",
        "Y","Y","Y","Y","Y",
        "D","-");

        if ($tolower) {
                return strtolower(str_replace($marTViet,$marKoDau,$cs));
        }

        return str_replace($marTViet,$marKoDau,$cs);
 
}

//echo vn2latin("Đoàn Hoàng   Giang",true);
function seoname($str){
    if(!$str) return false;
    $unicode = array(
        'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
        'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
        'd'=>array('đ'),
        'D'=>array('Đ'),
        'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
        'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
        'i'=>array('í','ì','ỉ','ĩ','ị'),
        'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
        'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
        'O'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
        'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
        'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
        'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
        'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
        '-'=>array(' ','&quot;','.','-–-')
    );
    foreach($unicode as $nonUnicode=>$uni){
        foreach($uni as $value)
        $str = @str_replace($value,$nonUnicode,$str);
        $str = preg_replace("/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/","-",$str);
        $str = preg_replace("/-+-/","-",$str);
        $str = preg_replace("/^\-+|\-+$/","",$str);
    }
    return strtolower($str);
}  
function chuyenChuoi($str) {
// In thường
     $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
     $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
     $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
     $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
     $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
     $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
     $str = preg_replace("/(đ)/", 'd', $str);    
     $str = html_entity_decode ($str);
     $str = str_replace(array(' ','_'), '-', $str); 
        $str = html_entity_decode ($str);
        $str = str_replace("ç","c",$str);
        $str = str_replace("Ç","C",$str);
        $str = str_replace(" / ","-",$str);
        $str = str_replace("/","-",$str);
        $str = str_replace(" - ","-",$str);
        $str = str_replace("_","-",$str);
        $str = str_replace(" ","-",$str);
        $str = str_replace( "ß", "ss", $str);
        $str = str_replace( "&", "", $str);
        $str = str_replace( "%", "percent", $str);
        $str = str_replace("----","-",$str);
        $str = str_replace("---","-",$str);
        $str = str_replace("--","-",$str);
        $str = str_replace(".","-",$str);
        $str = str_replace(",","",$str);
// In đậm
     $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
     $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
     $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
     $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
     $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
     $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
     $str = preg_replace("/(Đ)/", 'D', $str);
     return $str; // Trả về chuỗi đã chuyển
     }
     
     
 
 
