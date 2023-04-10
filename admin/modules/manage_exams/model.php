
<?php
	defined("_JEXEC") or die;
	
function fetchExams(){
	global $PDO; 
	$query = "SELECT * FROM high_school_cert  WHERE 1  ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array() ); 
	return $pds->fetchAll(2);
}
	