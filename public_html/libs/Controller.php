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

}
