//JavaScript Code	
function validateForm(FormSelector){
	try{
		var Result = true;
		var Inputs = $(FormSelector).find("input,select,textarea");
		var Password1, Password2;
		var len = Inputs.length;
		for(var c=0; c<len; c++){
			if(Inputs[c].name !== '' && Inputs[c].type !="submit"){
				if(!validateInput(Inputs[c]) ){
					redden(Inputs[c]);
					Result = false;
					if("passw"==Inputs[c].name){
						Password1 = Inputs[c];
					}
					if("passw2"==Inputs[c].name){
						Password2 = Inputs[c];
					}					

				}// End if|(!validat...)
			}//End if
		}//End for(var c=...)
		
		if(Password1.value != Password2.value){
			redden(Password1);
			redden(Password2);
		}
		
		clearInputs(FormSelector);
		return Result;

	}catch(e){
		//alert(e);
	}

}

function validateInput(Input){		
	var Str ='';
		if(Input.name == "surname" ){ 
		return validateString(Input.value); 
	}	
		
	else if(Input.name == "firstname"){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "adddress"){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "username"){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "phone"){
 		return validatePhone(Input.value); 
	}
		
	else if(Input.name == "status"){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "timestp"){
 		return validateString(Input.value); 
	}
		
	else if(
		Input.name == "passw" ||
		Input.name == "passw2" 

	){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "privilege"){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "nationality"){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "state"){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "lga"){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "nok"){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "nok_phone"){
 		return validatePhone(Input.value); 
	}
		
	else if(Input.name == "nok_address"){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "passport"){
 		return validateString(Input.value); 
	}
		
	else if(Input.name == "signature"){
 		return validateString(Input.value); 
	}
		
	return true;
}  



function validateString(val){
	return ('' !== val.trim() );
}


//Check email box
function validateEmail(val){
	reg = /[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}/;
	return reg.test(val);
}


//check phone
function validatePhone(val){
	reg = /(\+\d{2}\d? )?\d{10}\d?/;
	return reg.test(val);
}

function redden(Input){
	Input.style.border = "thin solid red";
}


function clearInputs(selector){
	
	var _selector = selector;

	

	var Restore =function(){
		
		var Inputs = $(_selector).find("input,select,textarea");
		
		var len = Inputs.length;

		for(var c=0; c<len; c++){
			if(!validateInput(Inputs[c]) ){
				Inputs[c].style.border ="thin solid #555";
			}//end if
		}//endfor
	}; //~Restore;
	window.setTimeout( Restore,5000);
	
}

function fillTheform(Form){
	var FormData = '{"surname":"Philips","firstname":"Moritz","adddress":"Indiana","username":"philips","phone":"08094762232","status":"1","timestp":"2017-5-20 11:50:00","passw":"password","passw2":"password","privilege":"1","nationality":"Nigerian","state":"Oshun","lga":"Oshogbo","nok":"Car Micheal","nok_phone":"0902113374","nok_address":"UN","passport":"/edu-prj/uploads/be16300602ed266785fde75d1385016f.png","":"submit","signature":"/edu-prj/uploads/2320d72a5634129cc1c27fe19754ab03.jpg","task":"user.register"}';
	FormData = eval('('+FormData+')');

	for(var i in FormData){
		Form[i].value = FormData[i];
	}
}