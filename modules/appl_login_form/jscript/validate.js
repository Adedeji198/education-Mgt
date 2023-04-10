function validateForm(FormSelector){
	try{
		var Result = true;
		var Inputs = $(FormSelector).find("input,select,textarea");

		var len = Inputs.length;
		for(var c=0; c<len; c++){
			if(Inputs[c].name !== '' && Inputs[c].type !="submit"){
				if(!validateInput(Inputs[c]) ){
					redden(Inputs[c]);
					Result = false;
				}
			}
		}
		
		clearInputs(FormSelector);
		return Result;

	}catch(e){
		//alert(e);
	}

}

function validateInput(Input){		
	var Str ='';
		if(Input.name == "username" ){ 
		return validateString(Input.value); 
	}	
		
	else if(Input.name == "password"){
 		return validateString(Input.value); 
	}else{
		return true;
	}
		

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

function PasswordPeeker(passwordfield,peekbutton){

this.InnerText = document.createElement("input");
var passwordfield_ = passwordfield;
var PassP = this;

PassP.switchThings = function(){
	//console.log('Hello');
	var Friend = $(passwordfield_)[0];
	$(PassP.InnerText).val(Friend.value);
	$(Friend).replaceWith(PassP.InnerText);
	PassP.InnerText = Friend;
};		

Friend = $(passwordfield)[0];
$(this.InnerText).attr("class",Friend.className);
$(this.InnerText).attr("id",Friend.id);
$(this.InnerText).attr("type",'text');

$(peekbutton).bind("mousedown", PassP.switchThings);
$(peekbutton).bind("mouseup"  , PassP.switchThings);
}

new PasswordPeeker("#password","#peek");