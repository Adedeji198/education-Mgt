
$(document).ready(
	function(){
		$("#menu-image,#menu-image2").bind("click",showMenu);
		$("#dashboard-menu-image").bind("click", showDBMenu);
		//console.log($("#menu-image2")[0]);
	}
);
function showMenu(){
	$("#nav-drop ul").toggle();
}

function showDBMenu(){
	$(".nav-drop ul").toggle();
}