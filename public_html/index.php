<?php
//
//if (!ini_get('date.timezone'))
//{
////    date_default_timezone_set('GMT');
    date_default_timezone_set('Asia/Ho_Chi_Minh');  
//    set tring php.ini   ;date.timezone=Asia/Ho_Chi_Minh
//date.timezone=GMT
//}

require 'libs/adodb5/adodb.inc.php';
require 'config.php';
require 'const.php';
require 'libs/functions.php';
require 'libs/DB.php';
require 'libs/Session.php';
require 'libs/Exeptions.php';
// co bao nhieu thu vien thi phai require bay nhieu --> autoload Chuong 6 02 autoload :giúp tu dong nap cac file ma ko can require
//function __autoload($className){
//    $path = 'libs/';
//    require_once $path.$className.'.php';
//}
//ham __autoload da tu dong lam roi
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
$app = new Bootstrap();
