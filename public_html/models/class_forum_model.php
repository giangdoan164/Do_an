<?php

class Class_forum_Model extends Model {
    function __construct($db) {
        parent::__construct($db);
    }
    
    
    function qry_all_category(){
        $class_id  = Session::get('class');
        $result = array();
        if($class_id == null){return $result;}
        else{$sql ="SELECT FK_CATEGORY, C_NAME , C_TITLE ,MAX(C_POSTED_DATE)  FROM t_public_topic  pt INNER JOIN t_user u ON  pt.C_POSTED_BY = u.PK_USER AND u.FK_CLASS = ? AND pt.FK_CATEGORY =1 
                    UNION 
                    SELECT  FK_CATEGORY,C_NAME , C_TITLE ,MAX(C_POSTED_DATE) FROM t_public_topic  pt INNER JOIN t_user u ON  pt.C_POSTED_BY = u.PK_USER AND u.FK_CLASS = ? AND pt.FK_CATEGORY = 2 
                    UNION 
                    SELECT  FK_CATEGORY,C_NAME , C_TITLE ,MAX(C_POSTED_DATE) FROM t_public_topic  pt INNER JOIN t_user u ON  pt.C_POSTED_BY = u.PK_USER AND u.FK_CLASS = ? AND pt.FK_CATEGORY = 3  ";
                    
        //cach nay ko lay duoc date luon 
//        else{$sql ="SELECT  FK_CATEGORY, MAX(C_POSTED_DATE) AS 'POSTED_DATE' , COUNT(PK_TOPIC) AS TOPIC_NUMBER
//                        FROM t_public_topic INNER JOIN t_user ON t_public_topic.C_POSTED_BY = t_user.PK_USER
//                        AND t_user.FK_CLASS =?
//                        GROUP BY FK_CATEGORY
//                        ORDER BY FK_CATEGORY ";
        $result = $this->db->GetAll($sql,array($class_id,$class_id,$class_id));}
        if($this->db->ErrorNo() ==  0){
            return $result;
        }else{
            return FALSE;
        }
        
        
    }
    
    function do_count_topic(){
        $class_id = Session::get('class');
        $result = array();
        if($class_id == null){return $result;}
        else{
            $sql = "SELECT FK_CATEGORY , COUNT(PK_TOPIC) POST_NUMBER FROM t_public_topic WHERE FK_CLASS ='$class_id' GROUP BY  FK_CATEGORY ORDER BY FK_CATEGORY" ;
            $result = $this->db->GetAll($sql);
        }
        if($this->db->ErrorNo() == 0){
            return $result;
        }else{
            return false;
        }
    }
}