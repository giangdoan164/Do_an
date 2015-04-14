<?php

class Private_thread_Model extends model {

    function __construct($db) {
        parent::__construct($db);
    }
    
    public function qry_new_unread_message_thread(){
        $user_id = Session::get('user_id');
        $result = array();
        $sql = "SELECT 
                pm.FK_THREAD,
                COUNT(*) AS UNREAD_MESSAGE_NUMBER 
              FROM
                t_private_message_read_state pmrs 
                INNER JOIN t_private_message pm 
                  ON pmrs.FK_MESSAGE = pm.PK_MESSAGE 
              WHERE FK_USER = '$user_id' 
                AND C_READ_STATE = 0 
              GROUP BY FK_THREAD ";
       $result =  $this->db->GetAssoc($sql);
       return $result;
    }
        
    public function qry_all_thread() {
        $user_id = Session::get('user_id');
        $result = array();
        // lay ra toan bo chu de ma co lien quan den thang co usser_id nhu tren;
        $sql = "SELECT pt.PK_THREAD ,pt.C_TITLE,pt.C_CREATED_DATE ,u.C_LOGIN_NAME FROM t_private_thread pt
                INNER JOIN t_user u on u.PK_USER  = pt.C_CREATED_USER  
            WHERE PK_THREAD 
                IN (SELECT FK_THREAD  FROM t_private_thread_participant WHERE FK_USER = '$user_id') ORDER BY pt.C_CREATED_DATE DESC";
        $result = $this->db->GetAssoc($sql);
        return $result;
    }

    public function qry_all_thread_has_unread_message(){
        $arr_unread = $this->qry_new_unread_message_thread();
        if(sizeof($arr_unread)==0){return array();}
        else{
              $arr_unread_mess_key = array_keys($arr_unread);
              $list_unread_mess = implode(",", $arr_unread_mess_key);
              $user_id = Session::get('user_id');
              $result = array();
            // lay ra toan bo chu de ma co lien quan den thang co usser_id nhu tren;
            $sql = "SELECT pt.PK_THREAD ,pt.C_TITLE,pt.C_CREATED_DATE ,u.C_LOGIN_NAME FROM t_private_thread pt
                    INNER JOIN t_user u on u.PK_USER  = pt.C_CREATED_USER  
                    WHERE PK_THREAD 
                    IN ($list_unread_mess) ORDER BY pt.C_CREATED_DATE DESC";
            $result = $this->db->GetAssoc($sql);
            return $result; 
        }
       
    }
    
    public function qry_single_thread($thread_id) {
        #Phan trang
        $page = get_request_var('page', 1);
        $page = ((int) $page > 1) ? (int) $page : 1;
        $v_start = ($page - 1) * 5;
        #End phan trang
        //cap nhat lai trang thai doc tin;
        $user_id = Session::get('user_id');
        $sql = "SELECT PK_MESSAGE FROM t_private_message WHERE FK_THREAD = '$thread_id' AND FK_SENDING_USER <> '$user_id'";
        $list_message =$this->db->GetCol($sql);
        $list_message =  implode(',', $list_message);
        $sql ="UPDATE t_private_message_read_state SET C_READ_STATE = 1 WHERE FK_USER = '$user_id' AND FK_MESSAGE IN ($list_message)";
        $this->db->Execute($sql);
        
        
        $sql_count = "SELECT COUNT(*)  FROM t_private_message pm WHERE FK_THREAD = '$thread_id' ";
        $result = array();
        $sql = "SELECT
                pm.*,
                u.C_LOGIN_NAME
                ,pt.C_TITLE , ($sql_count) as C_TOTAL
                FROM t_private_message pm
                INNER JOIN t_user u
                  ON pm.FK_SENDING_USER = u.PK_USER
                INNER JOIN t_private_thread pt 
                  ON pt.PK_THREAD = pm.FK_THREAD
              WHERE FK_THREAD = '$thread_id' LIMIT $v_start,5";
        $result = $this->db->GetAll($sql);
        return $result;
    }

    public function create_reply_to_thread($arr) {
        // 1: them vao bang message noi dung user tra loi 
        $sent_date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO t_private_message(FK_THREAD,C_CONTENT,FK_SENDING_USER,C_SENT_DATE) VALUES (?,?,?,?)";
        $params = array($arr['thread_id'], $arr['content'], $arr['user_id'], $sent_date);
        $this->db->Execute($sql, $params);

        //tra lai insert ID cua thang message vua insert
        $v_message_id = $this->db->Insert_ID();
        // 2 : them vao bang trang thai tin nhan 2 ban ghi 
        //cua thang gui tin nhan
        $sql = "INSERT INTO t_private_message_read_state(FK_MESSAGE,FK_USER,C_READ_STATE) VALUES (?,?,?)";
        $params = array($v_message_id, $arr['user_id'], 1);
        $this->db->Execute($sql, $params);

        //cua thang nhan tin nhan 
        $sql = "SELECT FK_USER FROM t_private_thread_participant WHERE FK_THREAD = ? AND FK_USER <> ?";
        $params = array($arr['thread_id'], $arr['user_id']);
        $receive_user_id = $this->db->GetOne($sql, $params);

        //insert trang thai doc tin cua thang nhan 
        $sql = "INSERT INTO t_private_message_read_state(FK_MESSAGE,FK_USER,C_READ_STATE) VALUES (?,?,?)";
        $params = array($v_message_id, $receive_user_id, 0);
        $this->db->Execute($sql, $params);
        if ($this->db->ErrorNo() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function do_create_new_thread() {
   
        $started_user_id = Session::get('user_id');
        $title = get_post_var('txt_title');
        $created_date = date('Y-m-d H:i:s');
        $second_user_id = get_post_var('sel_class_student');
        $reply_content = get_post_var('txta_reply_content');

        //1
        $sql = "INSERT INTO t_private_thread(C_TITLE,C_CREATED_DATE,C_CREATED_USER) VALUES(?,?,?)";
        $params = array($title, $created_date, $started_user_id);
        $this->db->Execute($sql, $params);
        $new_thread_id = $this->db->Insert_ID();
        
        //2
        $sql = "INSERT INTO t_private_thread_participant(FK_THREAD,FK_USER) VALUES (?,?)";
        $params = array($new_thread_id, $started_user_id);
        $this->db->Execute($sql, $params);
        $sql = "INSERT INTO t_private_thread_participant(FK_THREAD,FK_USER) VALUES (?,?)";
        $params = array($new_thread_id, $second_user_id);
        $this->db->Execute($sql, $params);

        //3
        $sql = "INSERT INTO t_private_message(FK_THREAD,C_CONTENT,FK_SENDING_USER,C_SENT_DATE) VALUES (?,?,?,?)";
        $params = array($new_thread_id, $reply_content, $started_user_id, $created_date);
        $this->db->Execute($sql, $params);
        $pk_message_id = $this->db->Insert_ID();

        //4
        $sql = "INSERT INTO t_private_message_read_state(FK_MESSAGE,FK_USER,C_READ_STATE) VALUES (?,?,?)";
        $params = array($pk_message_id, $started_user_id, 1);
        $this->db->Execute($sql, $params);

        $sql = "INSERT INTO t_private_message_read_state(FK_MESSAGE,FK_USER,C_READ_STATE) VALUES (?,?,?)";
        $params = array($pk_message_id, $second_user_id, 0);
        $this->db->Execute($sql, $params);

        if ($this->db->ErrorNo() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function qry_all_contact() {
        $class_id = Session::get('class');
        $level = Session::get('level');
        $sql = "SELECT * FROM  t_user WHERE FK_CLASS = '$class_id' AND FK_GROUP <>'$level'";
        $result = $this->db->GetAll($sql);
        return $result;
    }
    
    public function del_thread(){
        $user_id = Session::get('user_id');
        $v_delete_list = get_post_var('hdn_item_id_list',0);
        $sql = "DELETE  FROM t_private_thread_participant WHERE FK_USER = '$user_id' AND FK_THREAD IN ($v_delete_list)";
        $this->db->Execute($sql);
        return ($this->db->ErrorNo() == 0) ? TRUE : FALSE;
    }

  
}
