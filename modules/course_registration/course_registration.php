<?php 
	defined("_JEXEC") OR die;

	include dirname(__FILE__)."/model.php";
	include dirname(__FILE__)."/helper.php";

	if(isset ($_POST['level'])){
		$Level = $_POST['level'];
	}else{
		$Level = "";
	}

	$Levels = array(
		array("level"=>"400")
	);
	$LevelDrop = new DropdownCreator();
	
	$LevelDrop->setName('level');
	$LevelDrop->setValue($Level);
	$LevelDrop->setDataArray($Levels);
	$LevelDrop->setValuekey('level');
	$LevelDrop->setTextkey('level');
	
?>
Course Registration
<hr size="10" color="#29166F"> <br>
<form method="post" >
Level: <?php echo $LevelDrop->getDropdownstring(); ?>
<br><br>
<input type="submit" value="Select Courses" />
</form> <br><br>

<?php 
	$MyCourses = fetchMyCourses();

	$Mgr = new DataManager();
	$Mgr->setData($MyCourses);
	$Mgr->setKey('course');
	$Mgr->setValuekey('user');
	
	if(!isset ($_POST['level'])){
		goto quitit;		
	}

	$SN = 1;
	$Stuff = getCourses ($_POST['level']);

?>
	<table class="table"  border="0" id="course-table">
	<tbody>
	<tr>
		<td>S/N</td>
		<td>&nbsp;</td>
<td>Course Title</td>
		<td>Course Code</td>
		</tr>
	<?php foreach( $Stuff  AS $Key=> $stuff ) { ?>
		<tr >
			<td><?php echo ($SN++); ?></td>
			<td><input type="checkbox" class="cls-chk-courses" value = "<?php echo $stuff["id"]; ?>" <?php 
					if(	$Mgr->getValue($stuff["id"])){
						echo " checked ";
					}
			?>/> </td>

		<td>
			<input disabled type="text" name="coursename" value ="<?php echo $stuff["name"]; ?>" />
		</td>
		
		<td>
			<input disabled type="text" name="cousecode" value ="<?php echo $stuff["code"]; ?>" />
		</td>
			</tr>
<?php }  ?>
</tbody>
</table>
<div style="padding-top: 20px; padding-bottom: 30px">
<p align="center"><input type="button" value="Submit Course Registration" id="btn-update" /></p>
</div>

<script src = "modules/course_registration/js/script.js" ></script>
<?php
quitit: