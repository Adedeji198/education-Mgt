<?php

	include ("../../forbidden/db_connect.php");
	
	$D = fetchArticles($_POST['id']);
	echo json_encode($D);
	

	function fetchArticles($Cat=0){
		global $PDO;

		$query = "SELECT *  FROM articles WHERE category = ?";
		
		$pds = $PDO->prepare($query);
		$pds->execute( array($Cat) );
	
		return $pds->fetchAll(2);
	}	
	
?>