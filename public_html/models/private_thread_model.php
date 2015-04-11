<?php
class Private_thread_Model extends model {
    function __construct($db) {
        parent::__construct($db);
        }
    
        
    public function qry_all_thread(){
        $user_id = Session::get('user_id');
        $result = array();
        // lay ra toan bo chu de ma co lien quan den thang co usser_id nhu tren;
        $sql = "SELECT pt.* ,u.C_LOGIN_NAME FROM t_private_thread pt
                INNER JOIN t_user u on u.PK_USER  = pt.C_CREATED_USER  
            WHERE PK_THREAD 
                IN (SELECT FK_THREAD  FROM t_private_thread_participant WHERE FK_USER = '$user_id')";
        $result = $this->db->GetAll($sql);
        return $result;
    }
    
    public function qry_single_thread($thread_id){
         #Phan trang
        $page = get_request_var('page',1);
        $page = ((int)$page > 1) ? (int)$page : 1;
        $v_start = ($page - 1) * 5;
        #End phan trang
        
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
    
    public function create_reply_to_thread($arr){
        // 1: them vao bang message noi dung user tra loi 
        $sent_date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO t_private_message(FK_THREAD,C_CONTENT,FK_SENDING_USER,C_SENT_DATE) VALUES (?,?,?,?)";
        $params = array($arr['thread_id'],$arr['content'],$arr['user_id'],$sent_date );
        $this->db->Execute($sql, $params);

        //tra lai insert ID cua thang message vua insert
        $v_message_id = $this->db->Insert_ID();
        // 2 : them vao bang trang thai tin nhan 2 ban ghi 
        //cua thang gui tin nhan
        $sql = "INSERT INTO t_private_message_read_state(FK_MESSAGE,FK_USER,C_READ_STATE) VALUES (?,?,?)";
        $params = array($v_message_id,$arr['user_id'],1);
        $this->db->Execute($sql,$params);
        
        //cua thang nhan tin nhan 
        $sql = "SELECT FK_USER FROM t_private_thread_participant WHERE FK_THREAD = ? AND FK_USER <> ?";
        $params = array($arr['thread_id'],$arr['user_id']);
        $receive_user_id = $this->db->GetOne($sql,$params);
        
        //insert trang thai doc tin cua thang nhan 
        $sql = "INSERT INTO t_private_message_read_state(FK_MESSAGE,FK_USER,C_READ_STATE) VALUES (?,?,?)";
        $params = array($v_message_id,$receive_user_id,0);
        $this->db->Execute($sql,$params);
        if($this->db->ErrorNo()==0){
            return true;
        }else{
            return false;
        }
        
    }
}
