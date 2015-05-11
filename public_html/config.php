<?php
//Thuc chat dinh nghia cac bien global ko thay doi gia tri
//======================== DATABASE ============================
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc');
//define('DB_NAME', 'contact_website');
define('DB_USER', 'root');
define('DB_PASS', '');
//define('DEBUG_MODE',0);
define('LIMIT', 20);

$debug=0;
//=========================== ĐƯỜNG DẪN =========================
//
//Khai bao các đường dẫn giúp ứng dụng linh hoạt và dễ nâng cấp hơn
//tranh up len cac host thi tranh sai sot ve van de duong dan
//Cac duong dan luon ket thuc boi dau xuyet             
define('DS', DIRECTORY_SEPARATOR);

// Đường dẫn tương đối (URL):load các tâp tin CSS,Javascript ,image hiển thị trong trong web

//define('SITE_URL', '/FinalProject/public_html/');//ảnh ọt css controller
//define('ROOT_URL', DS.'FinalProject'.DS.'public_html'.DS);//ảnh ọt css controller
define('SITE_URL', '/FinalProject/public_html/');//ảnh ọt css controller
define('ROOT_URL', DS.'FinalProject'.DS.'public_html'.DS);//ảnh ọt css controller


//define('SITE_URL','/FinalProject/');//ảnh ọt css controller
//define('ROOT_URL', DS.'FinalProject'.DS);//ảnh ọt css controller


define('PUBLIC_URL', ROOT_URL.'public'.DS);//ảnh ọt css controller
define('VIEW_URL',ROOT_URL.'views'.DS);
define('LIBS_URL',ROOT_URL.'libs'.DS);

  //  Đường dẫn tuyệt đối (PATH): nhúng các tập tin .php vào một tập tin .php nào đó,đường dẫn path thường đc dùng vs hàm include , require
//C:\xampp\htdocs\FinalProject\public_html\ nhu nhau

// ĐỊnh nghĩa đường dẫn đến thư mục gốc   --> require file cu the
//define('BASE_DIR', __DIR__.DS);
define('ROOT_PATH',dirname(__FILE__).DS);
define('SERVER_ROOT',dirname(__FILE__).DS);

define('EXCEL_PATH',SERVER_ROOT.'contact_files'.DS);
//định nghĩa đường dẫn đên thư viện
define('LIBRARY',ROOT_PATH.DS.'libs'.DS);

//Dinh nghia duong dan den thu muc controller 
define('CONTROLLER_PATH',ROOT_PATH.'controllers'.DS);
//Dinh nghia duong dan den thu muc models
define('MODEL_PATH',ROOT_PATH.'models'.DS);
//Dinh nghia duong dan den thu muc views
define('VIEW_PATH',ROOT_PATH.'views'.DS);
//Dinh nghia duong dan den thu muc  public 
define('PUBLIC_PATH',ROOT_PATH.'public'.DS);



if(isset($_REQUEST['debug']))
{
    $debug= 99999;     
}

define('DEBUG_MODE',$debug);
//          o   TRUE:  Bat che do debug 
if (DEBUG_MODE > 0)
{
    error_reporting(E_ALL);
    ini_set('display_errors',1);
}
else
{
    error_reporting(E_ALL);
    ini_set('display_errors',0);
}

define('_CONST_RECORD_FILE_ACCEPT', 'xls,xlsx');
define('CONST_FILE_UPLOAD_PATH',SERVER_ROOT.'uploads'.DS);


