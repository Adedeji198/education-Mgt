/*
Url
callBack
*/
function ContentFinder(JsonObj){
	var JsonObj_, This;
	
	JsonObj_ = JsonObj;
	This     = this;
	
	var DurationCompleted=true, ContentChanged= false, 
	ContenArrived= true;

	function init(){
		This.findContent();
	}
	
	this.reFetch = function(){
		DurationCompleted = false;
		ContenArrived     = false;
		window.setTimeout(
			function(){ 
				if(ContenArrived ){
					This.reFetch();
				}else{
					DurationCompleted= true; 
				}
			}, 10000);
		This. findContent();
	};

	this.findContent = function (){
		console.log("Started message fetch")
		jQuery.ajax({
			url:JsonObj_.Url,
			type:"post",
			success: This.ContentFound
		});
	};

	this.ContentFound = function (dat){
		
		dat = evaluate(dat);
		var len,str ="";

		JsonObj_.callBack(dat);
		
		if(DurationCompleted ){
			This.reFetch();
		}else{
			ContenArrived = true;
		}
	};


	init();
}	

function evaluate(str){
	return window['eval']('('+str+')');
}