<?php 
	defined("_JEXEC") OR die;
	include dirname(__FILE__)."/model.php";
	include dirname(__FILE__)."/helper.php";
	$Exams = fetchExams();

	$ExamsDropDxown = new DropdownCreator();

	
	$ExamsDropDxown->setID("exam-drop");
	$ExamsDropDxown->setName("exam-drop");
	
	$ExamsDropDxown->setDataArray($Exams);
	$ExamsDropDxown->setValuekey("id");
	$ExamsDropDxown->setTextkey("name");
	

?>

<div style="padding-top: 50px; padding-left: 30px">
<h2>Subjects And Scores</h2>
<h3 style="margin-top: 100px">Select Exam</h3>
<form method="post">
<?php 
echo $ExamsDropDxown->getDropdownstring();	
?>
<input type="submit" value="go"/>
</form>
</div>

<?php 
include dirname(__FILE__)."/view-subjects.php";