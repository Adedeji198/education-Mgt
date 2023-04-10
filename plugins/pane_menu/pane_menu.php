<?php class pane_menu{
				function onAfterInitialise(){
					if(
						isset($_POST["task"])  &&
						$_POST["task"]== "pane_menu.create"
					){	
						$this->savePaneMenu();
					}
				}
					
				
				function savePaneMenu(){
						global $PDO;
				 		$query = "INSERT INTO pane_menu (  pagename, url, title)
						VALUES( ?, ?, ? )";
					
						$pds = $PDO->prepare($query); 
						
						$pds->execute( array(
							$_POST["page-name"], 
							$_POST["url"], 
							$_POST["string"], 
							/*$_POST["privilege"]*/
							) 
						);
				}
			} ?>