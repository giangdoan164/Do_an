<?php // $this->render('user/index'); ?>
<?php // echo $this->get_controller_url();?>
<div class="container-fluid" >
    <div class="row-fluid">
        <h1 class="page-header">Quản lý giáo viên</h1>
        <div class="main-wrapper" style="margin-left: 0px !important;">                    
            <div class="container-fluid block">
                <form name="frmMain" id="frmMain" action="" method="POST" >
                   <?php 
                   $url = $this->get_controller_url();
                    echo $this->hidden('controller',$url);
                    echo $this->hidden('hdn_teacher_id',0);
                    echo $this->hidden('hdn_item_id_list', '');
                    echo $this->hidden('hdn_delete_record_method', 'delete_teacher');
                    echo $this->hidden('hdn_dsp_all_teacher','dsp_all_teacher');
                     ?>
                    <!--<input type="hidden" name="controller" id="controller" value="/taothu/license/license_type/"><input type="hidden" name="hdn_dsp_single_method" id="hdn_dsp_single_method" value="dsp_single_license_type"><input type="hidden" name="hdn_dsp_all_method" id="hdn_dsp_all_method" value="dsp_all_license_type"><input type="hidden" name="hdn_update_method" id="hdn_update_method" value="update_license_type"><input type="hidden" name="hdn_delete_method" id="hdn_delete_method" value="delete_license_type"><input type="hidden" name="hdn_item_id" id="hdn_item_id" value=""><input type="hidden" name="hdn_item_id_list" id="hdn_item_id_list" value=""><input type="hidden" name="XmlData" id="XmlData" value="">            <div class="row-fluid">-->
                        <div class="box box-bordered box-small">
                            <div class="box-title">
                                <div class="pull-right">
                                    <a href="javascript:void(0)" onclick="btn_addnew_onclick()"><i class="icon-plus"></i>Thêm mới</a>&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <a data-toggle="modal" href="javascript:void(0);" onclick="update_delete_onclick();"><i class="icon-trash"></i>Xóa</a>
                                </div>
                            </div>
                         
                            <div class="box-content nopadding">
                                <div id="div_filter" class="padding" style="margin-bottom:20px";>
                                    Tìm kiếm &nbsp
                                    <input type="text" name="txt_filter" id="txt_filter" value="" class="inputbox" size="30" autofocus="autofocus" placeholder="Tên giáo viên" onkeypress="txt_filter_onkeypress_is_enter(event);" style="margin-right:10px;">
                                    <button type="button" class="btn btn-file" onclick="btn_filter_onclick();" name="btn_filter">
                                        <i class="glyphicon glyphicon-search"></i>  &nbsp  Lọc
                                    </button>
                                </div>
                                <table class="table table-hover table-nomargin table-condensed table-bordered">
                                    <thead><tr class="info">
                                            <th style="width: 5%" class="center">
                                                <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk" onclick="toggle_check_all(this, this.form.chk);">
                                                <!--<input type="checkbox" name="chk_check_all" onclick="toggle_check_all(this,this.form.chk);">-->
                                            </th>
                                            <th style="width: 25%">Họ tên</th>
                                            <th style="width: 10%">SĐT</th>
                                            <th style="width: 25%">Địa chỉ</th>
                                            <th style="width: 10%">Email</th>
                                            <th style="width: 5%">Lớp</th>
                                            <th style="width: 5%" >Khối</th>
                                            <th style="width: 15%">Thao tác</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                    <?php foreach ($arr_all_teacher as $teacher):?>
                                    <tr>
                                        <td>
                                            <!--<input type="checkbox" name="chk[]" />-->
                                            <input type="checkbox" name="chk" value="<?php echo $teacher['PK_USER']; ?>" onclick="if (!this.checked) this.form.chk_check_all.checked=false;">
                                        </td>
                                        <td><a href="javascript::(0)" onclick="row_click(<?php echo $teacher['PK_USER']; ?>);">  <?php echo $teacher['C_NAME']; ?></a>
                                         
                                        </td>
                                        <td>
                                           <?php echo $teacher['C_PHONE'] ;?>
                                        </td>
                                        <td>
                                            <?php echo $teacher['C_ADDRESS'];?>
                                        </td>
                                        <td>
                                            <?php echo $teacher['C_EMAIL'];?>
                                        </td>
                                        <td>
                                            <?php echo $teacher['C_CLASS_NAME'];?>
                                        </td>
                                        <td>
                                            <?php echo $teacher['FK_GRADE'];?>
                                        </td>
                                        <td><a href="#">Sửa</a></td>
                                    </tr>
                                <?php endforeach; ?>
                                      <?php echo $this->render_rows(count($arr_all_teacher),8);?>
                                    </tbody>
                                       
                                </table>
                               <div id="paging" class="nowrap">
                                   <?php echo $this->paging2($arr_all_teacher); ?>
                               </div>
                                
                                
                         <div class="modal fade modal-check" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4>Xóa loại hồ sơ</h4>
                                        </div>
                                        <p style="text-align: center">Bạn có chắc chắn xóa loại hồ sơ này?</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" onclick="onlick_delete_license();">Đồng ý</button>
                                            <button type="button" class="btn " data-dismiss="modal">Hủy bỏ</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

       
    </div>
</div>

<script type="text/javascript">
            function btn_addnew_onclick(){
                   var m = $('#frmMain #controller').val() +'dsp_single_teacher'; 
                   $('#frmMain').attr('action',m);
                   $('#frmMain').submit();
                }
            function row_click(id){
                    var m = $('#frmMain #controller').val() + 'dsp_single_teacher/'+id;
                    $('#hdn_teacher_id').val(id);
                    $('#frmMain').attr('action',m);
                    $('#frmMain').submit();
                }

                /**
             * Lay tat ca gia tri cua cac checkbox da duoc check tren form
             * @param string Ten doi tuong checkbox
             * @param string dau hieu phan cach giua cac gia tri duoc tra ve
             * @return string Xau the hien cac gia tri cua cac checkbox da duoc check, moi gia tri cach nhau boi dau hieu phan cach
             */
            function get_all_checked_checkbox(checkbox_name, separator) {
                //Chu y khi truyen tham tri: checkbox_name co dang document.forms[0].ten_checkbox
                var ret_string;
                var i;
                var int_checkbox_count;

                if (separator == null)
                    separator = ',';

                if (typeof (checkbox_name) == 'undefined')
                    return '';

                if (checkbox_name.length) {
                    int_checkbox_count = checkbox_name.length;
                } else {
                    int_checkbox_count = 0;
                }
                ret_string = "";

                if (!checkbox_name.length) {
                    if (checkbox_name.checked) {
                        ret_string = checkbox_name.value;
                    }
                } else {
                    for (i = 0; i < int_checkbox_count; i++) {
                        if (checkbox_name[i].checked) {
                            if (ret_string == "")
                                ret_string += checkbox_name[i].value;
                            else
                                ret_string += separator + checkbox_name[i].value;
                        }
                    }
                }

                return ret_string;
            }//end func get_all_checked_checkbox()




            function toggle_check_all(chk_obj, field) {
            if (chk_obj.checked) {
                check_all(field);
            }
            else {
                uncheck_all(field);
            }
        }

            function check_all(field) {

                if (field && field.length) {
                    for (i = 0; i < field.length; i++) {
                        if (!field[i].disabled) {
                            field[i].checked = true;
                        }
                    }
                } else {
                    if (field && !field.disabled) {
                        field.checked = true;
                    }
                }

            }

            function uncheck_all(field) {

                if (field && field.length) {
                    for (i = 0; i < field.length; i++) {
                        if (!field[i].disabled) {
                            field[i].checked = false;
                        }
                    }
                } else {
                    if (field && !field.disabled) {
                        field.checked = false;
                    }
                }

            }
            function set_value_chk(hdn_item_id_list)
                {
                    var f = document.frmMain;
                    var v_item_id = "0";
                    var v_item_id_list = "";
                    var error_message = 'Chưa có đối tượng nào được chọn!';

                    if (typeof(f.chk) == 'undefined' ){
                        alert(error_message);
                        return false;
                    }

                    v_item_id_list = get_all_checked_checkbox(f.chk,",");

                    if (v_item_id_list == ""){
                        alert(error_message);
                        return false;
                    }

                    f.hdn_item_id_list.value =  v_item_id_list;
                    return true;
                }

            function update_delete_onclick(record_id)
                {
                    var f = document.frmMain;
                    if(typeof record_id != 'undefined' && parseInt(record_id) >0)
                    {
                        $('#hdn_item_id_list').val(record_id);
                    }
                    else
                    {
                        var is_item_checked = set_value_chk(hdn_item_id_list);
                        if(!is_item_checked)
                        {
                            return false;
                        }
                    }
                    m = $("#controller").val() + f.hdn_delete_record_method.value;
                    $("#frmMain").attr("action", m);
                    if(confirm('Bạn chắc chắn xóa các đối tượng đã chọn?'))
                    {
                        f.submit();
                    }
                }
          
            function btn_filter_onclick() {
                var f = document.frmMain;
                m = $("#controller").val() + f.hdn_dsp_all_teacher.value;
                $("#frmMain").attr("action", m);
                f.submit();
}
</script>