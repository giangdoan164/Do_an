<h1>Login page</h1>
<form class="form-group" action="<?php echo $this->get_controller_url().'/login'?>" method="post">
  <div class="form-group">
    <label class="sr-only" for="txt_username">Username</label>
    <input type="text" class="form-control" id="txt_username" placeholder="Enter username" name="txt_username" >
  </div>
  <div class="form-group">
    <label class="sr-only" for="txt_password">Password</label>
    <input type="password" class="form-control" id="txt_password" placeholder="Enter Password" name="txt_password" >
  </div>
 
  <button type="submit" class="btn btn-default">Sign in</button>
</form>


