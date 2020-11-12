var url="rest/genericQueryWeight/?page=";
//var url="rest/genericQuery/?page=";

var url2="rest/query/?page=";

var switchQuery = false;

var urlInspire="rest/inspireMe/";

var ingredientList = null;

var pagesToLoad = null;

var firstTime = true;

var fingerprint = 0;

var browser = "";


$(document).ready(function(){
	$(document).ajaxSend(function(event, request, settings) {
		//$('#loading-indicator').show();
		$('#preloader').show();
	});

	$(document).ajaxComplete(function(event, request, settings) {
		//$('#loading-indicator').hide();
		$("#results").imagesLoaded().then(function() {
			focusOnLast();
			$("#preloader").hide();
			loading = false;
		});
	});

	$("#preloader").hide();
	$('#free_text').keypress(function(e){
		if(e.which == 13) {//Enter key pressed
			//$('#search_btn').click();//Trigger search button click event
			$("#preloader").show();
		}
	});
	$('.modal-trigger').leanModal();

	initFingerprint();
});

function initFingerprint() {
	// Assuming jQuery in scope

	browser = checkBrowser();

	fingerprintString =	navigator.userAgent;
	// "Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36"

	fingerprintString += navigator.language;
	// "en-US"

	var plugins = $.map(navigator.plugins, function(p){
	   var mimeTypes = $.map(p, function(mimeType){
		return [mimeType.type, mimeType.suffixes].join('~');
	   }).join(',');
	  return [p.name, p.description, mimeTypes].join('::');
	});


	$.each(plugins, function(i, p){
	  // truncate only for blog example
	  if(p.length > 80){
		fingerprintString += p.substring(0, 77) + '...';
	  } else{
		fingerprintString += p;
	  }
	});

	/*
	Shockwave Flash:Shockwave Flash 11.7 r700:application/x-shockwave-flash~swf,a...
	Chrome Remote Desktop Viewer:This plugin allows you to securely access other ...
	Widevine Content Decryption Module:Enables Widevine licenses for playback of ...
	Native Client::application/x-nacl~nexe
	Chrome PDF Viewer::application/pdf~pdf,application/x-google-chrome-print-prev...
	Google Talk Plugin Video Accelerator:Google Talk Plugin Video Accelerator ver...
	Google Talk Plugin:Version: 4.0.1.0:application/googletalk~googletalk
	Google Talk Plugin Video Renderer:Version: 4.0.1.0:application/o1d~o1d
	Shockwave Flash:Shockwave Flash 11.2 r202:application/x-shockwave-flash~swf,a...
	*/

	fingerprintString += screen.colorDepth;
	// 24

	fingerprintString += new Date().getTimezoneOffset();
	// -240

	fingerprintString += !!window.localStorage;
	// true

	fingerprintString += !!window.sessionStorage;
	// true

	fingerprint = fingerprintString.hashCode();
}

$(document).ready(function() {

	var ingredients = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: {
			//url: 'assets/ingredients.json',
			url: 'rest/ingredients/?minified=true',
			filter: function(list) {
				return $.map(list, function(ing_name) {
					return { name: ing_name };
				});
			}
		}
	});

	ingredients.clearPrefetchCache();
	ingredients.initialize();

	var mattags = $('input').materialtags({
		typeaheadjs: {
			name: 'ingredients',
			displayKey: 'name',
			valueKey: 'name',
			source: ingredients.ttAdapter()
		},
		itemText: function(item) {
			//console.log(item);
			return item;
		}
	});

	/*$('input').keypress(function (e) {
		if (e.which == 13) {
			search_recipe(true);
			return false;    //<---- Add this line
		}
	});*/

	var ingredientParameter = getParameter("ingredients");

	var list = (ingredientParameter != null)? getIngredientsByUri(ingredientParameter) : null;

	if(list != null && list.length > 0) {

		for(var i=0; i< list.length; i++) {
			//var $tag = $('<span class="chip">' + list[i] + '<i class="material-icons" data-role="remove">close</i></span>');
            //$('.materialize-tags').after($tag);
			mattags[0].add(list[i],true);
		}
		pagesToLoad = getParameter("page");
		if(pagesToLoad == null)
			search_recipe(true, list);
		else
			for(i=0; i<= pagesToLoad; i++) {
				search_recipe(i==0, list);
			}

	}


	// select the target node
	var target = $('#input')[0];

	if(target) {
		// create an observer instance
		var observerResults = new MutationObserver(function(mutations) {
			mutations.forEach(function(mutation) {
				// insert code
				if((mutation.addedNodes[0] && $(mutation.addedNodes[0]).attr("class")=="chip") || (mutation.removedNodes[0] && $(mutation.removedNodes[0]).attr("class")=="chip")) {
					search_recipe(true, null);
					//$("input").submit();
					$(".tt-input").blur();
				}
				//console.log(mutation);
			});
		});

		// configuration of the observer:
		var config = { attributes: true, childList: true, characterData: true }

		// pass in the target node, as well as the observer options
		observerResults.observe(target, config);
	}

	var scrollCheck = true;

	// Each time the user scrolls
	$(window).scroll(function() {
		// End of the document reached?
		var ingredients = getIngredients();
		var diff = Math.abs(getDocHeight() - ($(window).height() + $(window).scrollTop()));
		var eps = 250; // pixels
		//console.log($(document).height()+" - "+($(window).height()+ $(window).scrollTop()))
		//console.log($(window).height());
		if (diff < eps && scrollCheck && ingredients.length>0) {
			//console.log("search");
			scrollCheck = false;
			firstTime = false;
			search_recipe(false, ingredientList);
			setTimeout(function(){ scrollCheck = true; }, 2000); // disabilito il controllo sullo scroll per 2 secondi per evitare che venga invocato troppo spesso
		}

	});
});

function getDocHeight() {
    var D = document;
    return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    );
}

var page;
var loading = false;
var lessRecipes = false;

function getIngredientsByUri(ingredientsToSplit) {
	var list = new Array();
	if(ingredientsToSplit)
		list = decodeURI(ingredientsToSplit).split(",");
	var toReturn = new Array();
	for(i=0; i<list.length; i++)
		if(list[i].trim()!="")
			toReturn.push(list[i]);
	return toReturn;
}

function inspire_me() {

	hideInspiration();
	var param = {};
	ga('send', 'event', 'UI', 'ispirami');

	var success = function(data, textStatus, jqXHR) {
		if(data.results.length > 0) {
			addParam("ingredients", data.results);
			search_recipe(true,data.results);
		}
	}

	var error = function (jqXHR, textStatus, errorThrown) {
		$("#preloader").hide();
		console.log(jqXHR);
	};

	doGet(urlInspire, param, success, error);
}
var paymentVersion = getParameter("paymentVersion");

function search_recipe(reset, list){
	if(list == null) {
		var splittedList = getIngredients();
		var ingredientsList = splittedList.join(",");
		if(ingredientsList.length>0)
			addParam("ingredients", ingredientsList);
	} else
		splittedList = list;

	//console.log("splitted: "+splittedList);
	//console.log(ingredients);

	if(reset) {
		page = 0;
		switchQuery = false;
		ingredientList = new Array();
		for(var i=0; i<splittedList.length; i++) {
			ingredientList.push(splittedList[i]);
		}
		//console.log("ingredientList: "+ingredientList);
	} else
		page++;

	if(ingredientList.length>=1) {
		$(".tt-input").attr("placeholder","Aggiungi ingrediente");
	} else {
		$(".tt-input").attr("placeholder","Inserisci un ingrediente");
	}

	var ingredientsParam = JSON.stringify(ingredientList);

	param = { "ingredients": ingredientsParam, "token": token };
	//console.log(param);

	var success = function(data, textStatus, jqXHR) {

		var obj = data;
		var i = 0;
		var html = "";

		if($("#carica_altro").length>0)
			$("#carica_altro").remove();

		if(data.message) {
			console.log(data.message);
			if(data.message=='Invalid token')
				location.reload();
		}

		if(data.results.length > 0) {
			for(var i = 0; i < data.results.length; i++) {
				var ingredientsHtml = "";
				var ingredientsText = "";

				if(data.results[i].ingredienti !== null) {
					for(var j=0; j< data.results[i].ingredienti.length-1; j++) {
						ingredientsHtml += "<span  itemprop=\"recipeIngredient\" class='"+(isIngredientSelected(data.results[i].ingredienti[j].nome_normalizzato)?"ingredient-selected":"")+"'>"+data.results[i].ingredienti[j].nome+"</span> - ";
						ingredientsText += data.results[i].ingredienti[j].nome_normalizzato+" - ";
								}
					ingredientsHtml += "<span class='"+(isIngredientSelected(data.results[i].ingredienti[j].nome_normalizzato)?"ingredient-selected":"")+"'>"+data.results[i].ingredienti[j].nome+"</span>";
					ingredientsText += data.results[i].ingredienti[j].nome_normalizzato+" - ";
			}

                source = data.results[i].source;

				html += constructHtmlRecipe(data.results[i].url,data.results[i].urlImage,data.results[i].nome,data.results[i].source,ingredientsHtml,ingredientsText,page);
				if(paymentVersion !== "true") {
					if(isAndroid || isDesktop) {
					    if(page==0 && i==0) {
							html += '<!-- Svuotafrigo-ricetta --> <ins class="adsbygoogle"      style="display:block"      data-ad-client="ca-pub-3367489543895212"      data-ad-slot="1006865466"      data-full-width-responsive="true"></ins> <script>      (adsbygoogle = window.adsbygoogle || []).push({}); </script>';
						}
					} else {
						if(page==0 && i==0) {
							html += '<!-- Svuotafrigo-ricetta --> <ins class="adsbygoogle"      style="display:block"      data-ad-client="ca-pub-3367489543895212"      data-ad-slot="1006865466"      data-full-width-responsive="true"></ins> <script>      (adsbygoogle = window.adsbygoogle || []).push({}); </script>';
						}
					}
				}
			}
		html += '<div class="row" id="carica_altro"><button class="btn btn-primary" onclick="search_recipe(false, ingredientList)"> Carica altro... </button></div>';
			if(data.results.length < 5) {
				if(!switchQuery) {
					switchQuery = true;
					// appena ottengo 0 risultati faccio una nuova richiesta cambiando query
					firstTime = false;
					page = -1;
					lessRecipes = true;
				}
			} else {
				lessRecipes = false;
			}
		} else {
			if(ingredientList.length>0)
				html = "";//"<h5>Non ci sono risultati con gli ingredienti inseriti <i aria-hidden=\"true\" class=\"fa fa-meh-o\"></i></h5>";
			if(!switchQuery) {
				switchQuery = true;
				// appena ottengo 0 risultati faccio una nuova richiesta cambiando query
				firstTime = false;
				page = -1;
			}
		}

		if(reset) {
			loading = true;
			$("#results").html(html);
		} else {
			if(data.results.length > 0) {
				loading = true;
				$("#results").append(html);
			/*} else {
				if(!loading)
					$("#preloader").hide();
			*/}
		}
		$( ".share" ).each(function( index ) {
			if(!$(this).attr("hideBinded")) {
				$(this).hideshare({
					link: $(this).attr("url"),
					media: $(this).attr("urlImage"),
					position: "top",
					linkedin: false
				});
				$(this).attr("hideBinded","yes");
			}
		});
		if(switchQuery && page == -1 && (ingredientList.length>0 || lessRecipes)) {
			$("#preloader").show();
			if(ingredientList.length>1) {
				html = "<h5><b>Ricette simili:</b></h5>";//"<h5><b>Ricette con meno ingredienti di quelli inseriti:</b></h5>";
				$("#results").append(html);
			}
			search_recipe(false, ingredientList);
		}
	};

	var error = function (jqXHR, textStatus, errorThrown) {
		$("#preloader").hide();
		console.log(jqXHR);
	};

	if(switchQuery)
		urlToUse = url2;
	else
		urlToUse = url;
	doPost(urlToUse+page, param, success, error);
}

function getImg(source) {
	if(source=='GialloZafferano')
		return "images/source/gz.png";
	else if(source=='Misya')
		return "images/source/misya.png";
	else if(source=='SalePepe')
		return "images/source/salepepe.png";
	else if(source=='Oggi Veggie')
		return "images/source/veggie.png";
	else if(source=='lacucinadiyuto')
		return "images/source/lacucinadiyuto.png";
	else
	    return "images/source/"+source+".png";
	//return "images/source/blog_gz.png";
}

function interceptRedirect(url,index,source){
	ga('send', 'event', 'Ricetta', 'guarda',source);
	redirectToUrl(url,index);
	return false;
}

function constructHtmlRecipe(url,urlImage,name,source,ingredientsHtml,ingredientsText,page) {
	return '<div class="row">'+
			'<div class="col-xs-12 col-md-12">'+
			'<article itemscope itemtype="http://schema.org/Recipe" class="card animated fadeInLeft" id="'+convertUrlToId(url)+'">'+
			'<!-- Card -->'+
				'<img itemprop="image" class="card-img-top img-responsive" src="'+urlImage+'" alt="Immagine non disponibile" onclick="redirectToUrl(\''+url+'\','+page+',\''+source+'\',\''+name.replace(/'/g,'\\\'')+'\')" onerror="this.src = \'images/cucinare1.jpg\';"/>'+
				//'<div class="card-img-overlay">'+
				//	'<h4 class="my-card-title" itemprop="name">'+name+'</h4>'+
				//'</div>'+
				'<div class="card-block">'+
					'<div class="my-card-title" itemprop="name">'+name+'</div>'+
					'<div class="my-card-subtitle" itemprop="name"> &copy; '+mapSource(source)+'</div>'+
					'<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">'+
					'<p class="card-text ingredient-list">'+
					//'<p>Ingredienti</p>:&nbsp;'+
					ingredientsHtml+'</p>'+
					'<div class="buttonShare"><a href="'+url+'?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(\''+url+'\','+page+',\''+source+'\',\''+name+'\')"><i class="material-icons">open_in_new</i></a>'+
					'<a class="share btn btn-floating" href="#" url="http://www.apphost.it/ricette/ricetta.php?id='+url+'" urlImage="'+urlImage+'">'+
						'<i class="material-icons">share</i>'+
					'</a>'+
					'<a href="#" url="'+url+'" onclick="return saveRecipe(this,\''+escape(name)+'\',\''+url+'\',\''+urlImage+'\',\''+source+'\',\''+escape(ingredientsText)+'\')">'+

					'</a>'+
				'</div>'+
				//'<span class="powered"> <img src="'+getImg(source)+'">&nbsp;&nbsp;</span>'+
				 '</article><!-- .end Card -->'+
		'</div>'+
	'</div>';
}
function mapSource(source){
	if(source == 'SalePepe') return 'Sale&Pepe';
	if(source == 'ilgrembiulinoinfarinato') return 'Il grembiulino infarinato';
	if(source == 'lacucinadiyuto') return 'La cucina di Yuto';
	if(source =='loscrignodelbuongusto') return 'Lo scrigno del buongusto';
	return source;
}

function redirectToUrl(urlRecipe,index, source) {
	var ingredientListJson = getIngredientsFromRecipe(urlRecipe);
	var ingredientQuery = JSON.stringify(getIngredients(0));
	ga('send', 'event', 'Ricetta', 'guarda dall\'immagine', source);
	ga('send', 'event', 'Visite', urlRecipe, fingerprint);
	ga('send', 'event', 'IngredientiQuery', ingredientQuery, ingredientListJson);
	
	var generatedUrl = generateUrl(urlRecipe, index);
	history.replaceState(null, null, generatedUrl);
	document.location = urlRecipe+"?ref=svuotafrigo";
}

function getIngredientsFromRecipe(urlRecipe) {
	var idElement = convertUrlToId(urlRecipe);
	var ingredientListJson = "[";
	$( "#"+idElement+" .ingredient-list span" ).each(function( index ) {
  	ingredientListJson += "\""+$( this ).text() +"\",";
	});
	if(ingredientListJson == "[") {
		if($( "#"+idElement+" .ingredient-list").html()) {
			var ingredientiListaSplittata = $( "#"+idElement+" .ingredient-list").html().split(" - ");
			for(var i = 0; i<ingredientiListaSplittata.length; i++)
		  	ingredientListJson += "\""+ingredientiListaSplittata[i] +"\",";
		}
	}
	if(ingredientListJson == "[") {
		$( "#ricetta #ingredienti span" ).each(function( index ) {
			ingredientListJson += "\""+$( this ).text() +"\",";
		});
	}
	ingredientListJson = ingredientListJson.substring(0, ingredientListJson.length - 1) + "]";
	return ingredientListJson;
}

function generateUrl(url, index) {
	var thisLocation = document.location.href.split("&page");
	var idLast = convertUrlToId(url);
	return thisLocation[0]+'&page='+index+'#'+idLast;
}

function getIngredients() {
	var toReturn = new Array();
	$( ".chip > span" ).each(function( index ) {
	  //console.log( index + ": " + $( this ).text() );
	  var ingredient = $(this).clone().children().remove().end().text();
	  toReturn.push(ingredient);
	});
	return toReturn;
}

function isIngredientSelected(ing) {

	for(var i=0; i<ingredientList.length; i++){
		if(ing.indexOf(ingredientList[i].toLowerCase())>=0)
			return true;
	}
	return false;
}

function addParam(key, value)
{
	key = encodeURI(key); value = encodeURI(value).replace(/&/g, "%26");

	var kvp = document.location.search.substr(1).split('&');

	var i=kvp.length; var x; while(i--)
	{
		x = kvp[i].split('=');

		if (x[0]==key)
		{
			x[1] = value;
			kvp[i] = x.join('=');
			break;
		}
	}

	if(i<0) {kvp[kvp.length] = [key,value].join('=');}

	//this will reload the page, it's likely better to store this until finished
	var urlRedirect = kvp.join('&');
	splittedUrlRedirect = "?"+urlRedirect.split('&page')[0].split('#')[0];
	document.location = splittedUrlRedirect;
}

function focusOnLast() {
	// inizio per fare scroll sull'ultima ricetta visualizzata
	var thisUrl = document.location.href;
	var splits = thisUrl.split("#");
	//console.log($('#'+splits[1]).length);

	if(firstTime && $('#'+splits[1]).length) {
		var topLast = $('#'+splits[1]).offset().top;
		$('html, body').animate({ scrollTop: topLast }, 'slow');
		//console.log("focusOnLast");
	}
	// fine per fare scroll sull'ultima ricetta visualizzata
}

function focusOnTop() {
	$('html, body').animate({ scrollTop: 0 }, 'slow');
	ga('send', 'event', 'UI', 'tornasu');
	$( ".tt-input" ).focus();
}
