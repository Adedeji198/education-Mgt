
 	<?php 
 	
 	defined('_JEXEC') OR die();

 	function fetchPanemenu ($PageName) {

		global $PDO;

		$query = "SELECT * FROM pane_menu
			WHERE pagename = ?
		";
		$pds    = $PDO->prepare($query);
		/****showPrepedQuery($query,
		/****/$pds->execute(/*****/array($PageName));
		$Stuffs =  $pds->fetchAll(2);

		return $Stuffs;
	}	