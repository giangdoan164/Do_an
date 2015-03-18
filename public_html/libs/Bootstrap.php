<?php

class Bootstrap {

    function __construct() {
        
// ko co thi goi mac dinh Con co thi xem no co dung hay ko
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //neu ko co controller thi goi controller mac dinh la Index va action mac dinh la index
        if (empty($url[0])) {

            require_once CONTROLLER_PATH . 'index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }
        $file = CONTROLLER_PATH . $url[0] . '.php';
        //kiem tra neu ton tai thi no co dung hay ko
        if (file_exists($file)) {
            require $file;
        } else {

            $this->error();
            return false; //ket thuc thuc hien ham hien tai
        }

        $controllerName = ucfirst($url[0]);
        $controller = new $controllerName();

        // Neu co tham so 
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } else {
            if (isset($url[1])) {//ton tai action
                //kiem tra co action co thuoc controller hay ko 
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->error();
                }
            } else {//ko ton tai action thi goi action mac dinh
                $controller->index();
            }
        }
    }

    private function error() {
        require_once CONTROLLER_PATH . 'error.php';
        $controller = new Error();
        $controller->index();
        return false; //ket thuc thuc hien ham nay
    }

}
