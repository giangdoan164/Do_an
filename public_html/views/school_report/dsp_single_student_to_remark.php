<?php
echo __FILE__;
 echo "<pre>";
 print_r($arr_subject_grade);
 echo "</pre>";
 echo __LINE__;
?>

<div class="container">
    <div class="row-fluid">
      
        <form  name="frmMain" id="frmMain" action="" method="POST">
            <?php
                $url  = $this->get_controller_url();
                echo $this->hidden('controller', $url);
                echo $this->hidden('hdn_site_url', SITE_URL);
                echo $this->hidden('student_code',$student_code)
            ?>
            <div class="row" style="margin: 15px 10px;">
                <h3>Danh sách học sinh nhận xét</h3>
            </div>
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
                                </td>
                                <td >
                                    <?php echo $student['FK_GRADE']; ?>
                                </td>
                                <td >            
    <input type="text" class="form-control txt_ann" id="txt_sle_std_ann_<?php echo $student_code ; ?>" name="txt_sle_std_ann_<?php echo $student_code ; ?>" >
                            
                                </td>
                            </tr>
                        <?php endforeach; ?>
                  
                    </tbody>
                </table>
             </div>
            </div>
            <div class="row" style="margin: 10px;">
                <div class="col-md-1 col-md-offset-9">
                    <a  class=" btn btn-primary" onclick="do_update_onclick();"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;&nbsp;Nhập nhận xét</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function dsp_single_student_remak(){
        var f = document.frmMain;
        m = $('#controller').val()+'dsp_single_student_to_remark';
        $('#frmMain').attr('action', m);
        f.submit();
    }
</script>