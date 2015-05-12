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
    
    public function check_is_user_name_exist($name,$birth){
        $sql = "SELECT COUNT(*) FROM t_user WHERE C_NAME = ?  AND C_STUDENT_BIRTH = ?";
        $params = array($name,$birth);
        $result = $this->db->GetOne($sql,$params);
        if($result==0){return FALSE;}//ko trung
        else{
            return $result;//co trung
        }
    }
//    $timestamp = strtotime('2008-07-01T22:35:17.02');
//$new_date_format = date('Y-m-d H:i:s', $timestamp);
    public function do_create_user_name($name,$birth){
       
        $name = trim($name);
        $birth = trim($birth,"-");
        
        //neu ko trung ten 
        $v_exist_record = $this->check_is_user_name_exist($name, $birth);
        $birth = date("d-m-Y",strtotime($birth));
        $arr_birth = explode("-",$birth );
        $birth = implode("",$arr_birth);
        $name = vn2latin($name,true);
        $arr_name = explode("-", $name);
        $name = implode("", $arr_name);
        if($v_exist_record==0){//ko trung
            return  $name.$birth;
        }else{//co trung
            $v_exist_record +=1;
            return $name.$birth.$v_exist_record;
        }
    }
    public function update_single_teacher() {
        $v_name = trim(get_post_var('txt_teacher_name', ''));
        $v_phone = get_post_var('txt_teacher_phone', '');
        $v_address = get_post_var('txt_area_address', '');
        $v_email = get_post_var('txt_teacher_email', '');
        $v_role = get_post_var('sel_role', 3);
        $v_grade = get_post_var('sel_grade', '');
        $v_class = get_post_var('sel_class', '');
        $v_teacher_id        = get_post_var('hdn_teacher_id', 0);
        $v_teacher_code      = get_post_var('txt_teacher_code', '');
        $v_student_birth     = get_post_var('slt_student_birth', '');
        $v_password          = md5('123456');
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
               $sql_get_current_info ="SELECT C_NAME,C_STUDENT_BIRTH,C_LOGIN_NAME FROM t_user WHERE PK_USER = $v_teacher_id";
            $arr_info = $this->db->GetRow($sql_get_current_info);
            // neu trung ngay sinh vs ten
             $v_current_birth = date('d-m-Y',  strtotime($arr_info['C_STUDENT_BIRTH']));
             $v_new_birth =     date('d-m-Y',  strtotime($v_student_birth));
             $v_current_name = trim($arr_info['C_NAME']);
             if($v_current_birth == $v_new_birth && $v_name == $v_current_name){
//khi updateneu ten dang nhap va mat khau giong nhau het cua thang hien tai thi se ten dang nhap se la cai cu
                  $v_login_name =$arr_info['C_LOGIN_NAME'];
             }else{
                 //neu ko se tao ten dang nhap moi
                  $v_birth = date('d-m-Y',  strtotime($v_student_birth));
                  $v_login_name = $this->do_create_user_name($v_name, $v_birth);
             }
           
            $sql = "UPDATE 
                t_user
              SET
                C_STUDENT_BIRTH = ?,
                C_LOGIN_NAME = ?,
                C_NAME = ?,
                C_PHONE = ?,
                C_ADDRESS = ? ,
                C_EMAIL = ?,
                FK_GROUP = ?,
                FK_GRADE = ?,
                FK_CLASS = ? 
              WHERE PK_USER = ?";
            $params = array($v_student_birth,$v_login_name,$v_name, $v_phone, $v_address, $v_email, $v_role, $v_grade, $v_class, $v_teacher_id);
            $this->db->Execute($sql, $params);
            $exec_result = '1';
        } else {  
            $v_teacher_code = trim($v_teacher_code);
            $sql = "SELECT COUNT(*) FROM t_user WHERE C_CODE = '$v_teacher_code'";
            $count_teacher = $this->db->GetOne($sql);
            if ($count_teacher == "0") {
                $v_birth = date('d-m-Y',  strtotime($v_student_birth));
                $v_login_name = $this->do_create_user_name($v_name, $v_birth);
                $sql = "INSERT INTO t_user (C_NAME,C_PHONE,C_ADDRESS,C_EMAIL,FK_CLASS,FK_GROUP,FK_GRADE,C_CODE,C_STUDENT_BIRTH,C_LOGIN_NAME,C_PASSWORD) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $params = array($v_name, $v_phone, $v_address, $v_email, $v_class, $v_role, $v_grade, $v_teacher_code,$v_student_birth,$v_login_name,$v_password);
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
    
    function check_teacher_has_school_record(){
//        $sql = $this->
    }
    public function delete_teacher() {
        $v_delete_list = get_post_var('hdn_item_id_list', 0);
        $arr_delete = explode(',', $v_delete_list);
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
