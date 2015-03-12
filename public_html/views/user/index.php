<h1>Login page</h1>
<?php //    echo $this->get_controller_url().'/run';die();?>
<form action="<?php echo $this->get_controller_url().'/login'?>" method="post">
	<label>Login</label><input type="text" name="txt_username" /><br />
	<label>Password</label><input type="password" name="txt_password" /><br />
	<label></label><input type="submit" />
</form>