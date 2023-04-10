$("#btn-update").bind(
	"click",
	function(){
		saveUp("courses.update");
	}
);

$("#btn-delete").bind(
	"click",
	function(){
		saveUp("courses.delete");
	}
)
function saveUp(task){
	var Rows = $("#course-table").find("tr");
	var NRows = Rows.length;
	var Cols,Id,NCols,Inp, Chk, D;
	var dat ={},dat_=[], counter =0;
	var str ="",counter = 0;
	
	for(var i = 1; i<NRows; i++){
		dat ={};
		Cols  = $(Rows[i]).find("td");
		NCols = Cols.length;
		//Id    = getIdFrom(Cols[1].id);
		Chk = $(Cols[1]).find("input")[0];
		if(Chk.checked){
			dat["id"] = Chk.value;
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
	dat = {"data": dat_,"task":task };
	$.ajax({
		data: dat,
		 type:"post", url: "modules/course_registration/ajax_EditCourses.php", 
		 success: stuffEdited, 
		 error: function(a,b,c){ console.log(a+b+c); }
	 });

}

function stuffEdited(dat){

	obj = evaluate(dat);
	var ids;
	if("courses.delete"==obj.task){
			ids = obj.Ids.split(",");
			for(var i =0 ; i< ids.length; i++){
				removeItem(ids[i].trim());
			}
	}
	uncheckItems();
}

function removeItem(id){
	var Rows = $("#course-table").find("tr");
	var NRows = Rows.length;
	var Cols,Id,NCols,Inp, Chk, D;
	var dat ={},dat_=[], counter =0;
	var str ="",counter = 0;
	var DRows = [];
	var Counter = 0;
	
	for(var i = 1; i<NRows; i++){
	
		Cols  = $(Rows[i]).find("td");
		Chk = $(Cols[1]).find("input")[0];
		if(Chk.value==id+""){
			DRows[counter++] = Rows[i];	
		}
	}
		
	for(var j =0; j< DRows.length; j++){
		$(DRows[j]).remove();
	}//end for j
		
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
function evaluate(dat){
	return window["eval"]('('+dat+')')	
}