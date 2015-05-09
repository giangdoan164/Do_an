<?php 

$role = Session::get('level');
?>
<div class="container" >
    <div class="row">
        <h2 class="page-header" style="color: #3E3E3E;margin: 5px;">Diễn đàn - Trao đổi</h2>  
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
?>
                <div class='row'style="margin-top:10px;" >                        
                    <div class="col-md-4">
                        <a href="<?php echo $this->get_controller_url() . 'dsp_forum_index'; ?>"><span class="glyphicon glyphicon-home"></span> &nbsp;Trang chủ</a>&nbsp;&gt;
                        <a href="<?php echo $this->get_controller_url() . 'dsp_all_topic/' . $category_id; ?>"><?php echo $category_name; ?></a>           
                    </div>  
                    <div class='col-md-4 col-md-offset-4' style='text-align: right'>
                          <?php if($role == 3):?>
                        <a href="#" onclick="dsp_admin_dasboard();"><span class="glyphicon glyphicon-user"  ></span> Quản trị điễn đàn</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php endif;?>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                            <a onclick="dsp_create_new_topic();"> <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tạo mới chủ đề</a>
                  
                    </div>
                    </div>
                </div>  
                   <div class="row-fluid" id="search" style="margin-top: 20px ;padding-bottom: 25px;">
                    <div class="col-md-4 "> 
                            <div class="form-group">
                                <label for="sel_time" class="col-md-6 control-label">Hiển thị theo thời gian</label>
                                <div class="col-md-6">
                                    <select  class="form-control" id="sel_time" name="sel_time">
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
                    <div class="col-md-7">
                        <div class="row">
                            <div class="form-group">
                                <label for="sel_category" class="col-md-2 control-label ">Sắp xếp chủ đề theo</label>
                                <div class="col-md-5">
                                    <select  class="form-control " id="sel_category" name="sel_category">
                                        <option value="1" <?php if($sel_category==1){echo 'selected';}?>>Thời gian tạo </option>
                                        <option value="2" <?php if($sel_category==2){echo 'selected';}?>>Số lượng trả lời</option>
                                        <option value="3" <?php if($sel_category==3){echo 'selected';}?>>Số lượng xem</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select  class="form-control " id="sel_type" name="sel_type">
                                        <option value="1" <?php if($sel_type==1){echo 'selected';}?>>Thứ tự giảm dần</option>
                                        <option value="2" <?php if($sel_type==2){echo 'selected';}?>>Thứ tự tăng dần</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1" style='text-align: right'>
                        <div class="row">
                            <button type="button" class="btn btn-success  " onclick="btn_filter_onclick();" name="btn_filter">
                                <i class="glyphicon glyphicon-search"></i>  &nbsp;  Lọc
                            </button>
                        </div>
                    </div>   
                </div>
              
        <div style="min-height: 20px;">&nbsp;</div>
                <table class="table table-hover table-nomargin table-condensed ">
                    <thead>
                        <tr class="forum_head">
                            <th style="width: 50%;text-align:center">Chủ  đề</th>
                            <th style="width: 20%;text-align:center">Post mới nhất </th>
                            <th style="width: 15%;text-align:center">Trả lời</th>
                            <th style="width: 15%;text-align:center">Lượt xem</th>
                        </tr>
                    </thead>
                    <tbody >     
                        <?php if (sizeof($arr_all_topic) > 0): ?>
                            <?php foreach ($arr_all_topic as $topic) : ?>
                                <tr>
                                  
                                    <td style="padding-left: 34px;">
                                        <span style="font-size: 20px;"> <a href="#" style="color: #2CA25E;" onclick="row_click(<?php echo $topic['PK_TOPIC']; ?>)"> <?php echo $topic['C_TITLE']; ?> </a></span> 
                                        <div class="title"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tạo bởi&nbsp;</span>
                                          <?php foreach ($arr_user_class as $user): ?>
                                             <span >
                                              <?php if($user['PK_USER'] ==$topic['C_CREATER_USER']){echo $user['C_NAME'];}?> 
                                            </span>
                                        <?php endforeach;?>
                                            <span style="font-style:italic;color: #C3372D;" ><?php echo date('d-m-Y H:i:s',  strtotime($topic['C_CREATED_DATE'])) ;?></span>
                                            </div>
                                    </td>
                                    <td style="text-align:center"> 
                                        <div id="public_title_new" class="title">
                                            <?php echo $topic['C_NAME']; ?>
                                            
                                        </div>
                                        <div id="public_user_name" class="user_name">
                                            <span style='color: #C3372D'>  <?php echo date('d-m-Y H:i:s',  strtotime($topic['C_LATEST_DATE'])) ;?></span> 
                                        </div>
                                        </th>
                                    <td style="width: 15%;text-align:center"><?php echo $topic['C_POST_NUMBER']; ?></td>
                                    <td style="width: 15%;text-align:center"><?php echo $topic['C_VIEW_NUMBER']; ?></td>   
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr> 
                                <td colspan="4" style="color:red;text-align: center;font-weight: bold;"><?php echo "Không có bài viết nào trong chủ đề này" ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class='row-fluid' style='border-bottom: 1px solid #CE4B27'></div>
                <div id="paging" style="margin-top:10px;" class="row-fluid">
                    <div class="col-md-6">
                         <div class="form-group-sm">
                                <label for="sel_category" class="col-md-4 control-label ">Chuyển tới chuyên mục</label>
                                <div class="col-md-4">
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
                    <?php echo $this->paging2($arr_all_topic); ?>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function dsp_admin_dasboard(){
        var f = document.frmMain;
        m = $("#controller").val() +'dsp_admin_forum_dasboard';
        $("#frmMain").attr("action", m);
        f.submit();
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
         var m = $('#frmMain #controller').val() +'dsp_all_topic/' +$('#frmMain #category_id').val();
        $('#frmMain').attr('action', m);
        $('#frmMain').submit();
    }
    
    function jump_to_category(object){
       var category_id_jump_to  =$(object).val();
       var m = $('#frmMain #controller').val() +'dsp_all_topic/'+category_id_jump_to;
        $('#frmMain').attr('action', m);
        $('#frmMain').submit();
    }

</script>