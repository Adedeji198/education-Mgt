<?php class users{
	function onAfterInitialise(){
		if(
			isset($_POST["task"]) &&
			"admission.create" == $_POST["task"]
				
		){
			$this->createUser();
		}else if(
				isset($_POST["task"]) &&
				"user.create-lecturer" == $_POST["task"]	
			){
				$this->createLecturer();
			}
	}
/*______________________________________________________________*/

	function createUser(){
		global $PDO; 
		global $PDO; 
		$query = "INSERT INTO users (surname, firstname, adddress, phone,username, passw)  
		VALUES (?, ?, ?, ?,? ,?) "; 
		$pds = $PDO->prepare($query); 
		
		$pds->execute( 
			array(
				$_POST["surname"], 
				$_POST["firstname"], 
				$_POST["address"], 
				$_POST["phone"],
				$_POST["username"], 
				$_POST["password"])
		);
	}
/*______________________________________________________________*/
	function createLecturer(){
		global $PDO; 

		$query = "INSERT INTO users (surname, firstname, matric, passw,privilege) 
		VALUES (?, ?, ?, ?, ?) "; 
		
		$pds = $PDO->prepare($query); 
		$pds->execute( 
			array(
				$_POST["surname"], 
				$_POST["firstname"], 
				$_POST["username"], 
				$_POST["password"],
				"2"
			) 
		); 
	}
} 
?>