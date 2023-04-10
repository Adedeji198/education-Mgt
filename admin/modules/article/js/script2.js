
function getSubCategory(e) {
	e.stopPropagation();
	var dat; 
	 dat = {
		"id": $(this).parents("li")[0].id.substring(9)
	};
	 $.ajax({ 
		data: dat,
		 type:"post",
		 url: "modules/article/pr_fetchsubcat.php",
		success: subcatArrived,
		 error: function(a,b,c){ 
		console.log(a); 
		console.log(b);
		 console.log(c); 
	} 
	});


}

function evaluate (str){
	return window["eval"]("("+str+")");
}

function articleArrived(dat){
	console.log(dat);	
}

function removeSubCategory(e){
	e.stopPropagation();
	var InnnerUl = $(this).parent().find("ul")[0];
	if (InnnerUl){
		$(InnnerUl).remove();
	}

	this.className = "cls-plus";
	$(this).unbind("click");
	$(this).bind("click",getSubCategory);
}

function subcatArrived(dat) {
	 // [{"id":"4","name":"Job Opportunities","parent":"3","source":"x","levl":"2"},{"id":"5","name":"Scholarship Opportunities","parent":"3","source":"x","levl":"2"}]
	 dat = evaluate(dat);

	 var len = dat.data.length;
	var stuff = '<ul>';
	for(i=0; i<len; i++){
		stuff += 
		'<li id="tree-cat-'+dat.data[i].id+'" class="cls-item" >'+
		'<span class = "cls-plus"></span>'+
		'<span class="cls-item">'+dat.data[i].name+'</span>'+
		'</li>';	  
	} 
	//console.log(JSON.stringify(dat) );
	len = dat.articles.length;
	for(i=0; i<len; i++){
		stuff += 
		'<li  >'+
		'<span class = "article-title"><strong>'+dat.articles[i].title+'</strong></span>'+
		'<span class="excerpt" style="inline-block; padding-left:20px">'+strip_tags(dat.articles[i].string).substring(0,50)+'...</span>'+
		'<span ><input type="button" class="cls-btn-edit" value="Edit" />'+
		'<input type="hidden" value="'+dat.articles[i].id+'" />'+
		'</span>'+'</li>';	  
	}

	stuff += '</ul>';
	
	$("li#tree-cat-"+dat.id)[0].innerHTML +=(stuff);
	var G= $("li#tree-cat-"+dat.id).find("span.cls-plus")[0];
	G.className = "cls-minus";

	$("#tree-id li>span.cls-plus").unbind("click");  
	$("#tree-id li>span.cls-plus").bind("click",getSubCategory);  

	$("#tree-id li>span.cls-minus").unbind("click");
	$("#tree-id li>span.cls-minus").bind("click",removeSubCategory);

	$("input.cls-btn-edit").unbind("click");
	$("input.cls-btn-edit").bind("click",fetchTheArticle);
}

$("#tree-id li>span.cls-plus").bind("click",getSubCategory);  	

function strip_tags(str){
		return str.replace(/<\w+\s*>|<\w+\s*\/>|<\/\w+\s*>|<\w+(\s+\w+\s*=\s*"[^"]*")+\s*>|<\w+(\s+\w+\s*=\s*"[^"]*")+\s*\/>/g, "");

}


function fetchTheArticle() {
	var dat; 
	 dat = {"id": $(this).siblings("input")[0].value};
	 console.log(JSON.stringify(dat) );
	 $.ajax({ 
		data: dat,
		 type:"post",
		 url: "modules/article/fetchArticle.php",
		success: artice_Arrived,
		 error: function(a,b,c){ 
		console.log(a); 
		console.log(b);
		 console.log(c); 
	} 
	});
}
function artice_Arrived(dat) {
	dat = evaluate(dat);
/*
{
output:[
	{
	"id"      : "2",
	"string"  : "Article 2<\/strong><\/p>\r\nI shall monitor the value this time<\/p>",
	"title"   : "Testing",
	"category": "6",
	"url"     :"9",
	"section":"1",
	"timecode":"2017-04-16 05:01:59",
	"levl":null,
	"author":null,
	"source":null,
	"status":"1"
	}
]
}
/*****/
	tinymce.activeEditor.setContent(dat.output[0].string);
	
	$("#article-title").val(dat.output[0].title);
	$("#article-id").val(dat.output[0].id);

	setDropDownValue( 
		$("#article-category")[0],
		dat.output[0].category
	);

	setDropDownValue( 
		$("#article-URL")[0],
		dat.output[0].url
	);	

	setDropDownValue( 
		$("#article-section")[0],
		dat.output[0].section
	);	
	//console.log(dat); 
}

function setDropDownValue(DropDown,Value){
	var len = DropDown.length;
	for(var i=0; i< len; i++){
		if(DropDown[i].value == Value){
			DropDown.selectedIndex = i;
		}
	}
}

function createNewArticle(){

	tinymce.activeEditor.setContent("");	
	$("#article-title").val("");
	$("#article-id").val("");
	$("#article-category")[0].selectedIndex = 0;
	$("#article-URL")[0].selectedIndex = 0;
	$("#article-section")[0].selectedIndex = 0;

}

$("input.cls-btn-edit").bind("click",fetchTheArticle);
$("#new-article").bind("click",createNewArticle);