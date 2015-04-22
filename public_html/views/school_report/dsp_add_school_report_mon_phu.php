<?php 
//echo __FILE__;
// echo "<pre>";
// print_r($arr_subject);
// echo "</pre>";
// echo __LINE__;
?>

<div class="container-fluid">
    <div class="row-fluid">
        <form name="frmMain" id="frmMain" action="" method="POST">
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
                                
                                        <option value="<?php echo $key;?>"><?php echo $subject['C_SUBJECT_NAME'];?></option>
                                         <?php endforeach;?>
                                <?php endif?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="col-md-6 col-md-offset-1">
                        <button type="button" class="btn btn-primary " onclick="btn_filter_onclick();" name="btn_filter">
                            <i class="glyphicon glyphicon-search"></i>  &nbsp;  Lọc
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-hover table-nomargin table-condensed ">
                    <thead>
                        <tr class="info">
                            <th style="width: 5%;text-align:center">
                                <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk"  onclick="toggle_check_all(this, this.form.chk);">                                               
                            </th>
                            <th style="width: 15%;text-align:center">Học sinh</th>
                            <th style="width: 10%;text-align: center">Ngày sinh</th>
                            <th style="width: 15%;text-align:center">Điểm cuối kỳ </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($arr_student as $student): ?>
                            <tr>
                                <td style="text-align:center">
                                    <input type="checkbox" name="chk" value="<?php echo $student['PK_USER']; ?>" onchange="update_announce_content(<?php echo $student['PK_USER']; ?>)" onclick="if (!this.checked)
                                                                this.form.chk_check_all.checked = false;">                 
                                </td>
                                <td style="text-align:center">
                                    <?php echo $student['C_NAME']; ?> 
                                </td>
                                <td style="text-align:center">
                                    <?php echo $student['C_STUDENT_BIRTH']; ?>
                                </td>
                                <td style="text-align:center">
                                    <input type="text" class="form-control txt_ann" onchange="update_check_box(<?php echo $student['PK_USER']; ?>);" id="txt_sle_std_ann_<?php echo $student['PK_USER']; ?>" name="txt_sle_std_ann_<?php echo $student['PK_USER']; ?>" >
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php // echo $this->render_rows(count($arr_student), 5); ?>
                    </tbody>

                </table>
            </div>
        </form>
    </div>
</div>