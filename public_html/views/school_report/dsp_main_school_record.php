<?php ?>
<div class ="container">
    <div class="row" style="min-height: 400px;">
        <form action="" method="post" name="frmMain" id="frmMain"  >
            <h3 class="page-header" style="text-align:center">Quản lý học bạ</h3>
            <?php
            echo $this->hidden('controller', $this->get_controller_url());
            echo $this->hidden('hdn_dsp_ds_toan_van_chuan_bi_nhap', 'dsp_ds_toan_van_chuan_bi_nhap');
            ?>
            <div class="row">
                <div class="col-md-4 col-md-offset-8">
                    <a href="<?php echo $this->get_controller_url().'dsp_add_school_report_toan_van';?>"><span class="glyphicon glyphicon-plus"></span> Nhập điểm Toán Văn</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo $this->get_controller_url().'dsp_add_school_report_mon_phu';?>"><span class="glyphicon glyphicon-plus"></span> Nhập điểm môn Phụ</a>
                </div>
            </div>
        </form> 
    </div>

</div>

<script type="text/javascript">
//    function do_create_new_thread() {
//        var student = $('#frmMain #sel_class_student').val();
//        if (parseFloat(student) == 0) {
//            alert("Chọn học sinh muốn tạo học bạ");
//            return false;
//        }
//        var f = document.frmMain;
//        m = $("#controller").val() + f.hdn_create_new_record.value;
//        $("#frmMain").attr("action", m);
//        f.submit();
//    }


    function dsp_ds_chuan_bi_nhap() {
        var f = document.frmMain;
        m = $('#controller').val() + f.hdn_dsp_ds_toan_van_chuan_bi_nhap.value;
        $('#frmMain').attr('action', m);
        f.submit();
    }

//    function do_insert_list_school_record() {
//        var f = document.frmMain;
//        m = $('#controller').val() + f.hdn_do_add_list_school_record.value;
//        $('#frmMain').attr('action', m);
//        f.submit();
//    }

</script>