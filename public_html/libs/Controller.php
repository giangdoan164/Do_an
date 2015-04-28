<?php

class Controller {

    function __construct($controllerName) {
        $this->view = new View($controllerName);
    }

    public function loadModel($name) {
        $path = MODEL_PATH. $name . '_model.php';
        if (file_exists($path)) {
            require MODEL_PATH. $name . '_model.php';
            //tu viet hoa khi new doi tuong
            $modelName = $name . '_Model';
//            $this->model = new $modelName(DB::get_connection());     
            return new $modelName(DB::get_connection());
        } else {
            throw new Exception("Khong co model " . $path);
        }
    }
    
     public function access_denied()
    {    
            $url_log_out = SITE_URL.'user/logout';
            die ('<h1 style="color:Red;text-align:center;width:100%;margin-top:50px">
                    Bạn không có quyền thực hiện chức năng này!
                    <br/><a href="javascript:void(0)" onclick="window.history.back()" >Nhấn vào đây để quay lại</a>
                    <br/><a href="'.$url_log_out.'">Đăng thoát</a>
                    </h1>');
    }

}
