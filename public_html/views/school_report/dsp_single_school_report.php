<?php
$json_data = '';
$count_arr = sizeof($arr_data);
if ($count_arr > 0) {
    $json_data = json_encode($arr_data);

}
?>
<div class ="container">

    <form action="" method="post" name="frmMain" id="frmMain"  enctype="multipart/form-data">
        <div class="row-fluid" style="min-height: 400px;;">
            <h3 class="page-header" style="text-align:center">Quản lý học bạ</h3>
        <?php
        echo $this->hidden('controller', $this->get_controller_url());
        echo $this->hidden('hdn_do_add_list_school_record', 'do_add_list_school_record');
        echo $this->hidden('hdn_dsp_add_list_school_record', 'dsp_add_list_school_record1');
        echo $this->hidden('arr_data', $json_data);
        ?>
     
            <div class="row" style="margin: 10px;">
            <div class="col-md-4 col-md-offset-2">
                <input type="file" class="form-control" name="uploader" id="uploader">
            </div>
            <div class="col-md-2 col-md-offset-1">
                 <button class="btn btn-primary btn-block" onclick="dsp_add_list_school_record();" > Nhập học bạ </button>
            </div>
   

        </div>
            </div>
    </form> 
</div>

<script type="text/javascript">


    function dsp_add_list_school_record() {
        var f = document.frmMain;
        m = $('#controller').val() + f.hdn_dsp_add_list_school_record.value;
        console.log(m);
        $('#frmMain').attr('action', m);
        f.submit();
    }



</script>
