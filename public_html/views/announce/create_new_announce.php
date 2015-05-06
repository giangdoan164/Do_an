<?php // $this->render('user/index'); ?>
<div class="container" >
    <div class="row-fluid">
        <h2 class="page-header">Nhập thông báo học sinh</h2>
        <div class="main-wrapper" style="margin-left: 0px;">                    
            <div class="container-fluid block">
                <form name="frmMain" id="frmMain" action="" method="POST">
                   <?php 
                         $role = Session::get('level');
                         echo $this->hidden('hdn_role',$role);
                         $url = $this->get_controller_url();
                         echo $this->hidden('controller',$url);
                         echo $this->hidden('hdn_item_id_list', '');
                         echo $this->hidden('hdn_add_new_ann','add_new_announce');
                    ?>
                    <div class="row-fluid" style="padding:20px;margin-bottom: 15px; border:1px solid #AC0713 !important; border-top: #AC0713 4px solid !important; box-shadow: 0 2px 3px rgba(0, 0, 0, .3);">
                        
                
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
                                       <?php if($role==2):?>
                                    <select class="form-control" id="sel_grade" name="sel_grade" onchange="load_class(this.value)">
                                        <option value="0">--- Toàn trường --- </option>
                                        <?php foreach ($arr_grade as $grade): ?>
                                            <?php $selected = ($v_grade_id == $grade['PK_GRADE']) ? 'selected' : '' ?>
                                            <option value="<?php echo $grade['PK_GRADE']; ?>" <?php echo $selected; ?>><?php echo $grade['C_GRADE_NAME']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php else :?>
                                    <select readonly ="readonly" class="form-control" id="sel_grade" name="sel_grade" >
                                    <option value="<?php echo Session::get('grade');?>"><?php echo "Khối ".Session::get('grade');?></option>
                                    </select>
                                    <?php endif?>
                                 </div>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label col-md-2  col-md-offset-3">Lớp</label>
                                <div class="col-md-7">
                                    <?php if($role==2):?>
                                    <select  disabled="true" class="form-control" id="sel_class" name="sel_class" onchange="load_grade_student(this.value)">
                                        <option value="0">--- Chọn lớp ---</option>
                                        <?php foreach ($arr_class as $class): ?>
                                            <?php $selected = ($v_class_id == $class['PK_CLASS']) ? 'selected' : ''; ?>
                                        <option value="<?php echo $class['PK_CLASS']; ?>" <?php echo $selected; ?>><?php echo $class['C_CLASS_NAME']; ?></option>
                                        <?php endforeach; ?>
                                    </select> 
                                    <?php else :?>
                                    <select readonly="readonly" class="form-control" id="sel_class" name="sel_class" >
                                        <option value="<?php echo $user_class['PK_CLASS'];?>"><?php echo $user_class['C_CLASS_NAME'];?></option>
                                    </select>
                                    <?php endif?>
                                    </div>
                            </div>
                        </div>
                    </div>
         
                    <div class="row" style="margin-top: 30px;margin-bottom: 10px;">
                        <div class="col-md-8">
                            <textarea class="form-control"  id="txta_ann"  name ="txta_ann" rows="3" placeholder="Nhập thông báo dùng gửi chung cho phụ huynh" autofocus="autofocus"></textarea>
                        </div>
                        <div class="col-md-4">
                            <div class="row " >
                                <label class="radio-inline"><input onclick="radio_type_ann_onclick(1)" id="radio_public_ann" type="radio" name="radio_ann_scope" value="1" >Thông báo chung</label>
                              
                                <label class="radio-inline"><?php if($role==3):?>
                                     <input onclick="radio_type_ann_onclick(2)" id='radio_private_ann' type='radio' name='radio_ann_scope' value='2'>Thông báo riêng
                                    <?php endif;?>
                                </label>
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
                 </div>
                    <div style='margin-top: 30px;' >
                        
                                <table class="table table-hover table-nomargin table-condensed ">
                                    <thead>
                                        <tr class="info">
                                            <th style="width: 5%;text-align:center">
                                                <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk"  onclick="toggle_check_all(this, this.form.chk);">                                               
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
                                                <input type="checkbox" name="chk" value="<?php echo $student['PK_USER']; ?>" onchange="update_announce_content(<?php echo $student['PK_USER'] ; ?>)" onclick="if (!this.checked) this.form.chk_check_all.checked=false;">                 
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
                                            <input type="text" class="form-control txt_ann" onchange="update_check_box(<?php echo $student['PK_USER'] ; ?>);" id="txt_sle_std_ann_<?php echo $student['PK_USER'] ; ?>" name="txt_sle_std_ann_<?php echo $student['PK_USER'] ; ?>" >
                                       
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
                </form>
                 </div>
            </div>
        </div>

       
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
       $('#frmMain #radio_public_ann').attr('checked',true); 
       $('#frmMain .txt_ann').attr('disabled',true);
       $('#frmMain #txt_ann').attr('disabled',false);

    });
    function update_check_box(id){
        var content = $('#frmMain #txt_sle_std_ann_'+id).val();
        content = $.trim(content);
//        co the dung content.length == 0 de kiem tra
//        console.log(content == '');
        if(content == ''){
            $("input[value ='"+id+"']").prop('checked',false);
        }else{
            $("input[value ='"+id+"']").prop('checked',true);
        }

    }
    function update_announce_content(id){
       if( $("input[value ='"+id+"']").is(':checked')==false){
             $('#frmMain #txt_sle_std_ann_'+id).val('');
       } 
    }
      function btn_send_announce(){
                var f = document.frmMain;
                var role  = f.hdn_role.value;
                //neu la giao vien thi kiem tra the nay
                        //kiem tra loai thong bao da duoc chon
                var ann_type = f.sel_type.value;
                if(ann_type ==0){
                    alert("Chưa chọn loại thông báo");
                    return false;
                }
                    //neu la thong bao chung thi kiem tra noi dung txta rong ko?
                if(f.radio_ann_scope.value==1){
                  var ann_type = f.txta_ann.value;
                    if(ann_type.trim()==''){
                        alert("Chưa nhập nội dung thông báo");
                        return false;
                    }
                }
                m = $("#controller").val() + f.hdn_add_new_ann.value;
                $("#frmMain").attr("action", m);
                if(role ==3){
                        var is_item_checked = set_value_chk(hdn_item_id_list);
                        if(!is_item_checked)
                        {
                            return false;
                        }
               
                        //thang nao la loai thong bao rieng ma chua nhap nôi dung thi phai nhap vao
                        if(f.radio_ann_scope.value==2){
                               var list = f.hdn_item_id_list.value;
                               var list_arr = list.split(",");
                         
                              var err_arr = new Array();

                              for(x in list_arr){
                                  var name_string = "txt_sle_std_ann_" + list_arr[x];
                                   var checked_string  = $('#frmMain #txt_sle_std_ann_'+list_arr[x]).val();
                                  if(checked_string.trim()==''){err_arr.push(x);}
                              }
                              if(err_arr.length >0){
                                  alert("Mời nhập nội dung thông báo đến học sinh đã lựa chọn !");
                                  return false;
                              }
                       }
                          if(confirm('Bạn chắc chắn gửi thông báo đên các đối tượng đã chọn?')) { f.submit(); }
                }else{
                    if(confirm('Bạn có chắc chắn gửi thông báo ?')){f.submit();}
                }
       
             
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
        }
        
        function radio_type_ann_onclick(type)
        {
            if (type == 1){
              $('#frmMain .txt_ann').attr('disabled',true);
              $('#frmMain #txta_ann').attr('disabled',false);
            }
             else{
              $('#frmMain #txta_ann').attr('disabled',true);
              $('#frmMain .txt_ann').attr('disabled',false);
             }
                
        }
        
       
</script>
