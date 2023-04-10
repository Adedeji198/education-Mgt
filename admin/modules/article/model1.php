<?php

	function getCategories(){

		global $PDO;
		
		$query =" SELECT  * FROM categories ";	
		$pds = $PDO->prepare($query);
		$pds->execute( array() );
		$Array2 = $pds->fetchAll(2);
		
		return $Array2;

	}
	
	function getArticle($Category){
		global $PDO;
		
		$query =" SELECT  * FROM articles 
		WHERE category  =?";	
		$pds = $PDO->prepare($query);
		$pds->execute( array($Category) );
		$Array2 = $pds->fetchAll(2);
		
		return $Array2;
		
	}

	function getSections(){
		global $PDO; 
		$query = "SELECT * FROM section WHERE 1 ";
		$pds = $PDO->prepare($query); 
		$pds->execute( array() ); 

		return $pds->fetchAll(2);
	}
	
	function getURLs(){
		global $PDO; 
		$query = "SELECT * FROM url WHERE  1 ";
		$pds = $PDO->prepare($query); 
		$pds->execute( array() ); 
		
		return $pds->fetchAll(2);
	}

?>