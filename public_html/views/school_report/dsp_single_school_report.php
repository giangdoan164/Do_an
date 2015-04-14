
<div class ="container">
    <div class="row-fluid">
        <h3 class="page-header" style="text-align:center">Quản lý học bạ</h3>
        <form action="" method="post" name="frmMain" id="frmMain" >
            <?php 
                echo $this->hidden('controller',$this->get_controller_url());
                echo $this->hidden('hdn_create_new_record','do_create_new_record');
            ?>
            <div class="row">
                    <div class="form-group">
                       <label class="control-label col-md-2">Học sinh</label>
                      <div class="col-md-5">
                      <select  class=" form-control"  id= "sel_class_student" style="width: 350px;" name="sel_class_student">
                            <?php if(sizeof($arr_all_student)>0): ?>
                                <option value="0"><?php echo " ---- Mời chọn học sinh ---- "?></option>
                                <?php foreach($arr_all_student as $student) :?>
                                    <option  value="<?php echo $student['PK_USER'];?>"><?php echo $student["C_NAME"]; ?> </option>
                                <?php endforeach;?>         
                           <?php endif; ?>
                      </select>
                      </div>
                 </div>
           </div>
            <div class="row" style="margin-top:10px;margin-bottom:10px;">
               <button type="button" name="addnew" class="btn btn-primary" onclick="do_create_new_thread();" accesskey="2">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tạo mới học bạ </button>
            </div>
      </form>  
    </div>
</div>

<script type="text/javascript">
    function do_create_new_thread(){
        var student = $('#frmMain #sel_class_student').val();
        if(parseFloat(student) == 0){alert("Chọn học sinh muốn tạo học bạ");return false;}
            var f = document.frmMain;
            m = $("#controller").val() + f.hdn_create_new_record.value;
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