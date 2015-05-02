<?php


?>
<div class="container" >
    <div class="row">
        <h2 class="page-header" style="color: #3E3E3E;margin: 5px;">Quản trị diễn đàn</h2>  
        <div class="main-wrapper" style="margin-left: 0px;">                    
            <form name="frmMain" id="frmMain" action="" method="POST" >
<?php
if (isset($category_id)) {
    echo $this->hidden('category_id', $category_id);
}
echo $this->hidden('controller', $this->get_controller_url());
echo $this->hidden('hdn_dsp_forum_index', 'dsp_forum_index');
echo $this->hidden('hdn_dsp_all_topic', 'dsp_all_topic');
echo $this->hidden('hdn_dsp_single_topic', 'dsp_single_topic');
echo $this->hidden('hdn_dsp_create_new_topic', 'dsp_create_new_topic');
echo $this->hidden('hdn_item_id_list', '');
echo $this->hidden('hdn_update_post_delete','admin_delete_post');
//echo $this->hidden('')
?>
                <div class='row'style="margin-top:10px;" >                        
                    <div class="col-md-4">
                        <a href="<?php echo $this->get_controller_url() . 'dsp_forum_index'; ?>"><span class="glyphicon glyphicon-home"></span> &nbsp;Trang chủ</a>&nbsp;&gt;
                        <a href="<?php echo $this->get_controller_url() . 'dsp_all_topic/' . $category_id; ?>"><?php echo $category_name; ?></a>           
                    </div>     
                </div>  
                   <div class="row" id="search" style="margin-top:20px;margin-bottom: 10px;padding-bottom: 10px;">
                    <div class="col-md-4 col-md-offset-1"> 
                        <div class="row">
                            <div class="form-group">
                                <label for="sel_time" class="col-md-6 control-label">Hiển thị theo thời gian</label>
                                <div class="col-md-6">
                                    <select  class="form-control input-sm" id="sel_time" name="sel_time">
                                        <option value="1" <?php if($sel_time=='1'){echo 'selected';}?>>Từ lúc bắt đầu</option>
                                        <option value="2" <?php if($sel_time=='2'){echo 'selected';}?>>1 ngày trước</option>
                                        <option value="3" <?php if($sel_time=='3'){echo 'selected';}?> >3 ngày trước</option>
                                        <option value="4" <?php if($sel_time=='4'){echo 'selected';}?>>1 tuần trước</option>
                                        <option value="5" <?php if($sel_time=='5'){echo 'selected';}?>>2 tuần trước</option>
                                        <option value="6" <?php if($sel_time=='6'){echo 'selected';}?>>1 tháng trước</option>
                                        <option value="7" <?php if($sel_time=='7'){echo 'selected';}?>>2 tháng trước</option>
                                        <option value="8" <?php if($sel_time=='8'){echo 'selected';}?>>3 tháng trước</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="form-group">
                                <label for="sel_category" class="col-md-4 control-label ">Sắp xếp chủ đề theo</label>
                                <div class="col-md-4">
                                    <select  class="form-control input-sm" id="sel_category" name="sel_category">
                                        <option value="1" <?php if($sel_category==1){echo 'selected';}?>>Thời gian tạo </option>
                                        <option value="2" <?php if($sel_category==2){echo 'selected';}?>>Số lượng trả lời</option>
                                        <option value="3" <?php if($sel_category==3){echo 'selected';}?>>Số lượng xem</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select  class="form-control input-sm" id="sel_type" name="sel_type">
                                        <option value="1" <?php if($sel_type==1){echo 'selected';}?>>Thứ tự giảm dần</option>
                                        <option value="2" <?php if($sel_type==2){echo 'selected';}?>>Thứ tự tăng dần</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="row">
                            <button type="button" class="btn btn-success btn-sm " onclick="btn_filter_onclick();" name="btn_filter">
                                <i class="glyphicon glyphicon-search"></i>  &nbsp;  Lọc
                            </button>
                        </div>
                    </div>   
                </div>
                <div class="row" style="margin-top: 20px;margin-bottom: 20px;">
                        <div class="row-fluid">
                            <div class="col-md-3 ">
                                    <a href="#" onclick="admin_del_post();"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Xóa chủ đề</a>
                                    &nbsp;&nbsp;
                                    <a href="#" onclick="admin_update_category();"><span class="glyphicon glyphicon-share-alt" ></span>&nbsp;&nbsp;Chuyển chủ đề</a>
                            </div>
                             <div class="col-md-2">
                                <?php if(sizeof($arr_category) >0):?>
                                       <select  class="form-control input-sm" id="sel_category_topic" name="sel_category_topic">
                                           <option value="0">--Chọn loại chủ đề--</option>
                                           <?php foreach ($arr_category as $key => $category): ?>
                                           <?php if($key != $category_id): ?>
                                                     <option value="<?php echo $key; ?>"><?php echo $category['C_NAME']; ?></option>
                                           <?php  endif; ?>
                                           <?php endforeach;?>
                                       </select>
                                <?php endif;?>
                             </div>
                              
                        </div>
                       
                    </div>
                </div>
                <table class="table table-hover table-nomargin table-condensed ">
                    <thead>
                        <tr class="forum_head">
                            <th style="width: 5%;text-align:center">
                                         <input type="checkbox"  name="chk_check_all" rel="checkall" data-target=".chk"  onclick="toggle_check_all(this, this.form.chk);">                                               
                              </th>
                            <th style="width: 45%;text-align:center">Chủ  đề</th>
                            <th style="width: 20%;text-align:center">Post mới nhất </th>
                            <th style="width: 15%;text-align:center">Trả lời</th>
                            <th style="width: 15%;text-align:center">Lượt xem</th>
                        </tr>
                    </thead>
                    <tbody >     
                        <?php if (sizeof($arr_all_topic) > 0): ?>
                            <?php foreach ($arr_all_topic as $topic) : ?>
                                <tr>
                                    <td style="text-align:center">
                                                <input type="checkbox" name="chk"  value="<?php echo $topic['PK_TOPIC']; ?>" onclick="if (!this.checked) this.form.chk_check_all.checked=false;">                 
                                    </td>
                                    <td style="text-align:center">
                                        <span style="font-size: 20px;"> <a href="#" onclick="row_click(<?php echo $topic['PK_TOPIC']; ?>)"> <?php echo $topic['C_TITLE']; ?> </a></span> 
                                        <div class="title"><span>Tạo bởi&nbsp;</span>
                                          <?php foreach ($arr_user_class as $user): ?>
                                             <span >
                                              <?php if($user['PK_USER'] ==$topic['C_CREATER_USER']){echo $user['C_NAME'];}?> 
                                            </span>
                                        <?php endforeach;?>
                                            <span style="font-style:italic;color: red;" ><?php echo date('d-m-Y H:i:s',  strtotime($topic['C_CREATED_DATE'])) ;?></span>
                                            </div>
                                    </td>
                                    <td style="text-align:center"> 
                                        <div id="public_title_new" class="title">
                                            <?php echo $topic['C_NAME']; ?>
                                            
                                        </div>
                                        <div id="public_user_name" class="user_name">
                                            <?php echo date('d-m-Y H:i:s',  strtotime($topic['C_LATEST_DATE'])) ;?>
                                        </div>
                                        </th>
                                    <td style="width: 15%;text-align:center"><?php echo $topic['C_POST_NUMBER']; ?></td>
                                    <td style="width: 15%;text-align:center"><?php echo $topic['C_VIEW_NUMBER']; ?></td>   
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr> 
                                <td  colspan="5" style="color:red;text-align: center;font-weight: bold;"><?php echo "Không có bài viết nào trong chủ đề này" ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
             
                <div id="paging" style="margin: 10 10px;">
                    <?php echo $this->paging2($arr_all_topic); ?>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function admin_update_category(){
        var topic_type = $('#frmMain #sel_category_topic').val();
        if(topic_type == 0){
            alert("Chọn loại chủ đề mới");
            return false;
        }
          var set_value =set_value_chk();
         if(set_value){
             
            if(confirm("Cập nhật các chủ đề đã chọn")){
                var f = document.frmMain;
                m = $("#controller").val() +'admin_update_category' ;
                $("#frmMain").attr("action", m);
                f.submit();
            }
         }
    }
    function admin_del_post(){
        var set_value =set_value_chk();
         if(set_value){
            if(confirm("Xóa các chủ đề đã chọn")){
                var f = document.frmMain;
                m = $("#controller").val() +'admin_delete_post' ;
                $("#frmMain").attr("action", m);
                f.submit();
            }
         }
        
       
    }
    function dsp_create_new_topic() {
        var f = document.frmMain;
        m = $("#controller").val() + f.hdn_dsp_create_new_topic.value;
        $("#frmMain").attr("action", m);
        f.submit();
    }
    function row_click(id) {
        var topic = $('#frmMain #hdn_dsp_single_topic').val();
        var m = $('#frmMain #controller').val() + topic + '/' + id;
        $('#frmMain').attr('action', m);
        $('#frmMain').submit();
    }
    
    function btn_filter_onclick(){
         var m = $('#frmMain #controller').val() +'dsp_admin_forum_dasboard' ;
        $('#frmMain').attr('action', m);
        $('#frmMain').submit();
    }

</script>