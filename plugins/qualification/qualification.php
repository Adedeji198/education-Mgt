<?php class qualification{
	function onAfterInitialise(){
		if(
			isset($_POST['task']) &&
			'qualification.save' == $_POST['task']
		){
			$this->saveQualification();
		}
	}/*
_____________________________________________________________
*/

	function saveQualification(){
		global $PDO; 

		$query2 = "DELETE FROM  subject_score WHERE hsc = ?  AND  owner = ? ";
		$pds2   = $PDO->prepare($query2); 
		$pds2-> execute(
			array(
				$_POST['exam-drop'],
				$_SESSION['userid']
			)
		);

	
		$query1 = "INSERT INTO subject_score 
		(hsc, subject, score, owner) 
		VALUES (?, ?, ?, ?) ";
		
		$pds = $PDO->prepare($query1); 

		foreach( $_POST['scores'] as $Key => $Value){
			$pds->execute( 
				array(
					$_POST['exam-drop'],
					$_POST['subject'][$Key],
					$Value,
					$_SESSION['userid']		
				) 
			); 
		}//end foreach
	}
} ?>