<?php

?>

<div class="container">
    <div class="row-fluid">
        <form  name="frmMain" id="frmMain" action="" method="POST">
            <?php
           
                $url  = $this->get_controller_url();
                echo $this->hidden('controller', $url);
                echo $this->hidden('hdn_site_url', SITE_URL);
                echo $this->hidden('student_code','');
            ?>
            <div class="row" style="margin: 15px 10px;">
                <h3>Danh sách học sinh nhận xét</h3>
            </div>
            <div class="row">
               
                <table class="table table-hover  table-condensed ">
                    <thead>
                        <tr class="info">
                            <th style="width: 5%;text-align:center">STT</th>
                            <th style="width: 40%;text-align:center">Học sinh</th>
                            <th style="width: 40%;text-align: center">Năm sinh</th>
                            <th style="width: 20%;text-align:center">Nhận xét</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 0;?>
                        <?php foreach ($arr_all_student as $student): ?>
                        <?php $stt = $stt + 1;?>
                            <tr style="text-align:center"> 
                                <td><?php echo $stt;?></td>
                                <td>
                                    <?php echo $student['C_NAME']; ?> 
                                </td>
                                <td >
                                    <?php echo $student['C_STUDENT_BIRTH']; ?>
                                </td>
                                <td >
                                    <a href="#" onclick="dsp_single_student_remak('<?php echo $student['C_CODE'];?>');"><span class="glyphicon glyphicon-pencil" title="Ghi Nhận xét"></span>&nbsp;&nbsp;&nbsp;</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                  
                    </tbody>
                </table>
      
            </div>
            <div class="row" style="margin: 10px;">
                <div class="col-md-1 col-md-offset-11">
                        
                    <a  href="<?php echo $this->get_controller_url() . 'dsp_main_school_record' ?>"  class="btn btn-default"  >
                        <span class="glyphicon glyphicon-arrow-left" ></span> &nbsp;&nbsp;&nbsp;Quay lại&nbsp;&nbsp; </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function dsp_single_student_remak(student_code){
        $('#frmMain #student_code').val(student_code);
        var f = document.frmMain;
        m = $('#controller').val()+'dsp_single_student_to_remark';
        $('#frmMain').attr('action', m);
        f.submit();
    }
</script>