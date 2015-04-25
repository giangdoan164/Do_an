<?php

//insert update --> this->db->errornum(true false)
//select return array() co the (mang ket qua,false)
class School_report_Model extends Model {

//9-10 là giỏi
//
//7-8 là khá
//
//từ 5-6 là TB
    function __construct($db) {
        parent::__construct($db);
    }

    public function qry_all_subject_grade() {
        $result = array();
        $grade = Session::get('grade');
        $sql = "SELECT s.* FROM `t_grade_subject`  gs INNER JOIN `t_subject` s ON gs.FK_SUBJECT = s.PK_SUBJECT AND gs.FK_GRADE = '$grade'";
        $result = $this->db->GetAssoc($sql);
        return $result;
    }

    public function qry_all_student_class() {
        $result = array();
        $class_id = Session::get('class');
        $sql = "SELECT PK_USER,C_CODE,C_NAME,C_STUDENT_BIRTH FROM t_user WHERE  FK_CLASS ='$class_id' AND FK_GROUP = 4 AND C_DELETED = 0";
        $result = $this->db->GetAll($sql);
        return $result;
    }

    public function get_semester_info() {
        $result = array();
        $sql = "SELECT * FROM t_current_time";
        $result = $this->db->GetAll($sql);
        return $result;
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

            $semester_info = $this->get_semester_info();
            $semester = $semester_info[0]['C_SEMESTER'];
            $year = $semester_info[0]['C_SCHOOL_YEAR'];
            $v_file_name = $_FILES['uploader']['name'];
            $v_tmp_name = $_FILES['uploader']['tmp_name'];
            $arr_file_name = explode('.', $v_file_name);
            $v_file_ext = array_pop($arr_file_name);
            $v_cur_file_name = uniqid() . '.' . $v_file_ext;

            if (in_array($v_file_ext, explode(',', _CONST_RECORD_FILE_ACCEPT))) {
                //upload file len server
                $v_dir_file = CONST_FILE_UPLOAD_PATH .$year.DS;

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

    /**
     * 
     * @param type $code
     * @param type $semester
     * @param type $year
     * @return boolean Kiểm tra đã nhập danh sách của kỳ đó chưa(Nhập rồi : false; Chưa nhập : true);
     */
    function check_is_added_list_record($code, $semester, $year) {
        $sql = "SELECT COUNT(*) FROM t_school_record WHERE C_SEMESTER = '$semester' AND C_YEAR ='$year' AND C_TEACHER_CODE='$code'";
        $count = $this->db->GetOne($sql);
        if (intval($count) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function do_add_list_school_record_excel($data_arr) {
//        $teacher_code = Session::get('user_code');
//        $semester = $data_arr[0][1];
//        $year  = $data_arr[0][3];
        $semester_info = $this->get_semester_info();
        $semester = $semester_info[0]['C_SEMESTER'];
        $year = $semester_info[0]['C_SCHOOL_YEAR'];
        $teacher_code = Session::get('user_code');
        $arr_subject = $this->qry_all_subject_grade();
        //array_diff
        //truoc do con check kiem tra mang lay va mang user_class  trong bang user xem neu giong nhau moi nhap . ko thi thoi-->dam bao giong het nhau trong csdl
        //neu hs chuyen truong thi cho C_DELETED = 1 -> chi select nhung thang C_DELETED = 0 thoi
        $check = $this->check_is_added_list_record($teacher_code, $semester, $year);
        if ($check == FALSE) {
            return 'added';
        } else {

            $count_data = sizeof($data_arr);
            for ($i = 4; $i < $count_data; $i++) {
                $student_code = $data_arr[$i][2];
                $student_title = $data_arr[$i][5];
                $sql = "INSERT INTO t_school_record(C_STUDENT_CODE,C_SEMESTER,C_YEAR,C_TEACHER_CODE,C_TITLE) VALUES (?,?,?,?,?) ";
                $params = array($student_code, $semester, $year, $teacher_code,$student_title);
                $this->db->Execute($sql, $params);
                $math_grade =$data_arr[$i][3];
                $liture_grade = $data_arr[$i][4];
                
               //them vao bang detail record moi hoc sinh se co cac mon hoc giong nhau cua tung khoi
                $school_record = $this->db->Insert_ID();
                foreach ($arr_subject as $subject_id => $subject_name) {
                    $sql = "INSERT INTO t_detail_school_record(FK_SCHOOL_RECORD,FK_SUBJECT) VALUES('$school_record','$subject_id')";
                    $this->db->Execute($sql);
                    //neu la mon toan
                    if($subject_id =='1'){//neu mon them moi la mon Toan thi update luon diem
                        
                       $sql = "UPDATE t_detail_school_record SET FK_GRADE = ? WHERE FK_SCHOOL_RECORD = ? AND FK_SUBJECT = ?";
                       $params = array($math_grade,$school_record,$subject_id);
                        $this->db->Execute($sql,$params);
                    }
                    if($subject_id=='2'){ 
                    
                        //neu mon them moi la mon Tieng Viet thi update luon diem
                         $sql = "UPDATE t_detail_school_record SET FK_GRADE = ? WHERE FK_SCHOOL_RECORD = ? AND FK_SUBJECT = ?";
                         $params = array($liture_grade,$school_record,$subject_id);
                          $this->db->Execute($sql,$params);
                    }   
                }
            }
            if ($this->db->ErrorNo() == 0) {
                return 'success';
            } else {
                return false;
            }
        }
    }

    public function get_school_record($student_code) {
        $semester_info = $this->get_semester_info();
        $semester = $semester_info[0]['C_SEMESTER'];
        $year = $semester_info[0]['C_SCHOOL_YEAR'];
        $teacher_code = Session::get('user_code');
        $sql = "SELECT PK_SCHOOL_RECORD FROM t_school_record WHERE C_STUDENT_CODE=?  AND C_SEMESTER=? AND C_YEAR =? AND C_TEACHER_CODE=?";
        $params = array($student_code, $semester, $year, $teacher_code);
        $school_record = $this->db->GetOne($sql, $params);
        if ($school_record == 0) {// neu chua co hoc ba thi tao moi
            $sql = "INSERT INTO t_school_record(C_STUDENT_CODE,C_SEMESTER,C_YEAR,C_TEACHER_CODE) VALUES(?,?,?,?)";
            $params = array($student_code, $semester, $year, $teacher_code);
            $this->db->Execute($sql, $params);
            $school_record = $this->db->Insert_ID();
            return $school_record;
        } else {
            return $school_record;
        }
    }

    public function do_update_school_record_mon_phu() {
        $arr_student = $this->qry_all_student_class();
        $semester_info = $this->get_semester_info();
        $semester = $semester_info[0]['C_SEMESTER'];
        $year = $semester_info[0]['C_SCHOOL_YEAR'];
        $teacher_code = Session::get('user_code');
        $subject_id = get_post_var('sel_subject');
        //luon luon  = 1
        foreach ($arr_student as $student) {
            $subject_grade = get_post_var("txt_sle_std_ann_" . $student['C_CODE']);
            $school_record = $this->get_school_record($student['C_CODE']);
            $sql = "UPDATE t_detail_school_record SET FK_GRADE = '$subject_grade' WHERE FK_SCHOOL_RECORD = '$school_record' AND FK_SUBJECT = '$subject_id'";
            $this->db->Execute($sql);
            
        }
        if ($this->db->ErrorNo() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function qry_all_subject_grade_student() {
        $result = array();
        $arr_student = $this->qry_all_student_class();
        $semester_info = $this->get_semester_info();
        $semester = $semester_info[0]['C_SEMESTER'];
        $year = $semester_info[0]['C_SCHOOL_YEAR'];
        $teacher_code = Session::get('user_code');
        $subject_id = get_post_var('subject_id');

        foreach ($arr_student as $student) {
            $subject_grade = get_post_var("txt_sle_std_ann_" . $student['C_CODE']);
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
        $sql = implode(' UNION ALL ', $sql);
        $result = $this->db->GetAll($sql);
        return $result;
    }

    //tra lai bang chua toan bo diem cua hoc sinh hien tai 
    public function qry_all_subject_grade_remark() {
        $grade = Session::get('grade');
        $result = array();
        $semester_info = $this->get_semester_info();
        $semester = $semester_info[0]['C_SEMESTER'];
        $year = $semester_info[0]['C_SCHOOL_YEAR'];
        $teacher_code = Session::get('user_code');
        $subject_id = get_post_var('subject_id');
        $student_code = get_post_var('student_code');
        $school_record = $this->get_school_record($student_code);

        $sql = "SELECT
                    s.PK_SUBJECT,
                    s.C_SUBJECT_NAME,
                    dsr.FK_GRADE ,
                    dsr.C_TEACHER_REMARK
                  FROM
                    t_detail_school_record dsr 
                    INNER JOIN t_subject s
                      ON dsr.FK_SUBJECT = s.PK_SUBJECT 
                  WHERE FK_SCHOOL_RECORD = '$school_record' ";
        $result = $this->db->GetAll($sql);
        return $result;
    }

    public function do_insert_all_remark_single_student() {
        $result = array();
        $semester_info = $this->get_semester_info();
        $semester = $semester_info[0]['C_SEMESTER'];
        $year = $semester_info[0]['C_SCHOOL_YEAR'];
        $teacher_code = Session::get('user_code');
        $subject_id = get_post_var('subject_id');
        $student_code = get_post_var('student_code');
        $school_record = $this->get_school_record($student_code);
        $arr_subject = get_post_var('subject');

        foreach ($arr_subject as $subject) {
            $remark = get_post_var('txt_sle_std_ann_' . $subject);
            $sql = "UPDATE t_detail_school_record
                  SET C_TEACHER_REMARK = '$remark' WHERE FK_SCHOOL_RECORD = $school_record AND FK_SUBJECT = $subject";
            $this->db->Execute($sql);
        }
        if ($this->db->ErrorNo() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function qry_all_student_final_remark_title() {
        $result = array();
        $semester_info = $this->get_semester_info();
        $semester = $semester_info[0]['C_SEMESTER'];
        $year = $semester_info[0]['C_SCHOOL_YEAR'];
        $teacher_code = Session::get('user_code');
        $sql = "SELECT sr.*,u.C_STUDENT_BIRTH,u.C_NAME
                FROM t_school_record sr
                INNER JOIN t_user u
                  ON sr.C_STUDENT_CODE = u.C_CODE COLLATE utf8_unicode_ci
                    AND sr.C_SEMESTER ='$semester'
                    AND sr.C_YEAR = '$year'
                    AND sr.C_TEACHER_CODE = '$teacher_code'"
                . "AND u.C_DELETED='0'";
                    
        $result = $this->db->GetAll($sql);
        return $result;
    }

    public function do_update_single_student_final_remark_title() {
        $semester_info = $this->get_semester_info();
        $semester = $semester_info[0]['C_SEMESTER'];
        $year = $semester_info[0]['C_SCHOOL_YEAR'];
        $teacher_code = Session::get('user_code');
        $arr_student_code = get_post_var('student_code');
       
        foreach ($arr_student_code as $student_code) {
            $remark = get_post_var('txt_sle_std_ann_remark_'.$student_code);
           
            $sql = " UPDATE t_school_record
                  SET   C_REMARK_FINAL = '$remark'
                  WHERE C_STUDENT_CODE = '$student_code'
                      AND C_SEMESTER = '$semester'
                      AND C_YEAR = '$year'
                      AND C_TEACHER_CODE = '$teacher_code'";
            $this->db->Execute($sql);
        }

        if ($this->db->ErrorNo() == 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function qry_all_year_student(){
        $result = array();
        if(isset($_POST['student_code'])){//neu la giao vien
             $student_code = get_post_var('student_code'); 
        }else{// neu la phu huynh
            $student_code = Session::get('user_code');
        }
        
        $sql = "SELECT C_YEAR FROM t_school_record WHERE C_STUDENT_CODE = '$student_code'";
        $result = $this->db->GetCol($sql);
        return $result;
    }

    public function qry_student_school_record($student_code,$semester,$year){
        $result = array();
//        $student_code = get_post_var('sel_student_code');
//        $semester     = get_post_var('sel_semester');
//        $year         = get_post_var('sel_year');
            $sql ="SELECT
                        s.C_SUBJECT_NAME, dsr.FK_GRADE ,dsr.C_TEACHER_REMARK
                    FROM t_detail_school_record dsr
                    INNER JOIN t_school_record sr
                         ON sr.PK_SCHOOL_RECORD = dsr.FK_SCHOOL_RECORD
                    INNER JOIN t_subject s
                         ON s.PK_SUBJECT = dsr.FK_SUBJECT
                    WHERE sr.C_STUDENT_CODE = '$student_code'
                      AND sr.C_YEAR = '$year'
                      AND sr.C_SEMESTER = '$semester'";
         $result = $this->db->GetAll($sql);
         return $result;
           
  }
  
  public function qry_final_remark_title($student_code,$semester,$year){
     $result = array();
//     $student_code = get_post_var('sel_student_code');
//     $semester     = get_post_var('sel_semester');
//     $year         = get_post_var('sel_year');
     $sql ="SELECT C_TITLE , C_REMARK_FINAL FROM t_school_record WHERE C_STUDENT_CODE = '$student_code' AND C_SEMESTER = '$semester' AND C_YEAR ='$year' ";
     $result = $this->db->GetRow($sql);
     return $result;
     
  }
  
  public function check_is_acived(){
      $result = array();
       $sql = "SELECT C_ACTIVE FROM t_current_time";
       $result = $this->db->GetOne($sql);
       if(intval($result) == 1){return true;}
       else{  return false;  }
       
       
  }
  
  public function qry_current_year_semester(){
      $result =array();
      $sql = "SELECT * FROM t_current_time";
      $result = $this->db->GetRow($sql);
      return $result;
  }
  
   
    
   
}
