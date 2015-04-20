<?php

class Dashboard extends Controller {
    
    public $product_model;
    public $user_model;

    function __construct() {
        Session::check_login();
        parent::__construct('dashboard');
//        $this->product_model = $this->loadModel('product');
        $this->user_model = $this->loadModel('help');
        $this->view->js=array();
    }

    function index() {
        $this->view->render('dashboard/index');
    }

    function logout() {
         Session::init();
         $logged = Session::get('loggedIn');
        if ($logged !=null) {
            Session::destroy();
            header('location:'.SITE_URL.'login');
            exit();
        }
       header('location:'.SITE_URL.'group');
       exit();
    }

}
