<?php

class School_report extends Controller {
  public $school_report_model;
  public $arr_list ;
    function __construct()
    {
        Session::check_login();
        parent::__construct('school_report');
        $this->view->title = "Quản lý học bạ";
        $this->school_report_model = $this->loadModel('school_report');
    }
    
    public function index(){
        $this->dsp_add_school_report();
    }
    public function dsp_single_school_report($arr = array()){
        $DATA['arr_data'] = $arr;
        $DATA["arr_all_student"] = $this->school_report_model->qry_all_student_class();
        $this->view->render('school_report/dsp_single_school_report',$DATA);
    }
    
    public function dsp_add_school_report(){
//        $DATA["arr_all_student"] = $this->school_report_model->qry_all_student_class();
        $this->view->render('school_report/dsp_add_school_report');
    }
    
  
     public function do_add_list_sent_school_record(){
         $DATA['da'] = array(1,2,3,4);
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
                   echo __FILE__;
                   echo "<pre>";
                   print_r( $DATA['arr_data']);
                   echo "</pre>";
                   echo __LINE__;
                   $this->view->render('school_report/dsp_review_list',$DATA);
//                $DATA['arr_data'] = $result;
//                echo __FILE__;
//                echo "<pre>";
//                print_r($DATA['arr_data']);
//                echo "</pre>";
//                echo __LINE__;
//                 
//                echo "hohohaha";
//                   $this->school_report_model->exec_fail($this->goback_url, $DATA['error']);
             
            }   
        }
        
//        else{
//             $DATA['error'] = "Mời chọn file excel chứa điểm học kỳ!";
//             $this->school_report_model->exec_fail($this->goback_url, $DATA['error']);
//        }
   
     
    }
    
//    public function dsp_add_list_school_record1(){
//       
//         $this->goback_url  = $this->view->get_controller_url().'dsp_single_school_report';
//         if(!empty($_FILES['uploader']['name'])){
//            $result= array();
//            $this->school_report_model->goback_url =  $this->goback_url;
//            $result = $this->school_report_model->dsp_list_school_record();
//           
//            if($result == FALSE){
//                 $DATA['error'] = "Không nhập được file!";
//                 $this->school_report_model->exec_fail($this->goback_url, $DATA['error']);
//            }else{
//                   $this->arr_list = $result;
//                   $DATA['arr_data'] = $result;
//                   $this->view->render('school_report/dsp_review_list',$DATA);
//             
//            }   
//        } else{
//             $DATA['error'] = "Mời chọn file excel chứa điểm học kỳ!";
//             $this->school_report_model->exec_fail($this->goback_url, $DATA['error']);
//        }
//    }
    public function dsp_ds_toan_van_chuan_bi_nhap(){
         $this->goback_url  = $this->view->get_controller_url().'dsp_add_school_report';
         if(!empty($_FILES['uploader']['name'])){
            $result= array();
            $this->school_report_model->goback_url =  $this->goback_url;
            $result = $this->school_report_model->dsp_list_school_record();
           
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
    
    public function do_add_list_school_record(){
        $string_arr = get_post_var('arr_data');
        $data = explode('_', $string_arr);
        $final_arr = array();
        foreach ($data as $value){
           $value = explode(',', $value);
           $final_arr[] = $value;
        }
        $result = $this->school_report_model->do_add_list_school_record($final_arr);
        $this->goback_url = $this->view->get_controller_url().'dsp_new_added_school_record';
        if($result){
//            $this->school_report_model->exec_fail($this->goback_url,"Thêm mới điểm học bạ thành công");
        }else{
//            $this->school_report_model->exec_fail($this->view_get_controller_url().'dsp_single_school_report',"Nhập điểm lỗi | Mời chọn file excel đúng");
        }
    }
    
    
   
}