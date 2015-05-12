<?php 
       $role = Session::get('level');

?>
<style type='text/css'>
    .col-md-4{
        margin-bottom: 30px;
    }
    .hover{
        border: 5px solid #000000;
        opacity: 0.9;
        /*font-size: 23px;*/
    }
    div.function   a{
        height: 130px;
        display: block;
        text-decoration: none;
        cursor: pointer;

    }
    div.function {
        height: 130px;
        width: 89%;
    }
    .widge1{
        margin: 0px auto;
        width: 125px;
        height: 90px;
        display: block;
        
        font-size: 50px;
        text-align: center;
        line-height: 50px;
        padding: 5px 5px 0 10px;
        color:#fff;
    }
    .widge2{
        font-size: 15px;
        text-transform: uppercase;
        color:#fff;
        padding: 0px 10px 0px 10px;
    }
</style>

<div class="container">
    <h2 class='page-header' >Trang chủ</h2>
    <div class='row-fluid' style='margin-top: 50px;padding-left: 90px;'>
            <?php if ($role == 3 || $role == 1): ?>
         <div class='col-md-4 col-sm-4'>
            <div class='function' style="background: #CE4B27;">
                <a  href="<?php echo SITE_URL; ?>parent_student">
                    <span class="widge1 glyphicon glyphicon-user"></span>
                    <span class="widge2">Quản lý danh sách liên lạc</span>
                </a>
            </div>
        </div>
        <?php endif;?>
          <?php if ($role == 1): ?>
        <div class='col-md-4 col-sm-4'>
            <div class='function' style="background: #F4BD0E;">
                <a href="<?php echo SITE_URL; ?>class_grade">
              
                    <span class="widge1 glyphicon glyphicon-book" ></span>
                    <span class="widge2">Quản lý lớp học</span>
                </a>
            </div>
        </div>
        <div class='col-md-4 col-sm-4'>
            <div class='function' style="background: #5B3AB6;">
                <a href="<?php echo SITE_URL; ?>teacher">
                    <span class="widge1 glyphicon glyphicon-user"></span>
                    <span class="widge2">Quản lý giáo viên</span>
                </a>
            </div>
        </div>
             <div class='col-md-4 col-sm-4'>
            <div class='function' style="background: #A05000;">
                <a href="<?php echo SITE_URL; ?>category">
                    <span class="widge1 glyphicon glyphicon-tags"></span>
                    <span class="widge2">Quản lý chuyên mục</span>
                </a>
            </div>
        </div>
         <div class='col-md-4 col-sm-4'>
            <div class='function' style="background: #8FC238;">
                <a href="<?php echo SITE_URL; ?>school_year_config">
                    <span class="widge1 glyphicon glyphicon-cog"></span>
                    <span class="widge2">Quản trị hệ thống</span>
                </a>
            </div>
        </div>
        <?php endif?>
      
          <?php if ($role == 3 || $role == 2 || $role == 4): ?>
           <div class='col-md-4 col-sm-4'>
            <div class='function' style="background: #00A300;">
                <a href="<?php echo SITE_URL; ?>announce">
                    <span class="widge1 glyphicon glyphicon-volume-up"></span>
                    <span class="widge2">Quản lý thông báo</span>
                </a>
            </div>
        </div>
        <?php endif;?>
         <?php if ($role == 3 || $role == 4): ?>
          <div class='col-md-4 col-sm-4'>
            <div class='function' style="background: #A300AA;">
                <a href="<?php echo SITE_URL; ?>private_thread">
                    <span class="widge1  glyphicon glyphicon-comment"></span>
                    <span class="widge2">Trao đổi riêng</span>
                </a>
            </div>
        </div>
        <div class='col-md-4 col-sm-4'>
            <div class='function' style="background: #0093A8;">
                <a href="<?php echo SITE_URL; ?>school_report">
                    <span class="widge1 glyphicon glyphicon-folder-open"></span>
                    <span class="widge2">Quản lý học bạ</span>
                </a>
            </div>
        </div>
   
        
        <div class='col-md-4 col-sm-4'>
            <div class='function' style="background: #E88A05;">
                <a href="<?php echo SITE_URL; ?>class_forum">
                    <span class="widge1 glyphicon glyphicon-home"></span>
                    <span class="widge2">Trao đổi diễn đàn</span>
                </a>
            </div>
        </div>
       <?php endif;?>
       
       
    </div>
</div>
<script type='text/javascript'>
    $("div.function a").hover(
            function() {
                $(this).addClass("hover");
            },
            function() {
                $(this).removeClass("hover");
            }
    );
</script>