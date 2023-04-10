
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

if($_POST["task"]== "courses.update"){
	session_start();
	$query = "DELETE FROM user_courses WHERE user= ? ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($_SESSION["userid"]) ); 


	$query = "INSERT INTO user_courses (user, course) 
	VALUES (?, ?) "; 
	$pds = $PDO->prepare($query);
	
	foreach ($_POST["data"] as $key => $value) {

		$pds->execute( array(
			$_SESSION["userid"], 
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
