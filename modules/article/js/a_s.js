
(function(){

	var strip_tags = function (str){
		return str.replace(/<\w+\s*>|<\w+\s*>|<\w+(\s+\w+\s*=\s*"[^"]*")+\s*>|<\w+(\s+\w+\s*=\s*"[^"]*")+\s*\/>/g, "");

	}
	var evaluate function (str){
		return window['eval']( "(" +str+ ")" );
	}

    var getIdFrom = function (str){

        var MyId = str.split("-");
        var len = MyId.length;

        

        return MyId[len-2]+'-'+ MyId[len-1];
    }

	var TheParent = "";

	var catArrived = function (dat){
		try{		
				dat = evaluate(dat);
				var str ="";
					str+='<ul class="cat-tree">';
					

					for(var i in dat ) { 
						str +='<li id="tree-cat-'+dat[i].id+'-'+dat[i].source+'" class="cls-cat-item"><span class="cls-plus-btn"></span> <span class="cls-cat-item">'+dat[i].name+'</span></li>';
					}

					str += '</ul>';

					$(TheParent).append(str);
					$("li.cls-cat-item").unbind("click");
				
					TheParent.className = "cls-cat-item-2";
					$("li.cls-cat-item").bind("click",fetchSubCat);
					$(TheParent).bind("click",removeInnerUL);
		}catch(e){
			alert(e.message+' '+dat);
			//alert("server error");
		}
					
	}

	var fetchSubCat = function (e){
	try{
		e.stopPropagation();
		
		var dat	={"id" : getIdFrom(this.id) };
		var url = "modules/<%modules-name%>/pr_fetchsubcat.php";

		TheParent = this;

		$.ajax({
			data: dat,
			type:"post", 
			url: url, 
			success: catArrived, 
			error: function(a,b,c){ console.log(a+b+c); } 
		});


		url = "modules/<%modules-name%>/pr_fetchArticle.php";
		

		$.ajax({
			data: dat,
			type:"post", 
			url: url, 
			success: artArrived, 
			error: function(a,b,c){ console.log(a+b+c); } 
		});

		}catch(e){
			alert(e);
		}
	}



	var artArrived = function (dat){
		
		var str ="", x;
	
		dat = evaluate(dat);

		str+= '<table>';
 		for (var i in dat) {	
			str+='<tbody>'+
			'<tr>'+
			'<td id="article-'+dat[i].id+'" width="150"><strong>'+dat[i].title+'</strong></td>'+
			'<td>';

			x = strip_tags(dat[i].string); 
			//console.log(x);
			x = x.substring( 0,80);
			str += x +
			'</td>'+
			'<td>'+
			'<form method="post" action ="<?php echo convertURL("articles.html"); ?>">'+
			'<input type="submit" value="Edit">'+
			'<input type="hidden" value="'+dat[i].id+'" name="article-id" />'+
			'<input type="hidden" value="'+dat[i].title+'" name="article-title" />'+
			'<input type="hidden" name="article-category" value="'+dat[i].category+'" />'+
			'</form>'+
			'</td>'+
			'</tr>';
 		} 
		str += '</tbody>'+
		'</table>';
		
		$("#article-table").html(str);
		
	}

	var fetchArticles = function (){
		
		var dat	={"id" : getIdFrom(this.id) };

		var url = "modules/article_search/pr_fetchArticle.php";
		TheParent = this;
		$("#article-category").val(getIdFrom(this.id));
		$.ajax({
			data: dat,
			type:"post", 
			url: url, 
			success: artArrived, 
			error: function(a,b,c){ console.log(a+b+c); } 
		});
	}

	var removeInnerUL = function (e){
		e.stopPropagation();

		$(this).find("ul.cat-tree").remove();
		this.className ="cls-cat-item";
		
		var dat	={"id" : getIdFrom(this.id) };
		var url = "modules/article_search/pr_fetchArticle.php";
		TheParent = this;
		$("#article-category").val(getIdFrom(this.id));
		$.ajax({
			data: dat,
			type:"post", 
			url: url, 
			success: artArrived, 
			error: function(a,b,c){ console.log(a+b+c); } 
		});		
		


	}


	$("li.cls-cat-item").bind("click",fetchSubCat);
	$("li#tree-cat-0-").bind("click",fetchArticles);

})();