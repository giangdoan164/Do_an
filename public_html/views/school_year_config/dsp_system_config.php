<?php 

?>
<div class="container">
    <div class="row">
         <div class="row-fluid">
        <h2 class="page-header"> Cấu hình thời gian năm học</h2>
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
            <div class="col-md-2" >
                  <label class="checkbox-inline">
                    <input type="checkbox"  name="active_record" <?php if($arr_system_info['C_ACTIVE']==1){echo 'checked';}?>>Thêm mới học bạ
                  </label>
            </div>
            <div class="col-md-2 ">
                    <button class="btn btn-primary" onclick="update_current_time();" ><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;&nbsp;Cập nhật</button> 
                </div>
             </div>                
            </div>
      </form>
    </div>
    <div class="row">
        <h2 class="page-header">Reset lại hệ thống </h2>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" class='btn btn-success' style='' onclick="reset_system();" ><span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp; Reset hệ thống</a>&nbsp;&nbsp;&nbsp;
        <span style='color: red;font-weight: bold'>(*) Toàn bộ trao đổi diễn đàn , trao đổi riêng, thông báo sẽ bị xóa</span>
    </div>
</div>
<script type="text/javascript">
    function update_current_time(){
        var f = document.frmMain;
        m = $('#controller').val() +'update_system_config';
        $('#frmMain').attr('action', m);
        f.submit();
    }
    
    function reset_system(){
        if(confirm("Reset hệ thống. Toàn bộ dữ liệu trao đổi diễn đàn, trao đổi riêng, thông báo sẽ bị mất !!!")==true){
               var f = document.frmMain;
                m = $('#controller').val() +'reset_system';
                $('#frmMain').attr('action', m);
                f.submit();
        }
    }
</script>