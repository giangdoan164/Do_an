<?php // $this->render('user/index'); ?>
<?php // echo $this->get_controller_url();?>
<div class="container" >
    <div class="row-fluid">
        <h2 class="page-header">Quản lý giáo viên</h2>
        <div class="main-wrapper" style="margin-left: 0px !important;">                    
            <div class="container-fluid block">
                <form name="frmMain" id="frmMain" action="" method="POST"  >
                   <?php 
                   $url = $this->get_controller_url();
                    echo $this->hidden('controller',$url);
                    echo $this->hidden('hdn_site_url',SITE_URL);
                    echo $this->hidden('hdn_teacher_id',0);
                    echo $this->hidden('hdn_item_id_list', '');
                    echo $this->hidden('hdn_delete_record_method', 'delete_teacher');
                    echo $this->hidden('hdn_dsp_all_record','dsp_all_teacher');
                     ?>
                    
                   <div class="row-fluid">
                        <div class="row" style="margin-bottom: 20px;">
                              <div class="col-md-5">
                                  
                                      <div class="col-md-10">
                                    <div class="form-group">
                                      
                                            <div class="col-md-7">
                                                 <input type="text" name="txt_filter"  id="txt_filter" value="" class="inputbox form-control" size="20" autofocus="autofocus" placeholder="Tên giáo viên"/>
                                               
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                              <button type="button" class="btn btn-primary" onclick="btn_filter_onclick();" name="btn_filter">
                                                    <span class="glyphicon glyphicon-search"></span>  &nbsp  Lọc
                                                </button>  
                                            </div>
                                              
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-3 col-md-offset-4">
                                    <a href="javascript:void(0)" class="btn btn-success" onclick="btn_addnew_onclick()"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbspThêm mới</a>&nbsp&nbsp&nbsp
                                    <a data-toggle="modal" href="javascript:void(0);"  class="btn btn-danger" onclick="update_delete_onclick();"><span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp&nbsp&nbspXóa&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                       
                            </div>
                              
                        </div>
                                <table class="table table-hover table-nomargin table-condensed ">
                                    <thead><tr class="info">
                                            <th style="width: 5%;text-align:center">
                                                <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk" onclick="toggle_check_all(this, this.form.chk);">
                                               
                                            </th>
                                            <th style="width: 15%;text-align:center">Họ tên</th>
                                            <th style="width: 12%;text-align:center">SĐT</th>
                                            <th style="width: 20%;text-align:center">Địa chỉ</th>
                                            <th style="width: 18%;text-align:center">Email</th>
                                            <th style="width: 10%;text-align:center">Lớp</th>
                                            <th style="width: 10%;text-align:center" >Khối</th>
                                            <th style="width: 10%;text-align:center">Thao tác</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                    <?php foreach ($arr_all_teacher as $teacher):?>
                                    <tr>
                                        <td style="text-align:center">
                                            <!--<input type="checkbox" name="chk[]" />-->
                                            <input type="checkbox" name="chk" value="<?php echo $teacher['PK_USER']; ?>" onclick="if (!this.checked) this.form.chk_check_all.checked=false;">
                                        
                                        </td>
                                        <td style="text-align:center"><a href="javascript::(0)" onclick="row_click(<?php echo $teacher['PK_USER']; ?>);">  <?php echo $teacher['C_NAME']; ?></a>
                                         
                                        </td>
                                        <td style="text-align:center">
                                           <?php echo $teacher['C_PHONE'] ;?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php echo $teacher['C_ADDRESS'];?>
                                        </td>
                                        <td>
                                            <?php echo $teacher['C_EMAIL'];?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php echo $teacher['C_CLASS_NAME'];?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php echo $teacher['FK_GRADE'];?>
                                        </td >
                                        <td style="text-align:center"><a href="javascript::(0)" onclick="row_click(<?php echo $teacher['PK_USER']; ?>);"> Sửa </td>
                                    </tr>
                                <?php endforeach; ?>
                                      <?php echo $this->render_rows(count($arr_all_teacher),8);?>
                                    </tbody>
                                       
                                </table>
                               <div id="paging" class="nowrap">
                                   <?php echo $this->paging2($arr_all_teacher); ?>
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