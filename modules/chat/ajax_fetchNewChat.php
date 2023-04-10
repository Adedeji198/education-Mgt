<?php 
	define("_JEXEC",1);
	include "../../admin/forbidden/db_connect.php";
	include dirname(__FILE__).'/model.php';
	
	$Chats = fetchNotifications();
?><ul> 
 <?php foreach($Chats as $stuff) { ?>
	<li class="chat-item"  ><?php echo $stuff['string']; ?>
		<span style="float: right; font-size: 10px; display: inline-block;">
			<?php echo $stuff['surname']," ",$stuff['firstname']," &nbsp;",$stuff['timestp']; ?>
		</span>
	</li>
 <?php } ?>
 </ul>