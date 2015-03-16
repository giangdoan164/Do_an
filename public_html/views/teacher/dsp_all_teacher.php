<?php // $this->render('user/index'); ?>

<div class="container-fluid" >
    <div class="row-fluid">
        <h1 class="page-header">Quản lý giáo viên</h1>
        <div class="main-wrapper" style="margin-left: 0px !important;">                    
            <div class="container-fluid block">
                <form name="frmMain" id="frmMain" action="" method="POST" >
                   <?php 
                        echo $this->hidden('controller',$this->get_controller_url());
                          echo $this->hidden('hdn_teacher_id',0);
                     ?>
                    <input type="hidden" name="controller" id="controller" value="/taothu/license/license_type/"><input type="hidden" name="hdn_dsp_single_method" id="hdn_dsp_single_method" value="dsp_single_license_type"><input type="hidden" name="hdn_dsp_all_method" id="hdn_dsp_all_method" value="dsp_all_license_type"><input type="hidden" name="hdn_update_method" id="hdn_update_method" value="update_license_type"><input type="hidden" name="hdn_delete_method" id="hdn_delete_method" value="delete_license_type"><input type="hidden" name="hdn_item_id" id="hdn_item_id" value=""><input type="hidden" name="hdn_item_id_list" id="hdn_item_id_list" value=""><input type="hidden" name="XmlData" id="XmlData" value="">            <div class="row-fluid">
                        <div class="box box-bordered box-small">
                            <div class="box-title">
                                <div class="pull-right">
                                    <a href="javascript:void(0)" onclick="btn_addnew_onclick()"><i class="icon-plus"></i>&nbsp;Thêm mới</a>
                                    <a data-toggle="modal" href="javascript:void(0);" onclick="onlick_show_modal_delete()"><i class="icon-trash"></i>&nbsp;Xóa</a>
                                </div>
                            </div>
                         
                            <div class="box-content nopadding">
                                <div id="div_filter" class="padding">
                                    Tìm kiếm
                                    <input type="text" name="txt_filter" value="" class="inputbox" size="30" autofocus="autofocus" onkeypress="txt_filter_onkeypress_is_enter(event);">
                                    <button type="button" class="btn btn-file" onclick="btn_filter_onclick();" name="btn_filter">
                                        <i class="icon-search"></i>Lọc
                                    </button>
                                </div>
                                <table class="table table-hover table-nomargin table-condensed table-bordered">
                                    <thead><tr class="info">
                                            <th style="width: 5%" class="center">
                                                <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk" onclick="toggle_check_all(this, this.form.chk);">
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
                                            <input type="checkbox" name="chk[]" />
                                        </td>
                                        <td><a href="javascript::(0)" onclick="row_click(<?php echo $teacher['PK_USER']?>);">  <?php echo $teacher['C_NAME']; ?></a>
                                         
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
                                            <?php echo $teacher['C_GRADE'];?>
                                        </td>
                                        <td><a href="#">Sửa</a></td>
                                    </tr>
                                <?php endforeach; ?>
                                    </tbody>
                                </table>
                              
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
</script>