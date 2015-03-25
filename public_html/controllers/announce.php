<?php

class Announce extends Controller {
  public $announce_model;
  public $class_grade_model;
    function __construct()
    {
        parent::__construct('announce');
        $this->view->title = "Quản lý thông báo";
        $this->announce_model =  $this->loadModel('announce');
        $this->class_grade_model = $this->loadModel('class_grade');
        
    }
    
    public function index(){
        $this->dsp_all_announce();
    }

    public function dsp_all_announce(){
       $arr_data = array();
       $arr_data['arr_class'] = $this->class_grade_model->qry_all_class();
       $arr_data['arr_grade'] = $this->class_grade_model->qry_all_grade();
       $arr_data['arr_all_announce'] = $this->announce_model->qry_all_announce();
       $this->view->render('announce/dsp_all_announce',$arr_data);
    }
}