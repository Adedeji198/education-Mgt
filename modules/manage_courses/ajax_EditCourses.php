
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

	$query = "UPDATE courses SET name = ?, code = ?, level = ?
	WHERE id= ? "; 
	$pds = $PDO->prepare($query); 
	
	foreach ($_POST["data"] as $key => $value) {
		# code...

	$pds->execute( array(
		$value["coursename"], 
		$value["coursecode"], 
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

if($_POST["task"]== "courses.delete"){
	$IdsStr ="";
	$Counter = 0;

	foreach ($_POST["data"] as $key => $value) {
		# code...
		if($Counter==0){
			$IdsStr .= $value["id"];
			$Counter +=1;
		}else{
			$IdsStr .= ",". $value["id"];
			$Counter +=1;

		}
	
	}
	
	$query = "DELETE FROM courses
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
