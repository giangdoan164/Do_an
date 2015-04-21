<?php

class Teacher extends Controller{
    public $teach_model ;
    
    function __construct() {
        Session::check_login();
        parent::__construct('teacher');//tao view cung ten
        $this->teach_model =  $this->loadModel('teacher');
        $this->view->title  = 'Teacher Management';
   }

   public function index(){
      $this->dsp_all_teacher();
   }
   
   public function dsp_all_teacher(){
       $level = Session::get('level');
//       if($level==3 || $level == 4 || $level ==null){echo "Bạn ko có quyền truy cập chức năng này";exit();}
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
   
   public function update_single_teacher()
    {
        $arr_data                        = array();
        $arr_data['controller']          = get_post_var('controller', '');
        $arr_data['hdn_dsp_all_teacher'] = get_post_var('hdn_dsp_all_teacher', '');

        $arr_data['hdn_dsp_single_teacher'] = get_post_var('hdn_dsp_single_teacher', '');
        $this->goback_url                   = $arr_data['controller'] . $arr_data['hdn_dsp_single_teacher'];


         $this->teach_model->goback_url = $arr_data['controller'] . $arr_data['hdn_dsp_all_teacher'];
        $result           = $this->teach_model->update_single_teacher();
       
        if ($result == false)
        {
            $DATA['error'] = " Xảy ra lỗi không cập nhật được";
            $this->teach_model->exec_fail($this->goback_url, $DATA['error'], $arr_data);
            exit();
        }
        else
        {
            $this->teach_model->exec_done( $this->teach_model->goback_url, $arr_data);
            exit();
        }
    }

    public function delete_teacher()
    {
       
        $arr_data['controller']          = get_post_var('controller', '');
        $arr_data['hdn_dsp_all_teacher'] = get_post_var('hdn_dsp_all_record', '');
        $this->goback_url                = $arr_data['controller'] . $arr_data['hdn_dsp_all_teacher'];

        $result = $this->teach_model->delete_teacher();
        if ($result == false)
        {
            $DATA['error'] = " Xảy ra lỗi không xóa được";
            $this->teach_model->exec_fail($this->goback_url, $VIEW_DATA['error'], $arr_data);
            exit();
        }
        else
        {
            $this->teach_model->exec_done($this->goback_url, $arr_data);
            exit();
        }
    }

}