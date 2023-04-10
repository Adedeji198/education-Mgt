<?php
	function getSubCategory($id){
		global $PDO;

		$query = "SELECT * FROM categories WHERE id= ? ";
		
		$pds = $PDO->prepare($query);
		$pds->execute( array($id) );
	
		return $pds->fetchAll(2);
	}

	function getLevCategory($level=1){
		global $PDO;

		$query = "SELECT * FROM categories WHERE levl= ? ";
		
		$pds = $PDO->prepare($query);
		$pds->execute( array($level) );
	
		return $pds->fetchAll(2);
	}	

	function fetch_articles($Cat=0){
		global $PDO;

		$query = "SELECT *  FROM articles WHERE category = ?";
		
		$pds = $PDO->prepare($query);
		$pds->execute( array($Cat) );
	
		return $pds->fetchAll(2);
	}	

?>