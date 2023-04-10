<?php	
	include "admin/forbidden/db_connect.php";

	

	//capturePOST(__FILE__);

		
		

	echo json_encode(fetchFiles());
	
	function fetchFiles(){
		global $PDO; 
		$query = "SELECT title, url AS value FROM file_upload WHERE 1 ";
		$pds = $PDO->prepare($query); 
		
		$pds->execute( array() ); 	

		return $pds->fetchAll(2);
	}