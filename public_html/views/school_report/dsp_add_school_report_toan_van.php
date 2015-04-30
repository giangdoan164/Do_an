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
            <h3 class="page-header" style="text-align:center">Điểm thi Toán , Văn</h3>
<?php
echo $this->hidden('controller', $this->get_controller_url());
echo $this->hidden('hdn_dsp_ds_toan_van_chuan_bi_nhap', 'dsp_ds_toan_van_chuan_bi_nhap');
echo $this->hidden('arr_data', $json_data);
?>    
            <div class="row" style="margin: 10px;">
                <div class="col-md-4 col-md-offset-2">
                    <input type="file" class="form-control" name="uploader" id="uploader"/>
                </div>
                <div class="col-md-3 ">
                    <button class="btn btn-primary " onclick="dsp_ds_chuan_bi_nhap();" > Nhập học bạ </button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a  href="<?php echo $this->get_controller_url() . 'dsp_main_school_record' ?>"  class="btn btn-primary" onclick="do_insert_list_school_record();" >
                        <span class="glyphicon" ></span>Quay lại </a>
                </div>
            </div>
        </div>
    </form> 
</div>

<script type="text/javascript">


    function dsp_ds_chuan_bi_nhap() {
        var f = document.frmMain;
        m = $('#controller').val() + f.hdn_dsp_ds_toan_van_chuan_bi_nhap.value;
        $('#frmMain').attr('action', m);
        f.submit();
    }



</script>