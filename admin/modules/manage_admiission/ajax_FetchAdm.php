<?php
	if(is_dir("../../admin")){
	include "../../admin/forbidden/db_connect.php";
	}else{
	include "../../forbidden/db_connect.php";
	}

	include dirname(__FILE__)."/model.php";
	$SN = 1;
	$Stuff = fetchusers2($_POST['code']);
	?>
	<table class="table"  border="0" id="table-admission">
	<tbody>
	<tr>
		<td>S/N</td>
		<td><input type="checkbox" id="id-adm" /></td>
<td>SurName</td>
		<td>First Name</td>
		<td>Address</td>
		<td>Phone</td>
		
		<td>&nbsp;</td>
		<td>&nbsp;</td>
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
	<!--	<td>
			<input type="text" name="mail" value ="<?php echo $stuff["mail"]; ?>" />
		</td> -->
		<td>
		<img src="<?php echo $stuff['passport']; ?>" width="100" height="100"/>
		</td>
		<td>
		<input type="button" class="view-candidate" value="View" />
		<input type="hidden"  value="<?php echo $stuff["id"]; ?>" />
		</td>		
	</tr>
<?php }  ?>
</tbody>
</table>
<div id="candidate-details" style="padding: 20px">
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
<div style="padding-top: 20px; padding-bottom: 30px">
<input type="button" value="Update" id="btn-update" />
<input type="button" value="Delete" id="btn-delete" />
<input type="button" value="Admit" id="btn-admit" />
<input type="button" value=" Clear " id="btn-clear" />
</div>