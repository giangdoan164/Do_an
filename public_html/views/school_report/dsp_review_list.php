<?php
$json_data = '';
$count_arr = sizeof($arr_data);
if ($count_arr > 0) {
   $string_arr = '';
    foreach($arr_data as $data){
     $string_arr  = $string_arr.'_'.implode(',',$data);
}
$string_arr = substr($string_arr,2);
}
 

?>
<div class="container">
    
    <div class="row">
        <div class="row">
            <h2 style="text-align: center;">Danh sách điểm thi toán văn chuẩn bị nhập</h2>
        </div>
          <form action="" method="post" name="frmMain" id="frmMain"  enctype="multipart/form-data">
        <?php
        echo $this->hidden('controller', $this->get_controller_url());
        echo $this->hidden('hdn_do_add_list_school_record', 'do_add_list_school_record_toan_van');
        echo $this->hidden('arr_data',$string_arr );

        ?>
       
            <table class="table table-hover table-nomargin  ">
                  <thead>
                    <tr class="info">
                        <th style="width: 15%;text-align:center"><?php echo $arr_data[4]['A']  ?></th>
                        <th style="width: 15%;text-align:center"><?php echo $arr_data[4]['B']  ?></th>
                        <th style="width: 10%;text-align:center"><?php echo $arr_data[4]['C']  ?></th>
                        <th style="width: 10%;text-align:center"><?php echo $arr_data[4]['D']  ?></th>
                        <th style="width: 25%;text-align:center"><?php echo $arr_data[4]['E']  ?></th>
                        <th style="width: 25%;text-align:center"><?php echo $arr_data[4]['F']  ?></th>
                      
                    </tr>
                </thead>
                <tbody>  
                        <?php if ($count_arr > 0): ?>
                        <?php for ($i = 5; $i <= $count_arr; $i++) : ?>
                            <tr>
                                <td style="width: 15%;text-align:center"><?php echo $arr_data[$i]['A'] ?></td>
                                <td style="width: 15%;text-align:center"><?php echo date("d-m-Y", strtotime($arr_data[$i]['B'])); ?></td>
                                <td style="width: 10%;text-align:center"><?php echo $arr_data[$i]['C'] ?></td>
                                <td style="width: 10%;text-align:center"><?php echo $arr_data[$i]['D'] ?></td>
                                <td style="width: 25%;text-align:center"><?php echo $arr_data[$i]['E'] ?></td>
                                <td style="width: 25%;text-align:center"><?php echo $arr_data[$i]['F'] ?></td>
                            </tr>
                         <?php endfor; ?>
                    <?php else: ?>
                        <tr> 
                            <td style="color:red;text-align: center;font-weight: bold;"><?php echo "File excel không có dữ liệu"; ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
               <div class="col-md-3 col-md-offset-9">
                    <button type="button"  class="btn btn-primary" onclick="do_insert_list_school_record();" >
                        <span class="glyphicon glyphicon-saved"></span> &nbsp;&nbsp;Cập nhật </button>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                       <a  href="<?php echo $this->get_controller_url().'dsp_main_school_record'?>"  class="btn btn-default" >
                        <span class="glyphicon glyphicon-arrow-left" ></span> &nbsp;&nbsp;Quay lại </a>
                 </div>
           </form> 
        </div>
</div>
<script type="text/javascript">
    function do_insert_list_school_record() {
        var f = document.frmMain;
        m = $('#controller').val() + f.hdn_do_add_list_school_record.value;
        $('#frmMain').attr('action', m);
        f.submit();
    }
</script>