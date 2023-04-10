<?php

include "../../admin/forbidden/db_connect.php";

/*Array
(
    [message-text] => Going somewhere in a hurry ?
    [receiver] => 3
)
{"message-text":"Going somewhere in a hurry ?","receiver":"3"}*/
//(__FILE__);
//global $PDO; 
	$RO = new ReturnObject();
	session_start();
	
	if(!isset($_SESSION['userid'])){
		$RO->success = 0;
		$RO->Message("Cannot send message while not loged in!!");
		echo json_encode($RO);
		die;
	}
	
	$timestp = date("Y-m-d H:i:s");
	$query = "INSERT INTO notification (string, title, timestp, owner, status, sender) 
	VALUES (?, ?, ?, ?, ?, ?) "; 
	$pds = $PDO->prepare($query); 
	
	$pds->execute( 
		array(
			$_POST["message-text"],
			"", 
			$timestp, 
			$_POST["receiver"], 
			"1", $_SESSION["userid"]
		) 
	); 
	
		
	

	$RO->posted = "";
	$RO->output = "";

echo json_encode($RO);

	class ReturnObject{
		var $posted,$output,$success,$Message;
	}
