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
//          $role = Session::get('level');
//          if($role!=1 || $role!=3){$this->access_denied();}
    }


   public function index(){ 
       
      $this->dsp_all_parent_contact();
      
   }
   
   public function dsp_all_parent_contact(){
       $arr_data['class'] = get_post_var('sel_class','');
       $arr_data['grade'] = get_post_var('sel_grade','');
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
        else if($result=='exist')
        {
           $this->goback_url = $arr_data['controller'].'dsp_single_parent_contact';
            $this->parent_student_model->exec_fail($this->goback_url,"Mã học sinh đã tồn tại!");
            exit();
        }
        else
        {
           $this->goback_url = $arr_data['controller'].'dsp_all_parent_contact';
            $this->parent_student_model->exec_fail($this->goback_url,"Cập nhật  mới thông tin liên lạc thành công !");
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
        $url               = $this->view->get_controller_url().'dsp_all_parent_contact';
        $check_has_grade = $this->parent_student_model->check_exist_grade(1);
     
        if(!empty($_FILES['uploader']['name'])){
                if(intval($check_has_grade)==0){//ko co hs  thuoc khoi 1 thi moi chuyen
                 $result = $this->parent_student_model->update_list_excel();
                 if($result == FALSE){
                      $DATA['error'] = "meomeo!";
                      $this->parent_student_model->exec_fail($url, $DATA['error'], $DATA);
                 }else{
                      $DATA['error'] = " Cập nhật danh sách mới thành công !";
                      $this->parent_student_model->exec_fail($url, $DATA['error'], $DATA);
                 }
                }else{
                     $DATA['error'] = "Đã tồn tại học sinh thuộc khối 1 trong hệ thống !!!";
              $this->parent_student_model->exec_fail($url,$DATA['error'],array());
                }
             }else{
                      $DATA['error'] = " Mời chọn danh sách cần nhập !";
                      $this->parent_student_model->exec_fail($url, $DATA['error'], $DATA);
             }
    }
    
    public function dsp_transfer_class(){
       $arr_data['arr_class'] = $this->class_grade_model->qry_all_class();
       $arr_data['arr_grade'] = $this->class_grade_model->qry_all_grade();
       $arr_data['user_class'] = $this->class_grade_model->qry_user_class();
       $arr_data['class'] = get_post_var('sel_class','');
       $arr_data['grade'] = get_post_var('sel_grade','');
       $arr_data['arr_all_parent_contact'] = $this->parent_student_model->qry_all_parent_contact();
       $this->view->render('parent_student/dsp_transfer_class',$arr_data);
    }
    
    public function do_transfer_class(){
       
      $result =  $this->parent_student_model->do_transfer_class();
      
        if($result){
            $this->goback_url = $this->view->get_controller_url().'dsp_all_parent_contact';
            $this->class_grade_model->exec_fail($this->goback_url,"Cập nhật lớp thành công !");
        }else{
             $this->goback_url = $this->view->get_controller_url().'dsp_transfer_class';
            $this->class_grade_model->exec_fail($this->goback_url,"Cập nhật thất bại");
        }
    
    }
     public function qry_student_number_from_class(){
         $result  = $this->parent_student_model->qry_student_number_from_class();
         echo $result;
     }
}