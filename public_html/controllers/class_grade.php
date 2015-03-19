<?php

class Class_grade extends Controller {

    public $class_grade_model;

    function __construct() {
        parent::__construct('class_grade');
        $this->class_grade_model = $this->loadModel('class_grade');
    }

    public function load_class(){
       
        header('Content-type:application/json');
       
        $DATA['arr_all_class'] = $this->class_grade_model->qry_all_class();
        echo json_encode($DATA['arr_all_class']);
        }
    
   public function index(){
      $this->dsp_all_class();
   }
   
   public function load_grade(){
       $DATA['arr_all_grade'] = $this->class_grade_model->qry_all_grade();
       echo $DATA['arr_all_grade']['PK_GRADE'];
   }
   
   public function dsp_all_class(){
       $DATA['arr_all_class'] = $this->class_grade_model->qry_all_class_teacher();
       $this->view->render('class/dsp_all_class',$DATA);
   }
   
   public function delete_class(){
   
        $arr_data['controller']          = get_post_var('controller', '');
        $arr_data['hdn_dsp_all_class'] = get_post_var('hdn_dsp_all_record', '');
        $this->goback_url                = $arr_data['controller'] . $arr_data['hdn_dsp_all_class'];
        $result = $this->class_grade_model->delete_class();
        if ($result == false)
        {
            $DATA['error'] = " Xảy ra lỗi không xóa được";
            $this->class_grade_model->exec_fail($this->goback_url, $VIEW_DATA['error'], $arr_data);
            exit();
        }
        else
        {
            $this->class_grade_model->exec_done($this->goback_url, $arr_data);
            exit();
        }
   }
   
//   public function dsp_single_class($v_class_id = 0){
//        $arr_data = array();
//        echo __FILE__;
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
//        echo __LINE__;
       //xem chi tiet 
//       if($v_class_id >0)
//       {
//           $arr_data['arr_single_class'] = $this->teach_model->qry_single_teacher($v_teacher_id);
//       }
       
       //tao moi
//       $arr_data['arr_class'] = $this->teach_model->qry_all_class();
//       $arr_data['arr_grade'] = $this->teach_model->qry_all_grade();
//       $this->view->render('teacher/dsp_single_teacher',$arr_data);
//   }
   
    public function add_new_class()
    {
      
        $DATA                        = array();
        $arr_data['controller']          = get_post_var('controller', '');
        $arr_data['hdn_dsp_all_record']  = get_post_var('hdn_dsp_all_record', '');
        $this->goback_url                = $arr_data['controller'] . $arr_data['hdn_dsp_all_record'];
        $v_class_name = trim(get_post_var('txt_class_name',''));
        if($v_class_name==''){
             $DATA['error'] = "Tên lớp không để rỗng ! ";
        }
        $v_grade = get_post_var('sel_grade',0);
         if($v_grade==0){
            $DATA['error'] .= "Mời chọn khối ! ";
        }
        $is_exist_class                  = $this->class_grade_model->check_is_class_exist();
        if ($is_exist_class == true)
        {              
            $DATA['error'] = "Tên lớp đã tồn tại !!! ";
        }
   
        if(isset($DATA['error'])){
            $this->class_grade_model->exec_fail($this->goback_url, $DATA['error'], $arr_data);
            exit();
        }
        
        $result           = $this->class_grade_model->add_new_class();
//        $this->goback_url = $arr_data['controller'] . $arr_data['hdn_dsp_all_record'];
        if ($result == false)
        {
            $DATA['error'] = " Xảy ra lỗi thêm mới lớp được";
            $this->class_grade_model->exec_fail($this->goback_url, $DATA['error'], $arr_data);
            exit();
        }
        else
        {
            $this->class_grade_model->exec_done($this->goback_url, $arr_data);
            exit();
        }
    }
}
