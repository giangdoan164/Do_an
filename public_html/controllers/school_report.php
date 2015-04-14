<?php

class School_report extends Controller {
  public $school_report_model;
    function __construct()
    {
//        Session::check_login();
        parent::__construct('school_report');
        $this->view->title = "Quản lý học bạ";
        $this->school_report_model = $this->loadModel('school_report');
    }
    
    public function index(){
        $this->dsp_single_school_report();
    }
    public function dsp_single_school_report(){
        $DATA["arr_all_student"] = $this->school_report_model->qry_all_student_class();
        $this->view->render('school_report/dsp_single_school_report',$DATA);
    }
    
    public function dsp_add_school_report(){
//        $DATA["arr_all_student"] = $this->school_report_model->qry_all_student_class();
        $this->view->render('school_report/dsp_add_school_report');
    }
    
    public function do_create_new_record(){
        echo "hehe";
    }
}