<?php

class Parent_student_Model extends Model
{

    function __construct($db)
    {
        parent::__construct($db);
    }
    
    
    public function check_is_user_name_exist($name,$birth){
        $sql = "SELECT COUNT(*) FROM t_user WHERE C_NAME = ?  AND C_STUDENT_BIRTH = ?";
        $params = array($name,$birth);
        $result = $this->db->GetOne($sql,$params);
        if($result==0){return FALSE;}
        else{
            return $result;
        }
    }
//    $timestamp = strtotime('2008-07-01T22:35:17.02');
//$new_date_format = date('Y-m-d H:i:s', $timestamp);
    public function do_create_user_name($name,$birth){
       
        $name = trim($name);
        $birth = trim($birth,"-");
        
        //neu ko trung ten 
        $v_exist_record = $this->check_is_user_name_exist($name, $birth);
        $birth = date("d-m-Y",strtotime($birth));
        $arr_birth = explode("-",$birth );
        $birth = implode("",$arr_birth);
        $name = vn2latin($name,true);
        $arr_name = explode("-", $name);
        $name = implode("", $arr_name);
        if($v_exist_record==0){
            return  $name.$birth;
        }else{
            $v_exist_record +=1;
            return $name.$birth.$v_exist_record;
        }
    }
    public function do_update_list_excel($excel_path) {
        session_start();
        //include thu vien php excel
        require(SERVER_ROOT . 'libs/excel/PHPExcel/IOFactory.php');
        //load file excel
        $inputFileType = 'Excel5';
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($excel_path);
//       $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,TRUE,TRUE,TRUE); neu file excel co 1 sheet
        $sheetCount = $objPHPExcel->getSheetCount();
     
//       doc tung sheet mot
        for ($j = 0; $j < $sheetCount; $j++) {
            $sheetData = $objPHPExcel->setActiveSheetIndex($j)->toArray(null, TRUE, TRUE, TRUE);
             $arr_legth = count($sheetData); 
            for ($i = 2; $i <= $arr_legth; $i++) {
                $v_student_name = $sheetData[$i]['A'];
                $temp = strtotime(PHPExcel_Style_NumberFormat::toFormattedString($sheetData[$i]['B'], 'YYYY-MM-DD'));
                $v_student_birth = date('Y-m-d', $temp);
                //                $v_student_birth = date("Y-m-d", strtotime($v_student_birth));
                $v_father_name = $sheetData[$i]['D'];
                $v_mother_name = $sheetData[$i]['C'];
                $v_address = $sheetData[$i]['E'];
                $v_email = $sheetData[$i]['F'];
                $v_phone = $sheetData[$i]['G'];
                $v_class = $sheetData[$i]['H'];
                $v_grade = $sheetData[$i]['I'];
                //kiem tra trung ten dang nhap truoc khi insert
                // MaPH se co dang : nguyenvannam |11022009 |01
                $v_user_name = $this->do_create_user_name($v_student_name,$v_student_birth);
                $v_pass_word = md5("123456");
                $params = array($v_student_name, $v_student_birth, $v_father_name, $v_mother_name, $v_email, $v_phone, $v_address, $v_grade, $v_class,$v_user_name,$v_pass_word, 4);
                $sql = "INSERT INTO t_user (C_NAME,C_STUDENT_BIRTH,C_FATHER_NAME,C_MOTHER_NAME,C_EMAIL,C_PHONE,C_ADDRESS,FK_GRADE,FK_CLASS,C_LOGIN_NAME,C_PASSWORD,FK_GROUP) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
                
                $this->db->Execute($sql, $params);
            }
        }
    
        
            }

    public function update_list_excel(){
     
            if ($_FILES['uploader']['error'] == 0)
            {
                $v_file_name = $_FILES['uploader']['name'];
                $v_tmp_name = $_FILES['uploader']['tmp_name'];
                    
                $v_file_ext = array_pop(explode('.', $v_file_name));
                    
                $v_cur_file_name = uniqid() . '.' . $v_file_ext;
                    
                if (in_array($v_file_ext, explode(',', _CONST_RECORD_FILE_ACCEPT)))
                {
                    //upload file len server
                    $v_dir_file = CONST_FILE_UPLOAD_PATH.date('Y').DS;
                    
                    if (file_exists($v_dir_file) == FALSE)
                    {
                                   
                        mkdir($v_dir_file, 0777, true);
                    }
                    
                    if (move_uploaded_file($v_tmp_name, $v_dir_file .$v_cur_file_name))
                    {
                       $this->do_update_list_excel($v_dir_file .$v_cur_file_name);
                    }
                
                }else{
                    $DATA['error'] = "Yêu cầu chọn file excel";
                    $arr_data['controller']          = get_post_var('controller', '');
                    $arr_data['hdn_dsp_all_record'] = get_post_var('hdn_dsp_all_record', '');
                    $this->goback_url = $arr_data['controller']. $arr_data['hdn_dsp_all_record'];
                    $this->exec_fail($this->goback_url, $DATA['error'], $arr_data);
                   
                }
              }
              if($this->db->ErrorNo()==0){return TRUE;}
              else{return FALSE;}
            }
    
    public function qry_all_parent_contact()
    {
        //B1
        #Phan trang
        page_calc($v_start, $v_end);
        $v_start   = $v_start - 1;
        $v_limit   = $v_end - $v_start;
        
        $role = Session::get('level');
        if($role==3){
                //nho ve sau con them dieu kien loc theo khoi hoac theo lop
                $class_id = Session::get('class');
                $total_record = $this->db->GetOne("SELECT COUNT(*) from t_user WHERE FK_GROUP ='4' AND C_DELETED ='0' AND FK_CLASS = '$class_id'");
                #End phan trang

                //B2(xem dieu kien loc là gi)
                $condition = "WHERE t.FK_GROUP='4' AND t.C_DELETED ='0'  AND FK_CLASS = '$class_id'";
                $filter_name    = get_post_var('txt_filter','');
                if(trim($filter_name) == !'') {$condition .= "AND t.C_NAME like '%" . trim($filter_name) . "%'"; }
                $sql          = "SELECT t.*, c.C_CLASS_NAME, g.`PK_GRADE` ,$total_record as TOTAL_RECORD
                                 FROM
                                    t_user t 
                                    LEFT JOIN t_class c
                                        ON t.FK_CLASS = c.PK_CLASS 
                                     INNER JOIN t_grade g 
                                        ON g.PK_GRADE =t.FK_GRADE " . $condition . "LIMIT $v_start,$v_limit";
                $result       = $this->db->GetAll($sql);
               return $result;
         }else{
             $total_record = $this->db->GetOne("SELECT COUNT(*) FROM t_user WHERE FK_GROUP ='4' AND C_DELETED ='0'");
             $condition = "WHERE t.FK_GROUP='4' AND t.C_DELETED ='0'";
                $filter_class   = get_post_var('sel_class', 0);
                $filter_grade   = get_post_var('sel_grade', 0);
                 $filter_name    = get_post_var('txt_filter','');
                if($filter_grade!=0){$condition.="AND t.FK_GRADE ='$filter_grade'";}
                if($filter_class!=0){$condition.="AND t.FK_CLASS='$filter_class'";}
                if(trim($filter_name) == !'') {$condition .= "AND t.C_NAME like '%" . trim($filter_name) . "%'"; }
                $sql = "SELECT t.*, c.C_CLASS_NAME, g.`PK_GRADE` ,$total_record as TOTAL_RECORD
                                 FROM
                                    t_user t 
                                    LEFT JOIN t_class c
                                        ON t.FK_CLASS = c.PK_CLASS 
                                     INNER JOIN t_grade g 
                                        ON g.PK_GRADE =t.FK_GRADE " . $condition ." ORDER BY t.FK_CLASS ASC LIMIT $v_start,$v_limit";
               $result       = $this->db->GetAll($sql);
               return $result;
         }
      
        
    }

    public function update_single_parent_contact()
    {
        $v_parent_contact_id = get_post_var('hdn_parent_contact_id', 0);
        $v_student_name      = get_post_var('txt_student_name', '');
        $v_student_birth     = get_post_var('slt_student_birth', '');
        $v_father_name       = get_post_var('txt_father_name', '');
        $v_mother_name       = get_post_var('txt_mother_name', '');
        $v_email             = get_post_var('txt_parent_email', '');
        $v_phone             = get_post_var('txt_phone', '');
        $v_address           = get_post_var('txt_area_address', '');
        $v_class             = get_post_var('sel_class', '');
        $v_grade             = get_post_var('sel_grade', 0);

        if ($v_parent_contact_id > 0)
        {
            $sql    = "UPDATE 
                        t_user 
                    SET
                      C_NAME = ?,
                      C_STUDENT_BIRTH = ?,
                      C_FATHER_NAME = ?,
                      C_MOTHER_NAME = ?,
                      C_EMAIL = ?,
                      C_PHONE = ?,
                      C_ADDRESS = ?,
                      FK_GRADE = ?,
                      FK_CLASS = ? 
                    WHERE PK_USER = ?";
            $params = array($v_student_name, $v_student_birth, $v_father_name, $v_mother_name, $v_email, $v_phone, $v_address, $v_grade, $v_class, $v_parent_contact_id);
            $this->db->Execute($sql, $params);
        }
        else
        {
            $params = array($v_student_name, $v_student_birth, $v_father_name, $v_mother_name, $v_email, $v_phone, $v_address, $v_grade, $v_class, 4);
            $sql    = "INSERT INTO t_user (C_NAME,C_STUDENT_BIRTH,C_FATHER_NAME,C_MOTHER_NAME,C_EMAIL,C_PHONE,C_ADDRESS,FK_GRADE,FK_CLASS,FK_GROUP) VALUES(?,?,?,?,?,?,?,?,?,?)";
            $this->db->Execute($sql, $params);
        }

        return ($this->db->ErrorNo() == 0) ? TRUE : FALSE;
    }

    public function qry_single_parent_contact($v_id)
    {
        $sql    = "SELECT * FROM t_user WHERE PK_USER = ?";
        $result = $this->db->GetRow($sql, array($v_id));
        return $result;
    }
    
    public function delete_parent_contact(){
        $v_delete_list = get_post_var('hdn_item_id_list',0);
        $sql = "DELETE FROM `t_user` WHERE PK_USER IN ($v_delete_list)";
        //        $sql = "DELETE FROM `t_user` WHERE PK_USER IN ($v_delete_list)";
        $this->db->Execute($sql);
        return ($this->db->ErrorNo() == 0) ? TRUE : FALSE;
    }
}
