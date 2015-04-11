<?php
if (!empty($this->ckeditor_js)) {
    $js_files = "<script type='text/javascript' src='" . LIBS_URL . $this->ckeditor_js . "'></script>";
    echo $js_files;
}
$v_controller_url = $this->get_controller_url();
$v_total = isset($arr_all_message[0]['C_TOTAL']) ? $arr_all_message[0]['C_TOTAL'] : 0;
$page_current = get_request_var('page',1);
?>
<div style="min-height: 600px;">
<div class="container" >
    <div class="row">
        <h3 class="page-header">Diễn đàn trao đổi</h3>

        <div class="col-md-10 col-md-offset-1">
            <form id="frmMain" name="frmMain" aciton="" method="POST">
                <?php
                echo $this->hidden('page',1);
                echo $this->hidden('thread_id', $thread_id);
                echo $this->hidden('controller',$v_controller_url);
                echo $this->hidden('hdn_reply', 'create_reply_to_thread');
                echo $this->hidden('hdn_dsp_single_thread','dsp_single_thread');
                ?>
                <div id="reference" style="margin-bottom: 10px;">
                    <a href="<?php echo $v_controller_url . 'dsp_all_thread'; ?>"><span class="glyphicon glyphicon-home"></span> &nbsp;Trang chủ</a>
                    
                </div>
                <table class="table table-hover table-nomargin table-condensed table-bordered " style="width: 100%">
                    <tbody>
                        <?php if (sizeof($arr_all_message) > 0): ?>
                            <?php foreach ($arr_all_message as $message) : ?>
                                <tr style="background: blue;color:white">
                                    <td>
                                        <div class="col-md-5 "><?php echo $message['C_SENT_DATE'] ?></div>
                                    </td>
                                </tr>
                                <tr><td style="background-color: #9999ff;color:white;"><?php echo $message['C_LOGIN_NAME'] ?></td></tr>
                                <tr style="background-color:#ffffcc ;"><td>Re <?php echo $message['C_TITLE']; ?></td></tr>
                                <tr ><td><?php echo html_entity_decode($message['C_CONTENT'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                            <?php endforeach; ?>
                                <?php else:?>
                                <tr><td><?php echo "khong co tin nhan nao";?></td></tr>
                        <?php endif; ?>
                         <?php echo $this->render_rows(count($arr_all_message),1,5); ?>
                    </tbody>
                </table>
                <div class="row">
                     <div class="col-md-2 col-md-offset-1">
                        <a  class="btn btn-info" id="btn_show" onclick="show_reply_div();">Trả lời</a>
                    </div>
                    <div class="div_padding col-md-4 col-md-offset-5">
                       <?php echo $this->paging_forum($v_total, $page_current, 5); ?>
                    </div>
                   
                </div>
              
                <!--hop thoai tra loi-->
                <div id="reply_div" style="display: none">
                <div class="row">
                    <div class="col-md-8 col-md-offset-1">
                            <div class="form-group">
                                <label for="txta_reply_content" class="control-label">Nội dung</label>
                                <textarea class="form-control" rows="3" id="txta_reply_content" name="txta_reply_content"></textarea>
                            </div>

                        <script type='text/javascript'>
                            CKEDITOR.replace('txta_reply_content');
                        </script>
                    </div>
                 
                </div>
                <div class="row">
                       <div class="col-md-1 col-md-offset-8">
                         <button class='btn btn-primary' onclick="do_reply()">Trả lời</button>
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
        var f = document.frmMain;
        m = $("#controller").val() + f.hdn_reply.value;
        $("#frmMain").attr("action", m);
        f.submit();
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
</script>


