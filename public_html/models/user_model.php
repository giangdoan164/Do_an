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
        $sql = "SELECT * FROM t_user where C_LOGIN_NAME ='$user' and C_PASSWORD ='$pass'";
        $result = $this->db->GetRow($sql);
          

        if(count($result)>0){
            
            Session::set('loggedIn', true);
            Session::set('level',$result['FK_GROUP']);
            Session::set('grade',$result['FK_GRADE']);
            Session::set('class',$result['FK_CLASS']);
            Session::set('user_id',$result['PK_USER']);
            Session::set('user_name',$result['C_NAME']);
            //2 cach goi chuyen trang nhu nhau
//            redirect('parent_student', 'dsp_all_parent_contact');
             
            $this->exec_done(SITE_URL.'index');
        }else{
            $this->exec_fail($this->goback_url,"Sai tên truy cập hoặc mật khẩu");
        }
        
    }

}
