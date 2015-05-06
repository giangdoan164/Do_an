<?php $arr_key_unread_mess = array_keys($arr_all_unread_mess);?>
<div class="container" >
    <div class="row-fluid">
        <h2 class="page-header">Trao đổi riêng</h2>
        <div class="main-wrapper" style="margin-left: 0px;">                    
            <form name="frmMain" id="frmMain" action="" method="POST" >
                <?php
                    echo $this->hidden('controller', $this->get_controller_url());
                    echo $this->hidden('hdn_dsp_all_thread','dsp_all_thread');
                    echo $this->hidden('hdn_dsp_single_thread','dsp_single_thread');
                    echo $this->hidden('hdn_dsp_create_new_thread','dsp_create_new_thread');
                    //phuc vu cho viec xoa
                          //2 cai nay de cho viec xoa
                echo $this->hidden('hdn_item_id_list', '');
                echo $this->hidden('hdn_delete_record_method', 'delete_thread');
                ?>
                <div class='row' style='margin-bottom:19px;'>  
                    <div class="col-md-5">
                            <div class='form-group'>
                                <label for="sel_time"  class="col-md-5 control-label">Thời gian gửi&nbsp;</label>                                 
                                <div class="col-md-7">
                                     <select class="form-control " id="sel_time" name="sel_time">
                                        <option value="1" selected="">---Từ lúc bắt đầu---</option>
                                        <option value="2" <?php if($created_time=='2'){echo 'selected';} ?> >1 ngày trước</option>
                                        <option value="3" <?php if($created_time=='3'){echo 'selected';} ?> >3 ngày trước</option>
                                        <option value="4" <?php if($created_time=='4'){echo 'selected';} ?> >1 tuần trước</option>
                                        <option value="5" <?php if($created_time=='5'){echo 'selected';} ?> >2 tuần trước</option>
                                        <option value="6" <?php if($created_time=='6'){echo 'selected';} ?> >1 tháng trước</option>
                                        <option value="7" <?php if($created_time=='7'){echo 'selected';} ?> >2 tháng trước</option>
                                        <option value="8" <?php if($created_time=='8'){echo 'selected';} ?> >3 tháng trước</option>
                                    </select>
                 
                                </div>  
                            </div>
                    </div>
                    <div class="col-md-2 col-md-offset-3" style="padding-left: 60px;">
                            <button class="btn btn-primary " onclick="dsp_create_new_thread();"><span class="glyphicon glyphicon-plus"></span>&nbsp;Trao đổi mới</button>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-success btn-block" onclick="update_delete_onclick();"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Xóa</button>
                       
                    </div>
                </div>  
                <table class="table table-hover table-nomargin table-condensed " >
                    <thead>
                        <tr class="forum_head">
                                <th style="width: 5%;text-align:center">
                                     <input type="checkbox" name="chk_check_all" rel="checkall" data-target=".chk" onclick="toggle_check_all(this, this.form.chk);">               
                                </th>
                            <th style="width: 25%;text-align:center">Tên người gửi</th>
                            <th style="width:50%;text-align:center">Tiêu đề </th>
                            <th style="width: 20%;text-align:center">Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php if (sizeof($arr_all_message) >0 ):?>
                            <?php if(sizeof($arr_all_unread_mess) > 0):?>
                                 <?php foreach ($arr_all_message as  $key_all_mess =>$message) :?>
                                <?php if(in_array($key_all_mess,$arr_key_unread_mess)):?>
                                        <tr style="font-weight: bold;" >
                                        <td style="text-align:center;">
                                        <input type="checkbox" name="chk" value="<?php echo $key_all_mess;?>"  onclick="if (!this.checked) this.form.chk_check_all.checked=false;">
                                        </td>
                                        <td style="text-align:center">
                                            <a  style="color:black;" href="#" onclick="row_click(<?php echo  $key_all_mess;?>)"> <?php echo $message['C_LOGIN_NAME'];?> </a>                           
                                        </td>
                                        <td style="text-align:center">   <a style="color:black;"  href="#" onclick="row_click(<?php echo  $key_all_mess;?>)"><?php echo $message['C_TITLE']."(".$arr_all_unread_mess[$key_all_mess].")"; ?></a></td>
                                        <td style="text-align:center"><?php echo $message['C_CREATED_DATE'];?></td>
                                        </tr>
                                    <?php else: ?>
                                           <tr>
                                            <td style="text-align:center;">
                                            <input type="checkbox" name="chk" value="<?php echo $key_all_mess;?>"  onclick="if (!this.checked) this.form.chk_check_all.checked=false;">
                                            </td>
                                            <td style="text-align:center">
                                                <a  style="color:black;" href="#" onclick="row_click(<?php echo  $key_all_mess;?>)"> <?php echo $message['C_LOGIN_NAME'];?> </a>                           
                                            </td>
                                            <td style="text-align:center">   <a style="color:black;" href="#" onclick="row_click(<?php echo  $key_all_mess;?>)"><?php echo $message['C_TITLE'];?></a></td>
                                            <td style="text-align:center"><?php echo $message['C_CREATED_DATE'];?></td>
                                            </tr>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                               <?php else: ?>
                                       <?php foreach ($arr_all_message as  $key =>$message) :?>
                                        <tr>
                                            <td style="text-align:center;">
                                            <input type="checkbox" name="chk" value="<?php echo $key;?>"  onclick="if (!this.checked) this.form.chk_check_all.checked=false;">
                                            </td>

                                            <td style="text-align:center">
                                                <a  style="color:black;" href="#" onclick="row_click(<?php echo  $key;?>)"> <?php echo $message['C_LOGIN_NAME'];?> </a>                           
                                            </td>
                                            <td style="text-align:center">    <a style="color:black;" href="#" onclick="row_click(<?php echo  $key_all_mess;?>)"><?php echo $message['C_TITLE'];?></a></td>
                                            <td style="text-align:center"><?php echo $message['C_CREATED_DATE'];?></td>

                                            </tr>
                             <?php endforeach;?>
                                <?php endif;?>
                        <?php else:?>
                         <tr> 
                             <td style="color:red;text-align: center;font-weight: bold;" colspan="5"><?php echo "Chưa có trao dổi riêng nào được tạo"?></td>
                         </tr>
                        <?php endif;?>
                             <?php // echo $this->render_rows(count($arr_all_message),4); ?>
                    </tbody>
                </table>
                 <div id="paging" class="nowrap">
                        <?php echo $this->paging2($arr_all_message); ?>
                    </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    
  function row_click(id){
                    var single_thread_url = $('#frmMain #hdn_dsp_single_thread').val();
                    var m = $('#frmMain #controller').val() + single_thread_url + '/'+id;
                    $('#frmMain').attr('action',m);
                    $('#frmMain').submit();
  } 
  
  function dsp_create_new_thread(){
      var f = document.frmMain;
      m = $('#controller').val() + f.hdn_dsp_create_new_thread.value;
      $('#frmMain').attr('action',m);
      f.submit();
  }
  
  
</script>