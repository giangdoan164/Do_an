
<div class="container-fluid" >
    <div class="row-fluid">
        <h1 class="page-header">Trao đổi riêng</h1>
        <div class="main-wrapper" style="margin-left: 0px;">                    
            <form name="frmMain" id="frmMain" action="" method="POST" >
                <?php

                    echo $this->hidden('controller', $this->get_controller_url());
                    echo $this->hidden('hdn_dsp_all_thread','dsp_all_thread');
                    echo $this->hidden('hdn_dsp_single_thread','dsp_single_thread');
                    echo $this->hidden('hdn_dsp_create_new_thread','dsp_create_new_thread');
                ?>
                <div class='row' style='margin-bottom:19px;'>  
                    <div class="col-md-1 col-md-offset-3">
                        <button class="btn btn-primary" onclick="dsp_create_new_thread();"> <span class="icon-plus">Trao đổi mới</span></button>
                    </div>
                </div>  
                <table class="table table-hover table-nomargin table-condensed ">
                    <thead>
                        <tr class="info">
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
                        <?php foreach ($arr_all_message as $message) :?>
                        <tr>
                            <td style="text-align:center;">
                            <input type="checkbox" name="chk" value="<?php $message['PK_THREAD'];?>"  onclick="if (!this.checked) this.form.chk_check_all.checked=false;">
                            </td>
                        
                            <td style="text-align:center">
                                <a href="#" onclick="row_click(<?php echo  $message['PK_THREAD'];?>)"> <?php echo $message['C_LOGIN_NAME'];?> </a>                           
                            </td>
                            <td style="text-align:center"><?php echo $message['C_TITLE'];?></td>
                            <td style="text-align:center"><?php echo $message['C_CREATED_DATE'];?></td>
                        
                            </tr>
                         <?php endforeach;?>
                        <?php else:?>
                         <tr> 
                             <td style="color:red;text-align: center;font-weight: bold;"><?php echo "Chưa có trao dổi riêng nào được tạo"?></td>
                         </tr>
                        <?php endif;?>
                    </tbody>
                </table>
               
            </form>
        </div>
    </div>
<script type="text/javascript">
//    function dsp_create_new_topic(){
//        var f = document.frmMain;
//        m = $("#controller").val() + f.hdn_dsp_create_new_topic.value;
//        $("#frmMain").attr("action", m);
//        f.submit();
//        
//      
//    }
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