
function saveUp(){
	var Rows = $("#pane-menu-table").find("tr");
	var NRows = Rows.length;
	var Cols,Id,NCols,Inp, Chk, D;
	var dat ={},dat_=[], counter =0;
	var str ="";
	
	for(var i = 1; i<NRows; i++){
		dat ={};
		Cols  = $(Rows[i]).find("td");
		NCols = Cols.length;

		//get the checkbos on this row
		Chk = $(Cols[1]).find("input")[0];

		//if checked, we begin 1. get the id
		if(Chk.checked){
			dat.id = Chk.value;
		}

		//get name and value of other inputs (if this row is checked)
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



	//console.log(JSON.stringify(dat_)  );
	dat = {"data": dat_ };
	
	$.ajax({
		data: dat,
		 type:"post", url: "modules/manage_pane_menu/ajax_EditStuff.php", 
		 success: stuffEdited, 
		 error: function(a,b,c){ console.log(a+b+c); }
	 });

}

function stuffEdited(dat){
	console.log(dat);

}


function deleteURLS(){


	var Cols,Id,NCols,Inp, Chk, D;
	var dat ={},dat_=[], counter =0;
	var str ="";

	var Rows = $("#pane-menu-table").find("tr");
	var NRows = Rows.length;	

	for(var i = 1; i<NRows; i++){
		dat ={};
		Cols  = $(Rows[i]).find("td");
		NCols = Cols.length;

		//get the checkboxes on this row
		Chk = $(Cols[1]).find("input")[0];

		//if checked, we get the id
		if(Chk.checked){
			dat_[counter++] = Chk.value;
		}
	}
	dat= {"url-ids":dat_};

	//console.log(JSON.stringify(dat)); 	return;
	//{"url-ids":["35","36","37","38","39"]}
	console.log(JSON.stringify(dat) );
	return;
	 $.ajax({ 
		data: dat,
		 type:"post",
		 url: "modules/manage_pane_menu/ajax-delete-urls.php",
		success: urlsDeleted,
		 error: function(a,b,c){ 
		console.log(a); 
		console.log(b);
		 console.log(c); 
	} 
	});
}

function urlsDeleted(dat) {
	//{"url-ids":["35","36","37","38","39"]}
	dat = evaluate(dat);

	var Rows = $("#pane-menu-table").find("tr");

	var len = Rows.length;

	for(var i=1; i<len; i++){
		if(getCheck(Rows[i]).checked){
			$(Rows[i]).remove();
		}
	}
}

function getCheck(Row){
	var Cols  = $(Row).find("td");

	Chk = $(Cols[1]).find("input")[0];
	return Chk;
}

$("#btn-delete").bind("click",deleteURLS); 

function evaluate(str){
	return window['eval']('('+str+')');
}

function beginDrag(ev){
	sonne_control = this;
}

function drop(This, ev){
	$(sonne_dst_control).before(sonne_control);
	
	renumberRows();
	dat = {};
	dat["new-ids"] = getNewArrangement();
	console.log(JSON.stringify(dat) );
	$.ajax({ 
		data: dat,
		 type:"post",
		 url: "modules/manage_pane_menu/ajax-rearrange-menu.php",
		success: menuRearranged,
		 error: errorFunction 
	});
}

function allowDrop(ev){
	ev.preventDefault();
	sonne_dst_control = this;
}

function renumberRows(){
	var Rows = $("#pane-menu-table").find("tr");
	var Tds;

	for(var i=1; i<Rows.length; i++){
		Tds=$(Rows[i]).find("td");
		Tds[0].innerHTML=""+i;
	}

}

function getNewArrangement(){
	var Rows = $("#pane-menu-table").find("tr");
	var Tds;
	var dat =[];

	for(var i=1; i<Rows.length; i++){
		Tds=$(Rows[i]).find("td");
		dat[i-1] = $(Tds[1]).find("input")[0].value;
	}
	return dat;
}

$(".menu-item-row").bind("dragstart",beginDrag);
$(".menu-item-row").bind("click",beginDrag);
$(".menu-item-row").bind("dragover",allowDrop);
//$(".menu-item-row").bind("drop",drop);
var sonne_dst_control=0;

function menuRearranged(dat) {
 console.log(dat); 
}

function errorFunction(a,b,c){
	console.log(a); 
	console.log(b);
	console.log(c); 
}