
 	<?php 
 	
 	defined(_JEXEC) OR die();

 	function  ($PageName) {

		global $PDO;

		$query = "SELECT * FROM 
			WHERE  = ?
		";
		$pds    = $PDO->prepare($query);
		$pds->execute(array($PageName));
		$Stuffs =  $pds->fetchAll(2);
		return $Stuffs;
	}	