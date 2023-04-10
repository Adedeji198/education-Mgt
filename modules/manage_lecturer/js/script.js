function rebindstuff(){
	$("#id-adm").unbind();
	$("#id-adm").bind("click",checkAll);


	$("#btn-update").unbind();
	$("#btn-update").bind(
		"click",
		function(){
			saveUp("lecturer.convert");
		}
	);

	$("#btn-delete").unbind();

	$("#btn-delete").bind(
		"click",
		function(){
			saveUp("admission.delete");
		}
	)
	$("#btn-admit").unbind();
	$("#btn-admit").bind(
		"click",
		function(){
			saveUp("lecturer.convert");
		}
	);

	$("#btn-clear").unbind();
	$("#btn-clear").bind(
		"click",
		function(){
			saveUp("admission.clear");
		}
	);
	
	$(".view-candidate").unbind();
	$(".view-candidate").bind("click",getCandidateResult); 
	
}

function saveUp(task){
	var Rows = $("#table-admission").find("tr");
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



		
	dat = {"data": dat_,"task":task };
	$.ajax({
		data: dat,
		 type:"post", url: "modules/manage_lecturer/ajax_EditAdm.php", 
		 success: stuffEdited, 
		 error: function(a,b,c){ console.log(a+b+c); }
	 });

}

function stuffEdited(dat){

	obj = evaluate(dat);
	var ids;
	if("admission.delete"==obj.task){
			ids = obj.Ids.split(",");
			for(var i =0 ; i< ids.length; i++){
				removeItem(ids[i]);
			}
	}
	uncheckItems();
}

function removeItem(id){
	var Rows = $("#table-admission").find("tr");
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
	
	var Rows = $("#table-admission").find("tr");
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

function searchArrived(dat){
	$("#user-container").html(dat);

	rebindstuff();
}

function checkAll(){
	var Overall = this.checked;

	$(".cls-adm").each(
		function(){
			this.checked = Overall;
		}
	);
}

var JsonObj = {};

JsonObj.searchbox = '#search';
JsonObj.callBack = searchArrived
JsonObj.Url = "modules/manage_lecturer/ajax_FetchAdm.php";

new Content_Finder(JsonObj);

 JsonObj = {};

JsonObj.searchbox = '#s-level';
JsonObj.callBack = searchArrived
JsonObj.Url = "modules/manage_lecturer/ajax_FetchAdm2.php";

new Content_Finder(JsonObj);

function Content_Finder(JsonObj){
	var JsonObj_, This;
	
	JsonObj_ = JsonObj;
	This     = this;
	
	var DurationCompleted = true, 
		ContentChanged    = false, 
		ContenArrived     = true,
		SearchBox;

	function init(){

		$(JsonObj_.searchbox).bind("keyup",This.searchChanged);
	}
	
	this.searchChanged = function(){
		
		ContentChanged = true;
		SearchBox      = this;

		if(	DurationCompleted &&
			ContenArrived){

			This.reFetch();
		}
	};

	this.reFetch = function(){
		DurationCompleted = false;
		ContenArrived     = false;
		ContentChanged    = false;
		window.setTimeout(This.timeElapsed, 2000);
		This. findContent();
	};

	this.timeElapsed = 	function(){ 
		
		DurationCompleted= true;

		if(ContenArrived &&
			ContentChanged){
			This.reFetch();
		}
	};

	this.findContent = function (){
		//console.log("Started message fetch")
		var dat = {
			code: $(JsonObj_.searchbox).val(),
			"param": $(SearchBox).attr('name')
		};

		jQuery.ajax({
			data:dat,
			url:JsonObj_.Url,
			type:"post",
			success: This.ContentFound
		});
	};

	this.ContentFound = function (dat){
		
		//dat = evaluate(dat);
		var len,str ="";
		ContenArrived = true;
		
		JsonObj_.callBack(dat);
		
		if(DurationCompleted && ContentChanged){
			This.reFetch();
		}
	};


	init();
}

function getCandidateResult() {
	var dat; 
	 dat = {
		"userid": $(this).siblings("input")[0].value
	};
	 $.ajax({ 
		data: dat,
		 type:"post",
		 url: "modules/manage_lecturer/ajax_GetResltDetails.php",
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


rebindstuff();