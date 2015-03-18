<?php

class Teacher_Model extends Model {

    function __construct($db) {
        parent::__construct($db);
    }
    
  public function qry_all_teacher()
 {
      $condition='';
      $filter = get_post_var('txt_filter','');
      if(trim($filter)==!''){ $condition = "WHERE C_NAME like '%".trim($filter)."%'";}
        $sql    = "SELECT *, c.C_CLASS_NAME, g.`PK_GRADE` 
                  FROM
                    t_teacher t 
                    INNER JOIN t_class c
                        ON t.FK_CLASS = c.PK_CLASS 
                     INNER JOIN t_grade g 
                        ON g.PK_GRADE =t.FK_GRADE ".$condition;
        $result = $this->db->GetAll($sql);
        return $result;
    }

    public function update_single_teacher(){
  
    $v_name = get_post_var('txt_teacher_name','');
    $v_phone = get_post_var('txt_teacher_phone','');
    $v_address = get_post_var('txt_area_address','');
    $v_email = get_post_var('txt_teacher_email','');
    $v_role = get_post_var('sel_teacher_role',3);
    $v_grade = get_post_var('sel_grade','');
    $v_class = get_post_var('sel_class','');
    $v_teacher_id = get_post_var('hdn_teacher_id',0);
    if($v_teacher_id >0){
        $sql = "UPDATE 
                `t_teacher` 
              SET
                C_NAME = ?,
                C_PHONE = ?,
                C_ADDRESS = ? ,
                C_EMAIL = ?,
                FK_GROUP = ?,
                FK_GRADE = ?,
                FK_CLASS = ? 
              WHERE PK_USER = ?";
        $params = array($v_name,$v_phone,$v_address,$v_email,$v_role,$v_grade,$v_class,$v_teacher_id);
        $this->db->Execute($sql,$params);
    }else{
        $sql = "INSERT INTO t_teacher (C_NAME,C_PHONE,C_ADDRESS,C_EMAIL,FK_CLASS,FK_GROUP,FK_GRADE) VALUES (?,?,?,?,?,?,?)";
        $params = array($v_name,$v_phone,$v_address,$v_email,$v_class,$v_role,$v_grade);
        $this->db->Execute($sql,$params);
    }
     return ($this->db->ErrorNo() == 0) ? TRUE : FALSE;
  }
  
    public function qry_single_teacher($v_id){
        $sql = "SELECT * FROM t_teacher WHERE PK_USER = ?";
        $result = $this->db->GetRow($sql,array($v_id));
        return $result;

    }
  
    public function qry_all_class(){
          $sql = "SELECT * FROM t_class";
          $result = $this->db->GetAll($sql);
          return $result;
      }
   
    public function qry_all_grade(){
        $sql = "SELECT * FROM t_grade ";
        $result = $this->db->GetAll($sql);
        return $result;

    }

    public function delete_teacher(){
        $v_delete_list = get_post_var('hdn_item_id_list',0);
        $sql = "DELETE FROM `t_teacher` WHERE PK_USER IN ($v_delete_list)";
        $this->db->Execute($sql);
        return ($this->db->ErrorNo() == 0) ? TRUE : FALSE;
    }
    
    public function check_teach_has_class(){
    
        $v_class = get_post_var('sel_class',0);
   
        if($v_class==0){return false;}
        else{
  
            $sql = "SELECT COUNT(*)
                  FROM
                    t_teacher t 
                    INNER JOIN t_class c
                        ON t.FK_CLASS = c.PK_CLASS 
                   AND c.PK_CLASS = ?";
            $count = $this->db->GetOne($sql,array($v_class));
            if(intval($count)>=1){return true;}
        }
        return false;
    }
    
}