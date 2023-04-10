function clearAttendance() {
	
	var dat; 
	 dat = {
		"task": $("#attendance-task").val(),
		"course": $("#course-id").val()
	};
	 $.ajax({ 
		data: dat,
		 type:"post",
		 url: "modules/chat/ajax_Attendance.php",
		success: attendanceCleared,
		 error: function(a,b,c){ 
		console.log(a); 
		console.log(b);
		 console.log(c); 
	} 
	});
}

function attendanceCleared(dat) {
	$("#btn-clear-attendnce").unbind(); 

	$("#class-attendance").empty();
	$("#class-attendance").html(  
		'<input type="button" id="btn-clear-attendnce" value="Clear Attendance" />'+
	  	'<input type="hidden" id="attendance-task" value="clear" />'
	);


	$("#btn-clear-attendnce").bind("click",clearAttendance); 
}



function attendanceFetched(dat){
	$("#class-attendance").find("ul").remove();
	$("#class-attendance")[0].innerHTML += dat;

	$("#btn-clear-attendnce").unbind();
	$("#btn-clear-attendnce").bind("click",clearAttendance); 
}

$("#btn-clear-attendnce").bind("click",clearAttendance); 
//attendance fetching engine
var JsonObject = {};
JsonObject.Url     = "modules/chat/ajax_Attendance.php";
JsonObject.callBack= attendanceFetched;

JsonObject.beforeSend  = function(){
	var dat; 
	 dat = {
		"task": "fetch",
		"course-id": $("#course-id").val()
	};

	return dat;
};

GAttend = new ChatFinder(JsonObject);
GAttend.resume();