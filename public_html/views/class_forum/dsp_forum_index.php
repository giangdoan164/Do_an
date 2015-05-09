<?php ?>

<div class="container">
    <div class='row'>
        <h2 class='page-header' >Diễn đàn trao đổi</h2>  
    </div>


    <div class="row">
        <form id="frmMain" name="frmMain" action="" method="post">
<?php
echo $this->hidden('controller', $this->get_controller_url());
echo $this->hidden('hdn_site_url', SITE_URL);
echo $this->hidden('hdn_dsp_forum_index', 'dsp_forum_index');
echo $this->hidden('hdn_dsp_all_topic', 'dsp_all_topic');
echo $this->hidden('hdn_dsp_single_topic', 'dsp_single_topic');
?>
            <table class="table table-hover table-nomargin table-condensed  ">
                <thead>
                    <tr class="forum_head">
                        <th style="width: 25%;text-align:center">Chuyên mục</th>
                        <th style="width: 35%;text-align:center">Chủ đề mới nhất</th>
                        <th style="width: 20%;text-align:center">Số lượng chủ đề</th>
                        <th style="width: 20%;text-align:center">Số lượng bài viết</th>
                    </tr>
                </thead>
                <tbody>
<?php foreach ($arr_all_category as $cate_key => $category): ?>
                        <tr >
                            <td class="category">
                                <div style="display: inline-block;">
                                    <span style="font-size: 15px;"><a href="#" onclick="row_click(<?php echo $cate_key; ?>);" style="text-decoration:none; ">&nbsp;&nbsp;
<!--                                            <span class="glyphicon glyphicon-arrow-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;-->
                                            <img  src="<?php echo PUBLIC_URL.'images/forum_comment.png';?>" style="background-color: none;width:35px;">&nbsp;&nbsp;
                                <?php echo $category['C_NAME']; ?>
                                            <!--<br/>Mô tả chủ đề ....-->
                                        </a></span>
                                </div>
                            </td>
                            <td style=""> 
                                <div id="public_title_new" class="title">
                            <?php if (isset($arr_new_topic[$cate_key])): ?>
                                <?php echo $arr_new_topic[$cate_key]['C_TITLE']; ?>
                                    <?php else: ?>
                                        <?php echo "Không có chủ đề nào trong chuyên mục" ?>
                                    <?php endif; ?>
                                </div>
                                    <?php if (isset($arr_new_topic[$cate_key])): ?>
                                    <div id="public_user_name" class="user_name" style='color:#CE4B27'>Người gửi  &nbsp;
                                    <?php echo $arr_new_topic[$cate_key]['C_NAME']; ?>
                                        <br/>
                                        <div style="color:blue;">
                                        <?php echo date('d-m-Y H:i:s',strtotime($arr_new_topic[$cate_key]['C_LATEST_DATE']));?>
                                        </div>

                                    </div>
                                        <?php endif; ?>
                            </td>
                            <td style="text-align:center;vertical-align:middle;">
                                <?php if (isset($arr_count_topic[$cate_key])): ?>
                                    <?php echo $arr_count_topic[$cate_key]['POST_NUMBER']; ?> 
                                <?php else: ?>
                                    <?php echo 0; ?>
                                <?php endif; ?>
                            </td>
                            <td style="text-align:center;vertical-align:middle;">
                                <?php if (isset($arr_count_post[$cate_key])): ?>
        <?php echo $arr_count_post[$cate_key]['POST_NUMBER']; ?> 
                                <?php else: ?>
                                    <?php echo 0; ?>
                                <?php endif; ?>
                            </td>
                        </tr> 

<?php endforeach; ?>

                    </tr>
                </tbody>
            </table>

    </div>
</form>
</div>


<script type="text/javascript">
    function row_click(id) {
        var topic = $('#frmMain #hdn_dsp_all_topic').val();
        var m = $('#frmMain #controller').val() + topic + '/' + id;
        $('#frmMain').attr('action', m);
        $('#frmMain').submit();
    }
</script>
