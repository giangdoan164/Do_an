<?php

class Parent_student extends Controller {
    public $parent_student_model;
    public $class_grade_model;
    function __construct() {
        parent::__construct('parent_student');
        $this->parent_student_model = $this->loadModel('parent_student');
        $this->view->title = 'Quản lý danh sách liên lạc';
        $this->class_grade_model = $this->loadModel('class_grade');
    }

//    public function index(){
//    // creates an object instance of the class, and read the excel file data
//    $excel = new PhpExcelReader();
////    $excel->read(SERVER_ROOT.'contact_files/test_1.xls');
//    $excel->read(EXCEL_PATH.'hehe.xls');
//    echo __FILE__;
//    echo "<pre>";
//    print_r($excel);
//    echo "</pre>";
//    echo __LINE__;die();
//
//
//}
    
   public function index(){
      $this->dsp_all_parent_contact();
            
//       //include thu vien php excel
//       require(SERVER_ROOT.'libs/excel/PHPExcel/IOFactory.php');
//       //load file excel
//       $inputFileType = 'Excel5';
//       $objReader = PHPExcel_IOFactory::createReader($inputFileType);
//       $objReader->setReadDataOnly(true);
//       $v_file = SERVER_ROOT.'contact_files/danhsach1.xls';
//       $objPHPExcel = $objReader->load($v_file);
//       
//       //chuyen doi du lieu thanh array
//       $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,TRUE,TRUE,TRUE);
//       echo __FILE__;
//       echo "<pre>";
//       print_r($sheetData);
//       echo "</pre>";
//       echo __LINE__;
   }
   
   public function dsp_all_parent_contact(){
       $arr_data['arr_all_parent_contact'] = $this->parent_student_model->qry_all_parent_contact();
       $arr_data['arr_class'] = $this->class_grade_model->qry_all_class();
       $arr_data['arr_grade'] = $this->class_grade_model->qry_all_grade();
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
        $arr_data['hdn_dsp_all_record'] = get_post_var('hdn_dsp_all_record', '');
        $this->goback_url                = $arr_data['controller'] . $arr_data['hdn_dsp_all_record'];

        $result = $this->parent_student_model->delete_parent_contact();
        if ($result == false)
        {
            $DATA['error'] = " Xảy ra lỗi không xóa được";
            $this->parent_student_model->exec_fail($this->goback_url, $VIEW_DATA['error'], $arr_data);
            exit();
        }
        else
        {
            $this->parent_student_model->exec_done($this->goback_url, $arr_data);
            exit();
        }
    }
    
}