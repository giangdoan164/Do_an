<?php

class Announce_Model extends Model
{

    function __construct($db)
    {
        parent::__construct($db);
    }
     
    public function qry_all_announce(){
      $condition='WHERE 1>0';
  
       #Phan trang
      page_calc($v_start, $v_end);
      $v_start = $v_start - 1;
      $v_limit = $v_end - $v_start;
        #End phan trang
      
      $user_id = Session::get('user_id');
      $class_id = Session::get('class');
      $user_level =Session::get('level');
      //neu la giao vien lop thi se hien thi theo lop thoi
      // con neu la giao vien truong(quyen = 1,2 ) thi se hien thi het
      if($user_level ==3 || $user_level ==4){$condition .= " AND a.FK_CLASS ='$class_id'"; }
      if($user_level ==4){$condition .=" AND a.FK_PARENT_USER = '$user_id'";}
      //giao vien  truong thi chi hien cua thong bao cua truong thoi
//      else if($teacher_level ==2){$condition .=" AND a.FK_TEACHER_USER = '40' ";}
      $total_record = $this->db->GetOne("SELECT COUNT(*)  FROM `t_announce` a $condition");
        #End phan trang
        //B2(xem dieu kien loc là  gi)
        $content_announce = get_post_var('txt_content_announce','');
        $ann_type = get_post_var('sel_type',0);
        $ann_time = get_post_var('sel_time',0);
        $ann_grade = get_post_var('sel_grade',0);
        $ann_class = get_post_var('sel_class',0);
        $ann_student_name = get_post_var('sel_student_name',0);
        if($ann_class !=0){$condition .=" AND a.FK_CLASS ='$ann_class'";}
        if($ann_grade !=0) {$condition .=" AND a.FK_GRADE = '$ann_grade' ";}
        if($ann_type != 0){$condition .=" AND a.FK_CATEGORY ='$ann_type'";}
        if($ann_student_name != 0){$condition .=" AND a.FK_PARENT_USER= '$ann_student_name'";}
        if(trim($content_announce)==!''){ $condition .= " AND C_CONTENT like '%".trim($content_announce)."%'";}
        
         $sql = "SELECT 
                    a.* ,u.`C_STUDENT_BIRTH`,c.`C_CLASS_NAME`,u.`C_NAME` ,u1.`C_NAME` AS C_TEACHER_NAME
                    FROM
                      `t_announce` a 
                      INNER JOIN `t_user` u 
                        ON (a.`FK_PARENT_USER` = u.PK_USER) 
                      INNER JOIN t_user u1 
                        ON (a.`FK_TEACHER_USER` = u1.`PK_USER`) 
                      INNER JOIN `t_class` c 
                        ON (c.`PK_CLASS` = a.`FK_CLASS`) 
                          $condition LIMIT $v_start,$v_limit";
        $result = $this->db->GetAll($sql);
        return $result;
        
       
    }

}