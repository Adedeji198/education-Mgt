<?php 
	defined("_JEXEC") OR die;

	
	$SN = 1;

	if(!isset($_POST["exam-drop"])){
		goto quitit;
	}
	$Stuff = fetchSubjects ($_POST['exam-drop']);
	?>
	<table class="table"  border="0" id="table-subjects">
	<tbody>
	<tr>
		<td>S/N</td>
		<td>&nbsp;</td>
		<td>Subject</td>
		</tr>
	<?php foreach( $Stuff  AS $Key=> $stuff ) { ?>
		<tr >
			<td><?php echo ($SN++); ?></td>
			<td><input type="checkbox" class="cls-chk-subject" value = "<?php echo $stuff["id"]; ?>" /> </td>		
		<td>
			<input type="text" name="subject" value ="<?php echo $stuff["name"]; ?>" />
		</td>
		
	</tr>
<?php }  ?>
</tbody>
</table>
<div style="padding-top: 10px; padding-bottom 10px">
<input type="button" value="Update" id="btn-update" />
<input type="button" value="Delete" id="btn-delete" />
</div>

<form method="post">
<table>
	<tbody>
			<tr>
		<td>Subject</td>	
		<td>
			<input type="text" name="subject" />
			<input type="hidden" name="exam" value="<?php echo $_POST['exam-drop']; ?>" />
			<input type="hidden" name="exam-drop" value="<?php echo $_POST['exam-drop']; ?>" />
		</td>
	</tr>
		<tr><td>&nbsp;</td><td><input type="submit" value="  Create  " /></td>
</tr>
</tbody>
</table>
<input type="hidden" value="qualification.create_subject" name="task" />
</form>
<script src = "modules/manage_subjects/js/script.js" ></script>
<?php
include dirname(__FILE__)."/view-scores.php"; 
quitit: