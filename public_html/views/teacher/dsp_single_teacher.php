<?php 

  $arr_single_teacher = isset($arr_single_teacher) ? $arr_single_teacher : array();
  if(sizeof($arr_single_teacher)>0){
      $v_teach_id = $arr_single_teacher['PK_USER'];
      $v_teach_name = $arr_single_teacher['C_NAME'];
      $v_phone = $arr_single_teacher['C_PHONE'];
      $v_address = $arr_single_teacher['C_ADDRESS'];
      $v_email = $arr_single_teacher['C_EMAIL'];
      $v_class_id = isset($arr_single_teacher['FK_CLASS']) ? $arr_single_teacher['FK_CLASS'] : 0;
      $v_grade_id = isset($arr_single_teacher['FK_GRADE']) ? $arr_single_teacher['FK_GRADE'] : 0;
      $v_role =$arr_single_teacher['FK_GROUP'];
      $v_teacher_code =  $arr_single_teacher['C_CODE'];
      $v_student_birth = $arr_single_teacher['C_STUDENT_BIRTH'];
   }else{
       //thay cho mac dinh
      $v_teach_id = get_post_var('hdn_teacher_id',0);
      $v_teach_name = get_post_var('txt_teacher_name','');
      $v_phone = get_post_var('txt_teacher_phone','');
      $v_address = get_post_var('txt_area_address','');
      $v_email = get_post_var('txt_teacher_email','');
      $v_role = get_post_var('sel_teacher',3);
      $v_grade = get_post_var('sel_grade',0);
      $v_class = get_post_var('sel_class',0);
      $v_teacher_code ='';
      $v_student_birth = get_post_var('slt_student_birth','');
   }
   
 
?>
<div class="container" >
    <div class="col-md-6 col-md-offset-3">
<form  data-toggle="validator"  role="form" id="frmMain" class="form-horizontal" method="post" action="<?php echo $this->get_controller_url().'update_single_teacher';?>">
  <fieldset>
      <legend><h2>Cập nhật Giáo viên</h2></legend>
    <?php 
  
        $v_teacher_id   = get_post_var('hdn_teacher_id',0);
        echo $this->hidden('controller',$this->get_controller_url());  
        echo $this->hidden('hdn_teacher_id',$v_teacher_id);
        echo $this->hidden('hdn_site_url',SITE_URL);
        echo $this->hidden('hdn_dsp_all_teacher','dsp_all_teacher');
        echo $this->hidden('hdn_dsp_single_teacher','dsp_single_teacher');
    
    ?>
    <div class="form-group">
      <label for="txt_teacher_name" class="col-lg-3 control-label" >Họ tên <span style="color:red;">(*)</span></label>
      <div class="col-lg-9">
          <input type="text" class="form-control" value="<?php echo $v_teach_name; ?>" id="txt_teacher_name" name="txt_teacher_name" placeholder="Họ tên giáo viên" required>
      </div>
    </div>
     <div class="form-group">
      <label for="txt_teacher_code" class="col-lg-3 control-label">Mã giáo viên</label>
      <div class="col-lg-9">
          <?php if (sizeof($arr_single_teacher)>0):?>
          <input type="text" class="form-control" readonly="true" value="<?php echo $v_teacher_code;?>" id="txt_teacher_code" readonly="true"  name="txt_teacher_code" placeholder="Mã giáo viên">
        
          <?php else:?>
          <input type="text" class="form-control" required value="<?php echo $v_teacher_code;?>" id="txt_teacher_code"   name="txt_teacher_code" placeholder="Mã giáo viên">
        
          <?php endif;?>
      </div>
    </div>
      <div class="form-group">
     <label for="slt_student_birth" class="col-lg-3 control-label">Ngày sinh</label>
      <div class="col-lg-9">
          <input type="date" class="form-control" value="<?php echo $v_student_birth;?>" id="slt_student_birth" name="slt_student_birth">      
      </div>
    </div>
    <div class="form-group">
      <label for="txt_teacher_phone" required class="col-lg-3 control-label">Số điện thoại</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" required value="<?php echo $v_phone;?>" id="txt_teacher_phone"   name="txt_teacher_phone" placeholder="Số điện thoại">
       
      </div>
    </div>
    <div class="form-group">
      <label for="txt_area_address" class="col-lg-3 control-label"  for="txt_area_address">Địa chỉ</label>
      <div class="col-lg-9">
          <textarea class="form-control" rows="3"  required id="txt_area_address"  name="txt_area_address" placeholder="Địa chỉ"><?php echo $v_address;?></textarea>

      </div>
    </div>
   <div class="form-group">
      <label for="txt_teacher_email" class="col-lg-3 control-label" >Email</label>
      <div class="col-lg-9">
          <input type="email" class="form-control" required value="<?php echo $v_email;?>" id="txt_teacher_email"  name="txt_teacher_email" placeholder="email">
      </div>
    </div>
    <div class="form-group">
      <label for="sel_role" class="col-lg-3 control-label">Vai trò</label>
      <div class="col-lg-9">
        <select class="form-control" id="sel_role" name="sel_role" required>
          <option value="3" >Giáo viên lớp</option>
          <option value="2" <?php if($v_role=='2'){echo 'selected';} ?> >Giáo viên trường</option>
        </select>
        <br>
      </div>
    </div>
    <div class="form-group">
      <label for="sel_grade" class="col-lg-3 control-label">Khối học</label>
      <div class="col-lg-9">
          <select class="form-control" id="sel_grade" name="sel_grade" onchange="load_class(this.value)">
          <option value="0">--- Chọn khối --- </option>
          <?php foreach($arr_grade as $grade):?>
          <?php $selected = ($v_grade_id ==$grade['PK_GRADE']) ? 'selected' : ''?>
            <option value="<?php echo $grade['PK_GRADE'];?>" <?php echo $selected;?>><?php echo $grade['C_GRADE_NAME'];?></option>
          <?php endforeach;?>
        </select>
        <br>
      </div>
    </div>
    <div class="form-group">
      <label for="sel_class" class="col-lg-3 control-label">Lớp</label>
      <div class="col-lg-9">
        <select class="form-control" id="sel_class" name="sel_class" onchange="load_grade(this.value)">
          <option value="0">--- Chọn lớp ---</option>
          <?php foreach($arr_class as $class):?>
          <?php $selected = ($v_class_id == $class['PK_CLASS'])? 'selected' : '';?>
          <option value="<?php echo $class['PK_CLASS'];?>" <?php echo $selected;?>><?php echo $class['C_CLASS_NAME'];?></option>
          <?php endforeach;?>
        </select>
        <br>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3">
          <button type="submit" class="btn btn-primary col-lg-3 col-lg-offset-2"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;Cập nhật</button>
          <button type="button" class="btn btn-default col-lg-3 col-lg-offset-2" onclick="btn_back_onclick1();" ><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;Quay lại</button>
      </div>
    </div>
  </fieldset>
</form>
 </div> 
    
</div>
<script type="text/javascript">
    function btn_back_onclick1(){
         var m = $('#frmMain #controller').val() +$('#frmMain #hdn_dsp_all_teacher').val();
               $('#frmMain').attr('action',m);
               $('#frmMain').submit();
    }
    function load_class(grade_id){
        var site_url = $('#hdn_site_url').val();
        $.ajax({
                url: site_url+'class_grade/load_class',
                type: 'post',
                async: true,
                cache: false,
                data : 'grade_id='+grade_id,
                dataType: 'json',
                success: function (result) {
                    var xhtml = "<option value='0'>-- Mời chọn lớp --</option>";
                     for(i=0;i<result.length;i++){
                         var option = "<option value ='"+result[i].PK_CLASS +"'>"+result[i].C_CLASS_NAME+"</option>";
                         xhtml += option;
                     }
                       $('#sel_class').html(xhtml);
                }
            });
    }
    
    function load_grade(class_id){
     var site_url = $('#hdn_site_url').val();
     $.ajax({
         url : site_url+'class_grade/load_grade',
         type : 'post',
         async : true,
         cache : false ,
         data : 'class_id='+class_id ,
         dataType : 'html',
         success : function (result) {
             $("#sel_grade option[value='"+result+"']").attr("selected","selected");
         }
     });
    }

</script>





