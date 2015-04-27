<?php

class Model {

    /** @var  ADOConnection  */
    public $db;//construc dc chay khi khoi tao model trong loadModel
    function __construct($db) {
         $this->db = $db;
//        $this->db->SetFetchMode(ADODB_FETCH_ASSOC);
//        $this->db->debug = DEBUG_MODE;
//        $this->db->debug = 1;
    }

    /**
     * 
     * @param string $table
     * @param array $arr_data
     * @return int ID vua tao
     */
    public function insert($table, $arr_data) {
        if (!is_array($arr_data)) {
            throw new InvalidTypeException("Yeu cau $arr_data la mot mang");
        }
        $col = implode(",", array_keys($arr_data));
        $arr_value = array_values($arr_data);
        foreach ($arr_data as $value) {
            $arr_q[] = "?";
        }
        $arr_q = implode(',', $arr_q);
        $sql = "insert into $table($col) values($arr_q)";
        $this->db->Execute($sql, $arr_value);
        return $this->db->Insert_ID();
    }

    /**
     * 
     * @param string $table
     * @param array $arr_data
     * @param string $where
     * @param array $where_params
     */
    function update($table, $arr_data, $where, $where_params = array()) {
        if (!is_array($arr_data)) {
            throw new InvalidTypeException("Yeu cau $arr_data la mot mang");
        }
        if (!is_array($where_params)) {
            throw new InvalidTypeException("Yeu cau $where_params la mot mang");
        }
        $arr_set = array_keys($arr_data);
        foreach ($arr_set as $val) {
            $new_arr_set[] = $val . "=?";
        }
        $im_arr_set = implode(",", $new_arr_set);

        $where = " where " . $where;
        $update_val_arr1 = array_values($arr_data);
        $update_val_arr2 = array_values($where_params);
        $update_val_arr = array_merge($update_val_arr1, $update_val_arr2);
        $sql = "UPDATE $table SET $im_arr_set $where ";
        $result = $this->db->Execute($sql, $update_val_arr);
        if ($result == true) {
            return $this->db->Affected_Rows();
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param string $table
     * @param string $where
     * @param array $where_params
     */
    function delete($table, $where, $where_params = array()) {
        $where = " where " . $where;
        $sql = "delete from $table $where";
        $result = $this->db->Execute($sql, $where_params);
        if ($result == true) {
            return $this->db->Affected_Rows();
        } else {
            return false;
        }
    }
    
        //Quay ve man hinh truoc sau khi thuc hien thao tac voi CSDL
    public static function exec_done($url, $filter_array = array()) {
        $html = '<html><head></head><body>';
        $html .= '<form name="frmMain" action="' . $url . '" method="POST">';

        foreach ($filter_array as $key => $val) {
            $html .= View::hidden($key, $val);
        }

        $html .= '</form>';
        $html .= '<script type="text/javascript">document.frmMain.submit();</script>';
        $html .= '</body></html>';

        echo $html;
        exit;
    }
  //Quay ve man hinh truoc sau khi thuc hien thao tac voi CSDL
    public static function exec_fail($url, $message, $filter_array = array()) 
    {
        $html  = '<html><head></head><body>';
        $html .= '<form name="frmMain" action="' . $url . '" method="POST">';

        foreach ($filter_array as $key => $val) 
        {
            if(is_array($val))
            {
                $html .= View::hidden($key, json_encode($val));
            }
            else
            {
                $html .= View::hidden($key, $val);
            }
        }
        $html .= '</form><script type="text/javascript">';
        if(!is_null($message))
        {
            $html .= 'alert("' . $message . '");';
        }
        $html .= 'document.frmMain.submit();</script></body></html>';
        echo $html;
        exit;
    }

}
