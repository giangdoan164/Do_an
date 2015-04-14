 <link rel="stylesheet" href='<?php echo PUBLIC_URL; ?>bootstrap/css/bootstrap.min.css'/>
<div class="container">
    <div class="col-md-8 col-md-offset-2">
<h1>Login page</h1><hr />
<form class="form-group" action="<?php echo $this->get_controller_url().'login'?>" method="post">
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
</div>
        <script type="text/javascript" src='<?php echo PUBLIC_URL; ?>js/jquery-1.10.2.min.js'></script>
<script type="text/javascript" src="<?php echo PUBLIC_URL . 'bootstrap/js/bootstrap.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo PUBLIC_URL . 'bootstrap/js/bootswatch.js' ?>"></script>