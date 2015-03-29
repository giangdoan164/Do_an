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
           $total_record = $this->db->GetOne("SELECT COUNT(*)  FROM `t_announce` a $condition");
         $sql = "SELECT 
                    a.* ,u.`C_STUDENT_BIRTH`,c.`C_CLASS_NAME`,u.`C_NAME` ,u1.`C_NAME` AS C_TEACHER_NAME , $total_record as TOTAL_RECORD
                    FROM
                      `t_announce` a 
                      INNER JOIN `t_user` u 
                        ON (a.`FK_PARENT_USER` = u.PK_USER) 
                      INNER JOIN t_user u1 
                        ON (a.`FK_TEACHER_USER` = u1.`PK_USER`) 
                      INNER JOIN `t_class` c 
                        ON (c.`PK_CLASS` = a.`FK_CLASS`) 
                          $condition  ORDER BY a.C_DATE  DESC  LIMIT $v_start,$v_limit ";
        $result = $this->db->GetAll($sql);
        return $result;
        
       
    }
    
    public function add_new_announce(){
         
        $v_ann_date = date('Y-m-d H:i:s');
        $v_ann_content = trim(get_post_var('txta_ann',''));
        $v_cate = get_post_var('sel_type',0);
        $v_teacher_id = Session::get('user_id');
        $role = Session::get('level');
        //neu la giao vien lop
        if($role==3){
        $v_grade = get_post_var('sel_grade',0);
        $v_scope = get_post_var('radio_ann_scope',0);
        $v_list = get_post_var('hdn_item_id_list','');
   
    
        $v_class = get_post_var('sel_class',0);
        
        $arr_parent_id = array();
        if($v_list !=''){
            $arr_parent_id = explode(',', $v_list);
        }
        if($v_scope ==1){
            foreach ($arr_parent_id as $parent_id){
                $sql = "INSERT INTO t_announce SET FK_CATEGORY=?,FK_TEACHER_USER=?,FK_PARENT_USER=?,FK_CLASS=?,FK_GRADE=?,C_DATE=?,C_CONTENT=?";
                $param =array($v_cate,$v_teacher_id,$parent_id,$v_class,$v_grade,$v_ann_date,$v_ann_content);
                $this->db->Execute($sql,$param);
            }
        }else{
            foreach ($arr_parent_id as $parent_id){
                 $sql = "INSERT INTO t_announce SET FK_CATEGORY=?,FK_TEACHER_USER=?,FK_PARENT_USER=?,FK_CLASS=?,FK_GRADE=?,C_DATE=?,C_CONTENT=?";
                 $v_ann_content = get_post_var('txt_sle_std_ann_'."$parent_id",'');
                 $param =array($v_cate,$v_teacher_id,$parent_id,$v_class,$v_grade,$v_ann_date,$v_ann_content);
                 $this->db->Execute($sql,$param);
            }
        }
        //neu la giao vien truong
      }else{
         $v_sel_rade = intval(get_post_var('sel_grade',0) ) ;
         $condition = '';
         if($v_sel_rade > 0){$condition .="AND FK_GRADE = '$v_sel_rade'";}
         $sql  = "SELECT PK_USER,FK_GRADE,FK_CLASS FROM t_user WHERE FK_GROUP =4";
         $arr_parent_announced =  $this->db->GetAll($sql);
         foreach ($arr_parent_announced as $parent_announced){  
              $v_parent_id =  $parent_announced['PK_USER'];
              $v_class = $parent_announced['FK_CLASS'];
              $v_grade = $parent_announced['FK_GRADE'];
                $sql = "INSERT INTO t_announce SET FK_CATEGORY=?,FK_TEACHER_USER=?,FK_PARENT_USER=?,FK_CLASS=?,FK_GRADE=?,C_DATE=?,C_CONTENT=?";
                $param =array($v_cate,$v_teacher_id,$v_parent_id,$v_class,$v_grade,$v_ann_date,$v_ann_content);
                $this->db->Execute($sql,$param);
         } 
      }
      if($this->db->ErrorNo()==0){
          return true;
      }  
      
      return FALSE;
      }

}