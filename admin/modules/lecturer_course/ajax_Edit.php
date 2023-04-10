<?php
if(is_dir("../../admin")){
	include "../../admin/forbidden/db_connect.php";
}else{
	include "../../forbidden/db_connect.php";
}

if(!isset($_POST["data"])){
	echo json_encode(
		array (
		"result"=>"0",
		"task"=>"error"
		)

	);die;
}

session_start();

if($_POST["task"]== "courses.update"){

	$query = "DELETE FROM user_courses WHERE user= ? ";
	$pds = $PDO->prepare($query); 
	
	/****showPrepedQuery( 	$query,	/***/
	$pds->execute( /***/
		array(
		$_POST["userid"]) 
	); 


	$query = "INSERT INTO user_courses (user, course) 
	VALUES (?, ?) "; 
	$pds = $PDO->prepare($query);
	
	foreach ($_POST["data"] as $key => $value) {

		/****showPrepedQuery( 	$query,	/***/
		$pds->execute( /***/
		array(
			$_POST["userid"], 
			$value["id"]
			)
		);
	}

	echo json_encode(
		array (
		"result"=>"1",
		"task"=>$_POST["task"]
		)
	);
}