<?php
	defined("_JEXEC") OR die;

	
	$SN = 1;
	$Stuff = fetchusers ();


	?>
	<input type="text" id="search" placeholder="search" />

<div id="user-container" >

<!--     -->
	<table class="table"  border="0" id="table-admission">
	<tbody>
	<tr>
		<td>S/N</td>
		<td><input type="checkbox" id="id-adm" /></td>
<td>SurName</td>
		<td>First Name</td>
		<td>Address</td>
		<td>Phone</td>
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
		<input type="button" class="view-candidate" value="View" />
		<input type="hidden"  value="<?php echo $stuff["id"]; ?>" />
		</td>		
	</tr>
<?php }  ?>
</tbody>
</table>
<div id="candidate-details" style="padding: 20px">
</div>

</div>
<script src="modules/lecturer_course/js/script.js?v=2" ></script> 