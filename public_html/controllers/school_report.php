<?php

class School_report extends Controller {
  public $school_report_model;
  public $arr_list ;
    function __construct()
    {
        Session::check_login();
        parent::__construct('school_report');
        $this->view->title = "Quản lý học bạ";;
        $this->school_report_model = $this->loadModel('school_report');
     
    }
    
    public function index(){
        $this->dsp_main_school_record();
    }
    
    public function dsp_single_school_report($arr = array()){
        $DATA['arr_data'] = $arr;
//        $DATA["arr_all_student"] = $this->school_report_model->qry_all_student_class();
        $this->view->render('school_report/dsp_single_school_report',$DATA);
    }
    
    public function dsp_main_school_record(){
       
        $this->view->render('school_report/dsp_main_school_record');
    }
    
    public function dsp_add_school_report_toan_van(){
//        $DATA["arr_all_student"] = $this->school_report_model->qry_all_student_class();
        $this->view->render('school_report/dsp_add_school_report_toan_van');
    }
    
    public function dsp_add_school_report_mon_phu(){
        $DATA = array();
        $DATA['arr_subject'] = $this->school_report_model->qry_all_subject_grade(); 
        $DATA['arr_student'] = $this->school_report_model->qry_all_student_class();
  
        $this->view-> render('school_report/dsp_add_school_report_mon_phu',$DATA);
    }
    
   
//     public function do_add_list_sent_school_record(){
//         $DATA['da'] = array(1,2,3,4);
//         $this->goback_url  = $this->view->get_controller_url().'dsp_single_school_report';
//        if(!empty($_FILES['uploader']['name'])){
//            $result= array();
//            $this->school_report_model->goback_url =  $this->goback_url;
//            $result = $this->school_report_model->dsp_list_school_record();
//           
//            if($result == FALSE){
//                 $DATA['error'] = "Không nhập được file!";
//                 $this->school_report_model->exec_fail($this->goback_url, $DATA['error']);
//            }else{
//                   $DATA['arr_data'] = $result;
//                   echo __FILE__;
//                   echo "<pre>";
//                   print_r( $DATA['arr_data']);
//                   echo "</pre>";
//                   echo __LINE__;
//                   $this->view->render('school_report/dsp_review_list',$DATA);
//    }
    

    public function dsp_ds_toan_van_chuan_bi_nhap(){
       
        $this->goback_url  = $this->view->get_controller_url().'dsp_add_school_report';
         if(!empty($_FILES['uploader']['name'])){
            $result= array();
            $this->school_report_model->goback_url =  $this->goback_url;
            $result = $this->school_report_model->dsp_list_school_record_toan_van();
           
            if($result == FALSE){
                 $DATA['error'] = "Không nhập được file!";
                 $this->school_report_model->exec_fail($this->goback_url, $DATA['error']);
            }else{
                   $this->arr_list = $result;
                   $DATA['arr_data'] = $result;
                   $this->view->render('school_report/dsp_review_list',$DATA);
             
            }   
        } else{
             $DATA['error'] = "Mời chọn file excel chứa điểm học kỳ!";
             $this->school_report_model->exec_fail($this->goback_url, $DATA['error']);
        }
    }
    
    public function do_add_list_school_record_toan_van(){    
        $string_arr = get_post_var('arr_data');
        $data = explode('_', $string_arr);
        $final_arr = array();
        foreach ($data as $value){
           $value = explode(',', $value);
           $final_arr[] = $value;
        }
        $result = $this->school_report_model->do_add_list_school_record_excel($final_arr);
        $this->goback_url = $this->view->get_controller_url().'dsp_add_school_report_toan_van';
        if($result){
            $this->school_report_model->exec_fail($this->goback_url,"Thêm mới điểm học bạ thành công");
        }else{
            $this->school_report_model->exec_fail($this->goback_url,"Không nhập được file excel");
        }
    }
    
    public function do_add_school_record_mon_phu(){ 
       $result = $this->school_report_model->do_add_school_record_mon_phu();
         if($result){
            $this->school_report_model->exec_fail($this->view->get_controller_url().'dsp_main_school_record',"Thêm mới điểm học bạ thành công");
        }else{
            $this->school_report_model->exec_fail($this->view->get_controller_url().'dsp_add_school_report_mon_phu',"Thêm thất bại");
        }
    }
   
}