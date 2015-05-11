<?php

class Class_grade extends Controller {

    public $class_grade_model;

    function __construct() {
        Session::check_login();
        parent::__construct('class_grade');
        $this->class_grade_model = $this->loadModel('class_grade');
//        $role = Session::get('level');
//        if($role!=1){$this->access_denied();}
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
   
   public function load_student(){
       header('Content-type:application/json');
       $arr_data['arr_student'] = $this->class_grade_model->qry_all_student();
       echo json_encode($arr_data['arr_student']);
     
   }
   
   public function dsp_all_class(){
        $level = Session::get('level');
//       if($level==3 || $level == 4 || $level ==null){die("Bạn ko có quyền truy cập chức năng này");}
       $DATA['arr_all_class'] = $this->class_grade_model->qry_all_class_teacher();
       $this->view->render('class/dsp_all_class',$DATA);
   }
   
   public function delete_class(){
      
        $arr_data['controller']          = get_post_var('controller', '');
        $arr_data['hdn_dsp_all_class'] = get_post_var('hdn_dsp_all_record', '');
        $this->goback_url                = $arr_data['controller'] . $arr_data['hdn_dsp_all_class'];
        $this->goback_url                = $arr_data['controller'] . $arr_data['hdn_dsp_all_class'];
        $result = $this->class_grade_model->delete_class();
        if ($result == 'done')
        {
            $DATA['error'] = " Xóa thành công !";
            $this->class_grade_model->exec_fail($this->goback_url, $DATA['error'], $arr_data);
            exit();
        }else{
            $DATA['error'] = "Không xóa được ! Lớp học đang tồn tại user ! ";
            $this->class_grade_model->exec_fail($this->goback_url, $DATA['error'], $arr_data);
            exit();
        }
      
        
   }
   
    public function add_new_class()
    {
      
        $DATA                        = array();
        $DATA['error']               = array();
        $arr_data['controller']          = get_post_var('controller', '');
        $arr_data['hdn_dsp_all_record']  = get_post_var('hdn_dsp_all_record', '');
        $this->goback_url                = $arr_data['controller'] . $arr_data['hdn_dsp_all_record'];
        $v_class_name = trim(get_post_var('txt_class_name',''));
        if($v_class_name==''){
             $DATA['error'] = "Tên lớp không để rỗng ! ";
              $this->class_grade_model->exec_fail($this->goback_url, $DATA['error'], $arr_data);
        }
        $v_grade = get_post_var('sel_grade',0);
         if($v_grade==0){
            $DATA['error'] = "Mời chọn khối ! ";
             $this->class_grade_model->exec_fail($this->goback_url, $DATA['error'], $arr_data);
        }
        $is_exist_class                  = $this->class_grade_model->check_is_class_exist();
        if ($is_exist_class == true)
        {              
            $DATA['error'] = "Tên lớp đã tồn tại !!! ";
             $this->class_grade_model->exec_fail($this->goback_url, $DATA['error'], $arr_data);
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
