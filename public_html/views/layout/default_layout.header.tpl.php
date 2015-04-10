<!--ko can quan tam den gia tri  ma quan tam den su ton tai dung isset-->
<!--quan tam den rong hay ko : vd nhu nap file ben duoi dung empty-->
<!--Tao moi doi tuong su dung dc toan bo thuoc tinh va pt cua lop do-> class controller->Model-->
<!--Cu dung session thi phai khoi tao--> 
<html>
    <head>   
        <?php $title = isset($this->title) ? $this->title : "Project Final"?>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>css/default.css" />
        <link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>bootstrap/css/bootstrap.min.css"/>
        <script type="text/javascript" src="<?php echo PUBLIC_URL; ?>js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo PUBLIC_URL; ?>js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="<?php echo PUBLIC_URL; ?>js/custom.js"></script>
        <!--<script type='text/javascript' src=''-->
        <?php 
            if(!empty($this->js)){
                $js_files = '';
                foreach ($this->js as $js){
                    $js_files .="<script type='text/javascript' src='".VIEW_URL.$js."'></script>";
                }
            }
           
            if(!empty($this->css)){
                $css_files = '';
                foreach ($this->css as $css){
                    $css_files .="<link rel='stylesheet'  href='".VIEW_URL.$css."'/>";
                }
            }
           if(!empty($js_files)){echo $js_files;}
           if(!empty($css_files)){echo $css_files;}
        ?>
        
        <style type="text/css">
            body{
                padding-top: 70px;
            }
        </style>
       
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
         
            <div class="container" >
                <div class="navbar-header">
                    <a href="<?php echo SITE_URL; ?>index" class="navbar-brand index" >Home Page</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo SITE_URL;?>group">Group</a>
                        </li>
                        <li>
                            <a href="<?php echo SITE_URL;?>teacher">Teacher</a>
                        </li>
                        <li>
                            <a href="<?php echo SITE_URL;?>class_grade">Class</a>
                        </li>
                        <li>
                            <a href="<?php echo SITE_URL;?>parent_student">Parent_Contact</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo SITE_URL;?>announce">Anncounce</a>
                        </li>
                        <li>
                            <a href="<?php echo SITE_URL;?>class_forum">Forum</a>
                        </li>
                       <li>
                            <a href="<?php echo SITE_URL;?>private_message">Message</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                         <li>
                         
                            <?php if (Session::get('loggedIn') !=null): ?>
                                <a href="<?php echo SITE_URL; ?>user/logout">Logout</a>	
                            <?php else: ?>
                                <a href="<?php echo SITE_URL; ?>user/index" class="login">Login</a>
                            <?php endif; ?>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        
        <div id="content">
   <?php 
  
     

   ?>
                   