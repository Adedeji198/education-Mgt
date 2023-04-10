<?php 
	defined("_JEXEC") OR die;

	include dirname(__FILE__)."/model.php";
	$SN = 1;
	$Stuff = fetchUser ($_SESSION['userid']);
	$stuff = $Stuff[0];
	?>
	Student Information
	<hr size="10" color="#29166F"> <br>
	<table class="table"  border="0" id="User-table">
	<tbody>
	<tr>
		<td>Surname</td>
		<td>
			<input type="text" name="surname" value ="<?php echo $stuff["surname"]; ?>" />
		</td>
</tr>
<tr>
		<td>Other Name(s)</td>
		<td>
			<input type="text" name="firstname" value ="<?php echo $stuff["firstname"]; ?>" />
		</td>
</tr>
<tr>
		<td>Address</td>
		<td>
			<input type="text" name="address" value ="<?php echo $stuff["adddress"]; ?>" />
		</td>
</tr>
<tr>
		<td>Mobile Number</td>
		<td>
			<input type="text" name="phone" value ="<?php echo $stuff["phone"]; ?>" />
		</td>
</tr>
<tr>
		<td>Nationality</td>
		<td>
			<input type="text" name="nationaolity" value ="<?php echo $stuff["nationality"]; ?>" />
		</td>

</tr>
<tr>
		<td>State of Origin</td>
		<td>
			<input type="text" name="state" value ="<?php echo $stuff["state"]; ?>" />
		</td>

</tr>
<tr>		
		<td>Local Government</td>		
		<td>
			<input type="text" name="lga" value ="<?php echo $stuff["lga"]; ?>" />
		</td>
</tr>
<tr>		
		<td>Next of Kin</td>		
		<td>
			<input type="text" name="nok" value ="<?php echo $stuff["nok"]; ?>" />
		</td>
</tr>
<tr>		
		<td>Next of Kin's number</td>		
		<td>
			<input type="text" name="nphone" value ="<?php echo $stuff["nok_phone"]; ?>" />
		</td>
</tr>
<tr>		
		<td>Passport</td>		
		<td>
			<img width="100" height="100" src ="<?php echo $stuff["passport"]; ?>" />
		</td>
</tr>
<tr>
		<td>Level</td>		
		<td>
			<input type="text" name="level" value ="<?php echo $stuff["level"]; ?>" />
		</td>
</tr>
<tr>		
		<td>Matriculation Number</td>		
		<td>
			<input type="text" name="matric" value ="<?php echo $stuff["matric"]; ?>" />
		</td>
</tr>

</tbody>
</table> <br>

<script src = "modules/student_details/js/sript.js" ></script>
