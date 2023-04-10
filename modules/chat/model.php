  <?php defined('_JEXEC') or die;

	function getArticles(){
		global $PDO;
		$Section = 'main';
		$Url     = 'classroom.html';
		$query  =  
		"SELECT articles.*, url.string AS turl ,section.string as tsection
		FROM url,section,articles 
		WHERE url.string = ? AND 
		section.string   = ? AND 
		articles.course  = ? AND
		(articles.url= url.id OR articles.url ='0') AND
		articles.section = section.id";

		$pds    = $PDO->prepare($query);

		/***showPrepedQuery($query, /***/
		$pds->execute(  /***/
			array( $Url,$Section, $_POST['course-id'] )
		);

		return $pds->fetchAll(2);
	}    

	function fetchuserCourses($semester = 1){
		global $PDO; 
		$query = "SELECT user_courses.*,courses.id AS courseid,
		courses.code, courses.name
		FROM user_courses,  courses
		WHERE  user_courses.user= ? AND
			  user_courses.course = courses.id AND 
			  courses.semester = ?
		";
		$pds = $PDO->prepare($query); 
		$pds->execute( array($_SESSION["userid"],$semester) );
		return $pds->fetchAll(2);  
	}

	function fetchNotifications(){
		global $PDO; 
		$query = "
		SELECT notification.*, users.surname,users.firstname 
		FROM notification,users 
		WHERE notification.owner= ? AND
		users.id = notification.sender
		ORDER BY id asc 
		LIMIT 20
		";

		$pds = $PDO->prepare($query); 
		
		$pds->execute( array($_POST["course-id"]) );
		return $pds->fetchAll(2);
	}

	function getCourseName($courseId){
		global $PDO; 
		$query = "SELECT name
		FROM   courses
		WHERE  id =?
		";
		$pds = $PDO->prepare($query); 
		$pds->execute( array($courseId) );
		$R = $pds->fetchAll(2);  
		if(sizeof($R)){
			return $R[0]['name'];
		}else{
			return "";
		}
	}

	function sendMessage(){
		global $PDO; 
		$query = "INSERT INTO notification (string, timestp, owner, status, sender, title) 
		VALUES (?, ?, ?, ?, ?, ?) "; 
		$pds = $PDO->prepare($query);

		$timestp = date("Y-m-d H:i:s");

		$pds->execute( 
			array(
				$_POST["text"],
				$timestp,
				$_POST["course-id"], 
				"1", 
				$_SESSION["userid"],
				"lecture"
			)
		);
	}
	
	function classroomCheckin(){
		global $PDO; 
		$timestmp = date("Y-m-d H:i:s");
		$query = $query = "INSERT INTO attendance (course, user, timestmp) 
VALUES (?, ?, ?) " ;
		$pds = $PDO->prepare($query); 
		/**showPrepedQuery( $query, /**/
		$pds->execute( /***/
		array($_POST["course-id"], $_SESSION["userid"],$timestmp) );
	}
	
	function fetchAttendance(){
		global $PDO; 
		$query = "
		SELECT attendance.*,users.matric 
		FROM attendance,users 
		WHERE 
		attendance.course = ?       AND
		attendance.user   = users.id
		";

		$pds = $PDO->prepare($query); 
		$pds->execute( array($_POST["course-id"]) );
		
		return $pds->fetchAll(2);
	}
?>