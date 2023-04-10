setupAjaxUpload();
	
	function setupAjaxUpload(){ 
		var JsonObject = {
			action: "modules/uplload_files/ajax_Upload.php",
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
			/*
			if ($('#target').data('Jcrop')) {
			    $('#target').data('Jcrop').destroy();
			    $('#target').removeAttr('style');
			}

			/*****/

			$('#target')[0].src = "pictures/unnamed.gif";

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
			/*
			if ($('#target').data('Jcrop')) {
			    $('#target').data('Jcrop').destroy();
			    $('#target').removeAttr('style');
			}
			*/

		var Img = $('#target')[0];
			Img.src = dat;
			
			$('#file-path').val(dat);
			
			/*
			$('< %form-selector%> input[name=width]').val(Img.width);
			$('< %form-selector%> input[name=height]').val(Img.height);
			*/
			//setupJCrop(jQuery);

		}  
		
	}	
	