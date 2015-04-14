<!--ko can quan tam den gia tri  ma quan tam den su ton tai dung isset-->
<!--quan tam den rong hay ko : vd nhu nap file ben duoi dung empty-->
<!--Tao moi doi tuong su dung dc toan bo thuoc tinh va pt cua lop do-> class controller->Model-->
<!--Cu dung session thi phai khoi tao--> 
<html>
    <head>   
        <?php $title = isset($this->title) ? $this->title : "Project Final" ?>
        <title><?php echo $title; ?></title>
       
        <!--<link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>bootstrap/css/bootstrap.css"/>-->
        <link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>bootstrap/css/bootstrap.min.css"/>
        <!--<script type="text/javascript" src="<?php echo PUBLIC_URL; ?>js/jquery-1.10.2.min.js"></script>-->
        <script type="text/javascript" src="<?php echo PUBLIC_URL; ?>js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="<?php echo PUBLIC_URL; ?>js/custom.js"></script>
        <!--<script type="text/javascript" src="<?php echo PUBLIC_URL; ?>js/jquery.validate.min.js"></script>-->
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>css/default.css" />
        <!--<script type='text/javascript' src=''-->
        <?php
        if (!empty($this->js)) {
            $js_files = '';
            foreach ($this->js as $js) {
                $js_files .="<script type='text/javascript' src='" . VIEW_URL . $js . "'></script>";
            }
        }

        if (!empty($this->css)) {
            $css_files = '';
            foreach ($this->css as $css) {
                $css_files .="<link rel='stylesheet'  href='" . VIEW_URL . $css . "'/>";
            }
        }
        if (!empty($js_files)) {
            echo $js_files;
        }
        if (!empty($css_files)) {
            echo $css_files;
        }
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

            <div class="container" id="div_navigation">
                <div class="navbar-header">
                    <a href="<?php echo SITE_URL; ?>index" class="navbar-brand index" >Trang chủ</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo SITE_URL; ?>group"></a>
                        </li>
                        <li>
                            <a href="<?php echo SITE_URL; ?>teacher">Quản lý giáo viên</a>
                        </li>
                        <li>
                            <a href="<?php echo SITE_URL; ?>class_grade">Quản lý lớp học</a>
                        </li>
                        <li>
                            <a href="<?php echo SITE_URL; ?>parent_student">Danh sách liên lạc</a>
                        </li>

                        <li>
                            <a href="<?php echo SITE_URL; ?>announce">Thông báo</a>
                        </li>
                        <li>
                            <a href="<?php echo SITE_URL; ?>class_forum">Diễn đàn</a>
                        </li>
                        <li>
                            <a href="<?php echo SITE_URL; ?>private_thread">Trao đổi riêng</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
<?php if (@Session::get('loggedIn') != null): ?>
                            <li>
                                <a style="color: #ffff99;font-weight: bold;" href="<?php echo SITE_URL ?>private_thread/dsp_all_thread_has_unread_message"><span id='li_unread_thread_message'></span></a>
                            </li>
<?php endif; ?>
                        <li>
                        <?php if (@Session::get('loggedIn') != null): ?>
 
                                <a href="<?php echo SITE_URL; ?>user/logout">Logout</a>	
                        <?php else: ?>
                                <a href="<?php echo SITE_URL; ?>user/index" class="login">Login</a>

                            <?php endif; ?>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
        <script type="text/javascript">
            var site_root = '<?php echo SITE_URL ;?>';
            $.ajax({
                url: site_root+'private_thread/count_unread_message',
                type: 'post',
                success: function(result) {
                    if(result == 0){ $('#li_unread_thread_message').parent().html('');}
                    else{
                        $('#li_unread_thread_message').text(result +' Tin nhắn mới')
                    }
                    ;
                }
            });
        </script>

        <div id="content">

