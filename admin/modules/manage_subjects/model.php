<?php
	defined("_JEXEC") or die;
	
function fetchScores($exam){
	global $PDO; 
	$query = "SELECT * FROM score_set  WHERE exam =?  ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($exam) ); 
	return $pds->fetchAll(2);
}

	
function fetchSubjects($exam){
	global $PDO; 
	$query = "SELECT * FROM subjects  WHERE hsc=?  ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($exam) ); 
	return $pds->fetchAll(2);
}

function fetchExams(){
	global $PDO; 
	$query = "SELECT * FROM high_school_cert  WHERE 1  ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array() ); 
	return $pds->fetchAll(2);
}

		