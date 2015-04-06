<?php

 ?>
<div class="container-fluid" >
    <div class="row-fluid">
        <h1 class="page-header">Diễn đàn - Trao đổi</h1>
        <div class="main-wrapper" style="margin-left: 0px;">                    
            <form name="frmMain" id="frmMain" action="" method="POST" >
                <?php
                    if(isset($cate_id)){
                        echo $this->hidden('category_id',$cate_id);
                    }
                    echo $this->hidden('controller', $this->get_controller_url());
                    echo $this->hidden('hdn_dsp_forum_index','dsp_forum_index');
                    echo $this->hidden('hdn_dsp_all_topic','dsp_all_topic');
                    echo $this->hidden('hdn_dsp_single_topic','dsp_single_topic');
                    echo $this->hidden('hdn_dsp_create_new_topic','dsp_create_new_topic');
                ?>
                <div class='row' style='margin-bottom:19px;'>                        
                    <div class="col-md-5 col-md-offset-1">
                        <a href="#">Trang chủ>></a>                            
                    </div>     
                    <div class="col-md-1 col-md-offset-3">
                        <button class="btn btn-primary" onclick="dsp_create_new_topic();"> <span class="icon-plus">Chủ đề mới</span></button>
                    </div>
                </div>  
                <table class="table table-hover table-nomargin table-condensed ">
                    <thead>
                        <tr class="info">
                            <th style="width: 50%;text-align:center">Chủ  đề</th>
                            <th style="width: 20%;text-align:center">Post mới nhất </th>
                            <th style="width: 15%;text-align:center">Trả lời</th>
                            <th style="width: 15%;text-align:center">Lượt xem</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php if (sizeof($arr_all_topic) >0 ):?>
                        <?php foreach ($arr_all_topic as $topic) :?>
                        <tr>
                            <td style="text-align:center"><a href="#" onclick="row_click(<?php echo $topic['PK_TOPIC'];?>)"> <?php echo $topic['C_TITLE'];?> </a></td>
                            <td style="text-align:center"> 
                              <div id="public_title_new" class="title">
                                   <?php echo $topic['C_NAME']; ?>
                                </div>
                                <div id="public_user_name" class="user_name">
                                   <?php echo $topic['C_LATEST_DATE']; ?>
                                </div>
                            </th>
                            <td style="width: 15%;text-align:center"><?php echo $topic['C_POST_NUMBER'];?></td>
                            <td style="width: 15%;text-align:center"><?php echo $topic['C_VIEW_NUMBER'];?></td>   
                            </tr>
                         <?php endforeach;?>
                        <?php else:?>
                         <tr> 
                             <td style="color:red;text-align: center;font-weight: bold;"><?php echo "Không có bài viết nào trong chủ đề này"?></td>
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