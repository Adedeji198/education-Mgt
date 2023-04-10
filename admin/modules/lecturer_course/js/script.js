function displayMessage(Message){
	$("#message-box").html(Message);
	$("#message-box").show();
	window.setTimeout(
		function(){
			$("#message-box").hide();
		},
		1000
	);
}
function getLecturer() {
	var dat; 
	 dat = {
		"userid": $(this).siblings("input")[0].value
	};
	 $.ajax({ 
		data: dat,
		 type:"post",
		 url: "modules/lecturer_course/ajax_GetDetails.php",
		success: resultArrived,
		 error: function(a,b,c){ 
		console.log(a); 
		console.log(b);
		 console.log(c); 
	} 
	});
}

function resultArrived(dat) {
	$("#candidate-details").html(dat);
}

function uncheckItems(){
	
	var Rows = $("#course-table").find("tr");
	var NRows = Rows.length;
	var Cols, Chk;
	
	for(var i = 1; i<NRows; i++){	
		Cols  = $(Rows[i]).find("td");
		//Id    = getIdFrom(Cols[1].id);
		Chk = $(Cols[1]).find("input")[0];
		if( Chk.checked){
			Chk.checked = false;
		}
	}
		

}


function stuffEdited(){
	displayMessage("The task is completed");
}

function saveUp(task){
	var Rows = $("#course-table").find("tr");
	var NRows = Rows.length;
	var Cols,Id,NCols,Inp, Chk, D;
	var dat ={},dat_=[];
	var str ="",counter = 0;
	
	for(var i = 1; i<NRows; i++){
		dat ={};
		Cols  = $(Rows[i]).find("td");
		NCols = Cols.length;
		//Id    = getIdFrom(Cols[1].id);
		Chk = $(Cols[1]).find("input")[0];
		if(Chk.checked){
			dat.id = Chk.value;
		}
	
		for(var j =2; j< NCols; j++){
			Inp = $(Cols[j]).find("input,select")[0];
			if(Inp && Chk.checked){
				dat[Inp.name] = Inp.value;
			}//end if
		}//end for j
		
		if(Inp && Chk.checked){
			dat_[counter++] = dat ;
		}
	}



		console.log(JSON.stringify(dat_)  );
	dat = {"data": dat_,"task":task,"userid": $("#userid").val() };
	$.ajax({
		data: dat,
		 type:"post", url: "modules/lecturer_course/ajax_Edit.php", 
		 success: stuffEdited, 
		 error: function(a,b,c){ console.log(a+b+c); }
	 });

}
$(".view-candidate").bind("click",getLecturer); 

$("#btn-update").bind(
	"click",
	function(){
		saveUp("courses.update");
	}
);