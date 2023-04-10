<?php 
	defined("_JEXEC") OR die;

	include dirname(__FILE__)."/model.php";
	$SN = 1;
	$Stuff = fetchExams ();
	?>
	<h2> Exam Management </h2>
	<table class="table"  border="0" id="table-exams">
	<tbody>
	<tr>
		<td>S/N</td>
		<td>&nbsp;</td>
		<td>Exam Name</td>
		</tr>
	<?php foreach( $Stuff  AS $Key=> $stuff ) { ?>
		<tr >
			<td><?php echo ($SN++); ?></td>
			<td><input type="checkbox" class="chk-cls-exams" value = "<?php echo $stuff["id"]; ?>" /> </td>

		<td>
			<input type="text" name="name" value ="<?php echo $stuff["name"]; ?>" />
		</td>
			</tr>
<?php }  ?>
</tbody>
</table>
<div style="padding-top: 10px; padding-bottom: 45px">
<input type="button" value="Update" id="btn-update" />
<input type="button" value="Delete" id="btn-delete" />
</div>
<h3>Add New Exam</h3>
<form method="post">
<table>
	<tbody>
			<tr>
		<td>Exam Name</td>	
		<td><input type="text" name="name" /></td>
	</tr>
		<tr><td>&nbsp;</td><td><input type="submit" value="  Create  " /></td>
</tr>
</tbody>
</table>
<input type="hidden" value="qualification.create_exam" name="task" />
</form>
<script src = "modules/manage_exams/js/script.js?v=1" ></script>
