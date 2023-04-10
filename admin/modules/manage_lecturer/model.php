
<?php
function fetchusers(){
	global $PDO; 
	$query = "SELECT * FROM users  WHERE privilege =2  ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array() ); 
	return $pds->fetchAll(2);
}

function fetchusers2($search){
	global $PDO; 

	$search = "%$search%";
	$query = "SELECT * FROM users  
	WHERE 
	surname LIKE ? OR 
	firstname LIKE ? OR 
	adddress LIKE ? OR 
	phone LIKE ? OR 
	matric LIKE ? 	
	  ";
	$pds = $PDO->prepare($query);
	
	$pds->execute( array($search,$search,$search,$search,$search) ); 
	return $pds->fetchAll(2);
}


function fetchusers3($search){
	global $PDO; 

	$search = "%$search%";
	$query = "SELECT * FROM users  
	WHERE 
	level LIKE ? 	
	  ";
	$pds = $PDO->prepare($query);
	
	$pds->execute( array($search) ); 
	return $pds->fetchAll(2);
}

function fetchResult($userid){
	global $PDO;
	$query = "
	SELECT subjects.name AS sname, 
	high_school_cert.name AS hname,
	score_set.score AS score
	FROM subject_score, subjects,high_school_cert, score_set
	WHERE subject_score.owner= ?            AND 
	subject_score.subject= subjects.id      AND 
	subject_score.hsc = high_school_cert.id AND
	subject_score.score = score_set.id ";
	
	$pds = $PDO->prepare($query);
	$pds->execute(array($userid));
	
	return $pds->fetchAll(2);
}

function fetchSingleUser($userid){
	global $PDO; 
	$query = "SELECT * FROM users WHERE id= ? ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($userid) );
	
	return $pds->fetchAll(2);
	
}