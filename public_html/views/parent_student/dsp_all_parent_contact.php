<?php // $this->render('user/index');   ?>
<?php // echo $this->get_controller_url();  ?>
<?php
$v_grade_id = $grade;
$v_class_id = $class;
?>
<div class="container-fluid" >
    <div class="row-fluid">
        <h1 class="page-header">Quản lý danh sách liên lạc</h1>
        <div class="main-wrapper" style="margin-left: 0px;">   
           
            <div class="container-fluid " style="border:1px solid #AC0713 !important; border-top: #AC0713 4px solid !important; box-shadow: 0 2px 3px rgba(0, 0, 0, .3);  margin-bottom: 25px;">
                <form name="frmMain" id="frmMain" action="" method="POST" enctype="multipart/form-data">
                    <?php
                    $url = $this->get_controller_url();
                    echo $this->hidden('controller', $url);
                    echo $this->hidden('hdn_parent_contact_id', 0);
                    echo $this->hidden('hdn_item_id_list', '');
                    echo $this->hidden('hdn_site_url', SITE_URL);
                    $role = Session::get('level');
                    echo $this->hidden('hdn_add_new_contact_list', 'add_new_contact_list');
                    // phuc vu cho viec xoa
                    echo $this->hidden('hdn_delete_record_method', 'delete_parent_contact');
                    // phuc vu cho viec sua
                    echo $this->hidden('hdn_dsp_all_record', 'dsp_all_parent_contact');
                    echo $this->hidden('hdn_dsp_single_record', 'dsp_single_parent_contact');
                    ?>
                    <details open>
                        <summary><strong>Tìm kiếm</strong></summary>
                        <div class='row' style='margin-bottom:19px;'>
                            <div class="col-md-3 col-md-offset-1">
                                <input type="text" name="txt_filter" id="txt_filter" value="" class="form-control col-md-5" autofocus="autofocus" placeholder="Tên học sinh" onkeypress="txt_filter_onkeypress_is_enter(event);" style="margin-right:10px;">                                   
                            </div>
                            <div class="col-md-3">  
                                <?php if ($role == 1): ?>
                                    <select class="form-control" id="sel_grade" name="sel_grade" onchange="load_class(this.value)">
                                        <option value="0">--- Chọn khối --- </option>
                                        <?php foreach ($arr_grade as $grade): ?>
                                            <?php $selected = ($v_grade_id == $grade['PK_GRADE']) ? 'selected' : '' ?>
                                            <option value="<?php echo $grade['PK_GRADE']; ?>" <?php echo $selected; ?>><?php echo $grade['C_GRADE_NAME']; ?></option>
                                        <?php endforeach; ?>/
                                    </select>
                                <?php endif ?>
                            </div>
                            <div class="col-md-3">
                                <?php if ($role == 1): ?>
                                    <select class="form-control" id="sel_class" name="sel_class" onchange="load_grade(this.value)">
                                        <option value="0">--- Chọn lớp ---</option>
                                        <?php foreach ($arr_class as $class): ?>
                                            <?php $selected = ($v_class_id == $class['PK_CLASS']) ? 'selected' : ''; ?>
                                            <option value="<?php echo $class['PK_CLASS']; ?>" <?php echo $selected; ?>><?php echo $class['C_CLASS_NAME']; ?></option>
                                        <?php endforeach; ?>
                                    </select> 
                               
                                <?php endif ;?>
                            </div>

                            <div class="col-md-2" >
                                <button type="button" class="btn btn-primary " onclick="btn_filter_onclick();" name="btn_filter">
                                    <i class="glyphicon glyphicon-search"></i>  &nbsp  Lọc
                                </button>
                            </div>

                        </div>
                    </details>
                    <?php if ($role == 1): ?>
                        <details>
                            <summary>Thêm mới</summary>
                            <div class="row">
                                <div class='col-md-6' style='padding:35px 0px 25px 15px;'>
                                    <div class='col-md-8'>
                                        <input type="file"  class="form-control" name="uploader" id="uploader" >
                                    </div>
                                    <div class='col-md-1'>
                                        <button  class='btn btn-primary ' onclick="btn_add_contact_list_onclick();" ><span  class="glyphicon glyphicon-plus"></span>&nbsp&nbspNhập danh sách</button>
                                    </div>  
                                </div>
                                <div class='col-md-6 ' style='padding-top:35px;'>
                                    <div class='row'>
                                        <div class='col-md-3'>
                                            <a href="javascript:void(0)" class="btn btn-primary" onclick="btn_addnew_onclick()"><span  class="glyphicon glyphicon-plus"></span>&nbsp&nbspThêm mới</a>&nbsp&nbsp&nbsp&nbsp&nbsp

                                        </div>

                                    </div>
                                </div>  
                        </details>     
                        <?php if ($role == 1): ?>
                            <details>
                                <summary>Chuyển lớp</summary>
                                <div class="row">
                                    <div class="col-md-1 col-md-offset-6">
                                        <a  href="<?php echo SITE_URL . 'parent_student/dsp_transfer_class' ?>" class="btn btn-primary"  ><span class="glyphicon glyphicon-random"></span>&nbsp&nbsp&nbsp Chuyển Lớp</a>
                                    </div>
                                </div>
                            </details>
                        <?php endif; ?>
                        <details>
                            <summary>Xóa</summary>
                            <div class="row">
                                <div class='col-md-3 col-md-offset-6'>
                                    <a href="javascript:void(0);" class="btn btn-primary" onclick="update_delete_onclick();"><span  class="glyphicon glyphicon-remove"></span>&nbsp&nbsp&nbspXóa&nbsp&nbsp&nbsp</a>
                                </div>
                            </div>  
                        </details>            
                    <?php endif; ?>



            </div>
            <div class="box box-bordered box-small">
                <div class="box-content nopadding" >
                    <table class="table table-hover table-nomargin table-condensed ">
                        <thead><tr class="info">
                                <th style="width: 5%;text-align:center">
                                    <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk" onclick="toggle_check_all(this, this.form.chk);">                                               
                                </th>
                                <th style="width: 12%;text-align:center">Họ tên học sinh</th>
                                <th style="width: 8%;text-align:center">Ngày sinh </th>
                                <th style="width: 12%;text-align:center">Họ tên bố</th>
                                <th style="width: 12%;text-align:center">Họ tên mẹ</th>
                                <th style="width: 23%;text-align:center" >Địa chỉ</th>
                                <th style="width: 15%;text-align:center">Email</th>
                                <th style="width: 6%;text-align:center" >SĐT</th>
                                <th style="width: 12%;text-align:center">Thao tác</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arr_all_parent_contact as $parent_contact): ?>
                                <tr>
                                    <td style="text-align:center">
                                        <!--<input type="checkbox" name="chk[]" />-->
                                        <input type="checkbox" name="chk" value="<?php echo $parent_contact['PK_USER']; ?>" onclick="if (!this.checked)
                                                    this.form.chk_check_all.checked = false;">
                                    </td>
                                    <td style=""> <?php echo $parent_contact['C_NAME']; ?>

                                    </td>
                                    <td style="text-align:center">
                                        <?php echo $parent_contact['C_STUDENT_BIRTH']; ?>

                                    </td>
                                    <td style="">
                                        <?php echo $parent_contact['C_FATHER_NAME']; ?>

                                    </td>
                                    <td style="">
                                        <?php echo $parent_contact['C_MOTHER_NAME']; ?>

                                    </td>
                                    <td style="">
                                        <?php echo $parent_contact['C_ADDRESS']; ?>
                                    </td>
                                    <td style="">
                                        <?php echo $parent_contact['C_EMAIL']; ?>

                                    </td>
                                    <td style="text-align:center">
                                        <?php echo $parent_contact['C_PHONE']; ?>

                                    </td >
                                 
                                    <td style="text-align:center">
                                        <a href="javascript::(0)" onclick="row_click(<?php echo $parent_contact['PK_USER']; ?>);">  Sửa</a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php echo $this->render_rows(count($arr_all_parent_contact), 9); ?>
                        </tbody>

                    </table>
                    <div id="paging" class="nowrap">
                        <?php echo $this->paging2($arr_all_parent_contact); ?>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


</div>
</div>

<script type="text/javascript">
    function btn_add_contact_list_onclick() {
        var m = $('#frmMain #controller').val() + $('#frmMain #hdn_add_new_contact_list').val();
        $('#frmMain').attr('action', m);
        $('#frmMain').submit();
    }
    function btn_addnew_onclick() {
        var m = $('#frmMain #controller').val() + $('#frmMain #hdn_dsp_single_record').val();
        $('#frmMain').attr('action', m);
        $('#frmMain').submit();
    }
    function row_click(id) {
        var m = $('#frmMain #controller').val() + 'dsp_single_parent_contact/' + id;
        $('#hdn_teacher_id').val(id);
        $('#frmMain').attr('action', m);
        $('#frmMain').submit();
    }
    function load_class(grade_id) {
        var site_url = $('#hdn_site_url').val();
        $.ajax({
            url: site_url + 'class_grade/load_class',
            type: 'post',
            async: true,
            cache: false,
            data: 'grade_id=' + grade_id,
            dataType: 'json',
            success: function(result) {
                var xhtml = "<option value='0'>-- Mời chọn lớp --</option>";
                for (i = 0; i < result.length; i++) {
                    var option = "<option value ='" + result[i].PK_CLASS + "'>" + result[i].C_CLASS_NAME + "</option>";
                    xhtml += option;
                }
                $('#sel_class').html(xhtml);
            }
        });
    }

    function load_grade(class_id) {
        var site_url = $('#hdn_site_url').val();
        $.ajax({
            url: site_url + 'class_grade/load_grade',
            type: 'post',
            async: true,
            cache: false,
            data: 'class_id=' + class_id,
            dataType: 'html',
            success: function(result) {
                $("#sel_grade option[value='" + result + "']").attr("selected", "selected");
            }
        });
    }
    function btn_filter_onclick() {
        $('#frmMain').submit();
    }
</script>