<?php

class School_report_Model extends Model {
//9-10 là giỏi
//
//7-8 là khá
//
//từ 5-6 là TB
    function __construct($db) {
        parent::__construct($db);
    }

//    public function do_dsp_list_school_record($excel_path) {
////          @session_start();
//        //include thu vien php excel
//        require(SERVER_ROOT . 'libs/excel/PHPExcel/IOFactory.php');
//        //load file excel
//        $inputFileType = 'Excel5';
//        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
//        $objReader->setReadDataOnly(true);
//        $objPHPExcel = $objReader->load($excel_path);
////        neu file excel co 1 sheet
//        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, TRUE, TRUE, TRUE);
//        $sheetCount = $objPHPExcel->getSheetCount();
//        PHPExcel_Style_NumberFormat::toFormattedString($sheetData[$i]['B'], 'YYYY-MM-DD');
//        for ($i = 5; $i < $sheetCount; $i++) {
//            $sheetData[$i]['B'] = PHPExcel_Style_NumberFormat::toFormattedString($sheetData[$i]['B'], 'YYYY-MM-DD');
//            echo $sheetData[$i]['B'];
//        }
       
//       doc tung sheet mot
//        for ($j = 0; $j < $sheetCount; $j++) {
//            $sheetData = $objPHPExcel->setActiveSheetIndex($j)->toArray(null, TRUE, TRUE, TRUE);
//             $arr_legth = count($sheetData); 
//            for ($i = 2; $i <= $arr_legth; $i++) {
//                $v_student_name = $sheetData[$i]['A'];
//                $temp = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($sheetData[$i]['B'], 'YYYY-MM-DD'));
//                $v_student_birth = date('Y-m-d', $temp);
//                //                $v_student_birth = date("Y-m-d", strtotime($v_student_birth));
//                $v_father_name = $sheetData[$i]['D'];
//                $v_mother_name = $sheetData[$i]['C'];
//                $v_address = $sheetData[$i]['E'];
//                $v_email = $sheetData[$i]['F'];
//                $v_phone = $sheetData[$i]['G'];
//                $v_class = $sheetData[$i]['H'];
//                $v_grade = $sheetData[$i]['I'];
//                //kiem tra trung ten dang nhap truoc khi insert
//                // MaPH se co dang : nguyenvannam |11022009 |01
//                $v_user_name = $this->do_create_user_name($v_student_name,$v_student_birth);
//                $v_pass_word = md5("123456");
//                $params = array($v_student_name, $v_student_birth, $v_father_name, $v_mother_name, $v_email, $v_phone, $v_address, $v_grade, $v_class,$v_user_name,$v_pass_word, 4);
//                $sql = "INSERT INTO t_user (C_NAME,C_STUDENT_BIRTH,C_FATHER_NAME,C_MOTHER_NAME,C_EMAIL,C_PHONE,C_ADDRESS,FK_GRADE,FK_CLASS,C_LOGIN_NAME,C_PASSWORD,FK_GROUP) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
//                
//                $this->db->Execute($sql, $params);
//            }
//        }
//    }

    public function dsp_list_school_record_toan_van() {
        $class = Session::get('class');
        if ($_FILES['uploader']['error'] == 0) {

            $v_file_name = $_FILES['uploader']['name'];
            $v_tmp_name = $_FILES['uploader']['tmp_name'];
            $v_file_ext = array_pop(explode('.', $v_file_name));
            $v_cur_file_name = uniqid() . '.' . $v_file_ext;

            if (in_array($v_file_ext, explode(',', _CONST_RECORD_FILE_ACCEPT))) {
                //upload file len server
                $v_dir_file = CONST_FILE_UPLOAD_PATH . $class . DS;

                if (file_exists($v_dir_file) == FALSE) {

                    mkdir($v_dir_file, 0777, true);
                }

                if (move_uploaded_file($v_tmp_name, $v_dir_file . $v_cur_file_name)) {
//                       $this->do_dsp_list_school_record($v_dir_file .$v_cur_file_name);
                    //include thu vien php excel
                    require(SERVER_ROOT . 'libs/excel/PHPExcel/IOFactory.php');
                    //load file excel
                    $inputFileType = 'Excel5';
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objReader->setReadDataOnly(true);
                    $objPHPExcel = $objReader->load($v_dir_file . $v_cur_file_name);
                    //        neu file excel co 1 sheet
                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, TRUE, TRUE, TRUE);
//                  
                    $count = sizeof($sheetData);
                    for ($i = 5; $i <= $count; $i++) {
                        $sheetData[$i]['B'] = PHPExcel_Style_NumberFormat::toFormattedString($sheetData[$i]['B'], 'YYYY-MM-DD');
                    }


                    if ($count > 0) {
                        return $sheetData;
                    } else {
                        return false;
                    }
                }
            } else {
                $DATA['error'] = "Yêu cầu chọn file excel";
                $this->exec_fail($this->goback_url, $DATA['error'], $arr_data);
            }
        }
        if ($this->db->ErrorNo() == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function check_is_added_list_record($code,$semester,$year){
          $sql = "SELECT COUNT(*) FROM t_school_record WHERE C_SEMESTER = '$semester' AND C_YEAR ='$year' AND C_TEACHER_CODE='$code'";
          $count = $this->db->GetOne($sql);
          if(intval($count)==0){return true;}
          else{return false;}
          
    }
    public function do_add_list_school_record_excel($data_arr) {
        $teacher_code = Session::get('user_code');
        $semester = $data_arr[0][1];
        $year  = $data_arr[0][3];
        $check = $this->check_is_added_list_record($teacher_code, $semester, $year);
        if($check==FALSE){  return false;}
        else{
             $count_data = sizeof($data_arr);
        for ($i = 4; $i <$count_data; $i++) {
                $student_code = $data_arr[$i][2];
                $sql = "INSERT INTO t_school_record(C_STUDENT_CODE,C_SEMESTER,C_YEAR,C_TEACHER_CODE) VALUES (?,?,?,?) ";
                $params = array($student_code,$semester,$year,$teacher_code);
                $this->db->Execute($sql,$params);
                $school_record = $this->db->Insert_ID();
                    //Them mon toan
                   $sql = "INSERT INTO t_detail_school_record(FK_SCHOOL_RECORD,FK_SUBJECT,FK_GRADE) VALUES(?,?,?)"; 
                   $params = array($school_record,1,$data_arr[$i][3]);
                   $this->db->Execute($sql,$params);
                    //Them mon tieng viet
                   $sql = "INSERT INTO t_detail_school_record(FK_SCHOOL_RECORD,FK_SUBJECT,FK_GRADE) VALUES(?,?,?)"; 
                   $params = array($school_record,2,$data_arr[$i][4]);
                   $this->db->Execute($sql,$params);
                }
        }
      
        if($this->db->ErrorNo()==0){return true;}
        else{
            return false;
        }
        
    }
    
    public function qry_all_subject_grade(){
        $result = array();
        $grade = Session::get('grade');
        $sql ="SELECT s.* FROM `t_grade_subject`  gs INNER JOIN `t_subject` s ON gs.FK_SUBJECT = s.PK_SUBJECT AND gs.FK_GRADE = '$grade'";
        $result = $this->db->GetAssoc($sql);
        return $result;
        
    }
    
   public function qry_all_student_class(){
       $result = array();
       $class_id = Session::get('class');
       $sql = "SELECT PK_USER,C_CODE,C_NAME,C_STUDENT_BIRTH FROM t_user WHERE  FK_CLASS ='$class_id' AND FK_GROUP = 4 AND C_DELETED = 0";
       $result = $this->db->GetAll($sql);
       return $result;
   }
   
   public function get_semester_info(){
       $result = array();
       $sql = "SELECT * FROM t_current_time";
       $result = $this->db->GetAll($sql);
       return $result;
   }
   
   public function get_school_record($student_code){
       $semester_info = $this->get_semester_info();
       $semester = $semester_info[0]['C_SEMESTER'];
       $year = $semester_info[0]['C_SCHOOL_YEAR'];
       $teacher_code = Session::get('user_code');
       $sql = "SELECT PK_SCHOOL_RECORD FROM t_school_record WHERE C_STUDENT_CODE=?  AND C_SEMESTER=? AND C_YEAR =? AND C_TEACHER_CODE=?";
       $params = array($student_code,$semester,$year,$teacher_code);
       $school_record = $this->db->GetOne($sql,$params);
       if($school_record == 0){// neu chua co hoc ba thi tao moi
           $sql ="INSERT INTO t_school_record(C_STUDENT_CODE,C_SEMESTER,C_YEAR,C_TEACHER_CODE) VALUES(?,?,?,?)";
           $params = array($student_code,$semester,$year,$teacher_code);
           $this->db->Execute($sql, $params);
           $school_record = $this->db->Insert_ID();
           return $school_record;
       }else{
           return $school_record;
       }
   }
   public function do_update_school_record_mon_phu($type){
   
      $arr_student = $this->qry_all_student_class();
      $semester_info = $this->get_semester_info();
      $semester = $semester_info[0]['C_SEMESTER'];
      $year = $semester_info[0]['C_SCHOOL_YEAR'];
      $teacher_code = Session::get('user_code');
      $subject_id = get_post_var('sel_subject');
     
      foreach ($arr_student as $student) {
           $subject_grade = get_post_var("txt_sle_std_ann_".$student['C_CODE']);
           $school_record = $this->get_school_record($student['C_CODE']);
           if($type==0){
                $sql = "INSERT INTO t_detail_school_record(FK_SCHOOL_RECORD,FK_SUBJECT,FK_GRADE) VALUES ('$school_record','$subject_id','$subject_grade')";
                $this->db->Execute($sql);
            }else{
                $sql = "UPDATE t_detail_school_record SET FK_GRADE = '$subject_grade' WHERE FK_SCHOOL_RECORD = '$school_record' AND FK_SUBJECT = '$subject_id'";
                $this->db->Execute($sql);
            }
      }
      if($this->db->ErrorNo()==0){return true;}
      else{return false;}
       
}

    public function qry_all_subject_grade_student(){
        $result = array();
        $arr_student = $this->qry_all_student_class();
      $semester_info = $this->get_semester_info();
      $semester = $semester_info[0]['C_SEMESTER'];
      $year = $semester_info[0]['C_SCHOOL_YEAR'];
      $teacher_code = Session::get('user_code');
      $subject_id = get_post_var('subject_id');

      foreach ($arr_student as $student) {
           $subject_grade = get_post_var("txt_sle_std_ann_".$student['C_CODE']);
           $school_record = $this->get_school_record($student['C_CODE']);
//           $sql[] ="SELECT FK_GRADE FROM t_detail_school_record WHERE FK_SCHOOL_RECORD='$school_record' AND FK_SUBJECT ='$subject_id'";  
           $sql[] = "SELECT 
                        sr.C_STUDENT_CODE,
                        dsr.FK_GRADE 
                          FROM
                        t_school_record sr 
                        INNER JOIN `t_detail_school_record` dsr ON  sr.PK_SCHOOL_RECORD = dsr.FK_SCHOOL_RECORD AND sr.PK_SCHOOL_RECORD = '$school_record' 
                        AND dsr.FK_SUBJECT  = '$subject_id'";
      }
      $sql = implode(' UNION ALL ',$sql);
      $result = $this->db->GetAll($sql);
      return $result;
    }
  
    //tra lai bang chua toan bo diem cua hoc sinh hien tai 
    public function qry_all_subject_grade_remark(){
      $grade = Session::get('grade');
      $result = array();
      $semester_info = $this->get_semester_info();
      $semester = $semester_info[0]['C_SEMESTER'];
      $year = $semester_info[0]['C_SCHOOL_YEAR'];
      $teacher_code = Session::get('user_code');
      $subject_id = get_post_var('subject_id');
      $student_code = get_post_var('student_code');
      $school_record = $this->get_school_record($student_code);
      $grade_subject = $this->qry_all_subject_grade();
      foreach ($grade_subject as $subject_id => $value)
      {
          $sql[] = "SELECT FK_GRADE from t_detail_school_record where FK_SUBJECT = '$subject_id' ";
      }
        $sql ="SELECT
                    s.PK_SUBJECT,
                    s.C_SUBJECT_NAME,
                    dsr.FK_GRADE 
                  FROM
                    t_detail_school_record dsr 
                    RIGHT JOIN  s 
                      ON dsr.FK_SUBJECT = s.PK_SUBJECT 
                  WHERE FK_SCHOOL_RECORD = '$school_record' ";
      $result = $this->db->GetAll($sql);
      return $result;
      
      
    }

}
