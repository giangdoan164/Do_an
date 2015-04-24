<?php ?>
<div class ="container">
    <div class="row" style="min-height: 400px;">
        <form action="" method="post" name="frmMain" id="frmMain"  >
            <h3 class="page-header" style="text-align:center">Quản lý học bạ</h3>
            <?php
            echo $this->hidden('controller', $this->get_controller_url());
            echo $this->hidden('hdn_dsp_ds_toan_van_chuan_bi_nhap', 'dsp_ds_toan_van_chuan_bi_nhap');
            echo $this->hidden('hdn_update_type', 0);
            ?>
            <details>
                <summary>Quản lý điểm cuối kỳ</summary>
                <div class="row">
                    <div class="col-md-9 col-md-offset-2">
                        <a href="<?php echo $this->get_controller_url() . 'dsp_add_school_report_toan_van'; ?>"><span class="glyphicon glyphicon-plus"></span> Nhập điểm Toán Văn</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--                        <a href="<?php // echo $this->get_controller_url() . 'dsp_update_school_report_mon_phu/0'; ?>"><span class="glyphicon glyphicon-plus"></span> Nhập điểm môn Phụ</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                        <a href="<?php echo $this->get_controller_url() . 'dsp_update_school_report_mon_phu/1'; ?>"><span class="glyphicon glyphicon-plus"></span> Nhập điểm môn Phụ</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </details>
            <details>
                <summary>Quản lý nhận xét</summary>
                <div class="row">
                    <div class="col-md-9 col-md-offset-2">
                        <a href="<?php echo $this->get_controller_url() . 'dsp_list_student_to_remark'; ?>"><span class="glyphicon glyphicon-plus"></span> Nhận xét cuối kỳ</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo $this->get_controller_url() . 'dsp_list_student_to_final_remark_title'; ?>"><span class="glyphicon glyphicon-plus"></span> Nhận xét cả năm, Danh hiệu</a>

                    </div>
                </div>
            </details>
            <details>
                <summary>Tìm kiếm học bạ học sinh</summary>
                <div class="row" style="margin: 20px;">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sel_student_name" class="col-md-4 control-label">Tên học sinh &nbsp;</label>                                 
                            <div class="col-md-8">
                                <select class="form-control" id="sel_student_name" name="sel_student_name">
                                    <option value="0">---Chọn học sinh---</option>
                                    <option value="224">Nguyễn Thúy Quỳnh</option>
                                    <option value="225">Phạm Văn Mách</option>
                                    <option value="226">Nguyễn Quỳnh Trang</option>
                                    <option value="227">Đậu Văn Hưởng</option>
                                    <option value="228">Trần Đình Quang</option>
                                    <option value="229">Nguyễn Tự Nguyện</option>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sel_student_name" class="col-md-4 control-label">Học kỳ &nbsp;</label>                                 
                            <div class="col-md-8">
                                <select class="form-control" id="sel_student_name" name="sel_student_name">
                                    <option value="0">--Chọn học kỳ--</option>
                                    <option value="224">Học kỳ I</option>
                                    <option value="225">Học kỳ II</option>

                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sel_student_name" class="col-md-4 control-label">Năm học &nbsp;</label>                                 
                            <div class="col-md-8">
                                <select class="form-control" id="sel_student_name" name="sel_student_name">
                                    <option value="0">--Chọn năm học --</option>
                                    <option value="224">2014-2015</option>
                                    <option value="225">2015-2016</option>
                                    <option value="225">2016-2017</option>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 col-md-offset-8">
                            <button type="button" class="btn btn-primary">
                                Tìm kiếm
                            </button>
                        </div>
                    </div>
                </div>
            </details>





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