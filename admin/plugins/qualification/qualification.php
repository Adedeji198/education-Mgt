<?php class qualification{
		function onAfterInitialise(){
	
			if(
				isset($_POST["task"]) &&
				$_POST["task"]== "qualification.create_exam"
			){
					$this->saveData();
			}else if(
					isset($_POST["task"]) &&
					$_POST["task"]== "qualification.create_subject"
			){
					$this->saveSUbject();
			}else if(
					isset($_POST["task"]) &&			
					$_POST["task"]== "qualification.create_score"){
				$this->saveScore();
	
				}
			
}/*
_____________________________________________________________________
*/
function saveData(){
	global $PDO;
	$query = "INSERT INTO high_school_cert (name)
	VALUES(  ? )";
	$pds = $PDO->prepare($query); 
	
	$pds->execute( array(	$_POST["name"])    );
	
} 
function saveSUbject(){
	global $PDO;
	$query = "INSERT INTO subjects ( name, hsc)
	VALUES( ?,? )";

	$pds = $PDO->prepare($query); 
	
	$pds->execute( array(	$_POST["subject"],$_POST["exam"])	);
} 
function saveScore(){
	global $PDO;
	$query = "INSERT INTO score_set ( exam, score)
	VALUES(?, ? )";

	$pds = $PDO->prepare($query); 
	
	$pds->execute( array(		$_POST["exam"], 		$_POST["score"]		) 	);
} 

} ?>