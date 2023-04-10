
<?php
	defined("_JEXEC") or die;
	
function getCourses($Level){
	global $PDO; 
	$query = "SELECT * FROM courses  WHERE level = ?  ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($Level) ); 
	return $pds->fetchAll(2);
}

function fetchMyCourses(){
	global $PDO; 
	$query = "SELECT user, course FROM user_courses WHERE user= ? ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($_SESSION["userid"]) );
	return $pds->fetchAll(2);
}