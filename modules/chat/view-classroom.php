<?php 
if(! defined('_JEXEC') ){
	include "../../admin/forbidden/db_connect.php";
	session_start();
	define("_JEXEC", 1);
}
	include dirname(__FILE__).'/model.php';
?>
<?php
	
	$Classes1 = fetchuserCourses(1);
	$Classes2 = fetchuserCourses(2);
?>
Course Form
<hr size="10" color="#29166F"> <br>

<h2 align="center"> Select A Course To Enter Classroom </h2>
<div id="chat-container">
<table border="0" style="width: 100%">
<tr>
<td>
<h3 align="center">Harmattan (1st) Semester</h3>
</td>
<td>
<h3 align="center">Rain (2nd) Semester</h3>
</td>
</tr>
<tr>
<td style= "vertical-align: top;">
	<ul> 
	 <?php foreach($Classes1 as $stuff) { ?>
		<li class="chat-item" style="cursor: pointer;">
			<?php echo $stuff['code'].' '.$stuff['name']; ?>
			<input type="hidden" value="<?php echo $stuff['courseid']; ?>" /> 
		</li>
	 <?php } ?>
	 </ul>
</td>

<td style= "vertical-align: top;" >
	<ul> 
	 <?php foreach($Classes2 as $stuff) { ?>
		<li class="chat-item" style="cursor: pointer;">
			<?php echo $stuff['code'].' '.$stuff['name']; ?>
			<input type="hidden" value="<?php echo $stuff['courseid']; ?>" /> 
		</li>
	 <?php } ?>
	 </ul>
</td>
</tr>
</table>
 </div>