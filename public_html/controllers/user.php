<?php

class User extends Controller {

    public $model_login;
   
    public function __construct() {
        parent::__construct('user'); //co view($this->view thoai mai)  
     
//de login va logout do phai goi lai
        $this->model_login = $this->loadModel('user'); //tao model//co model ($this->model thoai mai)
        
        }

    public function index() {
   
        $this->view->render('user/index');
    }

    public function login() {
        $this->model_login->goback_url = $this->view->get_controller_url();
        $result = $this->model_login->login();
    }
     public function logout() {
         Session::destroy();
         $this->index();
    }

    public function testInsert() {
        $arr = array('login' => 'mvc1');
        $this->model_login->insert('users', $arr);
    }

    public function testDelete() {
        $arr = array('login' => "mvc", 'password' => '11223344', "1" => "2");
        $this->model_login->delete('users', 'login=?', array('mvc'));
    }

    public function testUpdate() {
        $arr_data = array("login" => "mvc", "password" => '11223344',);
        $this->model_login->update("users", $arr_data, "login=?", array("giang"));
    }

   

}
