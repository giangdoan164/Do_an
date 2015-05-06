<?php 
if (!empty($this->ckeditor_js)) {
    $js_files = "<script type='text/javascript' src='" . LIBS_URL . $this->ckeditor_js ."'></script>";
    echo $js_files;
}
?>
<div class ="container">
    <div class="row">
        <h3 class="page-header" style="text-align:center">Tạo mới chủ đề</h3>
        <form action="" method="post" name="frmMain" id="frmMain">
            <?php 
                    if(isset($cate_id)){echo $this->hidden('category_id',$cate_id);}
                        echo $this->hidden('controller',$this->get_controller_url());
                        echo $this->hidden('hdn_dsp_forum_index','dsp_forum_index');
                        echo $this->hidden('hdn_dsp_all_topic','dsp_all_topic');
                        echo $this->hidden('hdn_dsp_single_topic','dsp_single_topic');
                        echo $this->hidden('hdn_create_new_topic','do_create_new_topic');
                        echo $this->hidden('cate_id',$cate_id);
            ?>
            <div class="row">
                <!--<a href="<?php // echo $this->get_controller_url()."dsp_forum_index" ?>"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;&nbsp;Diễn đàn</a>-->
            </div>
            <div class="row" style="margin-top:10px;margin-bottom:10px;">
                <div class="form-group">
                    <label class="control-label col-md-2  col-md-offset-1" for="sel_grade" >Tiêu đề </label>
                    <div class="col-md-5 col-md-offset-2">
                        <input class="form-control" type="text" placeholder="Nhập tiêu đề" id="txt_title" name="txt_title" >
                    </div>
                </div>
            </div>
            <div class="row">
             <div class="col-md-9 col-md-offset-1">
                <div class="form-group">
                  <label for="txta_content" class="control-label">Nội dung</label>
                  <textarea class="form-control" rows="5" id="txta_content" name="txta_content"></textarea>
                </div>
                   <script type='text/javascript'>
                        CKEDITOR.replace('txta_content');
//                        http://jsfiddle.net/cDzqp/
//                        CKEDITOR.instances.txta_reply_content.setData();
                    </script>
            </div>
            </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-5">
                <button class="btn btn-primary" onclick="do_create_new_topic();"><span class='glyphicon glyphicon-plus'></span>&nbsp;&nbsp; Tạo chủ đề</button>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo $this->get_controller_url().'dsp_all_topic'.DS.$cate_id; ?>" class="btn btn-default"><span class='glyphicon glyphicon-arrow-left'></span>&nbsp;&nbsp;Quay lại</a>
            </div>
        </div>
      </form>  
    </div>
</div>
<script>
    function do_create_new_topic(){
        var title = $('#frmMain #txt_title').val().trim();
        if(title ==''){alert("Mời nhập tiêu đề");return false;}
        var content = CKEDITOR.instances.txta_content.getData();

//        var content = $('#frmMain #txta_content').val().trim();
        if(content ==''){alert("Mời nhập nội dung");return false;}
        var f = document.frmMain;
        m = $("#controller").val() + f.hdn_create_new_topic.value;
        $("#frmMain").attr("action", m);
        f.submit();
    }
    function btn_back_onclick(){
        var f = document.frmMain;
        m = $("#controller").val() + f.hdn_dsp_all_topic.value;
        $("#frmMain").attr("action", m);
        f.submit();
    }
</script>