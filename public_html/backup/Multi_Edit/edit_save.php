<?php
include('dbcon.php');
$member_id=$_POST['member_id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$middlename=$_POST['middlename'];
$email=$_POST['email'];
$address=$_POST['address'];

$N = count($member_id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("UPDATE member SET firstname='$firstname[$i]', lastname='$lastname[$i]', middlename='$middlename[$i]' ,address='$address[$i]' , email='$email[$i]'  where member_id='$member_id[$i]'")or die(mysql_error());
}
header("location: index.php");

?>