<?php class courses{
	function onAfterInitialise(){
		if(
			isset($_POST["task"]) &&
			$_POST["task"]== "courses.create"
			){
				$this->saveData();
		}
	}/*
____________________________________________________
*/
function saveData(){
	global $PDO;
	$query = "INSERT INTO courses (  name, code, level, semester )
	VALUES( ?, ?, ?, ?)";

	$pds = $PDO->prepare($query); 
	
	$pds->execute( array(
		$_POST["coursename"], 
		$_POST["coursecode"], 
		$_POST["level"],
		$_POST ['Semester']
		) 
	);
} 

} ?>