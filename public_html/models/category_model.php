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
    
}