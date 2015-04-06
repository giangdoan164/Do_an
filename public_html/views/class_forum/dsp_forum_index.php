<?php ?>
<div style="background-color: #f1eff0" >
<div class="container" style="background-color: #fff">
             <h1>Diễn đàn trao đổi</h1>
             <form id="frmMain" name="frmMain" action="" method="post">
                 <?php 
                        
                        echo $this->hidden('controller',$this->get_controller_url());
                        echo $this->hidden('hdn_site_url',SITE_URL);
                        echo $this->hidden('hdn_dsp_forum_index','dsp_forum_index');
                        echo $this->hidden('hdn_dsp_all_topic','dsp_all_topic');
                        echo $this->hidden('hdn_dsp_single_topic','dsp_single_topic');
                 ?>
            <div class="row">
            <table class="table table-hover table-nomargin table-condensed table-bordered ">
                <thead>
                    <tr class="info">
                        <th style="width: 40%;text-align:center">Chuyên mục</th>
                        <th style="width: 40%;text-align:center">Chủ đề mới nhất</th>
                        <th style="width: 20%;text-align:center">Số lượng bài viết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arr_all_category as $cate_key => $category):?>
                        <tr>
                            <td class="category">
                                <a href="#" onclick="row_click(<?php echo $cate_key; ?>);"><?php   echo "+ ".$category['C_NAME'];  ?></a>
                            </td>
                            <td style="text-align:center"> 
                                <div id="public_title_new" class="title">
                                    <?php if(isset($arr_new_topic[$cate_key])):?>
                                    <?php echo $arr_new_topic[$cate_key]['C_TITLE'];?>
                                    <?php else:?>
                                    <?php echo "Không có chủ đề nào trong chuyên mục"?>
                                    <?php endif; ?>
                                </div>
                                <div id="public_user_name" class="user_name">
                                    <?php if(isset($arr_new_topic[$cate_key])): ?>
                                    <?php echo $arr_new_topic[$cate_key]['C_TITLE'];?>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td style="text-align:center;vertical-align:middle;">
                                <?php  if(isset($arr_count_topic[$cate_key])):?>
                                <?php echo $arr_count_topic[$cate_key]['POST_NUMBER'];?> 
                                <?php else:?>
                                <?php echo 0;?>
                                <?php endif;?>
                            </td>
                    </tr> 
                         
                    <?php endforeach;?>

                    </tr>
                </tbody>
            </table>

        </div>
     </form>
    </div>

</div>  
<script type="text/javascript">
    function row_click(id){
                    var topic = $('#frmMain #hdn_dsp_all_topic').val();
                    var m = $('#frmMain #controller').val() + topic + '/'+id;
                    $('#frmMain').attr('action',m);
                    $('#frmMain').submit();
                } 
</script>
