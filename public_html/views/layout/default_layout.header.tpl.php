<!DOCTYPE html>
<html>
    <head>   
        <?php $title = isset($this->title) ? $this->title : "Project Final" ?>
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>bootstrap/css/bootstrap.min.css"/>

        <script type="text/javascript" src="<?php echo PUBLIC_URL; ?>js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="<?php echo PUBLIC_URL; ?>js/custom.js"></script>


        <link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>css/default.css" />

        <?php
          
        //lay den view cua controller VIEW_URL 
        // $js phai chua duong dan con lai
        //$this->js la 1 mang
        if (!empty($this->js))
        {
            $js_files = '';
            foreach ($this->js as $js)
            {
                $js_files .="<script type='text/javascript' src='" . VIEW_URL . $js . "'></script>";
            }
        }

        if (!empty($this->css))
        {
            $css_files = '';
            foreach ($this->css as $css)
            {
                $css_files .="<link rel='stylesheet'  href='" . VIEW_URL . $css . "'/>";
            }
        }
        if (!empty($js_files))
        {
            echo $js_files;
        }
        if (!empty($css_files))
        {
            echo $css_files;
        }

        $role               = Session::get('level');
        $current_controller = $this->controller_name;
        ?>

        <style type="text/css">
            body{
                padding-top: 70px;
            }

            #list_license .div_padding{
                text-align: center;
                margin: 0 auto;
            }
            .div_padding .ul_pagination{
                padding: 5px;
                overflow: hidden;
            }
            .div_padding .ul_pagination li{
                list-style: none;
                padding: 6px;
                margin: 2px;
                background: #EEEEEE;
                float: left;
            }
            .div_padding .ul_pagination li a{
                text-decoration: none;
                color: black;
            }

        </style>

    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid" id="div_navigation">
                <div class="navbar-header" style="color: #ffff99;padding-right: 15px;width: 200px;" >
                    <div style="float:left"> <img src="<?php echo PUBLIC_URL . 'images/logohn.png'; ?>" style="width: 50px;"></div>     
                    <p style="text-align: center;margin-top: 6px;margin-bottom: 0px;">TRƯỜNG TIỂU HỌC VĂN CHƯƠNG</p>
                </div>
             
                <div class="navbar-collapse collapse" id="navbar-main" style="padding-left: 15px;">
                     <?php if($current_controller !='index'):?>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo SITE_URL; ?>index" class="navbar-brand index glyphicon glyphicon-home" ></a>
                        </li>

<?php if ($role == 1): ?>
                            <li <?php if ($current_controller == 'teacher')
    {
        echo "class='active'";
    } ?>>
                                <a href="<?php echo SITE_URL; ?>teacher">Quản lý giáo viên</a>
                            </li>
                            <li <?php if ($current_controller == 'class_grade')
    {
        echo "class='active'";
    } ?>>
                                <a href="<?php echo SITE_URL; ?>class_grade">Quản lý lớp học</a>
                            </li>
                            <li <?php if ($current_controller == 'category')  { echo "class='active'"; } ?>>
                                <a href="<?php echo SITE_URL; ?>category">Quản lý chuyên mục</a>
                            </li>
                            <li <?php if ($current_controller == 'subject_grade')  { echo "class='active'"; } ?>>
                                <a href="<?php echo SITE_URL; ?>subject_grade">Quản lý khối - môn học</a>
                            </li>
<?php endif; ?>
<?php if ($role == 3 || $role == 1): ?>
                            <li <?php if ($current_controller == 'parent_student')
    {
        echo "class='active'";
    } ?>>
                                <a href="<?php echo SITE_URL; ?>parent_student">Quản lý liên lạc</a>
                            </li>
                        <?php endif; ?>
                        <?php if ($role == 3 || $role == 2 || $role == 4): ?>
                            <li <?php if ($current_controller == 'announce')
                        {
                            echo "class='active'";
                        } ?>>
                                <a href="<?php echo SITE_URL; ?>announce">Thông báo</a>
                            </li>
                        <?php endif; ?>
<?php if ($role == 3 || $role == 4): ?>
                            <li <?php if ($current_controller == 'class_forum')
    {
        echo "class='active'";
    } ?>>
                                <a href="<?php echo SITE_URL; ?>class_forum">Diễn đàn</a>
                            </li>
                            <li <?php if ($current_controller == 'private_thread')
    {
        echo "class='active'";
    } ?>>
                                <a href="<?php echo SITE_URL; ?>private_thread">Trao đổi riêng</a>
                            </li>
                            <li <?php if ($current_controller == 'school_report')
                                    {
                                        echo "class='active'";
                                    } ?>>
                                <a href="<?php echo SITE_URL; ?>school_report">Quản lý học bạ</a>
                            </li>
<?php endif; ?>
<?php if ($role == 1) : ?>
                            <li <?php if ($current_controller == 'school_year_config')
    {
        echo "class='active'";
    } ?>>
                                <a href="<?php echo SITE_URL; ?>school_year_config">Quản trị hệ thống</a>
                            </li>
<?php endif; ?>
                    </ul>
                    <?php endif;?>
                    <ul class="nav navbar-nav navbar-right">
<?php if (@Session::get('loggedIn') != null): ?>
                            <li>
                                <a style="color: #ffff99;font-weight: bold;" href="<?php echo SITE_URL ?>private_thread/dsp_all_thread_has_unread_message"><span id='li_unread_thread_message'></span></a>
                            </li>
<?php endif; ?>
                        <li class="dropdown" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span style="font-size: 16px;" class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;<span class="caret"></span>&nbsp;&nbsp;&nbsp;Tài khoản</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a data-toggle="modal"  href="#do_change_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;Đổi mật khẩu</a>
                                </li>
                                <li>
<?php if (@Session::get('loggedIn') != null): ?>

                                        <a href="<?php echo SITE_URL; ?>user/logout"><span class="glyphicon glyphicon-share-alt"></span>&nbsp;&nbsp; Đăng xuất</a>	
<?php else: ?>
                                        <a href="<?php echo SITE_URL; ?>user/index" class="login">Login</a>

<?php endif; ?>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
        <script type="text/javascript">
            var site_root = '<?php echo SITE_URL; ?>';
            $.ajax({
                url: site_root + 'private_thread/count_unread_message',
                type: 'post',
                success: function (result) {
                    if (result == 0) {
                        $('#li_unread_thread_message').parent().html('');
                    }
                    else {
                        $('#li_unread_thread_message').text(result + ' Tin nhắn mới')
                    }
                    ;
                }
            });
        </script>

        <div class="modal fade" id="do_change_password"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="post" name="change_password_form" id="change_password_form">           
                    <div class="modal-content">
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="myModalLabel">Đổi mật khẩu</h3>
                        </div>
                        <div class="modal-body">
                            <?php 
                                      $url = $this->get_controller_url();
                                      echo $this->hidden('controller',$url);
                                     echo $this->hidden('hdn_site_url',SITE_URL);
                            ?>
                            <input type="hidden" name="hdn_site_url" id="hdn_site_url" value="<?php echo SITE_URL;?>">
                            <div class="control-group row" style="margin-bottom:15px;">
                                <label class="control-label col-xs-4" for="txt_current_password">Mật khẩu hiện hành</label>
                                <div class="controls col-xs-8">
                                    <input name="txt_current_password" id="txt_current_password" type="password" class="inputbox" size="35" data-rule-required="true">
                                </div>
                            </div>
                            <div class="control-group row" style="margin-bottom:15px;">
                                <label class="control-label col-xs-4" for="txt_new_password">Mật khẩu mới</label>
                                <div class="controls col-xs-8">
                                    <input name="txt_new_password" id="txt_new_password" type="password" class="inputbox" size="35" data-rule-required="true" data-rule-minlength="3" data-rule-maxlength="20">
                                </div>
                            </div>
                            <div class="control-group row" style="margin-bottom:15px;">
                                <label class="control-label col-xs-4" for="txt_confirm_new_password">Xác nhận mật khẩu mới</label>
                                <div class="controls col-xs-8">
                                    <input name="txt_confirm_new_password" id="txt_confirm_new_password" type="password" size="35" data-rule-required="true" >
                                </div>
                            </div
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="do_change_password();"><span class="glyphicon glyphicon-saved"></span>&nbsp;&nbsp;Đồng ý</button>
                        <button type="button" class="btn " data-dismiss="modal"><span class="glyphicon glyphicon-share-alt"></span>&nbsp;&nbsp;Hủy bỏ</button>
                    </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function do_change_password() {
         var curent_password = $('#change_password_form #txt_current_password').val().trim();
         var new_password =  $('#change_password_form #txt_new_password').val().trim();
         var confirm_new_password =  $('#change_password_form #txt_confirm_new_password').val().trim();
         if(curent_password =='' || new_password=='' || confirm_new_password==''){
             alert("Các trường không được để rỗng !");
             return false;
         }
         if(new_password != confirm_new_password){
             alert("Mật khẩu mới và xác nhận mật khẩu không trùng khớp !");
             return false;
         }  
                var m = $('#change_password_form  #hdn_site_url').val()+'user/update_new_password';
               $('#change_password_form').attr('action',m);
               $('#change_password_form').submit();
        
         
    }
</script>
<div id="content">

<?php ?>