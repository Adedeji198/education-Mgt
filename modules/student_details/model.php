
<?php
	defined("_JEXEC") or die;
	
function fetchUser( $userId){
	global $PDO; 
	$query = "SELECT * FROM users  WHERE id= ?  ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($userId) ); 
	return $pds->fetchAll(2);
}
	