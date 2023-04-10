
<?php
	defined("_JEXEC") or die;
	
function fetchCategories(){
	global $PDO; 
	$query = "SELECT * FROM categories  WHERE 1  ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array() ); 
	return $pds->fetchAll(2);
}
	