
//var url="http://www.apphost.it/ricette/rest/getRecipe/?page=";
var url="http://www.apphost.it/ricette/rest/query/?page=";


$(document).ready(function() {
	$(document).ajaxSend(function(event, request, settings) {
		$('#loading-indicator').show();
	});

	$(document).ajaxComplete(function(event, request, settings) {
		$('#loading-indicator').hide();
	});

	var win = $(window);

	// Each time the user scrolls
	win.scroll(function() {
		// End of the document reached?
		if ($(document).height() - win.height() == win.scrollTop()) {

			search(false);
		}
	});

	$('input').keypress(function (e) {
		if (e.which == 13) {
			search(true);
			return false;    //<---- Add this line
		}
	});

});

var ingredientList = null;

function search(reset){

	var x = document.getElementById("ingredients").value;

	if(reset) {
		page = 0;
		ingredientList = new Array(x.toLowerCase());
	} else
		page++;	

	var ingredients = JSON.stringify(ingredientList); 

	param = { "ingredients": ingredients };
	console.log(param);

	var success = function(data, textStatus, jqXHR) {
		console.log(data);
		        /*var obj = data;
		document.getElementById("test").innerHTML = obj;*/
		var obj = data;

		//var address = data.results[0].name;


		//var dec = decodeURI(address);
		var i = 0;
		var html = "";

		if(data.results.length > 0) {
			for(var i = 0; i < data.results.length; i++) {			
				var ingredientsHtml = "";

				for(var j=0; j< data.results[i].ingredienti.length-1; j++) {
					ingredientsHtml += "<span class='"+(isIngredientSelected(data.results[i].ingredienti[j].nome.toLowerCase())?"ingredient-selected":"")+"'>"+data.results[i].ingredienti[j].nome+"</span> - ";
				}
				ingredientsHtml += "<span class='"+(isIngredientSelected(data.results[i].ingredienti[j].nome.toLowerCase())?"ingredient-selected":"")+"'>"+data.results[i].ingredienti[j].nome+"</span>";

				html += '' +
				'<div class="row list-group-item">'+
					'<div class="col-xs-6">'+
						'<a href="'+data.results[i].url+'" target="_blank"><img src = "'+data.results[i].urlImage+'" class = "img-recipe"></a>'+
					'</div>'+
					'<div class="col-xs-6">'+
						'<h4 class="list-group-item-heading text-recipe">' + data.results[i].nome +'</h4> '+
						'<p class="list-group-item-text text-recipe" >Ingredienti: '+ingredientsHtml+'<br><br><a href="'+data.results[i].url+'" target="_blank">Vai alla ricetta</a></p>'+
					'</div>'+
				  '</div>';
			}

		} else {
			html = "<h4>Spiacente non ci sono risultati con gli ingredienti inseriti</h4>";
		}

		if(reset) {
			$("#label-ingredients").html(x);
			$(".result-message").show();
			$("#results").html(html);
		} else {
			if(data.results.length > 0)
				$("#results").append(html);
		}
	};

	var error = function (jqXHR, textStatus, errorThrown) {
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
	};

	doPost(url+page, param, success, error);

}

function isIngredientSelected(ing) {
	return ingredientList.indexOf(ing)>=0;
}

function doPost(url,data,successFunc,errorFunc) {
	$.ajax({
		type: "POST",
		url: url,
		data: data,
		async: true,
		cache: false,
		crossDomain: true,
		dataType: "json",
		success: function(msg){
			successFunc(msg);
		},
		error: function(xhr) {
			errorFunc(xhr);
		}
	});
}