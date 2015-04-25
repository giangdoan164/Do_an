<?php

?>

<div class="container">
    <div class="row-fluid">
        <form  name="frmMain" id="frmMain" action="" method="POST">
<?php
$url = $this->get_controller_url();
echo $this->hidden('controller', $url);
echo $this->hidden('hdn_site_url', SITE_URL);

?>
            <div class="row" style="margin: 15px 10px;">
                <h3>Danh sách học sinh nhận xét</h3>
            </div>
            <div class="row">

                <table class="table table-hover  table-condensed ">
                    <thead>
                        <tr class="info">
                            <th style="width: 5%;text-align:center">STT</th>
                            <th style="width: 20%;text-align:center">Học sinh</th>
                            <th style="width: 10%;text-align: center">Năm sinh</th>
                             <th style="width: 20%;text-align:center">Danh hiệu </th>
                            <th style="width: 50%;text-align:center">Nhận xét cuối kỳ </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt=0;?>
                        <?php foreach ($arr_all_student as $student): ?>
                            <tr style="text-align:center"> 
                                <td>
                                    <?php $stt +=1;echo $stt;?>
                                </td>
                                <td>
                            <?php echo $student['C_NAME']; ?>    
                                <input type="hidden" name="student_code[]" value="<?php echo $student['C_STUDENT_CODE']; ?>"/>
                                </td>
                                <td >
                                    <?php echo date('d-m-Y', strtotime($student['C_STUDENT_BIRTH'])); ?>
                                </td>
                                <td> 
                                    <?php echo $student['C_TITLE'];?>
                                </td>
                                <td>
                                    <input type="text" class="form-control txt_ann" id="txt_sle_std_ann_remark<?php echo $student['C_STUDENT_CODE']; ?>" name="txt_sle_std_ann_remark_<?php echo $student['C_STUDENT_CODE']; ?>"  value="<?php echo $student['C_REMARK_FINAL']; ?>" >
                                </td>

<!--                                <td>  
                                   <?php //  for($i = 1;$i<=3 ;$i++):?>
                                               
                                    <?php 
//                                        if(intval($student['C_TITLE'])==$i){
//                                            $checked = " checked ='true'";
//                                        }else{
//                                            $checked = '';
//                                        }
                                    
                                    ?>
                                    <label class="radio-inline"><input type="radio" name="title_student_<?php // echo $student['C_STUDENT_CODE'];?>" value="<?php // echo $i;?>" <?php // echo $checked;?> ><?php // if($i==1){echo "Giỏi";}elseif($i==2){echo "Khá";}else{echo "Trung Bình";}?></label>
                                               
                                        <?php // endfor;?>
          
                                </td>-->
                              
                   
                        <!--<input type="text" class="form-control txt_ann" id="txt_sle_std_ann_title<?php // echo $student['C_STUDENT_CODE']; ?>" name="txt_sle_std_ann_title<?php // echo $student['C_CODE']; ?>"  value="<?php // echo $student['C_REMARK_FINAL']; ?>" >-->
                                
                        </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>

            <div class="row" style="margin: 10px;">
                <div class="col-md-1 col-md-offset-9">
                    <a  class=" btn btn-primary" onclick="do_update_onclick_final();"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;&nbsp;Nhân xét tổng kết </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function do_update_onclick_final() {
//        $('#frmMain #student_code').val(student_code);
        var f = document.frmMain;
        m = $('#controller').val() + 'do_update_single_student_final_remark_title';
        $('#frmMain').attr('action', m);
        f.submit();
    }
</script>