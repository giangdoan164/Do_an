<?php // $this->render('user/index'); ?>
<div class="container-fluid" >
    <div class="row-fluid">
        <h1 class="page-header">Quản lý lớp học</h1>
        <div class="main-wrapper" style="margin-left: 0px !important;">                    
            <div class="container-fluid block">
                <form name="frmMain" id="frmMain" action="" method="POST" class="form-inline" >
                   <?php 
                   // vi du chung minh bien toan cuc thi goi dau cug  duoc
//                 echo __FILE__;
//                 echo "<pre>";
//                 print_r(get_post_var('sel_grade',0));
//                 echo "</pre>";
//                 echo __LINE__;
                    echo $this->hidden('controller',$this->get_controller_url());
                    echo $this->hidden('hdn_teacher_id',0);
                    echo $this->hidden('hdn_item_id_list', '');
                    echo $this->hidden('hdn_delete_record_method', 'delete_class');
                    echo $this->hidden('hdn_dsp_all_record','dsp_all_class');
                     ?>
                    <div class="row-fluid" style="padding: 10px;">
                        <div class="form-group">
                            <label for="sel_grade">Tìm kiếm &nbsp</label>
                            <select class="form-control" id="sel_grade" name="sel_grade" onchange="load_class(this.value)">
                                    <option value="0">--- Chọn khối --- </option>
                                    <option value="1">Khối 1</option>
                                    <option value="2">Khối 2</option>
                                    <option value="3">Khối 3</option>
                                    <option value="4">Khối 4</option>
                                    <option value="5">Khối 5</option>
                             </select>
                       </div>
                        <div class="form-group pull-right">
                            <div>
                                    <a href="javascript:void(0)" onclick="btn_addnew_onclick()"><i class="icon-plus"></i>Thêm mới</a>&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <a data-toggle="modal" href="javascript:void(0);" onclick="update_delete_onclick();"><i class="icon-trash"></i>Xóa</a>
                            </div>
                        </div>
                        </div>
                                <table class="table table-hover table-nomargin table-condensed table-bordered ">
                                    <thead><tr class="info ">
                                            <th style="width: 10%;text-align:center;" >
                                                <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk" onclick="toggle_check_all(this, this.form.chk);">                                              
                                            </th>
                                            <th style="width: 20%;text-align:center">Tên lớp</th>
                                            <th style="width: 35%;text-align:center">Tên giáo viên</th>
                                            <th style="width: 20%;text-align:center">Khối</th>
                                            <th style="width: 15%;text-align:center">Thao tác</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                    <?php foreach ($arr_all_class as $class):?>
                                    <tr>
                                        <td style="text-align:center">
                                            <!--<input type="checkbox" name="chk[]" />-->
                                            <input type="checkbox" name="chk" value="<?php echo $class['PK_CLASS']; ?>" onclick="if (!this.checked) this.form.chk_check_all.checked=false;">
                                        </td>
                                        <td style="text-align:center">
                                            <a href="javascript::(0)" onclick="row_click(<?php echo $class['PK_CLASS']; ?>);">  <?php echo $class['C_CLASS_NAME']; ?></a>
                                         
                                        </td>
                                        <td style="text-align:center">
                                           <?php echo $class['C_NAME'] ;?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php echo $class['FK_GRADE'];?>
                                        </td>
                                        
                                        <td style="text-align:center">
                                                <a href="javascript::(0)" onclick="row_click(<?php echo $class['PK_CLASS']; ?>);">Sửa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                      <?php echo $this->render_rows(count($arr_all_class),5);?>
                                    </tbody>
                                       
                                </table>
                               <div id="paging" class="nowrap">
                                   <?php echo $this->paging2($arr_all_class); ?>
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

<script type="text/javascript">
            function btn_addnew_onclick(){
                   var m = $('#frmMain #controller').val() +'dsp_single_class'; 
                   $('#frmMain').attr('action',m);
                   $('#frmMain').submit();
                }
            function row_click(id){
                    var m = $('#frmMain #controller').val() + 'dsp_single_class/'+id;
                    $('#hdn_teacher_id').val(id);
                    $('#frmMain').attr('action',m);
                    $('#frmMain').submit();
                }
           
            function load_class(grade_id){
                $('#frmMain #sel_grade').val(grade_id);
                var m = $('#frmMain #controller').val() +'dsp_all_class';
                $('#frmMain').attr('action',m);
                $('#frmMain').submit();
               
             }
    
            
      
</script>