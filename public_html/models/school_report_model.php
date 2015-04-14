<?php

class School_report_Model extends Model {

    function __construct($db) {
        parent::__construct($db);
    }
    
    public function qry_all_student_class(){
        $result = array();
        $class_id = Session::get('class');
        $sql ="SELECT u.PK_USER ,u.C_NAME FROM t_user u INNER JOIN t_class c WHERE  u.FK_CLASS = c.PK_CLASS AND u.FK_CLASS = $class_id AND  u.FK_GROUP =4 ";
       
//        $sql="INSERT INTO `t_shcool_report` (FK_TEACHER_USER,FK_PARENT_USER,FK_GRADE,FK_CLASS,C_SEMESTER,C_YEAR,C_MATH_GRADE,C_LITERATURE_GRADE,C_FINAL_GRADE,C_TEACHER_REMARK)
//VALUES(1,1,1,1,1,1,1,1,1,1)";
        $result = $this->db->GetAll($sql);
        return $result;
    }
    
    
}