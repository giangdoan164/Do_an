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
    //ajax
    public function qry_all_student(){
        $result = array();
        $class_id = get_post_var('class_id',0);
        if($class_id >0){
            $sql = " SELECT * FROM t_user WHERE FK_CLASS = '$class_id' AND FK_GROUP <> 3";
            $result = $this->db->GetAll($sql);
        }
        return $result;
        
    }
    //qry student theo lop cua giao vien
    public function qry_all_student2(){
        
      $result = array();
      $class_id = Session::get('class');
        
      page_calc($v_start, $v_end);
      $v_start = $v_start - 1;
      $v_limit = $v_end - $v_start;
      
        #End phan trang
      $total_record = $this->db->GetOne("SELECT * FROM t_user u INNER JOIN t_class  c ON u.FK_CLASS = c.PK_CLASS   WHERE u.FK_CLASS = '$class_id' AND u.FK_GROUP <> 3 ");
        #End phan trang
        
        if($class_id != null){
            $sql = " SELECT * FROM t_user u INNER JOIN t_class  c ON u.FK_CLASS = c.PK_CLASS   WHERE u.FK_CLASS = '$class_id' AND u.FK_GROUP <> 3 " ;
            $result = $this->db->GetAll($sql);
            
        }
        return $result;
    }
    
    //lay thong tin lop cua giao vien
    public function qry_user_class(){
        $result = array();
        $class_id = Session::get('class');
        if($class_id!=null){
            $sql = "SELECT * FROM t_class WHERE PK_CLASS ='$class_id'";
            $result = $this->db->GetRow($sql);
        }
        return $result;
    }
    
    public function qry_student_log_info(){
//        $result = array();
//        $clas
    }
    public function qry_all_class_teacher(){
       
        $condition = '';
        $grade = get_post_var('sel_grade_main',0);
        #Phan trang
        page_calc($v_start, $v_end);
        $v_start = $v_start - 1;
        $v_limit = $v_end - $v_start;
        #End phan trang
        $total_record = $this->db->GetOne("SELECT COUNT(*) from t_class");
        if($grade > 0){$condition = "WHERE c.FK_GRADE = $grade";}
        $sql = "SELECT * ,$total_record as TOTAL_RECORD FROM  t_class  c LEFT JOIN t_user t ON ( c.PK_CLASS =t.FK_CLASS AND t.FK_GROUP ='3') $condition "."LIMIT $v_start,$v_limit";
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
        $sql = "UPDATE `t_user` SET FK_CLASS = '' WHERE FK_CLASS IN ($v_delete_list)" ;
        $this->db->Execute($sql);
        return ($this->db->ErrorNo() == 0) ? TRUE : FALSE;
    }

    public function check_is_class_exist(){
         $v_class_name = trim(get_post_var('txt_class_name',''));
            $sql = "SELECT COUNT(*)
                    FROM
                    t_class t 
                    WHERE C_CLASS_NAME = ?";
            $count = $this->db->GetOne($sql,array($v_class_name));
            if(intval($count)>=1){return true;}
        
        return false;
    }
    
    public function add_new_class(){
        $v_class_name = trim(get_post_var('txt_class_name',''));
        $v_grade = get_post_var('sel_grade',0);
        $sql = "INSERT INTO t_class (C_CLASS_NAME,FK_GRADE) VALUES (?,?)";
        $this->db->Execute($sql,array($v_class_name,$v_grade));
        if($this->db->ErrorNo()==0){return true;}
        return false;
    }
    
}