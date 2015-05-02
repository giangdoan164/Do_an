<?php // $this->render('user/index');   ?>
<?php // echo $this->get_controller_url();  ?>
<?php 
$v_grade_id = $grade;
$v_class_id = $class;
?>
<div class="container" >
     <form name="frmMain" id="frmMain" action="" method="POST" enctype="multipart/form-data">
    <div class="row-fluid">
        <h2 class="page-header" style="text-align: center;">Cập nhật lớp học</h2>
        
        <div class="main-wrapper" style="margin-left: 0px;">                    
            <div class="container-fluid block" style=" margin-bottom: 25px;">
               
                    <?php
                    $url = $this->get_controller_url();
                    echo $this->hidden('controller', $url);
                    echo $this->hidden('hdn_parent_contact_id', 0);
                    echo $this->hidden('hdn_item_id_list', '');
                    echo $this->hidden('hdn_site_url', SITE_URL);
                    $role = Session::get('level');
                    echo $this->hidden('hdn_update_class','do_transfer_class');
                    echo $this->hidden('hdn_add_new_contact_list', 'add_new_contact_list');
                    // phuc vu cho viec xoa
                    echo $this->hidden('hdn_delete_record_method', 'delete_parent_contact');
                    // phuc vu cho viec sua
                    echo $this->hidden('hdn_dsp_all_record', 'dsp_all_parent_contact');
                    echo $this->hidden('hdn_dsp_single_record', 'dsp_single_parent_contact');
                    ?>  
                    <div class="row">
                        <div class="col-md-5 ">
                            <h4 style="color: #ff3300;padding-left:120px;margin: 0;">Lớp chuyển đi</h4>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <h4 style="color: #ff3300;padding-left:120px;margin: 0;">Lớp chuyển đến</h4>
                        </div>
                    </div>
            </div>
            <div class='row' style='margin-bottom:19px;'>
                <div class="col-md-5">

                    <div class="col-md-5">  
                        <?php if ($role == 1): ?>
                            <select class="form-control" id="sel_grade" name="sel_grade" onchange="load_class(this.value)">
                                <option value="0">--- Chọn khối --- </option>
                                <?php foreach ($arr_grade as $grade): ?>
                                    <?php $selected = ($v_grade_id == $grade['PK_GRADE']) ? 'selected' : '' ?>
                                    <option value="<?php echo $grade['PK_GRADE']; ?>" <?php echo $selected; ?>><?php echo $grade['C_GRADE_NAME']; ?></option>
                                <?php endforeach; ?>
                            </select>

                        <?php endif ?>
                    </div>
                    <div class="col-md-5">
                        <?php if ($role == 1): ?>
                            <select class="form-control" id="sel_class" name="sel_class" onchange="load_grade(this.value)">
                                <option value="0">--- Chọn lớp ---</option>
                                <?php foreach ($arr_class as $class): ?>
                                    <?php $selected = ($v_class_id == $class['PK_CLASS']) ? 'selected' : ''; ?>
                                    <option value="<?php echo $class['PK_CLASS']; ?>" <?php echo $selected; ?>><?php echo $class['C_CLASS_NAME']; ?></option>
                                <?php endforeach; ?>
                            </select> 

                        <?php endif ?>
                    </div>


                </div>
                <div class="col-md-2">
                    <div class="row">

                        <div class="col-md-2 col-md-offset-2" >
                            <button type="button" class="btn btn-primary" onclick="btn_filter_onclick1();" name="btn_filter">
                                <i class="glyphicon glyphicon-search"></i>  Lọc
                            </button>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-2">
                            <a  href="#" class="btn btn-success " onclick="do_transfer_class();" ><span class="glyphicon glyphicon-random"></span>&nbsp&nbsp&nbsp&nbsp&nbsp Chuyển Lớp&nbsp&nbsp&nbsp</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">

                    <div class="col-md-5">  
                        <?php if ($role == 1): ?>
                            <select class="form-control" id="sel_grade1" name="sel_grade1" onchange="load_class1(this.value)">
                                <option value="0">--- Chọn khối --- </option>
                                <?php foreach ($arr_grade as $grade): ?>
                                  
                                    <option value="<?php echo $grade['PK_GRADE']; ?>" <?php echo $selected; ?>><?php echo $grade['C_GRADE_NAME']; ?></option>
                                <?php endforeach; ?>/
                            </select>

                        <?php endif ?>
                    </div>
                    <div class="col-md-5">
                        <?php if ($role == 1): ?>
                            <select class="form-control" id="sel_class1" name="sel_class1" onchange="load_grade1(this.value)">
                                <option value="0">--- Chọn lớp ---</option>
                                <?php foreach ($arr_class as $class): ?>
                                 
                                    <option value="<?php echo $class['PK_CLASS']; ?>" <?php echo $selected; ?>><?php echo $class['C_CLASS_NAME']; ?></option>
                                <?php endforeach; ?>
                            </select> 

                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-bordered box-small">
            <div class="box-content nopadding" >
                <table class="table table-hover table-nomargin table-condensed ">
                    <thead><tr class="info">
                            <th style="width: 5%;text-align:center">
                                <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk" onclick="toggle_check_all(this, this.form.chk);">                                               
                            </th>
                            <th style="width: 18%;text-align:center">Họ tên học sinh</th>
                            <th style="width: 10%;text-align:center">Ngày sinh </th>
                            <th style="width: 17%;text-align:center">Họ tên bố</th>
                            <th style="width: 17%;text-align:center">Họ tên mẹ</th>
                            <th style="width: 10%;text-align:center">Email</th>
                            <th style="width: 11%;text-align:center" >SĐT</th>
                            <th style="width: 5%;text-align:center">Lớp</th>
                            <th style="width: 7%;text-align:center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arr_all_parent_contact as $parent_contact): ?>
                            <tr>
                                <td style="text-align:center">
                                    <input type="checkbox" name="chk" value="<?php echo $parent_contact['PK_USER']; ?>" onclick="if (!this.checked)
                                                this.form.chk_check_all.checked = false;">
                                </td>
                                <td style="text-align:center"> <?php echo $parent_contact['C_NAME']; ?>

                                </td>
                                <td style="text-align:center">
                                    <?php echo $parent_contact['C_STUDENT_BIRTH']; ?>

                                </td>
                                <td style="text-align:center">
                                    <?php echo $parent_contact['C_FATHER_NAME']; ?>

                                </td>
                                <td style="text-align:center">
                                    <?php echo $parent_contact['C_MOTHER_NAME']; ?>

                                </td>
                                <td style="text-align:center">
                                    <?php echo $parent_contact['C_EMAIL']; ?>

                                </td>
                                <td style="text-align:center">
                                    <?php echo $parent_contact['C_PHONE']; ?>

                                </td >
                                <td style="text-align:center">
                                    <?php echo $parent_contact['C_CLASS_NAME']; ?>

                                </td>
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
        
    </div>
    </form>
</div>

<script type="text/javascript">
    function btn_filter_onclick1() {
        var f = document.frmMain;
        var m = $('#frmMain #controller').val() + 'dsp_transfer_class';
        $('#frmMain').attr('action', m);
        $('#frmMain').submit();
    }
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
    function load_class1(grade_id) {
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
                $('#sel_class1').html(xhtml);
            }
        });
    }

    function load_grade1(class_id) {
        var site_url = $('#hdn_site_url').val();
        $.ajax({
            url: site_url + 'class_grade/load_grade',
            type: 'post',
            async: true,
            cache: false,
            data: 'class_id=' + class_id,
            dataType: 'html',
            success: function(result) {
                $("#sel_grade1 option[value='" + result + "']").attr("selected", "selected");
            }
        });
    }
    function check_transfer_class(){
         var grade_from = $('#frmMain #sel_grade').val(); 
         var grade_to   = $('#frmMain #sel_grade1').val();
         var class_from = $('#frmMain #sel_class').val();
         var class_to   = $('#frmMain #sel_class1').val();
         if(grade_from =="0" || grade_to =="0" || class_from=="0" || class_to =="0"){
             alert("Mời chọn đầy đủ khối lớp muốn chuyển !!!");
             return false;
         }
         return true;
    }
    function do_transfer_class(){
        if(check_transfer_class() == true){
//            var class_to   = $('#frmMain #sel_class1').val();
//            var site_url = $('#hdn_site_url').val();
//            $.ajax({
//            url: site_url + 'parent_student/qry_student_number_from_class',
//            type: 'post',
//            async: true,
//            cache: false,
//            data: 'class_id=' + class_to,
////            dataType: 'html',
//            success: function(result) {
////                $("#sel_grade1 option[value='" + result + "']").attr("selected", "selected");
//                  console.log(result);
//            }
//            });
//            
//            return false;
            update_class_onclick();   
        }
    }
    
</script>