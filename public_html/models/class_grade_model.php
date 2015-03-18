<?php

class Class_grade_Model extends model {

    function __construct($db) {
        parent::__construct($db);
        }

    function qry_all_class(){
       $grade_id = get_post_var('grade_id',0);
       if($grade_id>0){
           $sql = "SELECT * FROM t_class c INNER  JOIN t_grade g ON c.FK_GRADE = g.PK_GRADE AND g.PK_GRADE = $grade_id";
           
           }else{
           $sql = "SELECT * FROM t_class ";
       }
       $result = $this->db->GetAll($sql);
       return $result;
    }
    
    function qry_all_grade(){
        $class_id =  get_post_var('class_id',0);
        if($class_id >0){
         $sql = "SELECT * FROM `t_class` c INNER JOIN `t_grade` g ON c.`FK_GRADE` =g.`PK_GRADE` AND c.`PK_CLASS`=  $class_id";    
          $result = $this->db->GetRow($sql);
         }else{
            $sql ="SELECT * FROM `t_grade`" ;
            $result = $this->db->GetAll($sql);
        }
        return $result;
    }
    
    public function qry_all_class_teacher(){
        $condition = '';
        $grade = get_post_var('sel_grade',0);
        if($grade > 0){$condition = "WHERE c.FK_GRADE = $grade";}
        $sql = "SELECT * FROM  t_class  c LEFT JOIN t_teacher t ON c.PK_CLASS =t.FK_CLASS $condition";
        $result = $this->db->GetAll($sql);
         if($this->db->ErrorNo() == 0)
        {
            return $result;
        }
        return array();
    }
    
    public function delete_class(){
        $v_delete_list = get_post_var('hdn_item_id_list',0);
        $sql = "DELETE FROM `t_class` WHERE PK_CLASS IN ($v_delete_list)";
        $this->db->Execute($sql);
        $sql = "UPDATE `t_teacher` SET FK_CLASS = '' WHERE FK_CLASS IN ($v_delete_list)" ;
        $this->db->Execute($sql);
        return ($this->db->ErrorNo() == 0) ? TRUE : FALSE;
    }

}