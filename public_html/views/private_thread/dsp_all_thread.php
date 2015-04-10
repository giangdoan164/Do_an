<?php
echo __FILE__;
echo "<pre>";
print_r($arr_all_message);
echo "</pre>";
echo __LINE__;


 ?>
<div class="container-fluid" >
    <div class="row-fluid">
        <h1 class="page-header">Trao dổi riêng</h1>
        <div class="main-wrapper" style="margin-left: 0px;">                    
            <form name="frmMain" id="frmMain" action="" method="POST" >
                <?php
//                    if(isset($category_id)){
//                        echo $this->hidden('category_id',$category_id);
//                    }
                    echo $this->hidden('controller', $this->get_controller_url());
                    echo $this->hidden('hdn_dsp_all_thread','dsp_all_thread');
                    echo $this->hidden('hdn_dsp_single_topic','dsp_single_topic');
                    echo $this->hidden('hdn_dsp_create_new_topic','dsp_create_new_topic');
                ?>
                <div class='row' style='margin-bottom:19px;'>                        
                    <div class="col-md-4 col-md-offset-1">
                        <!--<a href="<?php // echo $this->get_controller_url().'dsp_forum_index';?>"><span class="glyphicon glyphicon-home"></span> &nbsp;Trang chủ</a>&nbsp;&gt;-->
                     <a href="<?php // echo $this->get_controller_url().'dsp_all_topic/'.$category_id;?>"><?php // echo $category_name ;?></a>           
                    </div>     
                    <div class="col-md-1 col-md-offset-3">
                        <button class="btn btn-primary" onclick="dsp_create_new_topic();"> <span class="icon-plus">Chủ đề mới</span></button>
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
    function dsp_create_new_topic(){
        var f = document.frmMain;
        m = $("#controller").val() + f.hdn_dsp_create_new_topic.value;
        $("#frmMain").attr("action", m);
        f.submit();
        
      
    }
  function row_click(id){
                    var topic = $('#frmMain #hdn_dsp_single_topic').val();
                    var m = $('#frmMain #controller').val() + topic + '/'+id;
                    $('#frmMain').attr('action',m);
                    $('#frmMain').submit();
  } 

</script>