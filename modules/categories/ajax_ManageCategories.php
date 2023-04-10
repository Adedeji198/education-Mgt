<?php

	include "../../forbidden/db_connect.php";

if(!isset($_POST["data"])){
	echo json_encode(
		array (
		"result"=>"0",
		"task"=>"error"
		)

	);die;
}


if($_POST["task"]== "article.update-categories"){

	$query = "UPDATE categories SET  name = ?, parent = ?, levl = ?
	WHERE id= ? "; 

	$pds = $PDO->prepare($query); 
	
	foreach ($_POST["data"] as $key => $value) {
		$pds->execute( array(
			$value["name"], 
			$value["parent"], 
			$value["level"], 
			$value["id"]
			) 
		);
	}

	echo json_encode(
		array (
		"result"=>"1",
		"task"=> $_POST["task"]
		)
	);
} 


if($_POST["task"]== "article.delete-categories"){
	$IdsStr ="";
	$Counter = 0;

	foreach ($_POST["data"] as $key => $value) {
		if($Counter==0){
			$IdsStr .= $value["id"];
			$Counter +=1;
		}else{
			$IdsStr .= ", ". $value["id"];
			$Counter +=1;

		}
	
	}
	
	$query = "DELETE FROM categories
	WHERE id IN($IdsStr) "; 
	$pds = $PDO->prepare($query); 
	$pds->execute( array() );
	
	$query = "UPDATE articles SET category= '0' 
	WHERE category IN($IdsStr)  "; 
	$pds = $PDO->prepare($query); 

	$pds->execute( array() );
	echo json_encode(
		array (
		"result"=>"1",
		"task"=>$_POST["task"],
		"Ids"=> $IdsStr
		)
	);
}