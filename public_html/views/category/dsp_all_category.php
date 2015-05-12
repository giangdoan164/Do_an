<?php 

  ?>
<div class="container" >
    <div class="row-fluid">
        <h2 class="page-header">Quản lý chuyên mục</h2>           
        <div class="container-fluid">
            <form name="frmMain" id="frmMain" action="" method="POST" class="form-inline" >
                <?php
                    // vi du chung minh bien toan cuc thi goi dau cug  duoc
                    echo $this->hidden('controller', $this->get_controller_url());
                    echo $this->hidden('hdn_teacher_id', 0);
                    echo $this->hidden('hdn_item_id_list', '');
                    echo $this->hidden('hdn_delete_record_method', 'delete_category');
                    echo $this->hidden('hdn_dsp_all_record', 'dsp_all_class');
                ?>
                <div class="row-fluid" style="margin-bottom: 20px;">
                
                    <div class='row-fluid'>
                        
                            <a data-toggle="modal" class="btn btn-primary" href="#add_new_class" ><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;&nbsp;Thêm mới</a>
                        
                            <a  href="javascript:void(0);" class="btn btn-success" onclick="update_delete_category_onclick();"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;Xóa</a>
                       
                        </div>   
                    </div>
                </div>
                <div class="container">
                    <table class="table table-hover table-nomargin table-condensed table-bordered ">
                        <thead>
                            <tr class="info ">
                                <th style="width: 5%;text-align:center;" >
                                    <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk" onclick="toggle_check_all(this, this.form.chk);">                                              
                                </th>
                                 <th style="width: 10%;text-align:center">STT</th>
                                <th style="width: 30%;text-align:center">Chuyên mục</th>
                                <th style="width: 55%;text-align:center">Mô tả</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php $stt = 0;?>
                            <?php foreach ($arr_all_category as $key => $category): ?>
                            <?php $stt = $stt + 1;?>
                                <tr>
                                    <td style="text-align:center">
                                        <input type="checkbox" name="chk" value="<?php echo $key;?>" onclick="if (!this.checked)
                                                    this.form.chk_check_all.checked = false;">
                                    </td>
                                            <td style="text-align:center">
                                          <?php echo $stt;?>
                                    </td>
                                    <td style="text-align:center">
                                         <?php echo $category['C_NAME']; ?>

                                    </td>
                                    <td style="text-align:center">
                                     <?php echo $category['C_DESCRIPTION']; ?>
                                    </td>
                                  

                                </tr>
                            <?php endforeach; ?>
                           
                        </tbody>

                    </table>
                </div>
                
                <div id="add_new_class" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title" id="gridSystemModalLabel">Thêm mới chuyên mục</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="txt_class_name" class="control-label">Tên chuyên mục</label>
                                    </div>
                                    <div class="col-md-8">                     
                                        <input type="text" class="form-control"  id="txt_name_category" name="txt_name_category" placeholder="Tên chuyên mục">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:20px;">
                                   
                                    <div class="col-md-4">
                                        <label for="txt_description_category" class="control-label">Mô tả chuyên mục</label>
                                    </div>
                                    <div class="col-md-8">                     
                                        <input type="text" class="form-control"  id="txt_description_category" name="txt_description_category" placeholder="Mô tả chuyên mục">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="btn_addnew_onclick()"><span class="glyphicon glyphicon-saved"></span> &nbsp;&nbsp;Cập nhật</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;Hủy bỏ</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        function btn_addnew_onclick() {
            var title = $('#frmMain #txt_name_category').val();
       
            var description = $('#frmMain #txt_description_category').val();
        
            
            if(title !=''  && description !=''){
                 var m = $('#frmMain #controller').val() + 'add_new_category';
                $('#frmMain').attr('action', m);
                $('#frmMain').submit(); 
            }else{
                alert("Mời nhập đầy đủ nội dung");
                return false;
            }
          
        }
    </script>