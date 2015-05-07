<?php


if (!empty($this->ckeditor_js)) {
    $js_files = "<script type='text/javascript' src='" . LIBS_URL . $this->ckeditor_js[0] . "'></script>";
    echo $js_files;
}
$v_controller_url = $this->get_controller_url();
$v_total = isset($arr_all_message[0]['C_TOTAL']) ? $arr_all_message[0]['C_TOTAL'] : 0;
$page_current = get_request_var('page',1);
?>
<div style="min-height: 600px;">
<div class="container" >
    <div class="row">
        <h2 class="page-header">Nội dung trao đổi riêng</h2>
        <div class="col-md-10 col-md-offset-1">
            <form id="frmMain" name="frmMain" aciton="" method="POST">
                <?php
                echo $this->hidden('page',1);
                echo $this->hidden('thread_id', $thread_id);
                echo $this->hidden('controller',$v_controller_url);
                echo $this->hidden('hdn_reply', 'create_reply_to_thread');
                echo $this->hidden('hdn_dsp_single_thread','dsp_single_thread');
                ?>
                <div  style="margin-bottom: 10px;">
                    <a href="<?php echo $v_controller_url . 'dsp_all_thread'; ?>"><span class="glyphicon glyphicon-home"></span>&nbsp;Trao đổi riêng tư</a>&nbsp;&nbsp;&gt;&gt;
                    <?php echo $arr_all_message[0]['C_TITLE'];?>
                </div>
                <table class="table table-hover table-nomargin table-condensed table-bordered " style="width: 100%">
                    <tbody>
                        <?php if (sizeof($arr_all_message) > 0): ?>
                            <?php foreach ($arr_all_message as $message) : ?>
                            <tr style="background-color: #EAEAEA;;color:#000000; ">
                                <td>
                                    <div class="col-md-7 ">   
                                        <span style="font-size: 15px;font-style: italic;"> <?php echo $message['C_LOGIN_NAME'] ?></span>
                                        &gt; &gt;<?php echo date('m-d-Y H:i:s',  strtotime($message['C_SENT_DATE']));  ?>                                     
                                    </div>
                                </td>
                            </tr>     
                            <tr ><td><p><?php echo html_entity_decode($message['C_CONTENT'], ENT_QUOTES, 'UTF-8'); ?></p></td></tr>
                               
                            <?php endforeach; ?>
                                <?php else:?>
                                <tr><td><?php echo "Không có tin nhắn nào";?></td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="div_padding col-md-4 col-md-offset-8">
                       <?php echo $this->paging_forum($v_total, $page_current, 5); ?>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-1">
                         <a  class="btn btn-primary " id="btn_show" onclick="show_reply_div();"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Trả lời</a>
                    </div>
                    
                   
                </div>
              
                <!--hop thoai tra loi-->
                <div id="reply_div" style="display: none">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label for="txta_reply_content" class="control-label">Nội dung tin nhắn trả lời</label>
                                <textarea class="form-control" rows="3" id="txta_reply_content" name="txta_reply_content"></textarea>
                            </div>
                        <script type='text/javascript'>
                            CKEDITOR.replace('txta_reply_content');
                        </script>
                    </div>
                 
                </div>
                <div class="row">
                       <div class="col-md-3 col-md-offset-7"> &nbsp; 
                           <button class='btn btn-primary' onclick="do_reply()"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;&nbsp;Trả lời</button>
                           &nbsp;&nbsp;&nbsp;&nbsp;
                           <button class='btn btn-success ' onclick="do_hide();"><span class='glyphicon glyphicon-remove'></span>&nbsp;Kết thúc</button>
                   
                       </div>
                  
                   
                          
                </div>
                </div>
                 
           
            </div>
               </form>
        </div>
    </div>
    </div>
</div>

<script type='text/javascript'>
     function do_reply(){
            var data = CKEDITOR.instances.txta_reply_content.getData();
            if(data.trim()==''){alert("Nhập nội dung trả lời");return false;}
            {
                   var f = document.frmMain;
                    m = $("#controller").val() + f.hdn_reply.value;
                    $("#frmMain").attr("action", m);
                    f.submit();
            }
     
     }
     function show_reply_div(){
         $('#frmMain #btn_show').hide();
         $('#frmMain #reply_div').slideDown(500);
     }
     
    $(function(){
        $('.div_padding ul.ul_pagination li').click(function(){
            $(this).siblings().removeClass('active').end().addClass('active');
            var page = $(this).find('a').attr('num_page') || 0;
            $('#frmMain #page').val(page);
            var  f = document.frmMain;
            var single_url = f.hdn_dsp_single_thread.value;
            var m = $('#frmMain #controller').val() + single_url +'/'+f.thread_id.value;
            $('#frmMain').attr('action',m);
            f.submit();
            });

    });
      function do_hide(){
         $('#frmMain #btn_show').show();
         $('#frmMain #reply_div').fadeOut();
     }
</script>


