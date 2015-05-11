<?php

class User_Model extends Model {
    
    public function __construct($db) {
        parent::__construct($db);
       
    }
    
    public function login() { 
        $error = '';
        $user = get_post_var('txt_username','');
        $pass = get_post_var('txt_password','');
        if(trim($user=='')){$error  = " Mời nhập username !!!";}
        if(trim($pass=='')){$error .= " Mời nhập password !!!";}
        
        if(!empty($error)){$this->exec_fail($this->goback_url,$error);}
        $pass = md5($pass);
        $sql = "SELECT * FROM t_user where C_LOGIN_NAME ='$user' and C_PASSWORD ='$pass' AND C_DELETED='0'";
        $result = $this->db->GetRow($sql);
          

        if(count($result)>0){
            
            Session::set('loggedIn', true);
            Session::set('level',$result['FK_GROUP']);
            Session::set('grade',$result['FK_GRADE']);
            Session::set('class',$result['FK_CLASS']);
            Session::set('user_id',$result['PK_USER']);
            Session::set('user_name',$result['C_NAME']);
            Session::set('user_code',$result['C_CODE']);
            //2 cach goi chuyen trang nhu nhau
//            redirect('parent_student', 'dsp_all_parent_contact');
             
            $this->exec_done(SITE_URL.'index');
        }else{
            $this->exec_fail($this->goback_url,"Sai tên truy cập hoặc mật khẩu");
        }
        
    }
    
    public function get_current_password(){
        $user_id = Session::get('user_id');
        $sql ="SELECT C_PASSWORD FROM t_user WHERE PK_USER = '$user_id'";
        $result = $this->db->GetOne($sql);
        return $result;
    }
    
    public function update_new_password(){
          $user_id = Session::get('user_id');
          $new_pass = md5(get_post_var('txt_confirm_new_password'));
          $sql = "UPDATE t_user SET C_PASSWORD ='$new_pass' WHERE PK_USER ='$user_id'";
          $this->db->Execute($sql);
          return ($this->db->ErrorNo() == 0) ? TRUE : FALSE;
    }

}
