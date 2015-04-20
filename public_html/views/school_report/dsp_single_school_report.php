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
            <!--<div class="row">-->
                <!--<div class="form-group">-->
                    <!--<label class="control-label col-md-2">Học sinh</label>-->
                    <!--<div class="col-md-5">-->
                        <!--<select  class=" form-control"  id= "sel_class_student" style="width: 350px;" name="sel_class_student">-->
<?php // if(sizeof($arr_all_student) > 0): ?>
                                <!--<option value="0"><?php // echo " ---- Mời chọn học sinh ---- " ;?></option>-->
                                <?php // foreach ($arr_all_student as $student) : ?>
                                    <!--<option  value="<?php // echo $student['PK_USER']; ?>"><?php // echo $student["C_NAME"]; ?> </option>-->
                                <?php // endforeach; ?>         
                            <?php // endif; ?>
                        <!--</select>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
            <div class="row" style="margin: 10px;">
            <div class="col-md-4 col-md-offset-2">
                <input type="file" class="form-control" name="uploader" id="uploader">
            </div>
            <div class="col-md-2 col-md-offset-1">
                 <button class="btn btn-primary btn-block" onclick="dsp_add_list_school_record();" > Nhập học bạ </button>
            </div>
            <!--        <div class="row" style="margin-top:10px;margin-bottom:10px;">
                        <button type="button" name="insert" class="btn btn-primary" onclick="do_insert_list_school_record();" >
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cập nhật </button>
                    </div>-->

        </div>
            </div>
    </form> 
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


    function dsp_add_list_school_record() {
        var f = document.frmMain;
        m = $('#controller').val() + f.hdn_dsp_add_list_school_record.value;
        console.log(m);
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
