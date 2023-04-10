<?php
	if(is_dir("../../admin")){
	include "../../admin/forbidden/db_connect.php";
	}else{
	include "../../forbidden/db_connect.php";
	}

	include dirname(__FILE__)."/model.php";
	$SN = 1;
	$Stuff = fetchusers3($_POST['code']);
	?>
	<table class="table"  border="0" id="table-admission">
	<tbody>
	<tr>
		<td>S/N</td>
		<td>&nbsp;</td>
<td>SurName</td>
		<td>First Name</td>
		<td>Address</td>
		<td>Phone</td>
		</tr>
	<?php foreach( $Stuff  AS $Key=> $stuff ) { ?>
		<tr >
			<td><?php echo ($SN++); ?></td>
			<td><input type="checkbox" class="cls-adm" value = "<?php echo $stuff["id"]; ?>" /> </td>

		<td>
			<input type="text" name="surname" value ="<?php echo $stuff["surname"]; ?>" />
		</td>
		
		<td>
			<input type="text" name="firstname" value ="<?php echo $stuff["firstname"]; ?>" />
		</td>
		
		<td>
			<input type="text" name="address" value ="<?php echo $stuff["adddress"]; ?>" />
		</td>
		
		<td>
			<input type="text" name="phone" value ="<?php echo $stuff["phone"]; ?>" />
		</td>
			</tr>
<?php }  ?>
</tbody>
</table>
<div style="padding-top: 20px; padding-bottom 30px">
<input type="button" value="Update" id="btn-update" />
<input type="button" value="Delete" id="btn-delete" />
</div>

<form method="post">
<table>
	<tbody>
	<tr>
			<td>SurName</td>	
			<td><input type="text" name="surname" /></td>
		</tr>
				<tr>
			<td>First Name</td>	
			<td><input type="text" name="firstname" /></td>
		</tr>
				<tr>
			<td>Address</td>	
			<td><input type="text" name="address" /></td>
		</tr>
				<tr>
			<td>Phone</td>	
			<td><input type="text" name="phone" /></td>
		</tr>
			<tr><td>&nbsp;</td><td><input type="submit" value="  Create  " /></td>
</tr>
</tbody>
</table>
<input type="hidden" value="admission.create" name="task" />
</form>
