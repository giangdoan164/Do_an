<?php 

?>

<div class="container">
     <div class="row">
            <h2 class='page-header'>Nhập điểm môn phụ</h2>
     </div>
    <div class="row-fluid">
      
        <form  name="frmMain" id="frmMain" action="" method="POST">
            <?php
                $role = Session::get('level');
                echo $this->hidden('hdn_role', $role);
                $url  = $this->get_controller_url();
                echo $this->hidden('controller', $url);
                echo $this->hidden('hdn_item_id_list', '');
                echo $this->hidden('hdn_site_url', SITE_URL);
                echo $this->hidden('update_type',$update_type);
            ?>
            <div class="row" style="margin: 15px 10px;">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="sel_subject" class="col-md-4 control-label">Chọn môn học</label>
                        <div class="col-md-8">
                            <select class="form-control" id="sel_subject" name="sel_subject" onchange="list_grade_subject();">
                                <option value="0">--Mời chọn môn học--</option>
                                <?php if(sizeof($arr_subject) >0):?>
                                <?php foreach ($arr_subject as $key => $subject):?>
                                        <option value="<?php echo $key;?>"><?php echo $subject;?></option>
                                <?php endforeach;?>
                                <?php endif?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style='margin-top: 20px;'>
                <table class="table table-hover  table-condensed ">
                    <thead>
                        <tr class="info">

                            <th style="width: 30%;text-align:center">Học sinh</th>
                            <th style="width: 30%;text-align: center">Ngày sinh</th>
                            <th style="width: 40%;text-align:center">Điểm cuối kỳ </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($arr_student as $student): ?>
                            <tr>

                                <td style="text-align:center">
                                    <?php echo $student['C_NAME']; ?> 
                                </td>
                                <td style="text-align:center">
                                    <?php echo $student['C_STUDENT_BIRTH']; ?>
                                </td>
                                <td >
                                    <div style="width:30%;margin:0px auto;">
                                         <!--<input type="text" class="form-control txt_ann" required id="txt_sle_std_ann_<?php // echo $student['PK_USER']; ?>" name="txt_sle_std_ann_<?php // echo $student['PK_USER']; ?>" >-->
                                        <input type="number" required  class="form-control" min="1" max="10"  onchange="update_check_box('<?php echo $student['C_CODE'] ;?>');" id="txt_sle_std_ann_<?php echo $student['C_CODE']; ?>" name="txt_sle_std_ann_<?php echo $student['C_CODE']; ?>"/>
                                      <!--<input type="text" class="form-control"  id="txt_sle_std_ann_<?php // echo $student['PK_USER']; ?>" name="txt_sle_std_ann_<?php // echo $student['PK_USER']; ?>" pattern="[1-10]{1}" title="Điểm từ trong khoảng 1 -10">-->
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                  
                    </tbody>
                </table>
            </div>
            <div class="row" style="margin: 10px;">
                <div class="col-md-4 col-md-offset-8">
                    <!--<button type="submit" class=" btn btn-primary" onclick="do_update_onclick();"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;&nbsp;Nhập điểm</button>-->
                    <!--<a href="#" class=" btn btn-primary" onclick="do_update_onclick();"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;&nbsp;Nhập điểm</a>-->
                    <a href="#"  class=" btn btn-primary" onclick="do_update_onclick();"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;&nbsp;Nhập điểm</a>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a  href="<?php echo $this->get_controller_url() . 'dsp_main_school_record' ?>"  class="btn btn-default"  >
                        <span class="glyphicon glyphicon-arrow-left" ></span> &nbsp;&nbsp;&nbsp;Quay lại&nbsp;&nbsp; </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function do_update_onclick(){
       var subject = $('#frmMain #sel_subject').val();
       if(subject == 0){   alert("Mời chọn môn học");return false; }
       var m = $('#frmMain #controller').val() +'do_update_school_record_mon_phu'; 
       $('#frmMain').attr('action',m);
//       var is_item_checked = set_value_chk();
//       if(!is_item_checked) { return false;}
       $('#frmMain').submit();
    }
    
       function update_check_box(id){    
        var content = $('#frmMain #txt_sle_std_ann_'+id).val();
        content = $.trim(content);
//        co the dung content.length == 0 de kiem tra
//        console.log(content == '');

        if(content == ''){
            console.log(content);
            $("input[value ='"+id+"']").prop('checked',false);
        }else{
            console.log(content);
            $("input[value ='"+id+"']").prop('checked',true);
        }

    }
    function update_announce_content(id){
       if( $("input[value ='"+id+"']").is(':checked')==false){
             $('#frmMain #txt_sle_std_ann_'+id).val('');
       } 
    }
    function list_grade_subject(){
      
            var type = $('#frmMain #update_type').val();
            subject_id = $('#frmMain #sel_subject').val();
            if(subject_id > 0){
                 var site_url = $('#hdn_site_url').val();
                 $.ajax({
                    url: site_url+'school_report/qry_all_subject_grade_student',
                    type: 'post',
                    async: true,
                    cache: false,
                    data : 'subject_id='+subject_id,
                    dataType: 'json',
                    success: function (result) {
                       if(result.length >0){
                             for(i=0;i<result.length;i++){
                                var code = result[i].C_STUDENT_CODE;
                                $('#frmMain #txt_sle_std_ann_'+code).val(result[i].FK_GRADE);
                             }
                       }else{
                           $("input[name^='txt_sle_std_ann_']").val('');
                       }
                    }
                });
          }      
    }
    
    
      
       
</script>