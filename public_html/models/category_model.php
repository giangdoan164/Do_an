<?php
class Category_Model extends Model{
    function __construct($db) {
        parent::__construct($db);
        
    }
    
    function qry_all_category(){
        $sql = 'SELECT * FROM t_category';
        $result = $this->db->GetAssoc($sql);
        return $result;
    }
    
    public function qry_category_name($cate_id){
        $sql = "SELECT C_NAME FROM t_category WHERE PK_CATEGORY ='$cate_id' ";
        $result = $this->db->GetOne($sql);
        if($this->db->ErrorNo() ==0){
            return $result;
        }else{
            return FALSE;
        }
    }
    
    public function add_new_category(){
        $v_cate_name = get_post_var('txt_name_category');
        $v_cate_description = get_post_var('txt_description_category');
        $sql = "INSERT INTO t_category(C_NAME,C_DESCRIPTION) VALUES ('$v_cate_name','$v_cate_description')";
        
        $result = $this->db->Execute($sql);
        if($this->db->ErrorNo() ==0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function delete_category(){
        
        $v_deleted_list = get_post_var('hdn_item_id_list');
        $sql = "DELETE FROM t_category WHERE PK_CATEGORY IN ($v_deleted_list)";
        $result = $this->db->Execute($sql);
        $arr_deleted_list = explode(',', $v_deleted_list);
        foreach ($arr_deleted_list as  $key) {
             $sql ="DELETE
                FROM t_public_post
                WHERE FK_TOPIC IN(SELECT
                                    PK_TOPIC
                                  FROM t_public_topic
                                  WHERE FK_CATEGORY = '$key')"; 
        }
        
         $this->db->Execute($sql);
         $sql = "DELETE FROM t_public_topic WHERE FK_CATEGORY IN($v_deleted_list)";
            $this->db->Execute($sql);
          if($this->db->ErrorNo() ==0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
}