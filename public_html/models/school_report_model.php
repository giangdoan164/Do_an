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

    public function qry_all_student_class() {
        $result = array();
        $class_id = Session::get('class');
        $sql = "SELECT u.PK_USER ,u.C_NAME FROM t_user u INNER JOIN t_class c WHERE  u.FK_CLASS = c.PK_CLASS AND u.FK_CLASS = $class_id AND  u.FK_GROUP =4 ";

//        $sql="INSERT INTO `t_shcool_report` (FK_TEACHER_USER,FK_PARENT_USER,FK_GRADE,FK_CLASS,C_SEMESTER,C_YEAR,C_MATH_GRADE,C_LITERATURE_GRADE,C_FINAL_GRADE,C_TEACHER_REMARK)
//VALUES(1,1,1,1,1,1,1,1,1,1)";
        $result = $this->db->GetAll($sql);
        return $result;
    }

    public function do_dsp_list_school_record($excel_path) {
//          @session_start();
        //include thu vien php excel
        require(SERVER_ROOT . 'libs/excel/PHPExcel/IOFactory.php');
        //load file excel
        $inputFileType = 'Excel5';
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($excel_path);
//        neu file excel co 1 sheet
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, TRUE, TRUE, TRUE);
        $sheetCount = $objPHPExcel->getSheetCount();
        PHPExcel_Style_NumberFormat::toFormattedString($sheetData[$i]['B'], 'YYYY-MM-DD');
        for ($i = 5; $i < $sheetCount; $i++) {
            $sheetData[$i]['B'] = PHPExcel_Style_NumberFormat::toFormattedString($sheetData[$i]['B'], 'YYYY-MM-DD');
            echo $sheetData[$i]['B'];
        }
        die();
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
//        echo __FILE__;
//        echo "<pre>";
//        print_r($sheetData);
//        echo "</pre>";
//        echo __LINE__;
        return $sheetData;
    }

    public function dsp_list_school_record() {
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
//                            $sheetCount = $objPHPExcel->getSheetCount();
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

    public function do_add_list_school_record($data_arr) {
        echo __FILE__;
        echo "<pre>";
        print_r($data_arr);
        echo "</pre>";
        echo __LINE__;

        $teacher_id = Session::get('user_id');
        $class = Session::get('class');
        $grade = Session::get('grade');
        $semester = $data_arr[0][1];
        $year  = $data_arr[0][3];
        for ($i = 4; $i < sizeof($data_arr); $i++) {
            $student_name = trim($data_arr[$i][0]);
//            $student_birth = date("Y-m-d", strtotime(trim($data_arr[$i]['1'])));
            $father_name = trim($data_arr[$i][2]);
            $mother_name = trim($data_arr[$i][3]);
            $sql = "SELECT PK_USER FROM t_user WHERE C_NAME = ? AND C_FATHER_NAME = ? AND C_MOTHER_NAME =? AND FK_CLASS = ?";
            $params = array($student_name, $father_name, $mother_name,$class);
            $student_id = $this->db->GetOne($sql, $params);
            if (intval($student_id) > 0) {
                $sql = "INSERT INTO t_school_report (FK_TEACHER_USER,FK_STUDENT_USER,FK_GRADE,FK_CLASS,C_SEMESTER,C_YEAR,C_MATH_GRADE,C_LITERATURE_GRADE)
                     VALUES(?,?,?,?,?,?,?,?)";
                $params = array($teacher_id,$student_id,$grade,$class,$semester,$year,$data_arr[$i][4],$data_arr[$i][5]);
                $this->db->Execute($sql,$params);
            }
        }
        if($this->db->ErrorNo()){return true;}
        else{
            return false;
        }
    }

}
