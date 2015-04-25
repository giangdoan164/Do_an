<?php 

?>
<div class="container">
    <div class="row">
        <h3> Cấu hình thời gian năm học</h3>
        <form action="" method="post" name="frmMain" id="frmMain" >
            <?php
                    $url = $this->get_controller_url();
                    echo $this->hidden('controller', $url);
                    echo $this->hidden('hdn_site_url', SITE_URL);

            ?>  
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sel_semester" class="col-md-4 control-label">Học kỳ &nbsp;</label>                                 
                    <div class="col-md-8">
                        <select class="form-control" id="sel_semester" name="sel_semester">
                            <option value="0">---Chọn học kỳ---</option>
                            <option value="1" <?php if($arr_system_info['C_SEMESTER'] =='1'){echo 'selected';} ?> >Học kỳ I</option>
                            <option value="2" <?php if($arr_system_info['C_SEMESTER'] =='2'){echo 'selected';} ?> >Học kỳ II</option>
                        </select>
                    </div>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sel_year" class="col-md-4 control-label">Niên khóa &nbsp;</label>
                    <div class="col-md-6">
                        <input type="text"  class="form-control" name="sel_year" value="<?php echo $arr_system_info['C_SCHOOL_YEAR']; ?>" >
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-md-offset-1" >
                  <label class="checkbox-inline">
                    <input type="checkbox"  name="active_record" <?php if($arr_system_info['C_ACTIVE']==1){echo 'checked';}?>>Thêm mới học bạ
                  </label>
            </div>
        </div>
            <div class="row" style="margin-top: 25px;">
                <div class="col-md-2 col-md-offset-5">
                    <button class="btn btn-primary" onclick="update_current_time();" >Cập nhật</button> 
                </div>
            </div>
      </form>
    </div>
</div>
<script type="text/javascript">
    function update_current_time(){
        var f = document.frmMain;
        m = $('#controller').val() +'update_system_config';
        $('#frmMain').attr('action', m);
        f.submit();
    }
</script>