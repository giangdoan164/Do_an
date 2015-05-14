<!DOCTYPE html>
<html>
    <head>  
        <link rel="stylesheet" href='<?php echo PUBLIC_URL; ?>bootstrap/css/bootstrap.min.css'/>
        <style type="text/css" >
            .btn {
                border-radius: 0;
            }
            .panel{
                border: 2px solid #ff9900 !important;
                /*border-top: #ff9900 4px solid !important;*/
                /*border-top: #CE4B27 4px solid !important;*/
                border-top: #ff9900 5px solid !important;
                box-shadow: 0 2px 3px rgba(0, 0, 0, .3);
            }
            body{
                background-color: #E1E1E1;
            }
            .panel-heading {
                padding: 5px 15px;
                text-align: center;
                font-size: 20px;
            }

            .panel-footer {
                padding: 1px 15px;
                color: #A0A0A0;
            }

            .profile-img {
                width: 96px;
                height: 96px;
                margin: 0 auto 10px;
                display: block;
                -moz-border-radius: 50%;
                -webkit-border-radius: 50%;
                border-radius: 50%;
            }
        </style>
    </head>
    <body>
        <!--        <div class="container">
                    <div class="col-md-8 col-md-offset-2">
                        <h1>Login page</h1><hr />
                        <form class="form-group" action="<?php // echo $this->get_controller_url() . 'login'   ?>" method="post">
                            <div class="form-group">
                                <label  for="txt_username" class="col-md-2">Username</label>
                                <input type="text" class="form-control" id="txt_username" placeholder="Enter username" name="txt_username" >
                            </div>
                            <div class="form-group">
                                <label  for="txt_password" class="col-md-2">Password</label>
                                <input type="password" class="form-control" id="txt_password" placeholder="Enter Password" name="txt_password" >
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                    </div>
                </div>-->
        <div class="container" style="margin-top:40px">
            <div class="row">
                <div class=" col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <strong> ĐĂNG NHẬP HỆ THỐNG</strong>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-group" action="<?php echo $this->get_controller_url() . 'login' ?>" method="post">
                                <fieldset>
                                    <div class="row">
                                        <div class="center-block">
                                            <img class="profile-img"
                                                 src="<?php echo PUBLIC_URL.'images/login.png'; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10 col-md-10  col-md-offset-1 ">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span> 
                                                    <input class="form-control" placeholder="Tên Đăng Nhập " name="txt_username" type="text" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-lock"></i>
                                                    </span>
                                                    <input class="form-control" placeholder=" Mật Khẩu" name="txt_password" type="password"  required value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-6">
                                                    <button type="submit" class="btn  btn-primary ">Đăng Nhập</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src='<?php echo PUBLIC_URL; ?>js/jquery-1.10.2.min.js'></script>
        <script type="text/javascript" src="<?php echo PUBLIC_URL . 'bootstrap/js/bootstrap.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo PUBLIC_URL . 'bootstrap/js/bootswatch.js' ?>"></script>
    </body>