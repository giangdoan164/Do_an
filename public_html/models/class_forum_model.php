<?php

class Class_forum_Model extends Model {

    function __construct($db) {
        parent::__construct($db);
    }

    function qry_all_category() {
        $sql = 'SELECT * FROM t_category';
        $result = $this->db->GetAssoc($sql);
        return $result;
    }

    function qry_new_topic($arr_category) {
        $class_id = Session::get('class');
        $result = array();
        //neu ko co lop ==> chua dang nhap theo lop(giao vien or admin)
        if ($class_id == null) { return $result; } else {
         
            foreach ($arr_category as $key => $value) {
                $sql_new_topic[] = "SELECT
                                        FK_CATEGORY,
                                        C_NAME,
                                        C_TITLE,
                                        MAX(C_LATEST_DATE)
                                      FROM t_public_topic pt
                                        INNER JOIN t_user u
                                          ON pt.C_LAST_USER = u.PK_USER
                                            AND u.FK_CLASS = '$class_id'
                                            AND pt.FK_CATEGORY = '$key'";
            }
            $sql_new_topic = implode(" UNION ", $sql_new_topic);

            //cach nay ko lay duoc date luon 
//        else{$sql ="SELECT  FK_CATEGORY, MAX(C_POSTED_DATE) AS 'POSTED_DATE' , COUNT(PK_TOPIC) AS TOPIC_NUMBER
//                        FROM t_public_topic INNER JOIN t_user ON t_public_topic.C_POSTED_BY = t_user.PK_USER
//                        AND t_user.FK_CLASS =?
//                        GROUP BY FK_CATEGORY
//                        ORDER BY FK_CATEGORY ";

            $result = $this->db->GetAssoc($sql_new_topic);
            if ($this->db->ErrorNo() == 0) {
                return $result;
            } else {
                return FALSE;
            }
        }
    }

    function do_count_topic() {
        $class_id = Session::get('class');
        $result = array();
        if ($class_id == null) {
            return $result;
        } else {
            $sql = "SELECT FK_CATEGORY ,FK_CLASS, COUNT(PK_TOPIC) as POST_NUMBER FROM t_public_topic WHERE FK_CLASS ='$class_id' GROUP BY  FK_CATEGORY ORDER BY FK_CATEGORY";
            $result = $this->db->GetAssoc($sql);
        }
        if ($this->db->ErrorNo() == 0) {
            return $result;
        } else {
            return false;
        }
    }
    
    public function qry_all_topic($cate_id) {
        $class_id = Session::get('class');
        $result = array();
        //neu ko co lop ==> chua dang nhap theo lop(giao vien or admin)
        if ($class_id == null) {
            return $result;
        } else {

            $sql = "SELECT * FROM t_public_topic pt "
                    . "  INNER JOIN t_user u
                                          ON pt.C_LAST_USER = u.PK_USER "
                    . "WHERE pt.FK_CLASS = '$class_id' AND pt.FK_CATEGORY = '$cate_id'  ORDER BY C_LATEST_DATE DESC ";
            $result = $this->db->GetAll($sql);
        }
        if ($this->db->ErrorNo() == 0) {
            return $result;
        } else {
            return FALSE;
            return array(); //nhu nhau do arrat() tuong duong false;
        }
    }
    
    public function dsp_single_topic($topic_id){
        $class_id =Session::get('class');
        $result = array();
        if($class_id == null){
            return $result;
        }else{
//            SELECT * FROM t_public_post pt INNER JOIN t_user  u ON pt.C_POSTED_USER = u.PK_USER  WHERE pt.FK_CLASS = 3 AND pt.FK_TOPIC = 1

            $sql = "select * from t_public_post where PK_POST = '$topic_id'";
            $result = $this->db->GetRow($sql);
        }
        if($this->db->ErrorNo() == 0){
            return $result;
        }else{
            return false;
            return array();
        }
    }
    
    
}
    