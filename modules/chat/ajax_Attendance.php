<?php

	if(is_dir("../../admin")){
	include "../../admin/forbidden/db_connect.php";
	}else{
	include "../../forbidden/db_connect.php";
	}


//(__FILE__);
if("clear"== $_POST['task']){
	$query = "DELETE  FROM attendance WHERE course= ? ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($_POST["course"]) ); 
	echo "1";
}else if("fetch" == $_POST['task']){
	define("_JEXEC", 1);
  	include dirname(__FILE__).'/model.php';
  	$Attd = fetchAttendance();
?>
<ul> 
 <?php foreach( $Attd AS $key=>$stuff) { ?>
	<li class="chat-item"><?php echo $stuff['matric']; ?> <small style="display: inline-block; float: right;"><?php echo $stuff['timestmp']; ?></small></li>
 <?php }  ?>
</ul>
<?php
}
?>
