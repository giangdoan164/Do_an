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
        if ($class_id == null) {
            return $result;
        } else {

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

    public function dsp_single_topic($topic_id) {
        $class_id = Session::get('class');
        $result = array();
        if ($class_id == null) {
            return $result;
        } else {
            $sql = "SELECT pp.*,u.C_LOGIN_NAME ,pt.C_TITLE FROM t_public_post pp INNER JOIN t_user u ON pp.C_POSTED_USER = u.PK_USER 
                                INNER JOIN t_public_topic pt ON pp.FK_TOPIC = pt.PK_TOPIC  
                        WHERE pp.FK_TOPIC = '$topic_id' ";
            $result = $this->db->GetAll($sql);
        }
        if ($this->db->ErrorNo() == 0) {
            return $result;
        } else {
            return false;
            return array();
        }
    }

    public function do_create_new_topic($category_id = 0) {
        $class_id = Session::get('class');
        $title = get_post_var('txt_title', '');
        $latest_date = $created_date = date('Y-m-d H:i:s');
        $create_user_id = $last_user_id = Session::get('user_id');
        $post_number = $view_number = 1;
        $content = get_post_var('txta_content');

        $result = array();
        if ($category_id == 0) {
            return $result;
        }
        if ($class_id == null) {
            return $result;
        }
        // tao 1 topic roi lay id topic cho vao post
        $sql = "INSERT INTO t_public_topic
            (FK_CLASS,
             FK_CATEGORY,
             C_TITLE,
             C_CREATED_DATE,
             C_LATEST_DATE,
             C_CREATER_USER,
             C_LAST_USER,
             C_POST_NUMBER,
             C_VIEW_NUMBER)
             VALUES (?,?,?,?,?,?,?,?,?)";
        $params = array($class_id, $category_id, $title, $created_date, $latest_date, $create_user_id, $last_user_id, $post_number, $view_number);
        $this->db->Execute($sql, $params);

        //tra lai insert ID cua thang topic
        $v_topic_id = $this->db->Insert_ID();
        // tao 1 post 
        $sql = "INSERT INTO t_public_post  (FK_TOPIC,C_CONTENT,C_POSTED_DATE,C_POSTED_USER) VALUES (?,?,?,?)";
        $params = array($v_topic_id, $content, $created_date, $create_user_id);
        $this->db->Execute($sql, $params);
        if ($this->db->ErrorNo() == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_view_number($topic_id){
        $sql = "SELECT C_VIEW_NUMBER FROM t_public_topic WHERE PK_TOPIC ='$topic_id'";
        $current_view = $this->db->GetOne($sql);
        $current_view = intval($current_view) +1;
        $sql = "UPDATE t_public_topic SET C_VIEW_NUMBER ='$current_view' WHERE PK_TOPIC = '$topic_id'";
        $this->db->Execute($sql);
        if($this->db->ErrorNo()==0){
            return true;
        }else{
            return false;
        }
    }
    
    public function qry_topic_title($topic_id){
        $sql = "SELECT C_TITLE from t_public_topic WHERE PK_TOPIC = '$topic_id'";
        $result = $this->db->GetOne($sql);
         if($this->db->ErrorNo()==0){
            return $result;
        }else{
            return false;
        }
    }
    
    public function reply_topic($data){
      $topic_id = $data['topic_id'];
      $user_id = $data['user_id'];
      $content_reply = $data['content'];
      $posted_date = date('Y-m-d H:i:s');
      //1 insert vao bang post
      $params = array($topic_id,$content_reply,$posted_date,$user_id);
      $sql = "INSERT INTO t_public_post (FK_TOPIC,C_CONTENT,C_POSTED_DATE,C_POSTED_USER) VALUES(?,?,?,?)";
      $this->db->Execute($sql,$params);
      
      $sql = "SELECT C_POST_NUMBER FROM t_public_topic WHERE PK_TOPIC = '$topic_id'";
      $curr_post = $this->db->GetOne($sql);
      $curr_post = intval($curr_post) + 1;
      
      //2 update trong bao topic
      $sql = "UPDATE t_public_topic SET C_LATEST_DATE = ?,C_LAST_USER =?,C_POST_NUMBER =? WHERE  PK_TOPIC = ?";
      $params = array($posted_date,$user_id,$curr_post,$topic_id);
      $this->db->Execute($sql,$params);
         if($this->db->ErrorNo()==0){
            return true;
        }else{
            return false;
        }
    }
}
