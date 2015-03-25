<?php // $this->render('user/index'); ?>

<div class="container-fluid" >
    <div class="row-fluid">
        <h1 class="page-header">Quản lý Thông báo</h1>
        <div class="main-wrapper" style="margin-left: 0px;">                    
            <div class="container-fluid block">
                <form name="frmMain" id="frmMain" action="" method="POST" enctype="">
                   <?php 
                        $url = $this->get_controller_url();
                         echo $this->hidden('controller',$url);
                         echo $this->hidden('hdn_parent_contact_id',0);
                         echo $this->hidden('hdn_item_id_list', '');
                         echo $this->hidden('hdn_site_url',SITE_URL);
                         // phuc vu cho viec xoa
                         echo $this->hidden('hdn_delete_record_method', 'delete_parent_contact');
                         // phuc vu cho viec sua
                         echo $this->hidden('hdn_dsp_all_record','dsp_all_parent_contact');
                         echo $this->hidden('hdn_dsp_single_record','dsp_single_parent_contact');
                    ?>
                    <!--<input type="hidden" name="hdn_update_method" id="hdn_update_method" value="update_license_type">
                    <input type="hidden" name="hdn_delete_method" id="hdn_delete_method" value="delete_license_type">
                    <input type="hidden" name="hdn_item_id" id="hdn_item_id" value="">
                    <input type="hidden" name="hdn_item_id_list" id="hdn_item_id_list" value="">-->
                    <div class='row' style='margin-bottom: 15px;'>
                    <div class='row'>
                        <div class="col-md-5">
                            <div class='form-group'>
                                <label for="sel_category"  class="col-md-5 control-label" >Loại thông báo &nbsp;</label>                                 
                                <div class="col-md-7">
                                    <select class='form-control' id='sel_category' name='sel_category' >
                                        <option value='0'>---- Tất cả ----</option>
                                        <option value='1'>Thông báo chung</option>
                                        <option value='2'>Thông báo học tập</option>
                                        <option value='3'>Thông báo kỷ luật</option>
                                    </select>            
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label class='col-md-4 '>Từ khóa nội dung</label>
                                <div class="col-md-8" >
                                    <input type='text' class='form-control' autofocus='autofocus' placeholder="Nhập từ khóa ví dụ : môn toán" name='txt_content_announce' id='txt_content_announce' />

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                             <div class='col-md-6 col-md-offset-1'>
                            <button type="button" class="btn btn-primary " onclick="btn_filter_onclick();" name="btn_filter">
                                <i class="glyphicon glyphicon-search"></i>  &nbsp  Lọc
                            </button>
                        </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <div class='form-group'>
                                <label for="sel_category"  class="col-md-5 control-label" >Tên học sinh &nbsp;</label>                                 
                                <div class="col-md-7">
                                    <select class='form-control' id='sel_category' name='sel_category' >
                                        <option value='0'>---- Tất cả ----</option>
                                        <option value='1'>Thông báo chung</option>
                                        <option value='2'>Thông báo học tập</option>
                                        <option value='3'>Thông báo kỷ luật</option>
                                    </select>            
                                </div>  
                            </div>
                        </div>  
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="sel_grade" class="col-md-4 control-label" >Khối học</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="sel_grade" name="sel_grade" onchange="load_class(this.value)">
                                        <option value="0">--- Chọn khối --- </option>
                                        <?php foreach ($arr_grade as $grade): ?>
                                            <?php $selected = ($v_grade_id == $grade['PK_GRADE']) ? 'selected' : '' ?>
                                            <option value="<?php echo $grade['PK_GRADE']; ?>" <?php echo $selected; ?>><?php echo $grade['C_GRADE_NAME']; ?></option>
                                        <?php endforeach; ?>/
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class='col-md-6 col-md-offset-1'>
                            <button type="button" class="btn btn-primary " onclick="btn_filter_onclick();" name="btn_filter">
                                 &nbsp  &nbsp&nbsp&nbsp  In &nbsp  &nbsp&nbsp
                            </button>
                        </div>
                        </div>
                    </div>
                    

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <div class='form-group'>
                                <label for="sel_category"  class="col-md-5 control-label" >Học kỳ &nbsp;</label>                                 
                                <div class="col-md-7">
                                    <select class='form-control' id='sel_category' name='sel_category' >
                                        <option value='0'>---- Tất cả ----</option>
                                        <option value='1'>Học kỳ I</option>
                                        <option value='2'>Học kỳ II</option>

                                    </select>            
                                </div>  
                            </div>
                        </div>  

                        <div class="col-md-5">
                            <div class='form-group'>
                                <label for="sel_class" class="col-md-4">Lớp học</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="sel_class" name="sel_class" onchange="load_grade(this.value)">
                                        <option value="0">--- Chọn lớp ---</option>
                                        <?php foreach ($arr_class as $class): ?>
                                            <?php $selected = ($v_class_id == $class['PK_CLASS']) ? 'selected' : ''; ?>
                                            <option value="<?php echo $class['PK_CLASS']; ?>" <?php echo $selected; ?>><?php echo $class['C_CLASS_NAME']; ?></option>
                                        <?php endforeach; ?>
                                    </select> 
                                </div>

                            </div>
                        </div>  

                        <div class="col-md-2">
                            <div class='col-md-6 col-md-offset-1'>
                            <button type="button" class="btn btn-primary" onclick="btn_filter_onclick();" name="btn_filter">
                                Tạo mới 
                            </button>
                        </div>
                    </div>
                    </div>
</div>
                    
                    <div class="box box-bordered box-small">
                           <div class="box-content nopadding" >
                                <table class="table table-hover table-nomargin table-condensed table-bordered ">
                                    <thead><tr class="info">
                                            <th style="width: 5%;text-align:center">
                                                <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk" onclick="toggle_check_all(this, this.form.chk);">                                               
                                            </th>
                                            <th style="width: 18%;text-align:center">Họ tên học sinh</th>
                                            <th style="width: 4%;text-align:center">Lớp </th>
                                            <th style="width: 45%;text-align:center">Nội dung thông báo</th>
                                            <th style="width: 10%;text-align:center">Ngày nhập</th>
                                            <th style="width: 18%;text-align:center">Người gửi</th>
                                          
                                        </tr>

                                    </thead>
                                    <tbody>
                                    <?php foreach ($arr_all_announce as $announce):?>
                                    <tr>
                                        <td style="text-align:center">
                                            <!--<!--<input type="checkbox" name="chk[]" />-->
                                            <input type="checkbox" name="chk" value="<?php echo $parent_contact['PK_USER']; ?>" onclick="if (!this.checked) this.form.chk_check_all.checked=false;">
                                        </td>
                                        <td style="text-align:center"> 
                                            <?php echo $announce['C_NAME']; ?>
                                        </td>
                                        <td style="text-align:center">
                                             <?php echo $announce['C_CLASS_NAME']; ?>
                                        </td>
                                        <td style="text-align:center">
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
                                      <?php echo $this->render_rows(count($arr_all_announce),6);?>
                                    </tbody>
                                       
                                </table>
                               <div id="paging" class="nowrap">
                                   <?php echo $this->paging2($arr_all_announce); ?>
                               </div>
                                    
                        </div>
                    </div>
                </form>
                 </div>
            </div>
        </div>

       
    </div>
</div>

<script type="text/javascript">
        function btn_addnew_onclick(){
               var m = $('#frmMain #controller').val() +$('#frmMain #hdn_dsp_single_record').val();
               $('#frmMain').attr('action',m);
               $('#frmMain').submit();
            }
        function row_click(id){
                var m = $('#frmMain #controller').val() + 'dsp_single_parent_contact/'+id;
                $('#hdn_teacher_id').val(id);
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
    
        function load_grade(class_id){
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
        }
</script>