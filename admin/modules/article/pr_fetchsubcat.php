<?php
	
	include ("../../forbidden/db_connect.php");
	//file_log(json_encode($_POST));
/*Array
(
    [id] => -1
)
{"id":"1"}*/
//(__FILE__);

	echo json_encode(
		array(
			"id"=>$_POST['id'],
			"data"=>getSubCategories($_POST['id']) ,
			"articles"=>fetchArticles($_POST['id'])
		)
	);

	function getSubCategories($id){
		global $PDO;
		
			$query = "SELECT *
			 FROM categories WHERE parent= ? ";

			//file_log(getPrepedQuery($query,array($src)));
			$pds = $PDO->prepare($query);
			$pds->execute( array($id) );	
			
			$Array1 = $pds->fetchAll(2);			
		return $Array1;
	}

	function fetchArticles($Cat=0){
		global $PDO;

		$query = "SELECT *  FROM articles WHERE category = ?";
		
		$pds = $PDO->prepare($query);
		$pds->execute( array($Cat) );
	
		return $pds->fetchAll(2);
	}	

?>