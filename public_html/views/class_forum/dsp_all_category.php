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
                    <?php for($i=0;$i<=2;$i++):?>
                        <tr>
                            <td class="category">
                                <?php 
                                   if($arr_result[$i]['FK_CATEGORY'] == 1){echo " + Thông báo chung";}
                                   elseif ($arr_result[$i]['FK_CATEGORY'] == 2) {echo " + Góc học tập";}
                                   else{
                                       echo " +Góc kỷ luật";
                                   }
                                ?>
                            </td>
                            <td style="text-align:center"> 
                                <div id="public_title_new" class="title">
                                    <?php echo "<a href='#'>".$arr_result[$i]['C_TITLE']."</a>";?>
                                </div>
                                <div id="public_user_name" class="user_name"><?php echo "By ".$arr_result[$i]['C_NAME'] ;?></div>
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
