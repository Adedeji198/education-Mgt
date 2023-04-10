var GChatFinder;
function rebind1(){
	//scroller stuff
	$("#chat-container").mCustomScrollbar("destroy");	
    $("#chat-container").mCustomScrollbar(
    	{autoHideScrollbar: true}
	); 
    $("#chat-container .mCSB_container").get(0).style.marginRight = "0px";

    //clickable classrooms
    $(".chat-item").unbind();
	$(".chat-item").bind("click",viewChats); 

	//
	
}

function rebind2(){
	//scroller stuff
	$("#chat-container").mCustomScrollbar("destroy");	

    $("#chat-container").mCustomScrollbar(
    	{autoHideScrollbar: true}
	); 

    $("#chat-container .mCSB_container").get(0).style.marginRight = "0px";

	//message send button
	$("#send-message ").unbind(); 
	$("#send-message ").bind("click",sendMessage); 

	//exit button
	$("#exit").bind(); 
	$("#exit").bind("click",viewClassrooms); 

	
}

function viewChats() {
	//$(this).siblings("input").val()
	var CourseIdBox = $(this).find("input")[0];
	
	var dat; 

	dat = {"course-id": CourseIdBox.value};
	
	$.ajax({ 
		data: dat,
		type:"post",
		url: "modules/chat/view-classroom-chats.php",
		success: chatsArrived,

		error: function(a,b,c){ 
			console.log(a); 
			console.log(b);
			console.log(c); 
		} 
	});
}

function chatsArrived(dat) {
	//console.log(dat); 
	$("#classroom").empty();
	$("#classroom").html(dat);
	rebind2();
	GChatFinder.resume();
}




function sendMessage() {
	var dat; 
	
	dat = {
		"course-id": $("#course-id").val(),
		"text": $("#message-text").val()
	};
	
	$.ajax({ 
		data: dat,
		type:"post",
		url: "modules/chat/ajax_sendNewChat.php",
		success: messageSent,
		 error: function(a,b,c){ 
			console.log(a); 
			console.log(b);
			console.log(c); 
		} 
	});
}

function messageSent(dat) {
	$("#message-text").val("");
	console.log(dat);
}

function viewClassrooms() {
	var dat; 
	 dat = {
		"": $("").val()
	};
	 $.ajax({ 
		data: dat,
		 type:"post",
		 url: "modules/chat/view-classroom.php",
		success: classroomsArrived,
		 error: function(a,b,c){ 
		console.log(a); 
		console.log(b);
		 console.log(c); 
	} 
	});
}
function classroomsArrived(dat) {

	$("#classroom").empty();
	$("#classroom").html(dat);	
	rebind1();
	GChatFinder.pause();
}



function chatFetched(dat) {
	$("#chat-container").mCustomScrollbar("destroy");	
 	$("#chat-container").empty();
 	$("#chat-container").html(dat);

	rebind2(); 	
}

//message fetching engine
var JsonObject = {};
JsonObject.Url     = "modules/chat/ajax_fetchNewChat.php";
JsonObject.callBack= chatFetched;

JsonObject.beforeSend  = function(){
	
	var dat={"course-id": $("#course-id").val()};
	return dat;
};

GChatFinder = new ChatFinder(JsonObject);

rebind1();