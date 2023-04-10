<?php class login{
//---------------------------------
		function onAfterInitialise(){
			if(
				isset($_POST['task']) &&
			 	$_POST['task']== "user.login"){
				$this->doLogin();
			 }
		}
//---------------------------------
	function doLogin(){

	}
//---------------------------------


} ?>