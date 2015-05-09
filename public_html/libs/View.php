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
//    function set_data($view_data) {
//        $this->view_data += $view_data;
//        return $this;
//    }
    function set_layout($name) {
        $this->layout = $name;
        return $this;
    }
   
    public function render($name, $DATA = array(), $include = true) {

//        $v_view_file =  VIEW_PATH . $name . '.php';
//        if (file_exists($v_view_file))
//        {
//            if (is_array($VIEW_DATA)) {
//                foreach ($VIEW_DATA as $key => $val) {  
//                    $$key = $val;
//                  }
//                  }
//                if ($this->layout == null) {
//                    require VIEW_PATH . $name . '.tpl.php';
//                } else {
//                    $header = VIEW_PATH . "layout/{$this->layout}.header.tpl.php";
//                    $footer = VIEW_PATH . "layout/{$this->layout}.footer.tpl.php";
//                    if (!file_exists($header)) {
//                        throw new Exception("Not found header :$header ");
//                    }
//                    if (!file_exists($footer)) {
//                        throw new Exception("Not found header :$footer ");
//                    }
//                    require $header;
//                    require $v_view_file;
//                    require $footer;
//                }
//        }else 
//        {
//           die("Không tìm thấy <b>$v_view_file</b>");
//        }

        if (is_array($DATA)) {
            foreach ($DATA as $key => $val) {
                $$key = $val;
            }
        }
        if ($this->layout == null) {
            require VIEW_PATH . $name . '.tpl.php';
        } else {
            $header = $footer = '';
            $v_view_file = VIEW_PATH . $name . '.php';
            if (file_exists($v_view_file)) {

                if ($include == true) {
                    $header = VIEW_PATH . "layout/{$this->layout}.header.tpl.php";
                    $footer = VIEW_PATH . "layout/{$this->layout}.footer.tpl.php";
                    if (!file_exists($header)) {
                        throw new Exception("Not found header :$header ");
                        if (!file_exists($footer)) {
                            throw new Exception("Not found header :$footer ");
                        }
                    }
                }

                if (!empty($header) && !empty($footer)) {
                    require $header;
                    require $v_view_file;
                    require $footer;
                } else {
                    require $v_view_file;
                }
            } else {
                die("Không tìm thấy <b>$v_view_file</b>");
            }
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

    
     /**
     * thêm row rỗng vào danh sách 
     * @param type $no_cur_row: số lượng row hiện tại
     * @param type $no_col: số cột có trong danh sách
     * @return string
     */
    public function render_rows($no_cur_row, $no_col, $v_limit_row = 0) {

        $rows_per_page = isset($_POST['sel_rows_per_page']) ? replace_bad_char($_POST['sel_rows_per_page']) : _CONST_DEFAULT_ROWS_PER_PAGE;
        $rows_per_page = ($v_limit_row > 0) ? $v_limit_row : $rows_per_page;
        $html = '';

        $v_loop = ($rows_per_page > $no_cur_row) ? $rows_per_page - $no_cur_row : 0;
        for ($i = 0; $i < $v_loop; $i++) {
            $html .= '<tr>';
            for ($j = 0; $j < $no_col; $j++) {
                $html .= '<td>&nbsp;</td>';
            }
            $html .= '</tr>';
        }

        return $html;
    }
    
    
    public static function generate_select_option($arrData, $selected = NULL, $public_xml_file_name = '')
    {
        $html = '';
        if ($public_xml_file_name !== '')
        {
            $f = SERVER_ROOT . 'public/xml/' . $public_xml_file_name;
            if (file_exists($f))
            {
                $xml = simplexml_load_file($f);
                $items = $xml->xpath("//item");
                foreach ($items as $item)
                {
                    $str_selected = ($item->attributes()->name == strval($selected)) ? ' selected' : '';
                    $html .= '<option value="' . $item->attributes()->name . '"' . $str_selected . '>' . $item->attributes()->value . '</option>';
                }
            }
            
        } else
        {
            foreach ($arrData as $key => $val)
            {
                $str_selected = ($key == strval($selected)) ? ' selected' : '';
                $html .= '<option value="' . $key . '"' . $str_selected . '>' . $val . '</option>';
            }
        }
        return $html;
    }

    
       public static function paging2($arr_all_record)
    {
        $html = '';

        $rows_per_page = isset($_POST['sel_rows_per_page']) ? replace_bad_char($_POST['sel_rows_per_page']) : _CONST_DEFAULT_ROWS_PER_PAGE;
        $rows_per_page = ($rows_per_page > 0) ? $rows_per_page : _CONST_DEFAULT_ROWS_PER_PAGE;
        if (isset($arr_all_record[0]['TOTAL_RECORD']))
        {
            $page = isset($_POST['sel_goto_page']) ? replace_bad_char($_POST['sel_goto_page']) : 1;
            $total_record = $arr_all_record[0]['TOTAL_RECORD'];
        } else
        {
            $page = 1;
            $total_record = $rows_per_page;
        }

        if ($total_record % $rows_per_page == 0)
        {
            $v_total_page = $total_record / $rows_per_page;
        } else
        {
            $v_total_page = intval($total_record / $rows_per_page) + 1;
        }

        $arr_page = array();
        for ($i = 1; $i <= $v_total_page; $i++)
        {
            $arr_page[$i] = 'Trang '. '&nbsp;' . $i;
        }

        $html .= '<div class="padding pull-right" id="pager">';
        $html .= 'Tổng số ' . ' ' . $v_total_page . ' ' . ' Trang &nbsp&nbsp';

        $html .= '. ' . ' Chuyển tới '. ' <select class="input-small" name="sel_goto_page" onchange="this.form.submit();">';
        $html .= self::generate_select_option($arr_page, $page);
        $html .= '</select>. ';

        $html .= ' Hiển thị ' . ' <select class="input-mini" name="sel_rows_per_page" onchange="this.form.sel_goto_page.value=1;this.form.submit();">';
        $html .= self::generate_select_option(null, $rows_per_page, 'xml_rows_per_page.xml');
        $html .= '</select> ' . ' Bản ghi' . '/1 ' .'Trang ';

        $html .= '</div>';

        return $html;
        
    }
       public static function paging_forum_new($arr_all_record)
    {
        $html = '';

        $rows_per_page = 5;
     
        if (isset($arr_all_record[0]['TOTAL_RECORD']))
        {
            $page = isset($_POST['sel_goto_page']) ? replace_bad_char($_POST['sel_goto_page']) : 1;
            $total_record = $arr_all_record[0]['TOTAL_RECORD'];
        } else
        {
            $page = 1;
            $total_record = $rows_per_page;
        }

        if ($total_record % $rows_per_page == 0)
        {
            $v_total_page = $total_record / $rows_per_page;
        } else
        {
            $v_total_page = intval($total_record / $rows_per_page) + 1;
        }

        $arr_page = array();
        for ($i = 1; $i <= $v_total_page; $i++)
        {
            $arr_page[$i] = 'Trang '. '&nbsp;' . $i;
        }

        $html .= '<div class="padding pull-right" id="pager">';
        $html .= 'Tổng số ' . ' ' . $v_total_page . ' ' . ' Trang &nbsp&nbsp';

        $html .= '. ' . ' Chuyển tới '. ' <select class="input-small" name="sel_goto_page" onchange="this.form.submit();">';
        $html .= self::generate_select_option($arr_page, $page);
        $html .= '</select>. ';
        $html .= '</div>';
        return $html;
        
    }
    
     public static function paging3($total_record,$page =1, $rows_per_page=_CONST_DEFAULT_ROWS_PER_PAGE){
        $html='';
        if ($total_record % $rows_per_page == 0)
        {
            $v_total_page = $total_record / $rows_per_page;
        } else
        {
            $v_total_page = intval($total_record / $rows_per_page) + 1;
        }
        if($v_total_page > 1){
            $html.="<ul class='ul_pagination'>";
            $html.="<li><a href='#' num_page=1 class='page_item' title='Trang đầu'>&laquo;</a></li>";
            for ($i = 1; $i <= $v_total_page; $i++)
            {
                if($page == $i){
                    $html.="<li class='active'><a href='#' num_page='$i' class='page_item' title='Trang $i'>$i</a></li>";
                }
                else{
                     $html.="<li><a href='#' num_page='$i' class='page_item' title='Trang $i'>$i</a></li>";
                }
            }
            $html.="<li><a href='#' num_page=$v_total_page class='page_item' title='Trang cuối'>&raquo;</a></li>";
            $html.="</ul>";
        }
        return $html;
    }
    
     public static function paging_forum($total_record,$page =1, $rows_per_page='5'){
        $html='';
        if ($total_record % $rows_per_page == 0)
        {
            $v_total_page = $total_record / $rows_per_page;
        } else
        {
            $v_total_page = intval($total_record / $rows_per_page) + 1;
        }
        if($v_total_page > 1){
            $html.="<ul class='ul_pagination'>";
            $html.="<li><a href='#' num_page=1 class='page_item' title='Trang đầu'>Trang đầu</a></li>";
            $begin = intval($page) -2 ;
            if($begin < 1){$begin = 1;}
            $end = $page +2;
            if($end > $v_total_page ){$end = $v_total_page;}
            
            for ($i = $begin; $i <= $end; $i++)
            {
                if($page == $i){
                    $html.="<li class='active'><a href='#' num_page='$i' class='page_item' style='color:#FDFDFD' title='Trang $i'>$i</a></li>";
                }
                else{
                     $html.="<li><a href='#' num_page='$i' class='page_item' title='Trang $i'>$i</a></li>";
                }
            }
            $html.="<li><a href='#' num_page=$v_total_page class='page_item' title='Trang cuối'>Trang cuối</a></li>";
            $html.="</ul>";
        }
        return $html;
    }

    
    
 }