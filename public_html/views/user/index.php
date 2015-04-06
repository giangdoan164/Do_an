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