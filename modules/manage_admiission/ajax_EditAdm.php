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

if($_POST["task"]== "admission.update"){

	$query = "UPDATE users SET surname = ?, firstname = ?, adddress = ?, phone = ? 	WHERE id= ? "; 
	$pds = $PDO->prepare($query); 
	
	foreach ($_POST["data"] as $key => $value) {
		# code...

	$pds->execute( array(
		$value["surname"], 
		$value["firstname"], 
		$value["address"], 
		$value["phone"],
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

if("admission.admit"==$_POST["task"]){
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
	
	$query = "UPDATE users SET 
	level= '400', faculty= 'Communication & Information Sciences', department='Computer Science'
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

if("admission.clear"==$_POST["task"]){
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
	
	$query = "UPDATE users SET clearance = '1'
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



if($_POST["task"]== "admission.delete"){
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
	
	$query = "DELETE FROM users
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

if($_POST["task"]== "admission.matric"){
	$query = "SELECT * FROM users 
	WHERE level !='' AND 
	(matric is NULL OR matric='') ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array() ); 	

	$Res = sortBySurname($pds->fetchAll(2));
	
	$query = "UPDATE users SET matric= ? WHERE id= ? "; 
	$pds = $PDO->prepare($query); 
	
	$Prefix = "14/52HA";
	
	$Counter = 0+getLastCount();
	foreach($Res AS $Key=>$Value){
			$X = '0000'.$Counter;
			$Y = sizeof($X) - 4;
		 $Suffix = substr($X,$Y);
		 $Matric = $Prefix . $Suffix;
		/**showPrepedQuery( $query, /***/
		$pds->execute( /***/ 
			array( 
				$Matric,
				$Value['id']
			) 
		);
		$Counter ++;
	}
	
	$query = "UPDATE matric SET last_count= ? WHERE id= ? "; 
	$pds = $PDO->prepare($query); 
	
		/**showPrepedQuery( $query, /***/
		$pds->execute( /***/
		array($Counter,"1")
	); 
}

function sortBySurname($Arr){
	$Swp;
	$N= sizeof($Arr);
	for($i=0; $i< $N-1; $i++){
		for($j=$i+1; $j < $N; $j++){
			if($Arr[$i]['surname'] > $Arr[$j]['surname'] ){
					    $Swp = $Arr[$i];
					$Arr[$i] = $Arr[$j];
					$Arr[$j] = $Swp;					
			}
		}//next j	
	}//next i
	
	return $Arr;
}

function  getLastCount(){
	global $PDO; 
	$query = "SELECT last_count FROM matric WHERE id= '1' ";
	
	$pds = $PDO->prepare($query); 
	$pds->execute( array() ); 	
	
	$R = $pds->fetchAll(2);
	
	return $R[0]['last_count'] ;


}