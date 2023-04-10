<?php

include "../../forbidden/db_connect.php";

/*Array
(
    [id] => 2
)
{"id":"2"}*/
//(__FILE__);


	
	
	$RO = new ReturnObject();
	$RO->posted = $_REQUEST;
	$RO->output = getArticle();
	echo json_encode($RO);

function getArticle(){
	global $PDO; 
	$query = "SELECT * FROM articles WHERE id= ? ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($_REQUEST["id"]) );
	$G = $pds->fetchAll(2); 	
	return $G; 
}
class ReturnObject{
	var $posted,$output;
}