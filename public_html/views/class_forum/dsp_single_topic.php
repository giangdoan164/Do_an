<?php
if (!empty($this->ckeditor_js)) {
    $js_files = "<script type='text/javascript' src='" . LIBS_URL . $this->ckeditor_js ."'></script>";
    echo $js_files;
}
$user_id = Session::get('user_id');

?>
 <form id="frmMain" name="frmMain" aciton="" method="POST">
<div class="container" >
    <div class="row">
        <h3 class="page-header">Diễn đàn trao đổi</h3>

        <div class="col-md-10 col-md-offset-1">
          
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
                echo $this->hidden('hdn_post_id','');
                echo $this->hidden('hdn_deleted_post_id','');
                ?>
                <div id="reference" style="margin-bottom: 10px;">
                    <a href="<?php echo $v_controller_url . 'dsp_forum_index'; ?>"><span class="glyphicon glyphicon-home"></span> &nbsp;Trang chủ</a> &gt;
                    <a href="<?php echo $v_controller_url . 'dsp_all_topic/' . $category_id; ?>"><?php echo $category_name; ?></a>  &nbsp;&gt;
                    <a href="<?php echo $v_controller_url . 'dsp_single_topic/' . $topic_id; ?>"> <?php echo $topic_name; ?> </a>
                </div>
            <div class="row" style="margin-bottom: 20px;">
              <div class="col-md-5 row">
                   <div class="form-group-sm" style="margin-left:20px; ">
                                <label for="sel_category" class="col-md-7 control-label ">Chuyển tới chuyên mục</label>
                                <div class="col-md-6  row">
                                    <select  class="form-control input-sm" id="sel_category" name="sel_category" onchange="jump_to_category(this);">
                                        <?php if(sizeof($arr_all_category)>0):?>
                                        <?php foreach ($arr_all_category as $key => $category): ?>
                                        <option value="<?php echo $key; ?>" <?php if($key ==$category_id){echo 'selected';} ?> ><?php echo $category['C_NAME'] ?> </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                         </div> 
                           
                       
                </div>
                  <?php if($user_id ==$arr_all_post[0]['C_CREATER_USER']): ?>
                <div class="col-md-2 col-md-offset-5" style="padding-left: 45px;">
                    <a href="#" onclick="btn_delete_topic_user(<?php echo $topic_id;?>)"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Đóng chủ đề</a>
                </div>
                    <?php endif;?>
            </div>
                <table class="table  table-condensed  " style="width: 100%">
                    <tbody>
                        <?php if (sizeof($arr_all_post) > 0): ?>
                            <?php foreach ($arr_all_post as $post) : ?>
                                <tr style="background-color: #EAEAEA;;color:#000000; ">
                                    <td class="well">
                                        <div class="col-md-7 ">   
                                        <span style='font-size: 15px;font-style: italic;'><?php echo $post['C_LOGIN_NAME'] ?></span>
                                        &gt; &gt;<?php echo date('d-m-Y h:m:s',  strtotime($post['C_POSTED_DATE'])); ?>
                                        </div>
                                        <div class="col-md-2 col-md-offset-3" style="border-left:1px solid #000000;text-align: right;"><?php echo "Bài viết  " .$post['C_POST_NUMBER'];?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id='post_content_<?php echo $post['PK_POST']; ?>' class="well">
                                        <div> 
                                        <?php echo html_entity_decode($post['C_CONTENT'], ENT_QUOTES, 'UTF-8'); ?>
                                         </div>
                                        <?php if($user_id==$post['C_POSTED_USER']):?>
                                       <p class='pull-right'>
                                           <a  href='#' data-toggle="modal" onclick="edit_post(<?php echo $post['PK_POST']; ?>)"><span>Sửa</span></a> &nbsp;&nbsp;&nbsp;
                                           <a  href='#' onclick="delete_post(<?php echo $post['PK_POST']; ?>)"><span>Xóa</span></a>&nbsp;&nbsp;
                                       </p>
                 
                                       <?php endif; ?>
                                    </td>
                                </tr>
                                <tr style='height:6px;border: none;margin-top: -10px;'><td>&nbsp;</td></tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>
                <div class="clear"></div>
                <div class="div_padding">
               <?php echo $this->paging_forum_new($arr_all_post);?>
                    </div>
                <div class="row">
                    <div class="col-md-2 ">
                        <a  class="btn btn-primary " id="btn_show" onclick="show_reply_div();"><span class='glyphicon glyphicon-pencil'></span>&nbsp;&nbsp;Trả lời</a>
                    </div>
                </div>
                <div id="reply_div" style="display: none">
              <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label for="txta_reply_content" class="control-label">Nội dung</label>
                            <textarea class="form-control" rows="3" id="txta_reply_content" name="txta_reply_content"></textarea>
                        </div>
                
                    <script type='text/javascript'>
                        CKEDITOR.replace('txta_reply_content');
//                        http://jsfiddle.net/cDzqp/
//                        CKEDITOR.instances.txta_reply_content.setData();
                    </script>
                </div>
               
                  
            </div>
                <div class="row">
                       <div class="col-md-1 col-md-offset-5">
                         <button class='btn btn-primary ' onclick="do_reply(<?php echo $user_id?>)"><span class='glyphicon glyphicon-saved'></span>&nbsp;&nbsp; Trả lời&nbsp; </button>
                    </div>
                       <div class="col-md-1 col-md-offset-1">
                           <button class='btn btn-success ' onclick="do_hide();"><span class='glyphicon glyphicon-remove'></span>&nbsp;Kết thúc</button>
                    </div>
                </div>     
            </div>
        </div>
    </div>
    </div>
     <div class="modal fade " id='edit_post' role="dialog"  data-backdrop="static" data-keyboard ='false' tabindex="-1" aria-label="Close" aria-hidden="false" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel">Nội dung thay đổi</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
                <div class="form-group">
                            <label for="txta_reply_content_update" class="control-label"></label>
                             <textarea class="form-control" rows="3" id="txta_reply_content_update" name="txta_reply_content_update"></textarea>
                        </div> 
                <script type='text/javascript'>
                  CKEDITOR.replace('txta_reply_content_update');
                </script>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="btn_edit_post_onclick();">Cập nhật</button>
            <button type="button" class="btn btn-default"  onclick='close_modal();'>Thoát</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
 </form>
  
<script type='text/javascript'>
    function btn_delete_topic_user(){
        var confirm_check = confirm("Bạn có chắc chắn muốn xóa chủ đề này?");
        if(confirm_check){
            var f = document.frmMain;
            m = $("#controller").val() +'delete_topic_user';
            $("#frmMain").attr("action", m);
            f.submit();
        }
    }
    function delete_post(post_id){
        var confirm_check = confirm("Bạn có chắc chắn muốn xóa bài viết này của mình ?");
        if(confirm_check){
            $('#frmMain #hdn_deleted_post_id').val(post_id);
            var f = document.frmMain;
            m = $("#controller").val() +'delele_post';
            $("#frmMain").attr("action", m);
            f.submit();
        }
    }
    function close_modal(){
         CKEDITOR.instances['txta_reply_content_update'].setData('');
         $('#edit_post').modal('hide');
    }
    function btn_edit_post_onclick(){
        var f = document.frmMain;
        m = $("#controller").val() +'update_post';
        $("#frmMain").attr("action", m);
        f.submit();
    }
    function edit_post(post_id){
        var post_content = $('#frmMain #post_content_'+post_id+' div').html();
         $('#frmMain #hdn_post_id').val(post_id);
        $('#frmMain #edit_post').modal();
//       CKEDITOR.instances.txta_reply_content_update.setData('');
         CKEDITOR.instances.txta_reply_content_update.insertHtml(post_content);
    }
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
     function do_hide(){
         $('#frmMain #btn_show').show();
         $('#frmMain #reply_div').fadeOut();
     }
     function btn_update_reply_onclick(){
         var url = '<?php echo $this->get_controller_url(); ?>dsp_update_reply';
        showPopWin(url, 1000, 550);
     }
      function jump_to_category(object){
       var category_id_jump_to  =$(object).val();
       var m = $('#frmMain #controller').val() +'dsp_all_topic/'+category_id_jump_to;
        $('#frmMain').attr('action', m);
        $('#frmMain').submit();
    }
</script>


