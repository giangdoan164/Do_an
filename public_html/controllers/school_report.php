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
        $DATA['arr_data'] = '';
        $DATA["arr_all_student"] = $this->school_report_model->qry_all_student_class();
        $this->view->render('school_report/dsp_single_school_report',$DATA);
    }
    
//    public function dsp_add_school_report(){
////        $DATA["arr_all_student"] = $this->school_report_model->qry_all_student_class();
//        $this->view->render('school_report/dsp_add_school_report');
//    }
    
  
     public function dsp_add_list_school_record(){
         die('akhdf');
      $this->goback_url  = $this->view->get_controller_url().'dsp_single_school_report';
        if(!empty($_FILES['uploader']['name'])){
            $result= array();
            $this->school_report_model->goback_url =  $this->goback_url;
            $result = $this->school_report_model->dsp_list_school_record();
            if($result == FALSE){
                 $DATA['error'] = "Không nhập được file!";
                 $this->school_report_model->exec_fail($this->goback_url, $DATA['error']);
            }else{
                $DATA['arr_data'] = $result;
                $this->view->render('school_report/dsp_single_school_report',$DATA);
            }
        }else{
             $DATA['error'] = "Mời chọn file excel chứa điểm học kỳ!";
             $this->school_report_model->exec_fail($this->goback_url, $DATA['error']);
        }
   
     
    }
    
    public function do_add_list_school_record(){
        $json_data = get_post_var('arr_data');
        echo __FILE__;
        echo "<pre>";
        print_r($json_data);
        echo "</pre>";
        echo __LINE__;die();
        $result = $this->school_report_model->do_add_list_school_record($arr_data);
    }
    
    
   
}