<?php // $this->render('user/index'); ?>

<div class="container" >
    <div class="row-fluid">
        <h2 class="page-header">Quản lý Thông báo</h2>
        <div class="main-wrapper" style="margin-left: 0px;">                    
            <div class="container-fluid">
                <form name="frmMain" id="frmMain" action="" method="POST" enctype="">
                   <?php 
                        $url = $this->get_controller_url();
                         echo $this->hidden('controller',$url);
                         echo $this->hidden('hdn_site_url',SITE_URL);
                         echo $this->hidden('hdn_add_new_announce','dsp_add_new_announce');
                         $role = Session::get('level');
                    ?>
                    <div class='row' style='padding:20px;margin-bottom: 15px; border:1px solid #AC0713 !important; border-top: #AC0713 4px solid !important; box-shadow: 0 2px 3px rgba(0, 0, 0, .3);' >
                    <div class='row'>
                          <div class="col-md-5"> 
                            <div class="form-group">
                                <label class='col-md-5 '>Từ khóa nội dung</label>
                                <div class="col-md-7" >
                                    <input type='text' style="border-radius: 0;" value="<?php echo $content_text; ?>" class='form-control' autofocus='autofocus' placeholder="Nhập từ khóa ví dụ : môn toán" name='txt_content_announce' id='txt_content_announce' />

                                </div>
                            </div>
                        </div>
                           <div class="col-md-5">
                            <div class="form-group">
                                <label for="sel_grade" class="col-md-4 control-label" >Khối học</label>
                                <div class="col-md-8">
                                    <?php if($role==2):?>
                                    <select class="form-control" id="sel_grade" name="sel_grade" onchange="load_class(this.value)">
                                        <option value="0">--- Chọn khối --- </option>
                                        <?php foreach ($arr_grade as $grade): ?>
                                            <?php $selected = ($v_grade_id == $grade['PK_GRADE']) ? 'selected' : '' ?>
                                            <option value="<?php echo $grade['PK_GRADE']; ?>" <?php echo $selected; ?>><?php echo $grade['C_GRADE_NAME']; ?></option>
                                        <?php endforeach; ?>/
                                      
                                    </select>
                                    <?php else :?>
                                    <select disabled class="form-control" id="sel_grade" name="sel_grade" >
                                    <option value="<?php echo Session::get('grade');?>"><?php echo "Khối ".Session::get('grade');?></option>
                                    </select>
                                    <?php endif?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                             <div class='col-md-6 col-md-offset-1'>
                            <button type="button" class="btn btn-success " onclick="btn_filter_onclick();" name="btn_filter">
                                <i class="glyphicon glyphicon-search"></i>  &nbsp;&nbsp;Lọc&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;
                            </button>
                        </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                         <div class="col-md-5">
                            <div class='form-group'>
                                <label for="sel_type"  class="col-md-5 control-label" >Loại thông báo &nbsp;</label>                                 
                                <div class="col-md-7">
                                    <select class='form-control' id='sel_type' name='sel_type' >
                                        <option value='0'>---- Tất cả ----</option>
                                        <option value='1' <?php if($announce_type=='1'){echo 'selected';} ?>>Thông báo chung</option>
                                        <option value='2' <?php if($announce_type=='2'){echo 'selected';} ?>>Thông báo học tập</option>
                                        <option value='3' <?php if($announce_type=='3'){echo 'selected';} ?>>Thông báo kỷ luật</option>
                                    </select>            
                                </div>  
                            </div>
                        </div>
                             <div class="col-md-5">
                            <div class='form-group'>
                                <label for="sel_class" class="col-md-4">Lớp học</label>
                                <div class="col-md-8">
                                    <?php if($role==2):?>
                                    <select class="form-control" id="sel_class" name="sel_class" onchange="load_grade_student(this.value)">
                                        <option value="0">--- Chọn lớp ---</option>
                                        <?php foreach ($arr_class as $class): ?>
                                            <?php $selected = ($v_class_id == $class['PK_CLASS']) ? 'selected' : ''; ?>
                                            <option value="<?php echo $class['PK_CLASS']; ?>" <?php echo $selected; ?>><?php echo $class['C_CLASS_NAME']; ?></option>
                                        <?php endforeach; ?>
                                    </select> 
                                    <?php else :?>
                                    <select disabled class="form-control" id="sel_class" name="sel_class" >
                                        <option value="<?php echo $user_class['PK_CLASS'];?>"><?php echo $user_class['C_CLASS_NAME'];?></option>
                                    </select>
                                    <?php endif?>
                                </div>

                            </div>
                        </div>  
                        <div class="col-md-2">
                              <div class='col-md-6 col-md-offset-1'>
                            <button type="button" class="btn btn-inverse " onclick="btn_reset_onclick();" name="btn_filter">
                                <i class="glyphicon glyphicon-refresh"></i>  &nbsp;&nbsp; Reset&nbsp;
                            </button>
                        </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <div class='form-group'>
                                <label for="sel_time"  class="col-md-5 control-label">Thời gian gửi&nbsp;</label>                                 
                                <div class="col-md-7">
                                     <select class="form-control " id="sel_time" name="sel_time">
                                        <option value="1" selected="">---Từ lúc bắt đầu---</option>
                                        <option value="2" <?php if($created_time=='2'){echo 'selected';} ?> >1 ngày trước</option>
                                        <option value="3" <?php if($created_time=='3'){echo 'selected';} ?> >3 ngày trước</option>
                                        <option value="4" <?php if($created_time=='4'){echo 'selected';} ?> >1 tuần trước</option>
                                        <option value="5" <?php if($created_time=='5'){echo 'selected';} ?> >2 tuần trước</option>
                                        <option value="6" <?php if($created_time=='6'){echo 'selected';} ?> >1 tháng trước</option>
                                        <option value="7" <?php if($created_time=='7'){echo 'selected';} ?> >2 tháng trước</option>
                                        <option value="8" <?php if($created_time=='8'){echo 'selected';} ?> >3 tháng trước</option>
                                    </select>
                 
                                </div>  
                            </div>
                        </div>  
                         <div class="col-md-5">
                            <div class='form-group'>
                                <label for="sel_student_name"  class="col-md-4 control-label" >Tên học sinh &nbsp;</label>                                 
                                <div class="col-md-8">
                                    <?php if($role==3 || $role ==2) :?>
                                    <select class='form-control' id='sel_student_name' name='sel_student_name' >
                                        <option value='0'>---- Chọn học sinh ----</option>
                                        <?php foreach($arr_student as $student) :?>
                                        <option value="<?php echo $student['PK_USER'];?>" <?php if($sel_student_code ==$student['PK_USER']){echo 'selected';} ?>><?php echo $student['C_NAME'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php else :?>
                                    <select disabled class="form-control" id="sel_student_name" name="sel_student_name" >
                                        <option value="<?php echo Session::get('user_id');?>"><?php echo Session::get('user_name');?></option>
                                    </select>
                                    <?php endif;?>
                                </div>  
                            </div>
                        </div>  
                       
                    <?php if($role !=4): ?>
                        <div class="col-md-2">
                            <div class='col-md-6 col-md-offset-1'>
                            <button type="button" class="btn btn-primary" onclick="btn_add_new_onclick();" name="btn_add_new">
                                <span class='glyphicon glyphicon-plus'></span>  Tạo mới 
                            </button>
                        </div>
                    </div>
                        <?php endif;?>
                    </div>
                </div>  
                    <div style='margin-top: 30px;' >
                                <table class="table table-hover table-nomargin table-condensed table-bordered ">
                                    <thead>
                                        <tr class="info">
                                            <th style="width: 18%;text-align:center">Họ tên học sinh</th>
                                            <th style="width: 5%;text-align: center">Lớp</th>
                                            <th style="width: 50%;text-align:center">Nội dung</th>
                                            <th style="width: 10%;text-align:center">Ngày gửi</th>
                                            <th style="width: 27%;text-align:center">Người gửi</th>     
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($arr_all_announce as $announce):?>
                                    <tr> 
                                        <td style="text-align:center"> 
                                            <?php echo $announce['C_NAME']; ?>
                                        </td>
                                        <td style="text-align:center">
                                             <?php echo $announce['C_CLASS_NAME']; ?>
                                        </td>
                                        <td style="">
                                          <?php echo $announce['C_CONTENT']; ?>
                                        </td>
                                        <td style="text-align:center">
                                           <?php echo  date('d-m-Y', strtotime($announce['C_DATE'])); ?>

                                        </td>
                                        <td style="text-align:center">
                                           <?php echo $announce['C_TEACHER_NAME']; ?>
                                        </td>
                                      
                                    </tr>
                                <?php endforeach; ?>
                                      <?php echo $this->render_rows(count($arr_all_announce),5);?>
                                    </tbody>
                                       
                                </table>
                               <div id="paging" class="nowrap">
                                   <?php echo $this->paging2($arr_all_announce); ?>
                               </div>
                    </div>
                </form>
                 </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
        function btn_filter_onclick(){
               $('#frmMain').submit();
        }
   
        function btn_add_new_onclick(){
                var m = $('#frmMain #controller').val() +$('#frmMain #hdn_add_new_announce').val();
               $('#frmMain').attr('action',m);
               $('#frmMain').submit();
        }
        function load_class(grade_id){
          
            var site_url = $('#hdn_site_url').val();
            $.ajax({
                    url: site_url+'class_grade/load_class',
                    type: 'post',
                    async: true,
                    cache: false,
                    data : 'grade_id='+grade_id,
                    dataType: 'json',
                    success: function (result) {
                        var xhtml = "<option value='0'>-- Mời chọn lớp --</option>";
                         for(i=0;i<result.length;i++){
                             var option = "<option value ='"+result[i].PK_CLASS +"'>"+result[i].C_CLASS_NAME+"</option>";
                             xhtml += option;
                         }
                           $('#sel_class').html(xhtml);
                    }
                });
         }
         
        function btn_reset_onclick(){
            $('#frmMain #txt_content_announce').val('');
            $('#frmMain #sel_type').val('0');
            $('#frmMain #sel_time').val('1');
            $('#frmMain #sel_student_name').val('0');
            
        }
        
        function load_grade_student(class_id){
         var site_url = $('#hdn_site_url').val();
         $.ajax({
             url : site_url+'class_grade/load_grade',
             type : 'post',
             async : true,
             cache : false ,
             data : 'class_id='+class_id ,
             dataType : 'html',
             success : function (result) {
                 $("#sel_grade option[value='"+result+"']").attr("selected","selected");
             }
         });
         $.ajax({
             url : site_url+'class_grade/load_student',
             type : 'post',
             async : true,
             cache : false ,
             data : 'class_id='+class_id,
             dataType : 'json',
             success : function (result){
                 console.log(result);
                 var xhtml ="<option value ='0'>-- Mời chọn học sinh -- </option> ";
                 for(i=0;i<result.length;i++){
                     
                     var option = "<option value ='"+result[i].PK_USER+"'>"+result[i].C_NAME+"</option>";
                     xhtml +=option;
                 }
                $('#sel_student_name').html(xhtml); 
             }
         })
        }
</script>