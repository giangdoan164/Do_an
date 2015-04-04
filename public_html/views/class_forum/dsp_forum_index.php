<?php 
echo __FILE__;
echo "<pre>";
print_r($arr_all_category);
echo "</pre>";
echo __LINE__;

?>
<div style="background-color: #f1eff0" >
<div class="container" style="background-color: #fff">
             <h1>Diễn đàn trao đổi</h1>
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
                    <?php for($i=0;$i<sizeof($arr_all_category);$i++):?>
                        <tr>
                            <td class="category">
                                <?php 
//                                   if($arr_new_topic[$i]['PK_CATEGORY'] == 1){echo " + Thông báo chung";}
//                                   elseif ($arr_new_topic[$i]['PK_CATEGORY'] == 2) {echo " + Góc học tập";}
//                                   else{
//                                       echo " +Góc kỷ luật";
                                          echo $arr_all_category[$i]['C_NAME'];
                                   
                                ?>
                            </td>
                            <td style="text-align:center"> 
                                <div id="public_title_new" class="title">
                                    <?php echo "<a href='#'>".$arr_new_topic[$i]['C_TITLE']."</a>";?>
                                </div>
                                <div id="public_user_name" class="user_name"><?php echo "By ".$arr_new_topic[$i]['C_NAME'] ;?></div>
                            </td>
                            <td style="text-align:center;vertical-align:middle;">
                                <?php echo $arr_count_topic[$i]['POST_NUMBER'];?>           
                            </td>
                    </tr> 
                         
                    <?php endfor;?>

                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>  
