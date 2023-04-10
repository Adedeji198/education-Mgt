<?php

	if(is_dir("../../admin")){
	include "../../admin/forbidden/db_connect.php";
	}else{
	include "../../forbidden/db_connect.php";
	}
	include dirname(__FILE__)."/model.php";

	//$_POST['userid'] = '16';

	$users= fetchSingleUser($_POST['userid']);
	$users= $users[0];
?>
<h3>User Details</h3>
<form method="post">
<table  border="1">
<tbody>
<tr>
<th >Surname</th>
<td  ><?php echo $users["surname"]; ?></td>
</tr>
<tr>
<th >First Name&nbsp;&nbsp;</th>
<td><?php echo $users["firstname"]; ?></td>
</tr>
<tr>
<td colspan="2">
<div style="border: thin solid #aaa; width: 100px; margin-left: auto; margin-right: auto; margin-bottom: 3px; margin-top: 3px" >
<?php 
if("" == $users["passport"]){ ?>
<img src="pictures/profile.png" width="100" height="100" />
<?php }else{	?>
<img  src="<?php echo $users["passport"]; ?>" width="100" height="100" />
<?php } ?>
</div>
</td>
</tr>
<tr>
<th>Address</th>
<td><?php echo $users["adddress"]; ?></td>
</tr>
<tr>
<th>Phone</th>
<td><?php echo $users["phone"]; ?></td>
</tr>
</tbody>
</table>
<input type= "hidden" name="userid" value="<?php echo $users['id']; ?>"  />
<input type="submit"  value="Assign Courses">
</form>