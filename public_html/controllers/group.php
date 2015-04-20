<?php
class Group extends Controller {
    
    public function __construct() { 
        Session::check_login();
        parent::__construct('group');
        $this->view->title ='group'; 
    }
    
    public function index(){
        $this->view->js = array('group/js/custom.js');
        $this->view->render('group/index');
    }
}