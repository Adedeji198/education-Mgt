<?php 
	defined("_JEXEC") OR die;

	include dirname(__FILE__)."/model.php";
	$SN = 1;
	$Stuff = getCourses ();
	?>
	<table class="table"  border="0" id="table-courses">
	<tbody>
	<tr>
		<td>S/N</td>
		<td>&nbsp;</td>
<td>Course Title</td>
		<td>Course Code</td>
		<td>Level</td>
		</tr>
	<?php foreach( $Stuff  AS $Key=> $stuff ) { ?>
		<tr >
			<td><?php echo ($SN++); ?></td>
			<td><input type="checkbox" class="cls-chk-courses" value = "<?php echo $stuff["id"]; ?>" /> </td>

		<td>
			<input type="text" name="coursename" value ="<?php echo $stuff["name"]; ?>" />
		</td>
		
		<td>
			<input type="text" name="coursecode" value ="<?php echo $stuff["code"]; ?>" />
		</td>
		
		<td>
			<input type="text" name="level" value ="<?php echo $stuff["level"]; ?>" />
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
			<td>Course Title</td>	
			<td><input type="text" name="coursename" /></td>
		</tr>
				<tr>
			<td>Course Code</td>	
			<td><input type="text" name="coursecode" /></td>
		</tr>
				<tr>
			<td>Level</td>	
			<td><input type="text" name="level" /></td>
		</tr>
				<tr>
			<td>Semester</td>	
			<td>
                <select name="Semester">
                    <option value="1">Harmattan (1st) Semester</option>
                    <option value="2">Rain (2nd) Semester</option>
                </select>
            </td>
		</tr>
        
			<tr><td>&nbsp;</td><td><input type="submit" value="  Create  " /></td>
</tr>
</tbody>
</table>
<input type="hidden" value="courses.create" name="task" />
</form>
<script src = "modules/manage_courses/js/script.js" ></script>
