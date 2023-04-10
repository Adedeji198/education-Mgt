<?php

	if(is_dir("../../admin")){
	include "../../admin/forbidden/db_connect.php";
	}else{
	include "../../forbidden/db_connect.php";
	}
	include dirname(__FILE__)."/model.php";

	//$_POST['userid'] = '16';
	$Result = fetchResult($_POST['userid']);
	$users= fetchSingleUser($_POST['userid']);
	$users= $users[0];
?>
<h3>Applicant Details</h3>
<table>
<tbody>
<tr>
<td>surname</td>
<td><?php echo $users["surname"]; ?></td>
</tr>
<tr>
<td>First name</td>
<td><?php echo $users["firstname"]; ?></td>
</tr>
<tr>
<td colspan="2">
<img src="<?php echo $users["passport"]; ?>" width="100" height="100" />
</td>
</tr>
<tr>
<td>Address</td>
<td><?php echo $users["adddress"]; ?></td>
</tr>
<tr>
<td>Phone</td>
<td><?php echo $users["phone"]; ?></td>
</tr>
</tbody>
</table>

<h3>Result</h3>
<p>
<strong>
High School Certificate:
</strong><?php
if(sizeof($Result)){
	echo $Result[0]["hname"]; 
}else{
	echo "Result not available";
}
 ?>

</p>
<p>Details:</p>
<table>
<tbody>
<tr>
<th>S/N</th>
<th style="text-align: left;">Subject</th>
<th>Score</th>
</tr>
<?php $SN = 0; ?>
<?php foreach($Result AS $Key=> $result) { ?>
<tr>
<td><?php echo ++$SN ?></td>
<td><?php echo $result["sname"]; ?></td>
<td><?php echo $result["score"]; ?></td>
</tr>
<?php } ?></tbody>
</table>