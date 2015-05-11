<?php // $this->render('user/index'); ?>
<div class="container" >
    <div class="row-fluid">
        <h2 class="page-header">Quản lý lớp học</h2>
        <div class="main-wrapper" style="margin-left: 0px !important;">                    
            <div class="container-fluid">
                <form name="frmMain" id="frmMain" action="" method="POST" class="form-inline" >
                   <?php 
                        // vi du chung minh bien toan cuc thi goi dau cug  duoc
                         echo $this->hidden('controller',$this->get_controller_url());
                         echo $this->hidden('hdn_teacher_id',0);
                         echo $this->hidden('hdn_item_id_list', '');
                         echo $this->hidden('hdn_delete_record_method', 'delete_class');
                         echo $this->hidden('hdn_dsp_all_record','dsp_all_class');
                     ?>
                    <div class="row-fluid" style="padding: 20px;margin-bottom: 40px;">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="sel_grade_main" >Tìm kiếm &nbsp</label>
                              <select class="form-control" id="sel_grade_main" name="sel_grade_main" onchange="load_class(this.value)">
                                    <option value="0">--- Chọn khối --- </option>
                                    <option value="1">Khối 1</option>
                                    <option value="2">Khối 2</option>
                                    <option value="3">Khối 3</option>
                                    <option value="4">Khối 4</option>
                                    <option value="5">Khối 5</option>
                             </select>      
                          </div>
                        </div>
                     <div class='col-md-7'>
                            <div class="col-md-5 col-md-offset-7">
                                <a data-toggle="modal" class="btn btn-primary" href="#add_new_class" ><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;&nbsp;Thêm mới</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <a  href="javascript:void(0);" class="btn btn-success" onclick="update_delete_onclick();"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;Xóa</a>
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
<!--                                            <th style="width: 15%;text-align:center">Thao tác</th>-->
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
                                            <a href="javascript::(0)">  <?php echo $class['C_CLASS_NAME']; ?></a>
                                         
                                        </td>
                                        <td style="text-align:center">
                                           <?php echo $class['C_NAME'] ;?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php echo $class['FK_GRADE'];?>
                                        </td>
                                        
<!--                                        <td style="text-align:center">
                                                <a href="javascript::(0)" onclick="row_click(<?php // echo $class['PK_CLASS']; ?>);">Sửa</a>
                                        </td>-->
                                    </tr>
                                <?php endforeach; ?>
                                      <?php echo $this->render_rows(count($arr_all_class),4);?>
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
        <div class="modal fade" role="dialog" id ="add_new_class" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Thêm lớp mới</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group">
                                    <label for="txt_class_name" class="col-md-3 control-label">Tên lớp</label>
                                    <div class="col-md-7 col-md-offset-1">
                                        <input type="text" class="form-control"  id="txt_teacher_email" name="txt_class_name" placeholder="Tên lớp">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:10px; ">
                                <div class="form-group">
                                    <label for="sel_grade" class=" control-label col-md-3">Khối học</label>
                                    <div  class="col-md-7 col-md-offset-1"> 
                                        <select class="form-control" id="sel_grade" name="sel_grade" >
                                            <option value="0">--- Chọn khối --- </option>
                                            <option value="1">Khối 1</option>
                                            <option value="2">Khối 2</option>
                                            <option value="3">Khối 3</option>
                                            <option value="4">Khối 4</option>
                                            <option value="5">Khối 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="btn_addnew_onclick()"><span class="glyphicon glyphicon-saved"></span> &nbsp;&nbsp;Cập nhật</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;Hủy bỏ</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
                </form>
            </div>
        </div>

<script type="text/javascript">
            function btn_addnew_onclick(){
                   var m = $('#frmMain #controller').val() +'add_new_class'; 
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
                $("#frmMain #sel_grade option[value='"+grade_id+"']").attr("selected",true);
                var m = $('#frmMain #controller').val() +'dsp_all_class';
                $('#frmMain').attr('action',m);
                $('#frmMain').submit();
               
             }
    
            
      
</script>