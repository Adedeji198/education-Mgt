	function setupAjaxUpload(button_,target,InputBox){ 
		var JsonObject = {
			action: "modules/registration/ajax_Upload.php",
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
		
		var Button    = button_;
		var xUploader = new AjaxUpload(Button, JsonObject);
		
		function addStuff(){
			// put progress spinner
			/*
			if ($('#target').data('Jcrop')) {
			    $('#target').data('Jcrop').destroy();
			    $('#target').removeAttr('style');
			}

			/*****/

			$(target)[0].src = "pictures/spinner.gif";

			// add the data before uploading
			/*
			var dat = fetchData("#form");
			xUploader.setData(dat);
			/****/
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

		var Img = $(target)[0];
			Img.src = dat;
			
			$(InputBox).val(dat);
			

		}  
		
	}	
	

	new setupAjaxUpload( $("#btn-pass-upload")[0],"#target",'#passport-path' );
	new setupAjaxUpload( $("#btn-sign-upload")[0],"#target2",'#sign-img-path' );

