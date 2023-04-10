<?php defined('_JEXEC') or die ?>
<script>
	//$("#right-pane")
	var WindowHeight = window.innerHeight;
	var RightPaneBottom;

	RightPaneBottom = $("#right-pane").offset().top +$("#right-pane").height()+60;

	var EmptySpace = WindowHeight - (RightPaneBottom+10+$("#footer").height());

	if(EmptySpace > 0){
		
		$("#right-pane")[0].style.minHeight= $("#right-pane").height() + 
			EmptySpace+"px";
		
	
	}
	

</script>