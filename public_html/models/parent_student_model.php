<?php

class Parent_student_Model extends Model
{

    function __construct($db)
    {
        parent::__construct($db);
    }

    public function qry_all_parent_contact()
    {
        
        //B1
        #Phan trang
        page_calc($v_start, $v_end);
        $v_start   = $v_start - 1;
        $v_limit   = $v_end - $v_start;
        //nho ve sau con them dieu kien loc theo khoi hoac theo lop
        $total_record = $this->db->GetOne("SELECT COUNT(*) from t_user WHERE FK_GROUP ='4' AND C_DELETED ='0'");
        #End phan trang
        
        //B2(xem dieu kien loc là gi)
        $condition = "WHERE t.FK_GROUP='4' AND t.C_DELETED ='0'";
        $filter_name    = get_post_var('txt_filter','');
        $filter_class   = get_post_var('sel_class', 0);
        $filter_grade   = get_post_var('sel_grade', 0);
        if(trim($filter_grade)!=0){$condition.="AND t.FK_GRADE ='$filter_grade'";}
        if(($filter_class)!=0){$condition.="AND t.FK_CLASS='$filter_class'";}
        if (trim($filter_name) == !'') {$condition .= "AND t.C_STUDENT_NAME like '%" . trim($filter_name) . "%'"; }
      
    
        
        $sql          = "SELECT *, c.C_CLASS_NAME, g.`PK_GRADE` ,$total_record as TOTAL_RECORD
                         FROM
                            t_user t 
                            LEFT JOIN t_class c
                                ON t.FK_CLASS = c.PK_CLASS 
                             INNER JOIN t_grade g 
                                ON g.PK_GRADE =t.FK_GRADE " . $condition . "LIMIT $v_start,$v_limit";
        $result       = $this->db->GetAll($sql);
        return $result;
    }

    
    public function update_single_parent_contact()
    {
        $v_parent_contact_id = get_post_var('hdn_parent_contact_id', 0);
        $v_student_name      = get_post_var('txt_student_name', '');
        $v_student_birth     = get_post_var('slt_student_birth', '');
        $v_father_name       = get_post_var('txt_father_name', '');
        $v_mother_name       = get_post_var('txt_mother_name', '');
        $v_email             = get_post_var('txt_parent_email', '');
        $v_phone             = get_post_var('txt_phone', '');
        $v_address           = get_post_var('txt_area_address', '');
        $v_class             = get_post_var('sel_class', '');
        $v_grade             = get_post_var('sel_grade', 0);

        if ($v_parent_contact_id > 0)
        {
            $sql    = "UPDATE 
                        t_user 
                    SET
                      C_STUDENT_NAME = ?,
                      C_STUDENT_BIRTH = ?,
                      C_FATHER_NAME = ?,
                      C_MOTHER_NAME = ?,
                      C_EMAIL = ?,
                      C_PHONE = ?,
                      C_ADDRESS = ?,
                      FK_GRADE = ?,
                      FK_CLASS = ? 
                    WHERE PK_USER = ?";
            $params = array($v_student_name, $v_student_birth, $v_father_name, $v_mother_name, $v_email, $v_phone, $v_address, $v_grade, $v_class, $v_parent_contact_id);
            $this->db->Execute($sql, $params);
        }
        else
        {
            $params = array($v_student_name, $v_student_birth, $v_father_name, $v_mother_name, $v_email, $v_phone, $v_address, $v_grade, $v_class, 4);
            $sql    = "INSERT INTO t_user (C_STUDENT_NAME,C_STUDENT_BIRTH,C_FATHER_NAME,C_MOTHER_NAME,C_EMAIL,C_PHONE,C_ADDRESS,FK_GRADE,FK_CLASS,FK_GROUP) VALUES(?,?,?,?,?,?,?,?,?,?)";
            $this->db->Execute($sql, $params);
        }

        return ($this->db->ErrorNo() == 0) ? TRUE : FALSE;
    }

    public function qry_single_parent_contact($v_id)
    {
        $sql    = "SELECT * FROM t_user WHERE PK_USER = ?";
        $result = $this->db->GetRow($sql, array($v_id));
        return $result;
    }
    
    public function delete_parent_contact(){
        $v_delete_list = get_post_var('hdn_item_id_list',0);
        $sql = "DELETE FROM `t_user` WHERE PK_USER IN ($v_delete_list)";
        //        $sql = "DELETE FROM `t_user` WHERE PK_USER IN ($v_delete_list)";
        $this->db->Execute($sql);
        return ($this->db->ErrorNo() == 0) ? TRUE : FALSE;
    }
}
