<?php

class User extends Controller {

    public $user_model;
   
    public function __construct() {
        parent::__construct('user'); //co view($this->view thoai mai)  
        $this->user_model = $this->loadModel('user'); //tao model//co model ($this->model thoai mai)
        
        }

    public function index() {
   
        $this->view->render('user/index',array(),false);
    }

    public function login() {
        $this->user_model->goback_url = $this->view->get_controller_url();
        $result = $this->user_model->login();
    }
     public function logout() {
         Session::destroy();
         $this->index();
    }
  
    public function update_new_password(){
          $current_pass1 = $this->user_model->get_current_password();
          $current_pass2 = md5(get_post_var('txt_current_password'));
          $this->goback_url = SITE_URL;
          $this->goforward_url = get_post_var('controller');
          if($current_pass1 !=$current_pass2){
              $this->user_model->exec_fail($this->goforward_url,"Mật khẩu cũ không chính xác");
          }
          
         $result = $this->user_model->update_new_password();
         if($result){
             $this->user_model->exec_fail($this->goforward_url,"Cập nhật mật khẩu mới thành công");
              
         }else{
              $this->user_model->exec_fail($this->goforward_url,"Cập nhật mật khẩu thất bại");
         }
          
    }
//    public function testInsert() {
//        $arr = array('login' => 'mvc1');
//        $this->model_login->insert('users', $arr);
//    }
//
//    public function testDelete() {
//        $arr = array('login' => "mvc", 'password' => '11223344', "1" => "2");
//        $this->model_login->delete('users', 'login=?', array('mvc'));
//    }
//
//    public function testUpdate() {
//        $arr_data = array("login" => "mvc", "password" => '11223344',);
//        $this->model_login->update("users", $arr_data, "login=?", array("giang"));
//    }

}
