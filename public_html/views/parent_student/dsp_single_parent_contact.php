<?php 
$role = Session::get('level');
  $arr_single_parent_contact = isset($arr_single_parent_contact) ? $arr_single_parent_contact : array();
  if(sizeof($arr_single_parent_contact)>0){
      $v_single_parent_contact_id = $arr_single_parent_contact['PK_USER'];
      $v_student_name = $arr_single_parent_contact['C_NAME'];
      $v_father_name = $arr_single_parent_contact['C_FATHER_NAME'];
      $v_mother_name = $arr_single_parent_contact['C_MOTHER_NAME'];
      $v_student_birth = $arr_single_parent_contact['C_STUDENT_BIRTH'];
      $v_phone = $arr_single_parent_contact['C_PHONE'];
      $v_address = $arr_single_parent_contact['C_ADDRESS'];
      $v_email = $arr_single_parent_contact['C_EMAIL'];
   
   }else{
       //thay cho mac dinh
      $v_single_parent_contact_id  =  get_post_var('hdn_parent_contact_id',0);
      $v_student_name  = get_post_var('txt_student_name','');
      $v_father_name   = get_post_var('txt_father_name','');
      $v_mother_name =  get_post_var('txt_mother_name','');
      $v_student_birth = get_post_var('slt_student_birth','');
      $v_phone = get_post_var('txt_teacher_phone','');
      $v_address = get_post_var('txt_area_address','');
      $v_email = get_post_var('txt_parent_email','');
    
   }
?>
<div class="container " >
    <div class="col-md-6 col-md-offset-3">
<form  id='frmMain' role="form" class="form-horizontal" method="post" action="<?php echo $this->get_controller_url().'update_single_parent_contact';?>">
  <fieldset>
    <legend>Cập nhật Thông tin liên lạc </legend>
    <?php 
  
  
        echo $this->hidden('controller',$this->get_controller_url());  
        echo $this->hidden('hdn_parent_contact_id',$v_single_parent_contact_id);
        echo $this->hidden('hdn_site_url',SITE_URL);
        echo $this->hidden('hdn_delete_record_method', 'delete_parent_contact');
        echo $this->hidden('hdn_dsp_all_record','dsp_all_parent_contact');
        echo $this->hidden('hdn_dsp_single_record','dsp_single_parent_contact');
    ?>
    
    <div class="form-group">
      <label for="txt_student_name" class="col-lg-3 control-label" >Họ tên học sinh <span style="color:red;">(*)</span></label>
      <div class="col-lg-9">
          <input type="text" class="form-control" value="<?php echo $v_student_name; ?>" id="txt_student_name" name="txt_student_name" placeholder="Họ tên học sinh" required>
      </div>
    </div>
    <?php if(sizeof($arr_single_parent_contact)==0):?>
    <div class="form-group">
      <label for="txt_student_code" class="col-lg-3 control-label" >Mã học sinh <span style="color:red;">(*)</span></label>
      <div class="col-lg-9">
          <input type="text" class="form-control" value="<?php echo $v_student_code; ?>" id="txt_student_code" name="txt_student_code" placeholder="Mã học sinh được cấp" required>
      </div>
    </div>
   <?php endif; ?>
    <div class="form-group">
     <label for="slt_student_birth" class="col-lg-3 control-label">Ngày sinh</label>
      <div class="col-lg-9">
          <input type="date" class="form-control" value="<?php echo $v_student_birth;?>" id="slt_student_birth"   name="slt_student_birth" >      
      </div>
    </div>
   
   <div class="form-group">
      <label for="txt_father_name" class="col-lg-3 control-label" >Họ tên bố</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" value="<?php echo $v_father_name;?>" id="txt_father_name"  name="txt_father_name" placeholder="Họ tên bố" required>
      </div>
    </div>
   <div class="form-group">
      <label for="txt_mother_name" class="col-lg-3 control-label" >Họ tên mẹ</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" value="<?php echo $v_mother_name;?>" id="txt_mother_name"  name="txt_mother_name" placeholder="Họ tên mẹ" required>
      </div>
    </div>
   <div class="form-group">
      <label for="txt_parent_email" class="col-lg-3 control-label" >Email</label>
      <div class="col-lg-9">
          <input type="email" class="form-control" value="<?php echo $v_email;?>" id="txt_parent_email"  name="txt_parent_email" placeholder="Email" required>
      </div>
    </div>
   <div class="form-group">
      <label for="txt_phone" class="col-lg-3 control-label" >Số điện thoại</label>
      <div class="col-lg-9">
          <input type="text"  class="form-control" value="<?php echo $v_phone;?>" id="txt_phone"  name="txt_phone" placeholder="Số điện thoại">
      </div>
    </div>
    
     <div class="form-group">
      <label for="txt_area_address" class="col-lg-3 control-label"  for="txt_area_address">Địa chỉ</label>
      <div class="col-lg-9">
          <textarea class="form-control" rows="3" id="txtarea_address" name="txt_area_address" placeholder="Địa chỉ"><?php echo $v_address;?></textarea>
        <span class="help-block"></span>
      </div>
    </div>
    
<?php if(sizeof($arr_single_parent_contact)==0):?>
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
    <?php endif;?>
    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3">
       <?php if($role == 1): ?>
          <button type="submit" class="btn btn-primary col-lg-3 col-lg-offset-2"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Cập nhật&nbsp;</button>
        <?php endif;?>
        <button type="button" class="btn btn-default col-lg-3 col-lg-offset-2 " onclick="btn_go_back_onclick();"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;&nbsp;Quay lại</button>
      </div>
    </div>
  </fieldset>
</form>
 </div> 
    
</div>
<script type="text/javascript">
//    var script_data = {
//        controller : '<?php // echo SITE_URL;?>class_grade/load_class'
//    }


function btn_go_back_onclick(){
         
                var m = $('#frmMain #controller').val() +$('#frmMain #hdn_dsp_all_record').val();
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
   
//    $(document).ready(function(){
//        $("#sel_role option[value='2']").attr("selected","selected");
//    });
</script>





