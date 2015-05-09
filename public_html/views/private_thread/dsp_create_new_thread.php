<?php
if (!empty($this->ckeditor_js)) {
    $js_files = "<script type='text/javascript' src='" . LIBS_URL . $this->ckeditor_js[0] . "'></script>";
    echo $js_files;
}
$level = Session::get('level');
?>
<div class ="container">
    <div class="row-fluid">
        <h3 class="page-header" style="text-align:center">Tạo mới chủ đề trao đổi</h3>
        <form action="" method="post" name="frmMain" id="frmMain" >
            <?php
            echo $this->hidden('controller', $this->get_controller_url());
            echo $this->hidden('hdn_create_new_thread', 'do_create_new_thread');
            ?>
            <div class="row">
                <?php if ($level == 3): ?>
                    <div class="form-group row-fluid">
                        <label class="control-label col-md-2">Chọn học sinh</label>
                        <div class="col-md-5">
                            <select  class=" form-control"  id= "sel_class_student" style="width: 350px;" name="sel_class_student">
                                <option value="0">--Chọn PHHS ---</option>
                                <?php if (sizeof($arr_all_contact) > 0): ?>
                                    <?php foreach ($arr_all_contact as $contact) : ?>
                                        <option value="<?php echo $contact['PK_USER']; ?>"><?php echo $contact["C_NAME"]; ?> </option>
                                    <?php endforeach; ?>         
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="form-group row-fluid">
                        <label class="control-label col-md-2">Giáo viên chủ nhiệm</label>
                        <div class="col-md-5">
                            <select  class=" form-control"  id= "sel_class_student" style="width: 350px;" name="sel_class_student" readonly>
                                <?php if (sizeof($arr_all_contact) > 0): ?>
                                    <?php foreach ($arr_all_contact as $contact) : ?>
                                        <option  value="<?php echo $contact['PK_USER']; ?>"><?php echo $contact["C_NAME"]; ?> </option>
                                    <?php endforeach; ?>         
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            <div class="row" style="margin-top:10px;margin-bottom:10px;">

                <div class="form-group">
                    <label class="control-label col-md-2  " for="sel_grade" >Tiêu đề </label>
                    <div class="col-md-4 ">
                        <input class="form-control" type="text" placeholder="Nhập tiêu đề"  id="txt_title" name="txt_title" >
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="form-group">
                    <label for="txta_reply_content" class="control-label col-md-1">Nội dung</label>
                    <div class="col-md-9 col-md-offset-1">
                        <textarea class="form-control" rows="3" id="txta_reply_content"  name="txta_reply_content" placeholder="Nhập nội dung trao đổi" ></textarea>
                    </div>

                </div>

                <script type='text/javascript'>

                    CKEDITOR.replace('txta_reply_content');
    //                        http://jsfiddle.net/cDzqp/
    //                        CKEDITOR.instances.txta_reply_content.setData();
                </script>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6 col-md-offset-5">
                    <button  type="submit" class="btn btn-primary" onclick="do_create_new_thread();"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tạo chủ đề</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a  class="btn btn-default" href="<?php echo $this->get_controller_url(); ?>"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp; Quay lại</a>
                </div>
            </div>
        </form>  
    </div>
</div>

<script type="text/javascript">
    function do_create_new_thread() {
        var student = $('#frmMain #sel_class_student').val();
        var title = $('#frmMain #txt_title').val();

        var data = CKEDITOR.instances.txta_reply_content.getData();
        if (data.trim() == '') {
            alert("Nhập nội dung trao đổi");
            return false;
        }
        else {
            if (parseFloat(student) == 0) {
                alert(" Chọn phụ huynh học sinh muốn trao đổi");
                return false;
            }else if (title.trim() == '') {
                alert("Nhập tiêu đề");
                return false;
            }else{
                var f = document.frmMain;
            m = $("#controller").val() + f.hdn_create_new_thread.value;
            $("#frmMain").attr("action", m);
            f.submit(); 
            }      
        }
    }

    function btn_back_onclick() {
        var f = document.frmMain;
        m = $("#controller").val() + f.hdn_dsp_all_topic.value;
        $("#frmMain").attr("action", m);
        f.submit();
    }



</script>