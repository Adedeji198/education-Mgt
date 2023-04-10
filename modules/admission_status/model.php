<?php
function fetchUser(){
	global $PDO; 
	$query = "SELECT * FROM users WHERE id= ? ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($_SESSION["userid"]) ); 	
	return $pds->fetchAll(2);
}
?> 