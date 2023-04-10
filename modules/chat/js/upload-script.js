setupAjaxUpload();
	
	function setupAjaxUpload(){ 
		var JsonObject = {
			action: "modules/chat/ajax_Upload.php",
			name: 'userfile',
			method: "post",
			autoSubmit: true,
			data: {
				"userid": "static stuff"
			},
			responseType: "json",
			onComplete:   imageUploaded,
			//onSubmit:     addStuff
		};
		
		var Button    = $("#btn-file-upload")[0];
		var xUploader = new AjaxUpload(Button, JsonObject);
		
		function addStuff(){
			// put progress spinner

			$('#target')[0].src = "pictures/unnamed.gif";

			return true;
		}
		
		function fetchData(sel){
			var Inputs = $(sel).find("input,textarea,select");
			var  dat = {};
			for(var i in Inputs){
				dat[Input[i].name] = Input[i].value
			}
			return dat;
		}

		function imageUploaded(filename,dat){

		var Img = $('#target')[0];
			Img.src = dat;
			
			$('#file-path').val(dat);
			

		}  
		
	}	
	