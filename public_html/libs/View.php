<?php
class View {
    public $title = 'Contact Website';
    public $arr_menu = array();
    public $heading;
    public $view_data = array();
    public $layout = 'default_layout';
//    public $controller_name;
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
//    function set_data($view_data) {
//        $this->view_data += $view_data;
//        return $this;
//    }
    function set_layout($name) {
        $this->layout = $name;
        return $this;
    }
    public function render($name ,$VIEW_DATA =array() ) {
        $v_view_file =  VIEW_PATH . $name . '.php';
        if (file_exists($v_view_file))
        {
            if (is_array($VIEW_DATA)) {
                foreach ($VIEW_DATA as $key => $val) {
                    $$key = $val;
                  }
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
                    require $v_view_file;
                    require $footer;
                }
        }else 
        {
           die("Không tìm thấy <b>$v_view_file</b>");
        }
}

    public function get_controller_url() {
        return SITE_URL . $this->controller_name.'/';
    }
    
    public  function hidden($name, $value = '')
    {
        if (strpos($value, '"') !== FALSE)
        {
            return '<input type="hidden" name="' . $name . '" id="' . $name . '" value=\'' . $value . '\' />';
        } else
        {
            return '<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />';
        }
    }
}