<?php

class Announce_Model extends Model
{

    function __construct($db)
    {
        parent::__construct($db);
    }
     
    public function qry_all_announce(){
      $condition='';
      $filter = get_post_var('txt_content_announce','');
       #Phan trang
      page_calc($v_start, $v_end);
      $v_start = $v_start - 1;
      $v_limit = $v_end - $v_start;
        #End phan trang
      $teacher_id = Session::get('user_id');
      $class_id = Session::get('class');
      $total_record = $this->db->GetOne("SELECT COUNT(*)  FROM `t_announce` a where a.FK_CLASS = '$class_id' AND (a.FK_TEACHER_USER ='$teacher_id' OR a.FK_TEACHER_USER ='40')");
        #End phan trang
        //B2(xem dieu kien loc là gi)
      if(trim($filter)==!''){ $condition .= "Where C_CONTENT like '%".trim($filter)."%'";}
         $condition .= "AND a.FK_CLASS ='$class_id'";
         $sql = "SELECT  * , (SELECT C_NAME FROM t_user WHERE t_user.`PK_USER` = $teacher_id ) AS C_TEACHER_NAME , $total_record as TOTAL_RECORD
        FROM
        `t_announce` a 
        INNER JOIN `t_user` u 
          ON (a.`FK_PARENT_USER` = u.PK_USER)
        INNER JOIN `t_class` c
         ON (c.`PK_CLASS` = a.`FK_CLASS`) 
        $condition LIMIT $v_start,$v_limit";
        $result = $this->db->GetAll($sql);
        return $result;
        
       
    }

}