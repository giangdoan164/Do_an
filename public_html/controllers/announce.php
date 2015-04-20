<?php
class Announce extends Controller {
  public $announce_model;
  public $class_grade_model;
    function __construct()
    {
        Session::check_login();
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
       $arr_data['arr_student'] = $this->class_grade_model->qry_all_student2();
       $arr_data['user_class'] = $this->class_grade_model->qry_user_class();
//       $arr_data['student_log_info'] =$this->class_grade_model->qry_student_log_info();
       $arr_data['arr_all_announce'] = $this->announce_model->qry_all_announce();
       $this->view->render('announce/dsp_all_announce',$arr_data);
    }
    
    public function dsp_add_new_announce(){
        $arr_data = array();
        $role = Session::get('level') ;
        $arr_data['arr_student'] = array();
        if($role ==3){ $arr_data['arr_student'] =$this->class_grade_model->qry_all_student2();}
        $arr_data['arr_class'] = $this->class_grade_model->qry_all_class();
        $arr_data['arr_grade'] = $this->class_grade_model->qry_all_grade();

         $arr_data['user_class'] = $this->class_grade_model->qry_user_class();

        $this->view->render('announce/create_new_announce',$arr_data);
    }
    
    public function add_new_announce(){
     
        $arr_data = array();
        $arr_data['controller']  = get_post_var('controller','');
        $arr_data['dsp_add_new_announce'] =  get_post_var('hdn_dsp_add_new_announce','');
        $arr_data['dsp_all_announce'] = get_post_var('hdn_dsp_all_record','');
        $role = Session::get('level');
        $result =  $this->announce_model->add_new_announce();
        $this->goback_url_fail        = $arr_data['controller'] .$arr_data['dsp_add_new_announce'];
        if($result==FALSE){
            $error = "Xảy ra lỗi không gửi được thông báo !";
            $this->announce_model->exec_fail($this->goback_url_fail,$error,$arr_data);
        }
        
        $this->goback_url_done = $arr_data['controller'].$arr_data['dsp_all_announce'];
        $this->announce_model->exec_done($this->goback_url_done,$arr_data);
   }
}