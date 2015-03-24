<?php

class Announce extends Controller {
  public $announce_model;
    function __construct()
    {
        parent::__construct('announce');
        $this->view->title = "Quản lý thông báo";
        $this->loadModel('announce');
        
    }
    
    public function index(){
        $this->dsp_all_announce();
    }

    public function dsp_all_announce(){
        $this->view->render('announce/dsp_all_announce');
    }
}