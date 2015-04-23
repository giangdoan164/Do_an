<?php 

?>

<div class="container">
    <div class="row-fluid">
      
        <form  name="frmMain" id="frmMain" action="" method="POST">
            <?php
                $role = Session::get('level');
                echo $this->hidden('hdn_role', $role);
                $url  = $this->get_controller_url();
                echo $this->hidden('controller', $url);
                echo $this->hidden('hdn_item_id_list', '');
                echo $this->hidden('hdn_site_url', SITE_URL);
            ?>
            <div class="row" style="margin: 15px 10px;">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="sel_subject" class="col-md-4 control-label">Chọn môn học</label>
                        <div class="col-md-8">
                            <select class="form-control" id="sel_subject" name="sel_subject">
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
            <div class="row">
                <table class="table table-hover  table-condensed ">
                    <thead>
                        <tr class="info">
                            <th style="width: 5%;text-align:center">
                                <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk"  onclick="toggle_check_all(this, this.form.chk);">                                               
                            </th>
                            <th style="width: 30%;text-align:center">Học sinh</th>
                            <th style="width: 30%;text-align: center">Ngày sinh</th>
                            <th style="width: 35%;text-align:center">Điểm cuối kỳ </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($arr_student as $student): ?>
                            <tr>
                                <td style="text-align:center">
                                    <input type="checkbox" name="chk" value="<?php echo $student['C_CODE']; ?>" onchange="update_announce_content(<?php echo $student['C_CODE']; ?>)" onclick="if (!this.checked)
                                                                this.form.chk_check_all.checked = false;">                 
                                </td>
                                <td style="text-align:center">
                                    <?php echo $student['C_NAME']; ?> 
                                </td>
                                <td style="text-align:center">
                                    <?php echo $student['C_STUDENT_BIRTH']; ?>
                                </td>
                                <td >
                                    <div style="width:30%;margin:0px auto;">
                                         <!--<input type="text" class="form-control txt_ann" required id="txt_sle_std_ann_<?php // echo $student['PK_USER']; ?>" name="txt_sle_std_ann_<?php // echo $student['PK_USER']; ?>" >-->
                                        <input type="number" required  class="form-control" min="1" max="10" id="txt_sle_std_ann_<?php // echo $student['PK_USER']; ?>" name="txt_sle_std_ann_<?php echo $student['C_CODE']; ?>"/>
                                      <!--<input type="text" class="form-control"  id="txt_sle_std_ann_<?php // echo $student['PK_USER']; ?>" name="txt_sle_std_ann_<?php // echo $student['PK_USER']; ?>" pattern="[1-10]{1}" title="Điểm từ trong khoảng 1 -10">-->
                                    </div>
                                  
                                </td>
                            </tr>
                        <?php endforeach; ?>
                  
                    </tbody>
                </table>
            </div>
            <div class="row" style="margin: 10px;">
                <div class="col-md-1 col-md-offset-9">
                    <!--<button type="submit" class=" btn btn-primary" onclick="do_update_onclick();"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;&nbsp;Nhập điểm</button>-->
                    <!--<a href="#" class=" btn btn-primary" onclick="do_update_onclick();"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;&nbsp;Nhập điểm</a>-->
                    <a  class=" btn btn-primary" onclick="do_update_onclick();"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;&nbsp;Nhập điểm</a>
                    
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function do_update_onclick(){
       var subject = $('#frmMain #sel_subject').val();
       if(subject == 0){   alert("Mời chọn môn học");return false; }
       var m = $('#frmMain #controller').val() +'do_add_school_record_mon_phu'; 
       $('#frmMain').attr('action',m);
       var is_item_checked = set_value_chk();
       if(!is_item_checked) { return false;}
       $('#frmMain').submit();
    }
    
</script>