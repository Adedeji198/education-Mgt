<?php 
	defined("_JEXEC") OR die;

	
	$SN = 1;
	$Stuff = fetchScores ($_POST['exam-drop']);
	?>
<div style="height:80px"></div>
<h3>Scores Grades</h3>
	<table class="table"  border="0" id="table-scores">
	<tbody>
	<tr>
		<td>S/N</td>
		<td>&nbsp;</td>
		<td>Score</td>
		</tr>
	<?php foreach( $Stuff  AS $Key=> $stuff ) { ?>
		<tr >
			<td><?php echo ($SN++); ?></td>
			<td><input type="checkbox" class="cls-chk-scores" value = "<?php echo $stuff["id"]; ?>" /> </td>

		
		<td>
			<input type="text" name="score" value ="<?php echo $stuff["score"]; ?>" />
		</td>
			</tr>
<?php }  ?>
</tbody>
</table>
<div style="padding-top: 10px; padding-bottom 10px">
<input type="button" value="Update" id="btn-update-score" />
<input type="button" value="Delete" id="btn-delete-score" />
</div>

<form method="post">
<table>
	<tbody>
			<tr>
		<td>Score</td>	
		<td>
		<input type="text" name="score" />
		<input type="hidden" name="exam" value="<?php echo $_POST['exam-drop']; ?>"  />
		<input type="hidden" name="exam-drop" value="<?php echo $_POST['exam-drop']; ?>" />
		</td>
	</tr>
		<tr><td>&nbsp;</td><td><input type="submit" value="  Create  " /></td>
</tr>
</tbody>
</table>
<input type="hidden" value="qualification.create_score" name="task" />
</form>
<script src = "modules/manage_subjects/js/script2.js?v=2" ></script>