<?php 
include('header.php');
?>
<body>
<div class="container">
<br>
<br>
<form action="edit.php" method="post">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><i class="icon-user icon-large"></i>&nbsp;Edit Multiple</strong>&nbsp;check first the radio button to edit the data you want to edit
                            </div>
                            <thead>
                                <tr>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                    <th>MiddleName</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                              	<?php 
							$query=mysql_query("select * from member")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['member_id'];
							?>
                                
										<tr>
										<td>
										<input name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
                                         <td><?php echo $row['firstname'] ?></td>
                                         <td><?php echo $row['lastname'] ?></td>
                                         <td><?php echo $row['middlename'] ?></td>
                                         <td><?php echo $row['address'] ?></td>
                                         <td><?php echo $row['email'] ?></td>
                                </tr>
                         <?php  } ?>
						 
                            </tbody>
                        </table>
						
						<button class="btn btn-success"  name="submit_mult" type="submit">
Edit
</button>
</form>



</div>
</body>
</html>