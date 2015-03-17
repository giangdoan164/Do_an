<?php

class Class_grade_Model extends model {

    function __construct($db) {
        parent::__construct($db);
        }

    function qry_all_class(){
       $grade_id = get_post_var('class_id',0);
       if($grade_id>0){
           $sql = "SELECT * FROM t_class c INNER  JOIN t_grade g ON c.FK_GRADE = g.PK_GRADE AND g.PK_GRADE = $grade_id";
       }else{
           $sql = "SELECT * FROM t_class ";
       }
       $result = $this->db->GetAll($sql);
       return $result;
    }

}