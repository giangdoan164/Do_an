<?php

class Teacher_Model extends Model {

    function __construct($db) {
        parent::__construct($db);
    }
    
  public function qry_all_teacher()
    {
        $sql    = "SELECT *, c.C_CLASS_NAME, g.`PK_GRADE` 
                  FROM
                    t_teacher t 
                    INNER JOIN t_class c
                        ON t.FK_CLASS = c.PK_CLASS 
                     INNER JOIN t_grade g 
                        ON g.PK_GRADE =t.FK_GRADE ";
        $result = $this->db->GetAll($sql);
        return $result;
    }

    public function update_teacher_record(){
    $v_name = get_post_var('txt_teacher_name','');
    $v_phone = get_post_var('txt_teacher_phone','');
    $v_address = get_post_var('txt_teacher_address','');
    $v_email = get_post_var('txt_teacher_email','');
    $v_role = get_post_var('sel_teacher_role',3);
    $v_grade = get_post_var('sel_grade','');
    $v_class = get_post_var('sel_class','');
    $v_teacher_id = get_post_var('hdn_teacher_id',0);
    if($v_teacher_id >0){
        
    }else{
        $sql = "INSERT INTO t_teacher (C_NAME,C_PHONE,C_ADDRESS,C_EMAIL,FK_CLASS,FK_GROUP) VALUES (?,?,?,?,?,?)";
        $params = array($v_name,$v_phone,$v_address,$v_email,$v_class,$v_grade);
        $this->db->Execute($sql,$params);
    }
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
  
}