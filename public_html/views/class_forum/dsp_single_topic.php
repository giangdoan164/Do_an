<?php
if (!empty($this->ckeditor_js)) {
    $js_files = "<script type='text/javascript' src='" . LIBS_URL . $this->ckeditor_js . "'></script>";
    echo $js_files;
}

$user_id = Session::get('user_id');

?>
<div style="min-height: 600px;">
<div class="container" >
    <div class="row">
        <h3 class="page-header">Diễn đàn trao đổi</h3>

        <div class="col-md-10 col-md-offset-1">
            <form id="frmMain" name="frmMain" aciton="" method="POST">
                <?php
                if (isset($category_id)) {
                    echo $this->hidden('category_id', $category_id);
                }
                $v_controller_url = $this->get_controller_url();
                echo $this->hidden('controller', $v_controller_url);
                echo $this->hidden('hdn_topic_id',$topic_id);
                echo $this->hidden('hdn_dsp_forum_index', 'dsp_forum_index');
                echo $this->hidden('hdn_dsp_all_topic', 'dsp_all_topic');
                echo $this->hidden('hdn_dsp_single_topic', 'dsp_single_topic');
                echo $this->hidden('hdn_create_new_topic', 'do_create_new_topic');
                echo $this->hidden('hdn_reply', 'reply_topic');
                ?>
                <div id="reference" style="margin-bottom: 10px;">
                    <a href="<?php echo $v_controller_url . 'dsp_forum_index'; ?>"><span class="glyphicon glyphicon-home"></span> &nbsp;Trang chủ</a> &gt;
                    <a href="<?php echo $v_controller_url . 'dsp_all_topic/' . $category_id; ?>"><?php echo $category_name; ?></a>  &nbsp;&gt;
                    <a href="<?php echo $v_controller_url . 'dsp_single_topic/' . $topic_id; ?>"> <?php echo $topic_name; ?> </a>
                </div>
                <table class="table table-hover table-nomargin table-condensed table-bordered " style="width: 100%">
                    <tbody>
                        <?php if (sizeof($arr_all_post) > 0): ?>
                            <?php foreach ($arr_all_post as $post) : ?>
                                <tr style="background: blue;color:white">
                                    <td>
                                        <div class="col-md-2 "><?php echo $post['C_POSTED_DATE'] ?></div>
                                        <div class="col-md-1 col-md-offset-9" style="border-left:1px solid #0480be;"><?php echo "Bài viết" .$post['C_POST_NUMBER'];?></div>
                                    </td>
                                </tr>
                                <tr><td style="background-color: #9999ff;color:white;"><?php echo $post['C_LOGIN_NAME'] ?></td></tr>
                                <tr style="background-color:#ffffcc ;"><td>Re <?php echo $post['C_TITLE']; ?></td></tr>

                                <tr ><td><?php echo html_entity_decode($post['C_CONTENT'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-1 col-md-offset-8">
                        <a  class="btn btn-info" id="btn_show" onclick="show_reply_div();">Trả lời</a>
                    </div>
                </div>
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
                         <button class='btn btn-primary' onclick="do_reply(<?php echo $user_id?>)">Trả lời</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
</div>

<script type='text/javascript'>
     function do_reply(id){
        var f = document.frmMain;
        m = $("#controller").val() + f.hdn_reply.value+'/'+id;
        $("#frmMain").attr("action", m);
        f.submit();
     }
     function show_reply_div(){
         $('#frmMain #btn_show').hide();
         $('#frmMain #reply_div').fadeIn();
     }
</script>


