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
            ?>
            <div class="row">
                <a href="<?php echo $this->get_controller_url().dsp_all_topic ?>"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;&nbsp;Diễn đàn</a>
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
            </div>
            </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-5">
                <button class="btn btn-primary" onclick="do_create_new_topic();">Tạo chủ đề</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-primary" >Quay lại</button>
            </div>
        </div>
      </form>  
    </div>
</div>
<script>
    function do_create_new_topic(){
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