<?php defined('_JEXEC') or die ;
	include dirname(__FILE__)."/model.php";
 $users = getCurrentUser();
 $users = $users[0];
?>
Main Menu
<hr size="10" color="#29166F"> <br>
<fieldset style="width: 70%">
	<legend style="text-align: center;"> 
		<strong style="color: red;">Personal Information</strong> 
	</legend>
	<table border="0" cellspacing="5" cellpadding="0" align="center"> <tbody> 
			<tr> 
				<td>Name</td> 
				<td>
					<?php 
						echo $users["surname"];
						 echo ", &nbsp;&nbsp;".$users["firstname"];
					?>
				</td> 
			</tr> 

		<tr> 
			<td>Matriculation Number</td> 
			<td><?php echo $users["matric"]; ?></td> 
			<td rowspan="5">
			<img width="100" height="100" src="<?php echo $users["passport"]; ?>"
			</td> 
			</tr> 
			<tr> 
				<td>Faculty</td> 
				<td>
					<?php echo $users["faculty"]; ?>
				</td> 
			</tr> 
			<tr> 
				<td>Department</td> 
				<td><?php echo $users["department"]; ?></td> 
			</tr> 
			<tr> 
				<td>Level</td> 
				<td><?php echo $users["level"]; ?></td> 
			</tr>
		</tbody> 
		</table> 
	</fieldset>

<br />
<br />

<fieldset style="width: 70%">
	<legend style="color: red;text-align: center;">
		<strong>Level Adviser's Information</strong>
	</legend>
	<table border="0" cellspacing="5" cellpadding="0" align="center">
	<tbody>
	<tr>
	<td>Name:</td>
	<td>Mr. BALOGUN, Abdullateef Oluwagbemiga</td>
	</tr>
	<tr>
	<td>Number:</td>
	<td>+234 (0) 8020282939</td>
	</tr>
	<tr>
	<td>E-mail:</td>
	<td>balogun.ao1@unilorin.edu.ng</td>
	</tr>
	</tbody>
	</table>
</fieldset>