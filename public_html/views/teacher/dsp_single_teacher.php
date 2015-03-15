
<div class="container-fluid">
    <div class="col-md-6 col-md-offset-3">
<form  data-toggle="validator"  role="form" class="form-horizontal" method="post" action="<?php echo $this->get_controller_url().DS.'dsp_single_teacher';?>">
  <fieldset>
    <legend>Thêm mới Giáo viên</legend>
    <?php 
        $v_teacher_id   = get_post_var('hdn_teacher_id',0);
        echo $this->hidden('controller',$this->get_controller_url());  
        echo $this->hidden('hdn_teacher_id',$v_teacher_id);
    ?>
    <div class="form-group">
      <label for="txt_teacher_name" class="col-lg-3 control-label" >Họ tên <span style="color:red;">(*)</span></label>
      <div class="col-lg-9">
          <input type="text" class="form-control" id="txt_teacher_name" name="txt_teacher_name" placeholder="Họ tên giáo viên" required="">
      </div>
    </div>
    <div class="form-group">
      <label for="txt_teacher_phone" class="col-lg-3 control-label">Số điện thoại</label>
      <div class="col-lg-9">
        <input type="password" class="form-control" id="txt_teacher_phone"   name="txt_teacher_phone" placeholder="Số điện thoại">
       
      </div>
    </div>
    <div class="form-group">
      <label for="txt_area_address" class="col-lg-3 control-label" for="txt_area_address">Địa chỉ</label>
      <div class="col-lg-9">
          <textarea class="form-control" rows="3" id="txtarea_address" name="txt_area_address" placeholder="Địa chỉ"></textarea>
        <span class="help-block"></span>
      </div>
    </div>
   <div class="form-group">
      <label for="txt_teacher_email" class="col-lg-3 control-label">Email</label>
      <div class="col-lg-9">
        <input type="password" class="form-control" id="txt_teacher_email"  name="txt_teacher_email" placeholder="email">
      </div>
    </div>
    <div class="form-group">
      <label for="sel_teacher" class="col-lg-3 control-label">Vai trò</label>
      <div class="col-lg-9">
        <select class="form-control" id="sel_teacher" name="sel_teacher_role">
          <option value="3">Giáo viên lớp</option>
          <option value="2">Giáo viên trường</option>
        </select>
        <br>
      </div>
    </div>
    <div class="form-group">
      <label for="sel_grade" class="col-lg-3 control-label">Khối học</label>
      <div class="col-lg-9">
        <select class="form-control" id="sel_grade" name="sel_grade">
          <option value="1"> Khối 1</option>
          <option value="2"> Khối 2</option>
          <option value="3"> Khối 3</option>
          <option value="4"> Khối 4</option>
          <option value="5"> Khối 5</option>
        </select>
        <br>
      </div>
    </div>
    <div class="form-group">
      <label for="sel_" class="col-lg-3 control-label">Lớp</label>
      <div class="col-lg-9">
        <select class="form-control" id="sel_grade" name="sel_class">
          <option value="1"> 1B</option>
          <option value="2"> 2B</option>
          <option value="3"> 3B</option>
          <option value="4"> 4B</option>
          <option value="5"> 5B</option>
        </select>
        <br>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3">
        <button type="submit" class="btn btn-primary col-lg-3">Cập nhật</button>
        <button type="reset" class="btn btn-default col-lg-3 col-lg-offset-1">Hủy</button>
        <button type="submit" class="btn btn-primary col-lg-3 col-lg-offset-1 ">Quay lại</button>
      </div>
    </div>
  </fieldset>
</form>
        </div> 
</div>





