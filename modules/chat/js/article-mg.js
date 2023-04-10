function saveArticle() {
	var dat; 
	 dat = {
		"url": '27',
		"course": $("#course-id").val(),
		"section": '4',
		"category": $("#article-category").val(),
		"article-id": $("#article-id").val(),
		"text": tinymce.activeEditor.getContent(),
		"publish": ($("#publish")[0].checked)? "no" : "yes"
	};
	 $.ajax({ 
		data: dat,
		 type:"post",
		 url: "modules/chat/ajax_SaveArticle.php",
		success: articleSaved,
		 error: function(a,b,c){ 
		console.log(a); 
		console.log(b);
		 console.log(c); 
	} 
	});
}
function articleSaved(dat) {
  $("#article-id").val(dat);
}

function articleDeleted(){
		 	
	$("#article-id").val("");
	tinymce.activeEditor.setContent("");

}
function deleteArticle(){
	var dat; 
	 dat = {
		"article-id": $("#article-id").val(),
		"task": "delete"
	};
	 $.ajax({ 
		data: dat,
		 type:"post",
		 url: "modules/chat/ajax_SaveArticle.php",
		success: articleDeleted,
		 error: function(a,b,c){ 
		console.log(a); 
		console.log(b);
		 console.log(c); 
	} 
	});	
}


function articlesFetched(dat){
	console.log(dat);
	$("#fetched-articles").html(dat);
	$("#fetched-articles").slideDown();
	
	$(".article-list").unbind();
	$(".article-list").bind("click", 
		function(){

			var Txt =$(this).find("span").html();
			var Id  =$(this).find("input").val();
			tinymce.activeEditor.setContent(Txt);
			$("#fetched-articles").slideUp();
			$("#article-id").val($(this).find("input")[0].value);
		}
	);
}


function openArticle(){
	var dat; 
	 dat = {
		"course-id": $("#course-id").val(),
		"task": "fetch"
	};
	 $.ajax({ 
		data: dat,
		 type:"post",
		 url: "modules/chat/ajax_SaveArticle.php",
		success: articlesFetched,
		 error: function(a,b,c){ 
		console.log(a); 
		console.log(b);
		 console.log(c); 
	} 
	});	
}

$("#submit-article").bind("click",saveArticle); 
$("#delete-article").bind("click",deleteArticle);
$("#open-article").bind("click",openArticle);
$("#new-article").bind("click",articleDeleted);