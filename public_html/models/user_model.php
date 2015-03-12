<?php

class User_Model extends Model {
    public function __construct($db) {
        parent::__construct($db);
       
    }
    public function login() { 
           $user = get_post_var('txt_username','');
        $pass = get_post_var('txt_password','');
          
        $sql = "SELECT * FROM users where login ='$user' and password ='$pass'";
        $result = $this->db->GetAssoc($sql);
      
        return $result;
    }

}
