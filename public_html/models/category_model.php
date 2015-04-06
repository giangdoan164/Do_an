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
    
}