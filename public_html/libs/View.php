<?php
class View {
    public $title = 'Contact Website';
    public $arr_menu = array();
    public $heading;
    public $view_data = array();
    public $layout = 'default_layout';
    public $controller_name;
    function __construct($controllerName) {
        $this->controller_name = $controllerName;
    }
    //ko can thiet lam
//    function set_controller_name($controllerName){
//         $this->controller_name =$controllerName;
//    }
    function set_title($title) {
        $this->title = $title;
        return $this;
    }
    function set_data($view_data) {
        $this->view_data += $view_data;
        return $this;
    }
    function set_layout($name) {
        $this->layout = $name;
        return $this;
    }
    public function render($name) {
        foreach ($this->view_data as $k => $v) {
            $$k = $v;
        }
        if ($this->layout == null) {
            require VIEW_PATH . $name . '.tpl.php';
        } else {
            $header = VIEW_PATH . "layout/{$this->layout}.header.tpl.php";
            $footer = VIEW_PATH . "layout/{$this->layout}.footer.tpl.php";
            if (!file_exists($header)) {
                throw new Exception("Not found header :$header ");
            }
            if (!file_exists($footer)) {
                throw new Exception("Not found header :$footer ");
            }
            require $header;
            require VIEW_PATH . $name . '.php';
            require $footer;
        }
    }
    function get_controller_url() {
        return SITE_URL . $this->controller_name;
    }
}