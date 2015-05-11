<?php

$role = Session::get('level');
$open='';
//giao vien
if (!isset($arr_final_remark_title)) {
    $size_arr_final = 0;
} else {
    $size_arr_final = sizeof($arr_final_remark_title);
}
if (isset($arr_student_record_info)) {
    $size_arr = sizeof($arr_student_record_info);
    $open = 'open';
} else {
    $size_arr = 0;
}
if (!isset($year)) {
    $year = 0;
}
if (!isset($semester)) {
    $semester = 0;
}
if (!isset($student_code)) {
    $student_code = 0;
}
  
if (!isset($arr_all_year_student)) {
   
    $size_arr_all_year_student = 0;
}else{
    $size_arr_all_year_student = sizeof($arr_all_year_student);
}
?>
<!--
 $DATA['student_code'] = $student_code;
                $DATA['semester'] = $semester;
                $DATA['year'] = $year;-->
<!--giao vien co giao dien rieng-->
<?php if($role == 3) :?>
<div class ="container">
    <div class="row">
        <form action="" method="post" name="frmMain" id="frmMain"  >      
<?php
echo $this->hidden('controller', $this->get_controller_url());
echo $this->hidden('hdn_dsp_ds_toan_van_chuan_bi_nhap', 'dsp_ds_toan_van_chuan_bi_nhap');
echo $this->hidden('hdn_update_type', 1);
echo $this->hidden('hdn_site_url', SITE_URL);
echo $this->hidden('semester',$semester);
echo $this->hidden('year',$year);
?>
            
             <h2 class="page-header" >Quản lý học bạ</h2>
             <details  style="width:50%">
                <summary>Nhập học bạ</summary>
                 <div style='min-height: 10px;'></div>
                     <div class="row">
                         <div class="col-md-11 col-md-offset-1">
                             <details>
                                 <summary>Quản lý điểm cuối kỳ</summary>
                                 <div class="row">
                                     <div class="col-md-9 col-md-offset-2">
                                         <a href="<?php echo $this->get_controller_url() . 'dsp_add_school_report_toan_van'; ?>"><span class="glyphicon glyphicon-plus"></span> Nhập điểm Toán Văn</a>
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                         <a href="<?php echo $this->get_controller_url() . 'dsp_update_school_report_mon_phu/1'; ?>"><span class="glyphicon glyphicon-plus"></span> Nhập điểm môn Phụ</a>
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     </div>
                                 </div>
                             </details>
                             <details>
                                 <summary>Quản lý nhận xét</summary>
                                 <div class="row">
                                     <div class="col-md-9 col-md-offset-2">
                                         <a href="<?php echo $this->get_controller_url() . 'dsp_list_student_to_remark'; ?>"><span class="glyphicon glyphicon-plus"></span> Nhận xét các môn học</a>
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                         <a href="<?php echo $this->get_controller_url() . 'dsp_list_student_to_final_remark_title'; ?>"><span class="glyphicon glyphicon-plus"></span> Nhận xét tổng kết cuối kỳ</a>

                                     </div>
                                 </div>
                             </details>
                         </div>
                     </div>
                 </details>
             <div style='min-height: 20px;'></div>
            <details open>
              <summary> Tra cứu học bạ</summary>
                <div class="row" style="margin: 20px;">
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <label for="sel_student_name" class="col-md-4 control-label">Tên học sinh &nbsp;</label>                                 
                                <div class="col-md-8">
                                    <select class="form-control" id="sel_student_code" name="sel_student_code" onchange="load_year_student(this);">
                                        <option value="0">---Chọn học sinh---</option>
                                            <?php if (sizeof($arr_all_student_class) > 0): ?>
                                                <?php foreach ($arr_all_student_class as $student): ?>
                                                <option value="<?php echo $student['C_CODE']; ?>" ><?php echo $student['C_NAME']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sel_student_name" class="col-md-4 control-label">Năm học</label>                                 
                                <div class="col-md-8">
                                    <select class="form-control" id="sel_year" name="sel_year">
                                        <option value="0">-- Năm học --</option>
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sel_semester" class="col-md-4 control-label">Học kỳ</label>                                 
                                <div class="col-md-8">
                                    <select class="form-control" id="sel_semester" name="sel_semester">
                                        <option value="0">--Chọn học kỳ--</option>
                                        <option value="1">Học kỳ I</option>
                                        <option value="2">Học kỳ II</option>
                                    </select>
                                </div>  
                            </div>
                        </div>
                          <div class="col-md-1">
                                 <button type="button" class="btn btn-primary" onclick="btn_search_student_onclick();">
                                    <span class='glyphicon glyphicon-search'></span> &nbsp;&nbsp; Tìm kiếm
                                </button>
                          </div>
                        </div>
                     <div class="row" style="margin-top: 20px;">
                    
                    </div>
            </div>
        </div>
     
 <?php if($size_arr>0):?>
            <div class="row">
                   <table class="table table-hover  table-condensed ">
                    <thead>
                        <tr class="info">
                            <th style="width: 10%;text-align:center">Môn học</th>
                            <th style="width: 10%;text-align: center">Điểm cuối kỳ</th>
                            <th style="width: 80%;text-align:center">Nhận xét môn học</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arr_student_record_info as $student_record): ?>
                            <tr>
                                <td style="text-align:center">
                                    <?php echo $student_record['C_SUBJECT_NAME']; ?> 
                                </td>
                                <td style="text-align:center">
                                    <?php echo $student_record['FK_GRADE']; ?>
                                </td>
                                <td >
                                    <input type="text"  class="form-control" value="<?php echo $student_record['C_TEACHER_REMARK']; ?>"/>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif;?>
          <?php if($size_arr_final >0):?>
    
                <div class="row">
                    <span style="font-size: 18px;font-weight:bold;" class="col-md-3">- Lớp:</span> <span style="font-weight: bold"><?php echo $arr_final_remark_title['C_CLASS']; ?></span>
                </div> 
                <div class="row">
                    <span style="font-size: 18px;font-weight:bold;" class="col-md-3">-&nbsp;Giáo viên chủ nhiệm: </span><span style="font-weight: bold;"><?php echo $arr_final_remark_title['C_TEACHER_NAME']; ?> </span>
                </div>
                <div class="row">
                    <span style="font-size: 18px;font-weight:bold;" class="col-md-3">- Danh hiệu:</span> <span style="color: red;font-weight: bold"><?php echo $arr_final_remark_title['C_TITLE']; ?></span>
                </div> 
                <div class="row">
                    <span style="font-size: 18px;font-weight:bold;" class="col-md-3">-&nbsp;Nhận xét cuối kỳ: </span><span style="font-weight: bold;"><?php echo $arr_final_remark_title['C_REMARK_FINAL']; ?> </span>
                </div>
            <?php endif; ?>
      </details>   
          
          
        </form> 
    </div>
</div>
<?php else:?>




<!--//phu huynh co giao dien rieng-->
<?php $student_name = Session::get('user_name');?>
<div class ="container">
    <div class="row" >
          <h2 class="page-header" >Tra cứu học bạ</h2>
        <form action="" method="post" name="frmMain" id="frmMain"  > 
               <!--sel_year     sel_semester-->
            <?php
                echo $this->hidden('controller', $this->get_controller_url());
                echo $this->hidden('hdn_dsp_ds_toan_van_chuan_bi_nhap', 'dsp_ds_toan_van_chuan_bi_nhap');
                echo $this->hidden('hdn_update_type', 1);
                echo $this->hidden('hdn_site_url', SITE_URL);
            ?>               
        
                    <div class="row-fluid" style="padding-bottom: 10px;">
                        <span style="color: #CE4B27;font-size: 20px;font-weight: bold;"><?php echo $student_name;?></span>
                        </div>
                   
            
                   <div class="col-md-4 col-md-offset-3 row">
                        <div class="form-group">
                            <label for="sel_student_name" class="col-md-4 control-label">Năm học</label>                                 
                            <div class="col-md-8 ">
                                <select class="form-control" id="sel_year" name="sel_year">
                                    <option value="0">-- Năm học --</option>
                                    <?php foreach ($arr_all_year_student as  $year):?> 
                                    <option value="<?php echo $year ;?>"><?php echo $year;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-4 row">
                        <div class="form-group">
                            <label for="sel_semester" class="col-md-3 control-label">Học kỳ &nbsp;</label>                                 
                            <div class="col-md-9" >
                                <select class="form-control" id="sel_semester" name="sel_semester">
                                    <option value="0">--Chọn học kỳ--</option>
                                    <option value="1">Học kỳ I</option>
                                    <option value="2">Học kỳ II</option>

                                </select>
                            </div>  
                        </div>
                    </div>
                        <div class="col-md-1 ">
                            <button type="button" class="btn btn-primary" onclick="btn_search_student_onclick();">
                                <span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp; Tìm kiếm
                            </button>
                        </div>
             
                    
                </div>
            </details>   
            <?php if($size_arr>0):?>
            <div class="row" style="margin-top: 20px;">
                   <table class="table table-hover  table-condensed ">
                    <thead>
                        <tr class="info">
                            <th style="width: 10%;text-align:center">Môn học</th>
                            <th style="width: 10%;text-align: center">Điểm cuối kỳ</th>
                            <th style="width: 80%;text-align:center">Nhận xét môn học</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arr_student_record_info as $student_record): ?>
                            <tr>
                                <td style="text-align:center">
                                    <?php echo $student_record['C_SUBJECT_NAME']; ?> 
                                </td>
                                <td style="text-align:center">
                                    <?php echo $student_record['FK_GRADE']; ?>
                                </td>
                                <td >
                                    <input type="text" class="form-control" value="<?php echo $student_record['C_TEACHER_REMARK']; ?>"/>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif;?>
             <?php if($size_arr_final >0):?>
    
<!--                <div class="row">
                    <span style="font-size: 18px;font-weight:bold;" class="col-md-3">- Danh hiệu:</span> <span style="color: red;font-weight: bold"><?php // echo $arr_final_remark_title['C_TITLE']; ?></span>
                </div> 
                <div class="row">
                    <span style="font-size: 18px;font-weight:bold;" class="col-md-3">-&nbsp;Nhận xét cuối kỳ: </span><span style="font-weight: bold;"><?php // echo $arr_final_remark_title['C_REMARK_FINAL']; ?> </span>
                </div>
                   -->
                <div class="row">
                    <span style="font-size: 18px;font-weight:bold;" class="col-md-3">- Lớp:</span> <span style="font-weight: bold"><?php echo $arr_final_remark_title['C_CLASS']; ?></span>
                </div> 
                <div class="row">
                    <span style="font-size: 18px;font-weight:bold;" class="col-md-3">-&nbsp;Giáo viên chủ nhiệm: </span><span style="font-weight: bold;"><?php echo $arr_final_remark_title['C_TEACHER_NAME']; ?> </span>
                </div>
                <div class="row">
                    <span style="font-size: 18px;font-weight:bold;" class="col-md-3">- Danh hiệu:</span> <span style="color: red;font-weight: bold"><?php echo $arr_final_remark_title['C_TITLE']; ?></span>
                </div> 
                <div class="row">
                    <span style="font-size: 18px;font-weight:bold;" class="col-md-3">-&nbsp;Nhận xét cuối kỳ: </span><span style="font-weight: bold;"><?php echo $arr_final_remark_title['C_REMARK_FINAL']; ?> </span>
                </div>
                    <?php endif; ?>
        </form> 
    </div>
</div>
<?php endif; ?>


<script type="text/javascript">
    function btn_print_onclick(){
        
      var semester =  $('#frmMain #sel_semester').val();
      var year     =  $('#frmMain #sel_year').val();
      if(semester=='0'){alert("Mời chọn khối");return false;}
      if(year=='0'){alert("Mời chọn năm học");return false;}
      if(semester!='0'&&year!='0'){
        
            var f = document.frmMain;
            m = $('#controller').val() +'dsp_print_student_record';
            $('#frmMain').attr('action', m);
            $('#frmMain').submit(); 
      }    
    }
    function load_year_student(object) {
        student_code = $(object).val();
        var site_url = $('#hdn_site_url').val();
        $.ajax({
            url: site_url + 'school_report/qry_all_year_student',
            type: 'post',
            async: true,
            cache: false,
            data: 'student_code=' + student_code,
            dataType: 'json',
            success: function(result) {
                if (result.length > 0) {
                    var xhtml = "<option value='0'>--Chọn năm học--</option>";
                    for (i = 0; i < result.length; i++) {
                        var option = "<option value='" + result[i] + "'>" + result[i] + "</option>";
                        xhtml += option;
                    }
                    $('#frmMain #sel_year').html(xhtml);
                }
            }
        });
    }
    //kiem tra du lieu dau vao
    
    function check_input() {
        var student = $('#frmMain #sel_student_code').val();
        var semester = $('#frmMain #sel_semester').val();
        var year = $('#frmMain #sel_year').val();
        if(student == 0){alert("Mời chọn học sinh !!!");return false;}
        if(semester == 0){alert("Mời chọn học kỳ!!!");return false;};
        if(year == 0){alert("Mời chọn năm học!!!");return false;}
    }
    function btn_search_student_onclick() {
        if(check_input()==false){
                return false;
        }else{
                var f = document.frmMain;
//                m = $('#controller').val() +'qry_student_school_record';
//                $('#frmMain').attr('action', m);
                f.submit();
        }
       
            
    }



</script>