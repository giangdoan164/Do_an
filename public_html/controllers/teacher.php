<?php

class Teacher extends Controller{
    public $teach_model ;
    
    function __construct() {
        parent::__construct('teacher');//tao view cung ten
        $this->teach_model =  $this->loadModel('teacher');
        $this->view->title  = 'Teacher Management';
   }

   public function index(){
      $this->dsp_all_teacher();
      
   }
   
   public function dsp_all_teacher(){
       $arr_data['arr_all_teacher'] = $this->teach_model->qry_all_teacher();
       $this->view->render('teacher/dsp_all_teacher',$arr_data);
   }
   
   public function dsp_single_teacher($v_teacher_id = 0){
       $arr_data = array();
       
       //xem chi tiet 
       if($v_teacher_id >0)
       {
           $arr_data['arr_single_teacher'] = $this->teach_model->qry_single_teacher($v_teacher_id);
       }
       
       //tao moi
       $arr_data['arr_class'] = $this->teach_model->qry_all_class();
       $arr_data['arr_grade'] = $this->teach_model->qry_all_grade();
       $this->view->render('teacher/dsp_single_teacher',$arr_data);
   }
   
   
}