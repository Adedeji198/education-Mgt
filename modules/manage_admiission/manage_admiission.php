<?php 
	defined("_JEXEC") OR die;

	include dirname(__FILE__)."/model.php";
	$SN = 1;
	$Stuff = fetchusers ();


	?>
	<input type="text" id="search" placeholder="search" />
	<input type="text" id="s-level" placeholder="level" />
	
	
<div id="user-container" >
	<table class="table"  border="0" id="table-admission">
	<tbody>
	<tr>
		<td>S/N</td>
		<td><input type="checkbox" id="id-adm" /></td>
		<td>Surname</td>
		<td>Other Name(s)</td>
		<td>Address</td>
		<td>Mobile Number</td>
		<td>E-Mail</td>
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
		<td>
			<input type="text" name="mail" value ="<?php echo $stuff["mail"]; ?>" />
		</td>
		<td>
		<input type="button" class="view-candidate" value="View Details" />
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
			<td>Surname</td>	
			<td><input type="text" name="surname" /></td>
		</tr>
				<tr>
			<td>Other Name(s)</td>	
			<td><input type="text" name="firstname" /></td>
		</tr>
				<tr>
			<td>Address</td>	
			<td><input type="text" name="address" /></td>
		</tr>
		<tr>
			<td>Mobile Number</td>	
			<td><input type="text" name="phone" /></td>
		</tr>
		<tr>
			<td>Username</td>	
			<td><input type="text" name="username" /></td>
		</tr>
		<tr>
			<td>Password</td>	
			<td><input type="password" name="password" /></td>
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
	<input type="button" value=" Matriculate " id="btn-matric" />
	</div>
</div>
<script src = "modules/manage_admiission/js/script.js?v=10" ></script>