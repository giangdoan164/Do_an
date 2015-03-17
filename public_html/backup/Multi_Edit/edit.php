<?php 
include('header.php');
?>
<body>
<br>

<div class="container">
<a href="index.php" class="btn btn-inverse">return</a>
<form class="form-horizontal" action="edit_save.php" method="post">    
<?php
include('dbcon.php');



$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("SELECT * FROM member where member_id='$id[$i]'");
	while($row = mysql_fetch_array($result))
	  { ?>
	  <div class="thumbnail">
	<div class="control-group">
    <label class="control-label" for="inputEmail">Firstname</label>
    <div class="controls">
 	<input name="member_id[]" type="hidden" value="<?php echo  $row['member_id'] ?>" />
		<input name="firstname[]" type="text" value="<?php echo $row['firstname'] ?>" />
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="inputEmail">Lastname</label>
    <div class="controls">
		<input name="lastname[]" type="text" value="<?php echo $row['lastname'] ?>" />
    </div>
    </div>

		<div class="control-group">
    <label class="control-label" for="inputEmail">Middlename</label>
    <div class="controls">
		<input name="middlename[]" type="text" value="<?php echo $row['middlename'] ?>" />
    </div>
    </div>
	
		<div class="control-group">
    <label class="control-label" for="inputEmail">Address</label>
    <div class="controls">
		<input name="address[]" type="text" value="<?php echo $row['address'] ?>" />
    </div>
    </div>
	
			<div class="control-group">
    <label class="control-label" for="inputEmail">Email Address</label>
    <div class="controls">
		<input name="email[]" type="text" value="<?php echo $row['email'] ?>" />
    </div>
    </div>
	
	</div>

	<br>
	

	
	  
	  <?php 
	  }
}

?>
<input name="" class="btn btn-success" type="submit" value="Update">
</form>
</div>
</body>
</html>