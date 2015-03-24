<?php // $this->render('user/index'); ?>
<?php // echo $this->get_controller_url();?>
<div class="container-fluid" >
    <div class="row-fluid">
        <h1 class="page-header">Thông báo</h1>
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
                            <div class="col-md-7">    
                                    <label class='col-md-5  col-md-offset-1'>Tìm kiếm theo Nội dung thông báo</label>
                               
<!--                                 <select class="form-control" id="sel_grade" name="sel_grade" onchange="load_class(this.value)">
                                    <option value="0">--- Chọn khối --- </option>
                                    <?php // foreach($arr_grade as $grade):?>
                                    <?php // $selected = ($v_grade_id ==$grade['PK_GRADE']) ? 'selected' : ''?>
                                      <option value="<?php // echo $grade['PK_GRADE'];?>" <?php // echo $selected;?>><?php // echo $grade['C_GRADE_NAME'];?></option>
                                    <?php // endforeach;?>/
                                </select>-->
                               <div class="col-md-6" >
<!--                                   <select class="form-control" id="sel_class" name="sel_class" onchange="load_grade(this.value)">
                                    <option value="0">--- Chọn lớp ---</option>
                                    <?php // foreach($arr_class as $class):?>
                                    <?php // $selected = ($v_class_id == $class['PK_CLASS'])? 'selected' : '';?>
                                    <option value="<?php // echo $class['PK_CLASS'];?>" <?php // echo $selected;?>><?php // echo $class['C_CLASS_NAME'];?></option>
                                    <?php // endforeach;?>
                              </select>-->
                                   <input type='text' class='form-control' autofocus='autofocus' placeholder="Nhập từ khóa tìm kiếm : ví dụ : môn toán" name='txt_content_announce' id='txt_content_announce' />
<!--                                      <button type="button" class="btn btn-primary " onclick="btn_filter_onclick();" name="btn_filter">
                                    <i class="glyphicon glyphicon-search"></i>  &nbsp  Lọc
                                 </button>-->
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
                              <div class="   col-md-4">
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
                              <div class="col-md-4">
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
                    </div>
                    <div class="box box-bordered box-small">
                           <div class="box-content nopadding" >
                                <table class="table table-hover table-nomargin table-condensed ">
                                    <thead><tr class="info">
                                            <th style="width: 5%;text-align:center">
                                                <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk" onclick="toggle_check_all(this, this.form.chk);">                                               
                                            </th>
                                            <th style="width: 18%;text-align:center">Họ tên học sinh</th>
                                            <th style="width: 10%;text-align:center">Ngày sinh </th>
                                            <th style="width: 17%;text-align:center">Họ tên bố</th>
                                            <th style="width: 17%;text-align:center">Họ tên mẹ</th>
                                            <th style="width: 10%;text-align:center">Email</th>
                                            <th style="width: 11%;text-align:center" >SĐT</th>
                                            <th style="width: 5%;text-align:center">Lớp</th>
                                            <th style="width: 7%;text-align:center">Thao tác</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                    <?php foreach ($arr_all_parent_contact as $parent_contact):?>
                                    <tr>
                                        <td style="text-align:center">
                                            <!--<input type="checkbox" name="chk[]" />-->
                                            <input type="checkbox" name="chk" value="<?php echo $parent_contact['PK_USER']; ?>" onclick="if (!this.checked) this.form.chk_check_all.checked=false;">
                                        </td>
                                        <td style="text-align:center"><a href="javascript::(0)" onclick="row_click(<?php echo $parent_contact['PK_USER']; ?>);">  <?php echo $parent_contact['C_NAME']; ?></a>
                                         
                                        </td>
                                        <td style="text-align:center">
                                          <a href="javascript::(0)" onclick="row_click(<?php echo $parent_contact['PK_USER']; ?>);">  <?php echo $parent_contact['C_STUDENT_BIRTH']; ?></a>

                                        </td>
                                        <td style="text-align:center">
                                          <a href="javascript::(0)" onclick="row_click(<?php echo $parent_contact['PK_USER']; ?>);">  <?php echo $parent_contact['C_FATHER_NAME']; ?></a>

                                        </td>
                                        <td style="text-align:center">
                                            <a href="javascript::(0)" onclick="row_click(<?php echo $parent_contact['PK_USER']; ?>);">  <?php echo $parent_contact['C_MOTHER_NAME']; ?></a>

                                        </td>
                                        <td style="text-align:center">
                                            <a href="javascript::(0)" onclick="row_click(<?php echo $parent_contact['PK_USER']; ?>);">  <?php echo $parent_contact['C_EMAIL']; ?></a>

                                        </td>
                                        <td style="text-align:center">
                                           <a href="javascript::(0)" onclick="row_click(<?php echo $parent_contact['PK_USER']; ?>);">  <?php echo $parent_contact['C_PHONE']; ?></a>

                                        </td >
                                        <td style="text-align:center">
                                           <a href="javascript::(0)" onclick="row_click(<?php echo $parent_contact['PK_USER']; ?>);">  <?php echo $parent_contact['C_CLASS_NAME']; ?></a>

                                        </td>
                                         <td style="text-align:center">
                                           <a href="javascript::(0)" onclick="row_click(<?php echo $parent_contact['PK_USER']; ?>);">  Sửa</a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                      <?php echo $this->render_rows(count($arr_all_parent_contact),9);?>
                                    </tbody>
                                       
                                </table>
                               <div id="paging" class="nowrap">
                                   <?php echo $this->paging2($arr_all_parent_contact); ?>
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