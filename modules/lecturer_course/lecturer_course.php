<?php
include dirname(__FILE__)."/model.php";
defined('_JEXEC') or die; 
if(isset($_POST['userid'])){
	$MyCourses = fetchMyCourses($_POST['userid']);
}else{
	include dirname(__FILE__)."/SearchLecturer.php";
	goto quitit;
}
	include dirname(__FILE__)."/helper.php";
	
	$Mgr = new DataManager();
	$Mgr->setData($MyCourses);
	$Mgr->setKey('course');
	$Mgr->setValuekey('user');

	$SN = 1;
	$Stuff = getCourses ();


?>
<div style= "height: 30px"></div>
<div id="message-box" style="background-color: green; padding:10px; color: magenta; display: none; position: fixed; left: 20%; top: 150px; width: 50%">Message</div>
<h2>Assign Courses</h2>
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
<input type="button" value="Update" id="btn-update" />
</div>

<?php
	$users= fetchSingleUser($_POST['userid']);
	$users= $users[0];
?>
<h3>Lecturer Details</h3>
<form method="post">
<table  border="1">
<tbody>
<tr>
<th >Surname</th>
<td  ><?php echo $users["surname"]; ?></td>
</tr>
<tr>
<th >First Name&nbsp;&nbsp;</th>
<td><?php echo $users["firstname"]; ?></td>
</tr>
<tr>
<td colspan="2">
<div style="border: thin solid #aaa; width: 100px; margin-left: auto; margin-right: auto; margin-bottom: 3px; margin-top: 3px" >
<?php 
if("" == $users["passport"]){ ?>
<img src="pictures/profile.png" width="100" height="100" />
<?php }else{	?>
<img  src="<?php echo $users["passport"]; ?>" width="100" height="100" />
<?php } ?>
</div>
</td>
</tr>
<tr>
<th>Address</th>
<td><?php echo $users["adddress"]; ?></td>
</tr>
<tr>
<th>Phone</th>
<td><?php echo $users["phone"]; ?></td>
</tr>
</tbody>
</table>
<input type="hidden" id="userid" value="<?php echo $_POST['userid']; ?>" />
</form>

<script src="modules/lecturer_course/js/script.js?v=4" ></script> 
<?php
quitit:
?>