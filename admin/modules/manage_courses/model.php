
<?php
	defined("_JEXEC") or die;
	
function getCourses(){
	global $PDO; 
	$query = "SELECT * FROM courses  WHERE 1  ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array() ); 
	return $pds->fetchAll(2);
}
	