<?php

class School_report extends Controller {

    public $school_report_model;
    public $arr_list;

    function __construct() {
        Session::check_login();
        parent::__construct('school_report');
        $this->view->title = "Quản lý học bạ";
        $this->school_report_model = $this->loadModel('school_report');
//          $role = Session::get('level');
//        if($role!=3 || $role !=4){$this->access_denied();}
    }

    public function index() {
        $this->dsp_main_school_record();
    }

    public function dsp_single_school_report($arr = array()) {
        $DATA['arr_data'] = $arr;
        $this->view->render('school_report/dsp_single_school_report', $DATA);
    }

    public function dsp_main_school_record() {
        //se co 2 giao dien khac nhau ung voi tung nguoi dung
        $role = Session::get('level');
        //neu la giao vien : lay duoc code hoc sinh bat ky
        //neu la phu huynnh
//            $student_code = Session::get('user_code');
        if ($role == 3) {    
            $student_code = get_post_var('sel_student_code', '');
            $semester = get_post_var('sel_semester', '');
            $year = get_post_var('sel_year', '');
            //neu la post nguoc lai
            if ($student_code != '' && $semester != '' && $year != '') {
                $DATA['arr_student_record_info'] = $this->school_report_model->qry_student_school_record($student_code, $semester, $year);
                $DATA['student_code'] = $student_code;
                $DATA['semester'] = $semester;
                $DATA['year'] = $year;
                $DATA['arr_final_remark_title'] = $this->school_report_model->qry_final_remark_title($student_code, $semester, $year);              
            }
            //hien thi lan dau
             $DATA['arr_all_student_class'] = $this->school_report_model->qry_all_student_class();
        } else {
            $student_code = Session::get('user_code');
            $semester = get_post_var('sel_semester', '');
            $year = get_post_var('sel_year', '');
            //neu la post nguoc lai
            if ($student_code != '' && $semester != '' && $year != '') {
                $DATA['arr_student_record_info'] = $this->school_report_model->qry_student_school_record($student_code, $semester, $year);
                $DATA['student_code'] = $student_code;
                $DATA['semester'] = $semester;
                $DATA['year'] = $year;
                $DATA['arr_final_remark_title'] = $this->school_report_model->qry_final_remark_title($student_code, $semester, $year);
                
            }
            $DATA['arr_all_year_student'] = $this->school_report_model->qry_all_year_student();
        }


        $this->view->render('school_report/dsp_main_school_record', $DATA);
    }

    public function dsp_add_school_report_toan_van() {
        $check = $this->school_report_model->check_is_acived();
        if($check){
        $this->view->render('school_report/dsp_add_school_report_toan_van');
        }else{
            $this->goback_url = $this->view->get_controller_url() . 'dsp_main_school_record';
            $this->school_report_model->exec_fail($this->goback_url, "Chưa đến thời gian nhập học bạ");
        }
    }

    public function dsp_update_school_report_mon_phu($type) {
      //truong hop chua den thoi gian nhap hoc ba
         $check = $this->school_report_model->check_is_acived();
         

        if($check){
            $semester_info = $this->school_report_model->get_semester_info();
            $semester = $semester_info[0]['C_SEMESTER'];
            $year = $semester_info[0]['C_SCHOOL_YEAR'];
            $teacher_code = Session::get('user_code');
           
            $check_is_add_school_record = $this->school_report_model->check_is_added_list_record($teacher_code,$semester,$year);
            //truong hop chua co nhap diem toan van

            if($check_is_add_school_record==FALSE){
                $DATA = array();
                $DATA['update_type'] = 1;
                $DATA['arr_subject'] = $this->school_report_model->qry_all_subject_grade();
                $DATA['arr_student'] = $this->school_report_model->qry_all_student_class();
                $this->view->render('school_report/dsp_add_school_report_mon_phu', $DATA);
            }else{
               $this->school_report_model->exec_fail($this->view->get_controller_url().'dsp_main_school_record','Yêu cầu nhập điểm Toán , Tiếng Việt trước');
            }

        }else{
            $this->goback_url = $this->view->get_controller_url() . 'dsp_main_school_record';
            $this->school_report_model->exec_fail($this->goback_url, "Chưa đến thời gian nhập học bạ");
        }
      
    }

    public function qry_all_subject_grade_student() {
        header('Content-type:application/json');
        $result = $this->school_report_model->qry_all_subject_grade_student();
        echo json_encode($result);
    }


    public function dsp_ds_toan_van_chuan_bi_nhap() {
        $this->goback_url = $this->view->get_controller_url() . 'dsp_add_school_report_toan_van';
        if (!empty($_FILES['uploader']['name'])) {
            $result = array();
            $this->school_report_model->goback_url = $this->goback_url;
            $result = $this->school_report_model->dsp_list_school_record_toan_van();

            if ($result == FALSE) {
                $DATA['error'] = "Không nhập được file!";
                $this->school_report_model->exec_fail($this->goback_url, $DATA['error']);
            } else {
                $DATA['arr_data'] = $result; 
                $this->view->render('school_report/dsp_review_list', $DATA);
            }
        } else {
            $DATA['error'] = "Mời chọn file excel chứa điểm học kỳ!";
            $this->school_report_model->exec_fail($this->goback_url, $DATA['error']);
        }
    }

    public function do_add_list_school_record_toan_van() {
        $string_arr = get_post_var('arr_data');
        $data = explode('_', $string_arr);
        $final_arr = array();
        foreach ($data as $value) {
            $value = explode(',', $value);
            $final_arr[] = $value;
        }
     
        $result = $this->school_report_model->do_add_list_school_record_excel($final_arr);
        $this->goback_url = $this->view->get_controller_url() . 'dsp_add_school_report_toan_van';
        if ($result == 'success') {
            $this->school_report_model->exec_fail($this->goback_url, "Thêm mới điểm học bạ thành công");
        } elseif ($result == 'added') {
            $this->goback_url = $this->view->get_controller_url() . 'dsp_add_school_report_toan_van';
            $this->school_report_model->exec_fail($this->goback_url, "Không thêm được ! Điểm đã được thêm  trước đó trong CSDL");
        }elseif($result =='list_not_matched'){
             $this->goback_url = $this->view->get_controller_url() . 'dsp_add_school_report_toan_van';
            $this->school_report_model->exec_fail($this->goback_url, "Danh sách học sinh trong file excel không trùng khớp với danh sách đã có trong CSDL!!!");
        } 
        else {

            $this->school_report_model->exec_fail($this->goback_url, "Không nhập được file excel");
        }
    }

    public function do_update_school_record_mon_phu() {
        $update_type = get_post_var('update_type', 1);
        $result = $this->school_report_model->do_update_school_record_mon_phu($update_type);
        if ($result) {
            $this->school_report_model->exec_fail($this->view->get_controller_url() . 'dsp_update_school_report_mon_phu/1', "Thêm mới điểm học bạ thành công");
        } else {
            $this->school_report_model->exec_fail($this->view->get_controller_url() . 'dsp_update_school_report_mon_phu/1', "Thêm thất bại");
        }
    }

    public function dsp_list_student_to_remark() {
        $check = $this->school_report_model->check_is_acived();
        if($check){
             $DATA = array();
             $DATA['arr_all_student'] = $this->school_report_model->qry_all_student_class();
             $this->view->render('school_report/dsp_list_student_to_remark', $DATA);
        }else{
            $this->goback_url = $this->view->get_controller_url() . 'dsp_main_school_record';
            $this->school_report_model->exec_fail($this->goback_url, "Chưa đến thời gian nhập học bạ");
        }
       
    }

    public function dsp_single_student_to_remark() {
        $DATA['student_code'] = get_post_var('student_code');
        $DATA['arr_subject_grade'] = $this->school_report_model->qry_all_subject_grade_remark();
        $this->view->render('school_report/dsp_single_student_to_remark', $DATA);
    }

    public function do_insert_all_remark_single_student() {
        $result = $this->school_report_model->do_insert_all_remark_single_student();
        if ($result) {
            $this->school_report_model->exec_fail($this->view->get_controller_url() . 'dsp_main_school_record', "Cập nhật nhận xét thành công");
        } else {
            $this->school_report_model->exec_fail($this->view->get_controller_url() . 'dsp_single_student_to_remark', "Cập nhật nhận xét thất bại ! Mời cập nhật lại");
        }
    }

    public function dsp_list_student_to_final_remark_title() {
            $check = $this->school_report_model->check_is_acived();
        if($check){
            $DATA = array();
            $DATA['arr_all_student'] = $this->school_report_model->qry_all_student_final_remark_title();
            $this->view->render('school_report/dsp_list_student_to_final_remark_title', $DATA);
        }else{
            $this->goback_url = $this->view->get_controller_url() . 'dsp_main_school_record';
            $this->school_report_model->exec_fail($this->goback_url, "Chưa đến thời gian nhập học bạ");
        }
      
    }

    public function do_update_single_student_final_remark_title() {
        $result = $this->school_report_model->do_update_single_student_final_remark_title();
        if ($result) {
            $this->school_report_model->exec_fail($this->view->get_controller_url() . 'dsp_main_school_record', "Cập nhật nhận xét thành công");
        } else {
            $this->school_report_model->exec_fail($this->view->get_controller_url() . 'dsp_list_student_to_final_remark_title', "Cập nhật nhận xét thất bại ! Mời cập nhật lại");
        }
    }

        public function qry_all_year_student(){
        header('Content-type:app/lication/json');
        $result = $this->school_report_model->qry_all_year_student();
        echo json_encode($result); 
        }
        
        public function qry_student_school_record(){
            $DATA['arr_student_record_info'] = $this->school_report_model->qry_student_school_record();
            $DATA['student_code'] = get_post_var('sel_student_code','');
            $DATA['semester']     = get_post_var('sel_semester','');
            $DATA['year']         = get_post_var('sel_year','');
            $DATA['arr_final_remark_title'] = $this->school_report_model->qry_all_final_remark_title();
            $this->view->render('school_report/dsp_main_school_record',$DATA);
         }
         
        public function qry_all_final_remark_title(){
//            $result = $this->school_report_model->qry_all_final_remark_title();
        }
        
        public function dsp_print_student_record(){
            $this->view->render('school_report/dsp_print_student_record',array(),false);
        }
}
