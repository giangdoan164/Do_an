<?php

class Teacher_Model extends Model {

    function __construct($db) {
        parent::__construct($db);
    }

    public function qry_all_teacher() {
        $condition = '';
        $filter = get_post_var('txt_filter', '');
        #Phan trang
        page_calc($v_start, $v_end);
        $v_start = $v_start - 1;
        $v_limit = $v_end - $v_start;
        #End phan trang
        $total_record = $this->db->GetOne("SELECT COUNT(*) from t_user WHERE FK_GROUP ='3' AND C_DELETED ='0'");
        #End phan trang
        //B2(xem dieu kien loc là gi)
        $condition = "WHERE t.FK_GROUP='3' OR t.FK_GROUP ='2' AND t.C_DELETED ='0'";
        if (trim($filter) == !'') {
            $condition .= "AND C_NAME like '%" . trim($filter) . "%'";
        }

        $sql = "SELECT *, c.C_CLASS_NAME, g.`PK_GRADE` ,$total_record as TOTAL_RECORD
                  FROM
                    t_user t 
                    LEFT JOIN t_class c
                        ON t.FK_CLASS = c.PK_CLASS 
                    LEFT JOIN t_grade g 
                        ON g.PK_GRADE =t.FK_GRADE " . $condition . "LIMIT $v_start,$v_limit";
        $result = $this->db->GetAll($sql);
        return $result;
    }

    public function update_single_teacher() {
        $v_name = get_post_var('txt_teacher_name', '');
        $v_phone = get_post_var('txt_teacher_phone', '');
        $v_address = get_post_var('txt_area_address', '');
        $v_email = get_post_var('txt_teacher_email', '');
        $v_role = get_post_var('sel_role', 3);
        $v_grade = get_post_var('sel_grade', '');
        $v_class = get_post_var('sel_class', '');
        $v_teacher_id = get_post_var('hdn_teacher_id', 0);
        $v_teacher_code = get_post_var('txt_teacher_code', '');
         $is_exist_teacher = $this->check_teach_has_class($v_teacher_id);
        if ($is_exist_teacher == true) {
            $DATA['error'] = "Lớp đã chọn có giáo viên chủ nhiệm";
            $this->exec_fail($this->goback_url, $DATA['error']);
            exit();
        }
        if($v_role=='2'){
            $v_class ='';
            $v_grade='';
        }
        if ($v_teacher_id > 0) {
            $sql = "UPDATE 
                t_user
              SET
                C_NAME = ?,
                C_PHONE = ?,
                C_ADDRESS = ? ,
                C_EMAIL = ?,
                FK_GROUP = ?,
                FK_GRADE = ?,
                FK_CLASS = ? 
              WHERE PK_USER = ?";
            $params = array($v_name, $v_phone, $v_address, $v_email, $v_role, $v_grade, $v_class, $v_teacher_id);
            $this->db->Execute($sql, $params);
            $exec_result = '1';
        } else {  
            $v_teacher_code = trim($v_teacher_code);
            $sql = "SELECT COUNT(*) FROM t_user WHERE C_CODE = '$v_teacher_code'";
            $count_teacher = $this->db->GetOne($sql);
            if ($count_teacher == "0") {
                $sql = "INSERT INTO t_user (C_NAME,C_PHONE,C_ADDRESS,C_EMAIL,FK_CLASS,FK_GROUP,FK_GRADE,C_CODE) VALUES (?,?,?,?,?,?,?,?)";
                $params = array($v_name, $v_phone, $v_address, $v_email, $v_class, $v_role, $v_grade, $v_teacher_code);
                $this->db->Execute($sql, $params);
                $exec_result = '1';
            } else {
                $exec_result = 'exist';
            }
        }
        return ($this->db->ErrorNo() == 0) ? $exec_result : FALSE;
    }

    public function qry_single_teacher($v_id) {
        $sql = "SELECT * FROM t_user WHERE PK_USER = ?";
        $result = $this->db->GetRow($sql, array($v_id));
        return $result;
    }

    public function qry_all_class() {
        $sql = "SELECT * FROM t_class";
        $result = $this->db->GetAll($sql);
        return $result;
    }

    public function qry_all_grade() {
        $sql = "SELECT * FROM t_grade ";
        $result = $this->db->GetAll($sql);
        return $result;
    }

    public function delete_teacher() {
        $v_delete_list = get_post_var('hdn_item_id_list', 0);
        $sql = "DELETE FROM `t_user` WHERE PK_USER IN ($v_delete_list)";
        $this->db->Execute($sql);
        return ($this->db->ErrorNo() == 0) ? TRUE : FALSE;
    }

    public function check_teach_has_class($teacher_id) {
        
        $v_class = get_post_var('sel_class', 0);
        if ($v_class == 0) {
            return false;
        } else {
            $sql = "SELECT COUNT(*)
                    FROM
                    t_user t 
                    INNER JOIN t_class c
                        ON t.FK_CLASS = c.PK_CLASS 
                   AND c.PK_CLASS = ? AND t.FK_GROUP = '3' AND PK_USER <> '$teacher_id'";
            $count = $this->db->GetOne($sql, array($v_class));
            if (intval($count) >= 1) {
                return true;
            }
        }
        return false;
    }

}
