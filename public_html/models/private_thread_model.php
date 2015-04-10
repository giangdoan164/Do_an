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
}
