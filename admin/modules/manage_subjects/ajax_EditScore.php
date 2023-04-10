
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

if($_POST["task"]== "qualification.update_scores"){

	$query = "UPDATE score_set  SET score = ?
	WHERE id= ? "; 
	$pds = $PDO->prepare($query); 
	
	foreach ($_POST["data"] as $key => $value) {
		# code...
/*print_r($PDO->errorInfo());
showPrepedQuery(
	$query,
	array(
		$value["score"], 
		$value["id"]
		)
);
die;
*/
	$pds->execute( array(
		$value["score"], 
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


if($_POST["task"]== "qualification.delete_scores"){
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
	
	$query = "DELETE FROM score_set
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