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

if($_POST["task"]== "qualification.update_exams"){
	global $PDO;

	$query = "UPDATE high_school_cert SET name = ? 
	WHERE id= ? "; 
	$pds = $PDO->prepare($query);

	
	foreach ($_POST["data"] as $key => $value) {
	/*showPrepedQuery(
		$query,
		array(
			$value["name"],
			$value["id"]
		) 	
	);
/**/
		$pds->execute( array(
			$value["name"],
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


if($_POST["task"]== "qualification.delete_exams"){
	$IdsStr ="";
	$Counter = 0;

	foreach ($_POST["data"] as $key => $value) {
		# code...
		if($Counter==0){
			$IdsStr .= $value["id"];
			$Counter +=1;
		}else{
			$IdsStr .= ", ". $value["id"];
			$Counter +=1;

		}
	
	}
	
	$query = "DELETE FROM high_school_cert
	WHERE id IN($IdsStr) "; 
	
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