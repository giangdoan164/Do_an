<?php

class Parent_student extends Controller {
    public $parent_student_model;
    public $class_grade_model;
    function __construct() {
        Session::check_login();
        parent::__construct('parent_student');
        $this->parent_student_model = $this->loadModel('parent_student');
        $this->view->title = 'Quản lý danh sách liên lạc';
        $this->class_grade_model = $this->loadModel('class_grade');
        
    }


   public function index(){ 
       
      $this->dsp_all_parent_contact();
      
   }
   
   public function dsp_all_parent_contact(){
       $level =  Session::get('level');
       if($level == 4){echo "Bạn  ko có quyền truy cập chức năng này";exit();}
       $arr_data['arr_class'] = $this->class_grade_model->qry_all_class();
       $arr_data['arr_grade'] = $this->class_grade_model->qry_all_grade();
        $arr_data['user_class'] = $this->class_grade_model->qry_user_class();
       $arr_data['arr_all_parent_contact'] = $this->parent_student_model->qry_all_parent_contact();
       $this->view->render('parent_student/dsp_all_parent_contact',$arr_data);
   }
   
   public function dsp_single_parent_contact($v_parent_id = 0){
       $arr_data = array();
       //xem chi tiet 
       if($v_parent_id >0)
       {
           $arr_data['arr_single_parent_contact'] = $this->parent_student_model->qry_single_parent_contact($v_parent_id);
       }
       
       //tao moi
     $arr_data['arr_class'] = $this->class_grade_model->qry_all_class();
     $arr_data['arr_grade'] = $this->class_grade_model->qry_all_grade();
     $this->view->render('parent_student/dsp_single_parent_contact',$arr_data);
   }
   
   public function update_single_parent_contact()
    {
        $arr_data                        = array();
        $arr_data['controller']          = get_post_var('controller', '');
        $arr_data['hdn_dsp_all_record'] = get_post_var('hdn_dsp_all_record', '');
        $result           = $this->parent_student_model->update_single_parent_contact();
     
        if ($result == false)
        {
            $DATA['error'] = " Xảy ra lỗi không cập nhật được";
            $this->goback_url = $arr_data['controller'].$arr_data['hdn_dsp_single_record'];
            $this->parent_student_model->exec_fail($this->goback_url, $DATA['error'], $arr_data);
            exit();
        }
        else
        {
           $this->goback_url = $arr_data['controller'] . $arr_data['hdn_dsp_all_record'];
            $this->parent_student_model->exec_done($this->goback_url, $arr_data);
            exit();
        }
  
        
    }

    public function delete_parent_contact()
    {
       
        $arr_data['controller']          = get_post_var('controller', '');
        $arr_data['hdn_dsp_all_record']  = get_post_var('hdn_dsp_all_record', '');
        $this->goback_url                = $arr_data['controller'] . $arr_data['hdn_dsp_all_record'];

        $result = $this->parent_student_model->delete_parent_contact();
        if ($result == false)
        {
            $DATA['error'] = " Xảy ra lỗi không xóa được";
            $this->parent_student_model->exec_fail($this->goback_url,$DATA['error'], $arr_data);
            exit();
        }
        else
        {
            $this->parent_student_model->exec_done($this->goback_url, $arr_data);
            exit();
        }
    }
    
    public function add_new_contact_list(){
        $arr_data['controller']          = get_post_var('controller', '');
        $arr_data['hdn_dsp_all_record']  = get_post_var('hdn_dsp_all_record', '');
        $this->goback_url                = $arr_data['controller'] . $arr_data['hdn_dsp_all_record'];
         if(isset($_FILES['uploader'])){
             
             $result = $this->parent_student_model->update_list_excel();
             if($result == FALSE){
                  $DATA['error'] = " Mời chọn danh sách cần nhập !";
                  $this->parent_student_model->exec_fail($this->goback_url, $DATA['error'], $arr_data);
             }else{
                  $DATA['error'] = " Cập nhật danh sách mới thành công !";
                  $this->parent_student_model->exec_fail($this->goback_url, $DATA['error'], $arr_data);
             }
            
         }
        
    }
    
}