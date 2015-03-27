<?php // $this->render('user/index'); ?>
<?php // echo $this->get_controller_url();?>
<div class="container-fluid" >
    <div class="row-fluid">
        <h1 class="page-header">Nhập thông báo học sinh</h1>
        <div class="main-wrapper" style="margin-left: 0px;">                    
            <div class="container-fluid block">
                <form name="frmMain" id="frmMain" action="" method="POST">
                   <?php 
                        $url = $this->get_controller_url();
                         echo $this->hidden('controller',$url);
                         echo $this->hidden('hdn_parent_contact_id',0);
                         echo $this->hidden('hdn_item_id_list', '');
                         echo $this->hidden('hdn_site_url',SITE_URL);
                         // phuc vu cho viec xoa
                     
                         echo $this->hidden('hdn_add_new_add','add_new_announce');
                         // phuc vu cho viec sua
                         echo $this->hidden('hdn_dsp_all_record','dsp_all_parent_contact');
                         echo $this->hidden('hdn_dsp_single_record','dsp_single_parent_contact');
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sel_type" class="control-label col-md-5">Loại thông báo</label>
                                <div class="col-md-7">
                                    <select class='form-control' id='sel_type' name='sel_type' >
                                           <option value='0'>---- Tất cả ----</option>
                                           <option value='1'>Thông báo chung</option>
                                           <option value='2'>Thông báo học tập</option>
                                           <option value='3'>Thông báo kỷ luật</option>
                                     </select>    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label col-md-2  col-md-offset-3 ">Khối</label>
                                <div class="col-md-7">
                                    <select class="form-control" id="sel_grade" name="sel_grade" onchange="load_class(this.value)">
                                       <option value="0">--- Chọn khối --- </option>
                                       <?php foreach($arr_grade as $grade):?>
                                       <?php $selected = ($v_grade_id ==$grade['PK_GRADE']) ? 'selected' : ''?>
                                         <option value="<?php echo $grade['PK_GRADE'];?>" <?php echo $selected;?>><?php echo $grade['C_GRADE_NAME'];?></option>
                                       <?php endforeach;?>
                                   </select>
                                 </div>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label col-md-2  col-md-offset-3">Lớp</label>
                                <div class="col-md-7">
                                  <select class="form-control" id="sel_class" name="sel_class" onchange="load_grade(this.value)">
                                        <option value="0">--- Chọn lớp ---</option>
                                        <?php foreach($arr_class as $class):?>
                                        <?php $selected = ($v_class_id == $class['PK_CLASS'])? 'selected' : '';?>
                                        <option value="<?php echo $class['PK_CLASS'];?>" <?php echo $selected;?>><?php echo $class['C_CLASS_NAME'];?></option>
                                        <?php endforeach;?>
                                  </select>
                                    </div>
                            </div>
                        </div>
                    </div>
                     
                    <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
                        <div class="col-md-8">
                            <textarea class="form-control"  id="txta_ann" rows="3" placeholder="Nhập thông báo dùng gửi chung cho phụ huynh" autofocus="autofocus"></textarea>
                        </div>
                        <div class="col-md-4">
                            <div class="row " >
                                          <label class="radio-inline"><input onclick="abc(1)" type="radio" name="radio_ann_scope" value="1">Thông báo chung</label>
                                          <label class="radio-inline"><input onclick="abc(2)" type="radio" name="radio_ann_scope" value="2">Thông báo riêng</label>
                             </div>
                          
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-6 col-md-offset-3">
                                       <button type="button" class="btn btn-primary " onclick="btn_send_announce();" id="btn_send_ann">
                                             <span class="glyphicon glyphicon-arrow-right"></span>  &nbsp Gửi thông báo
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-bordered box-small">
                           <div class="box-content nopadding">
                                <table class="table table-hover table-nomargin table-condensed ">
                                    <thead>
                                              <tr class="info">
                                            <th style="width: 5%;text-align:center">
                                                <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk" onclick="toggle_check_all(this, this.form.chk);">                                               
                                            </th>
                                            <th style="width: 15%;text-align:center">Họ tên học sinh</th>
                                            <th style="width: 10%;text-align: center">Ngày sinh</th>
                                            <th style="width: 5%;text-align:center">Lớp </th>
                                            <th style="width: 65%;text-align:center">Nội dung thông báo</th>
                                                 
                                        </tr>

                                    </thead>
                                    <tbody>
                                     
                                    <?php foreach ($arr_student as $student):?>
                                    <tr>
                                         <td style="text-align:center">
                                                <input type="checkbox" name="chk" value="<?php echo $student['PK_USER']; ?>" onclick="if (!this.checked) this.form.chk_check_all.checked=false;">                 
                                        </td>
                                      
                                        <td style="text-align:center">
                                                        
                                               <?php echo $student['C_NAME'];?> 
                                        </td>
                                        <td style="text-align:center">
                                            <?php echo $student['C_STUDENT_BIRTH'] ;     ?>

                                        </td>
                                        <td style="text-align:center">
                                            <?php echo $student['C_CLASS_NAME'] ;?>

                                        </td>
                                        <td style="text-align:center">
                                            <input type="text" class="form-control" name="txt_sle_std_ann_<?php echo $student['PK_USER'] ; ?>" >

                                        </td>
                                     
                                         
                                    </tr>
                                <?php endforeach; ?>
                                      <?php echo $this->render_rows(count($arr_student),5);?>
                                    </tbody>
                                       
                                </table>
                               <div id="paging" class="nowrap">
                                   <?php echo $this->paging2($arr_student); ?>
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
        function btn_send_announce(){
            var m = $('#frmMain #controller').val() +$('#frmMain #hdn_add_new_add').val();
               $('#frmMain').attr('action',m);
               $('#frmMain').submit();
        }
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
        
        function abc(type)
        {
            if (type == 1){
                
            }
             else{
                 
             }
                
        }
</script>