<?php class user{
//------------onAfterInitialize--------------	
	function onAfterInitialise(){

		global $PageName;
		
		if(
			isset($_POST['task']) &&
		 	$_POST['task']== "user.register"
		){
			$G = $this->saveData();
			if($G){
				$this->changeDestination();
			}		
		}else if(
			isset($_POST['task']) &&
		 	$_POST['task']== "user.login"
		){
			$G= $this->login();
			if($G){
				header("Location: 	user-dashboard.html");
			}
		}else if(
			isset($_POST['task']) &&
		 	$_POST['task']== "user.change-password"
		){
			$G= $this->savePassword();
		}else if(
			isset($_POST['task']) &&
		 	$_POST['task']== "user.student-login"
		){
			$this->studentLogin();
 		}

	}
//--------------saveData------------------------
	function saveData(){
		global $PDO;

			$TimeStamp = date("Y-m-d H:i:s");

			$query = "INSERT INTO  users(surname, firstname, adddress, username, phone, status, timestp, passw, privilege, nationality, state, lga, nok, nok_phone, nok_address, passport, signature, level,matric,clearance, mail) 
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )" ;

		$pds = $PDO->prepare($query);
		$Res = $pds->execute(
			array ( 
			$_POST['surname'],
			$_POST["firstname"],
			$_POST["adddress"],
			$_POST["username"],
			$_POST["phone"],
			"1",
			$TimeStamp,
			$_POST["passw"],
			"1",
			$_POST["nationality"],
			$_POST["state"],
			$_POST["lga"],
			$_POST["nok"],
			$_POST["nok_phone"],
			$_POST["nok_address"],
			$_POST["passport"],
			$_POST["signature"],
			"000",
			'','',
			$_POST['email']
			)
		);




		if(!$Res){
			$_POST['register.error'] = 1;
		}else{
			$_SESSION['userid'] = $PDO->lastInsertId();
			$_SESSION['privilege'] = '1'; 
		}

		return $Res;
	}/*
______________________________________________________________
*/
	function login(){
		global $PDO;
		$query = "SELECT * FROM users 
			WHERE 
			username= ? AND 
			passw= ?	  
			";
	
	
		$pds = $PDO->prepare($query);

/*	showPrepedQuery($query, */

		$Res = $pds->execute(
			array ( 
			$_POST["username"],
		$_POST["password"]		)
		);
		
		$R = $pds ->fetchAll(2);

		if(sizeof($R) == 0){
			$_POST['register.error'] = 1;
			return 0;
		}else{
			$_SESSION["userid"] = $R[0]['id'];
			return 1;
		}
	}/*
________________________________________________________________
*/
	function changeDestination(){
		global $PageName;
		if($this-> fetchSubjectAndScores($_SESSION['userid'])){
			$PageName = convertURL('user-dashboard.html');
			header("Location: $PageName");
		}else{
			$PageName = convertURL('qualification.html');
			header("Location: $PageName");
		}
	}/*
_________________________________________________________________
*/
	function fetchSubjectAndScores($userId){
		global $PDO;
		$query = "SELECT subject_score.subject, subject_score.score 
		FROM subject_score,high_school_cert
		WHERE
		subject_score.owner = ? AND 
		subject_score.hsc   = high_school_cert.id ";
		
		$pds = $PDO->prepare($query); 
		$pds->execute( array($userId) ); 
		$R = $pds->fetchAll(2);	
		return sizeof($R);
	}/*
_________________________________________________________________
*/
	
	function savePassword(){
		global $PDO;
		$query = "UPDATE users SET passw =? , username= ? WHERE id=? ";
		
		$pds = $PDO->prepare($query); 

		$pds->execute( 
		array(
				$_POST['password'],
				$_POST['username'],
				$_SESSION['userid']
			) 
		); 
		
		return true;
	}/*
_________________________________________________________________
*/

	function studentLogin(){
		global $PDO;
		global $PageName;

		$query = "SELECT * FROM users 
			WHERE matric= ? AND 
		passw= ?	";
		
		$pds= $PDO->prepare($query);
		/***showPrepedQuery($query,/**/
		$pds->execute(/**/
			array(	
				$_POST['matric'],
				$_POST['password']
			)
		);

		$Res = $pds->fetchAll(2);

		
		
		if(!sizeof($Res) ){
			$_POST['register.error'] = 1;
			$PageName = "login.html";

		}else{
			$_SESSION['userid']    = $Res[0]['id'];
			$_SESSION['privilege'] = $Res[0]['privilege'];
		}

		return $Res;
	}/*
_________________________________________________________________
*/

}//~class

 