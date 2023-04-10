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
	
	$SN = 1;


?>
<div style="padding-top: 10px; padding-left: 30px">
Senior School Certificate Examination
<hr size="10" color="#29166F">
<br>
<form method="post" >
<?php 
	
	echo $ExamsDropDxown->getDropdownstring();	
?> <br><br>
<input type="submit" value="PROCEED"/>
</form>
</div>

<?php
	if(!isset($_POST["exam-drop"])){
		goto quitit;
	}
	
?>
<br />
<br />
<?php


	$Scores1  = fetchScores($_POST['exam-drop']);
	$Scores   = array();
	$Scores[] = array("id"=>0,"score"=>"Grade");

	$Scores = array_merge($Scores,$Scores1);

	$ScoreList = new DropdownCreator();
	

	
	$ScoreList->setName("scores[]");
	//setValue
	$ScoreList->setDataArray($Scores);
	$ScoreList->setValuekey("id");
	$ScoreList->setTextkey("score");

	if(isset($_SESSION['userid'])){
		$userId   = $_SESSION['userid'];
	}else{
		$userId = 0;
	}

	$MyScores = fetchSubjectAndScores($userId, $_POST['exam-drop']);


	$Mgr = new DataManager();

	$Mgr->setData($MyScores);
	$Mgr->setKey("subject");
	$Mgr->setValuekey("score");	
	
	$Stuff = fetchSubjects ($_POST['exam-drop']);
?>
<form method="post" action="<?php echo convertURL('user-dashboard.html'); ?>">
	<table class="table"  border="0" id="table-subjects">
	<tbody>
	<tr>
		<td>&nbsp;</td>
		<td>Subject</td>
		<td>Score</td>
		</tr>
	<?php foreach( $Stuff  AS $Key=> $stuff ) { ?>
		<tr >
			<td><?php echo ($SN++); ?></td>
			<td>
				<?php echo $stuff["name"]; ?>
				<input type="hidden" name="subject[]" value ="<?php echo $stuff["id"]; ?>" />
			</td>
			<td><?php 
				$ScoreList->setValue(
					$Mgr->getValue($stuff['id'])
				);
			echo $ScoreList->getDropdownstring(); 
			?></td>
	</tr>
<?php }  ?>
</tbody>
</table>
<input type="hidden" name="task" value="qualification.save" />
<input type="hidden" name="exam-drop" value="<?php echo $_POST['exam-drop']; ?>" />
<br><br><br>
<p align="center"><input type="submit" value =" COMPLETE REGISTRATION " /></p>
</form>
<script src = "modules/manage_subjects/js/script.js" ></script>
<?php

quitit:
