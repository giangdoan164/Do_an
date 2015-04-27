<?php

?>

<div class="container">
    <div class="row-fluid">

        <form  name="frmMain" id="frmMain" action="" method="POST">
            <?php
            $url = $this->get_controller_url();
            echo $this->hidden('controller', $url);
            echo $this->hidden('hdn_site_url', SITE_URL);
            echo $this->hidden('student_code', $student_code);
            ?>
            <div class="row" style="margin: 15px 10px;">
                <h3>Danh sách học sinh nhận xét</h3>
            </div>
              <?php if (sizeof($arr_subject_grade) > 0) : ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                         
                    <table class="table table-hover  table-condensed ">
                        <thead>
                            <tr class="info">    
                                <th style="width: 25%;text-align:center">Môn học</th>
                                <th style="width: 25%;text-align: center">Điểm cuối kỳ</th>
                                <th style="width: 50%;text-align:center">Nhận xét</th>
                            </tr>
                        </thead>
                        <tbody>
                     
                                <?php foreach ($arr_subject_grade as $student): ?>
                                    <tr style="text-align:center"> 
                                        <td >
                                            <?php echo $student['C_SUBJECT_NAME']; ?> 
                                            <input type="hidden" name="subject[]" value="<?php echo $student['PK_SUBJECT']; ?>"/>
                                        </td>
                                        <td >
                                            <?php echo $student['FK_GRADE']; ?>
                                        </td>
                                        <td >            
                                            <input type="text" class="form-control txt_ann" id="txt_sle_std_ann_<?php echo $student['PK_SUBJECT']; ?>" name="txt_sle_std_ann_<?php echo $student['PK_SUBJECT']; ?>"  value="<?php echo $student['C_TEACHER_REMARK']; ?>" >
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                           
                                
                           
                        </tbody>
                    </table>
                 
                </div>
            </div>
                <?php else : ?>
            <div class="row" style="height: 40px;">
                <div class="col-md-6" style="color:red;">
                   Mời nhập điểm cuối kỳ các môn học để nhận xét
                </div>
                <div class="col-md-6">
                        <a href="<?php echo $this->get_controller_url() . 'dsp_add_school_report_toan_van'; ?>"><span class="glyphicon glyphicon-plus"></span> Nhập điểm Toán Văn</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo $this->get_controller_url() . 'dsp_update_school_report_mon_phu/0'; ?>"><span class="glyphicon glyphicon-plus"></span> Nhập điểm môn Phụ</a>

                </div>
            </div>
                
                         


                        
                           
                     <?php endif; ?>
               <?php if (sizeof($arr_subject_grade) > 0) : ?>
            <div class="row" style="margin: 10px;">
                <div class="col-md-1 col-md-offset-9">
                    <a  class=" btn btn-primary" onclick="do_update_onclick1();"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;&nbsp;Nhập nhận xét</a>
                </div>
            </div>
            <?php endif;?>
        </form>
    </div>
</div>

<script type="text/javascript">
    function do_update_onclick1() {
        var f = document.frmMain;
        m = $('#controller').val() + 'do_insert_all_remark_single_student';
        $('#frmMain').attr('action', m);
        f.submit();
    }
//  
</script>