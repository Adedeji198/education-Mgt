<?php 
if(! defined('_JEXEC') ){

	include "../../admin/forbidden/db_connect.php";
	define('_JEXEC',1);
	session_start();
}


if(
	isset($_SESSION['privilege']) &&
	'2' == $_SESSION['privilege']
){
	include dirname(__FILE__)."/view-classroom-chats2.php";
	die;
}

	include dirname(__FILE__).'/model.php';
	classroomCheckin();

	$Articles = getArticles();
?>
<h2 align="center"><?php echo getCourseName($_POST['course-id']); ?> Classroom</h2>
<?php foreach( $Articles AS $Key => $Value) { ?>
<div style="border: 3px solid #999">
	<article class="view-article">
	<span class="title"></span>
<?php echo $Value['string']; ?>
	</article>
<?php } ?>
</div>
<?php
	
	$Chats = fetchNotifications();
?>
<input type="hidden" value="<?php echo $_POST['course-id']; ?>" id="course-id" />
<div id="chat-container">

<ul> 
 <?php foreach($Chats as $stuff) { ?>
	<li class="chat-item"  ><?php echo $stuff['string']; ?>
		<span style="float: right; font-size: 10px; display: inline-block;">
			<?php echo $stuff['matric']," ",$stuff['timestp']; ?>
		</span>
	</li>
 <?php } ?>
 </ul>
 </div>
 <div style="height: 5px"></div>
 <h5>Type Message</h5>
  <textarea id="message-text"  cols="150" name="" rows="5"></textarea>
  <br/>
 <input type="button" value=" Send Message " id="send-message" />
 <input type="button" value=" Exit Classroom" id="exit" />