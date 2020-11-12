var url="rest/advancedQueryWeight/?page=";
//var url="rest/genericQuery/?page=";
var url2="";
var urlName="rest/getRecipeByName/?page=";
var switchQuery = false;
var urlInspire="rest/inspireMe/";
var ingredientList = [];
var ingredientExcludeList = [];
var categoryList = [];
var pagesToLoad = null;
var firstTime = true;
var fingerprint = 0;
var clickOnAdvanced = false;
var browser = "";
var pendingRequests = 0;
var loggedUser={};
$(document).ready(function(){

	//firebaseAuthentication();
	/*firebase.auth().onAuthStateChanged(function(user) {
		console.log(user);
	  if (user) {
			loggedUser = user;
			$('#loginButtonId').html("Esci");
	  } else {
			$('#loginButtonId').html("Accedi");
	  }
	});*/

	$(document).ajaxSend(function(event, request, settings) {
		//$('#loading-indicator').show();
		$('#preloader').show();
		pendingRequests++;
	});

	// per nascondere il loader quando carica a "schiovere"
	setTimeout(function () {
		if(pendingRequests == 0) {
			$("#preloader").hide();
		}
	}, 5000);

	$(document).ajaxComplete(function(event, request, settings) {
		//$('#loading-indicator').hide();
		pendingRequests--;
		$("#results").imagesLoaded().then(function() {
			focusOnLast();
			$("#preloader").hide();
		});
		if(pendingRequests == 0 && (!ingredientList || ingredientList.length == 0)) {
			$("#preloader").hide();
		}
	});

	//$("#preloader").hide();
	$('#free_text').keypress(function(e){
		if(e.which == 13) {//Enter key pressed
			//$('#search_btn').click();//Trigger search button click event
			$("#preloader").show();
		}
	});
	$('.modal-trigger').leanModal();

	initFingerprint();
});
function createCookie(name, value, hours) {
   var date, expires;
   if (hours) {
       date = new Date();
       date.setTime(date.getTime()+(hours*60*60*1000));
       expires = "; expires="+date.toGMTString();
   } else {
       expires = "";
   }
   document.cookie = name+"="+value+expires+"; path=/";
}
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

function buildInput(type) {
	var urlPopulation = null;
	if(type == "ingredients" || type == "ingredientsExclude") {
		urlPopulation = 'rest/ingredients/?minified=true&random';
	} else {
		urlPopulation = 'rest/categories/';
	}
	var prefix = "";
	if(type == "ingredientsExclude") {
		prefix = "ex:";
	} else if(type == "categories") {
		prefix = "c:";
	}

	var inputValues = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: {
			url: urlPopulation,
			filter: function(list) {
				return $.map(list, function(ing_name) {
					return { name: ing_name };
				});
			}
		}
	});
	inputValues.clearPrefetchCache();
	inputValues.initialize();

	var mattags = $('#'+type).materialtags({
		typeaheadjs: {
			name: type,
			displayKey: 'name',
			limit: 10,
			valueKey: 'name',
			source: inputValues.ttAdapter()
		},
		itemText: function(item) {
			//console.log(item);
			return prefix+item;
		}
	});

	return mattags;
}

$(document).ready(function() {
	var mattags = buildInput('ingredients');
	buildInput('categories');
	buildInput('ingredientsExclude');

	$('#advancedSearch').hide(0);

	$('#query').keypress(function (e) {
		if (e.which == 13) {
			search_recipe(true, null, null, null);
		//	return false;    //<---- Add this line
		}
	});
	var name = getParameter("name");
	if(!name) {
		var ingredientParameter = getParameter("ingredients");

		var list = (ingredientParameter != null)? getIngredientsByUri(ingredientParameter,0) : [];
		var listExclude = (ingredientParameter != null)? getIngredientsByUri(ingredientParameter,1) : [];
		var listCategory = (ingredientParameter != null)? getIngredientsByUri(ingredientParameter,2) : [];

		if(list.length > 0 || listExclude.length > 0 || listCategory.length > 0) {

			for(var i=0; i< list.length; i++) {
				//var $tag = $('<span class="chip">' + list[i] + '<i class="material-icons" data-role="remove">close</i></span>');
	           //$('.materialize-tags').after($tag);
				if(mattags[0])
					mattags[0].add(list[i],true);
			}
			for(var i=0; i< listExclude.length; i++) {
				if(mattags[0])
					mattags[0].add(listExclude[i],true, {tagClass:"exclude"});
			}
			for(var i=0; i< listCategory.length; i++) {
				if(mattags[0])
					mattags[0].add(listCategory[i],true, {tagClass:"category"});
			}

			pagesToLoad = getParameter("page");
			if(pagesToLoad == null)
				search_recipe(true, list, listExclude, listCategory);
			else
				for(i=0; i<= pagesToLoad; i++) {
					search_recipe(i==0, list, listExclude, listCategory);
				}

			var numFilters = list.length + listExclude.length + listCategory.length;
			if(numFilters >= 2) {
				$("#resetIngredients").show();
			}
		}
	} else {
		findInName = true;
		$("#radioName").attr("checked","true");
		toggleSearchType(findInName);
		$("#query").val(name);
		search_recipe(true, null, null, null);
	}
	$("body").on("itemAdded", function(val) {
		search_recipe(true, null, null, null);
		$(".tt-input").blur();
	});

	$("body").on("itemRemoved", function(val) {
		search_recipe(true, null, null, null);
		$(".tt-input").blur();
	});

	var scrollCheck = true;

	// Each time the user scrolls
	$(window).scroll(function() {
		// End of the document reached?
		//var diff = Math.abs(getDocHeight() - ($(window).height() + $(window).scrollTop()));
		var diff = Math.abs(getDocHeight() - ($(window).scrollTop()+700));
		var eps = 300; // pixels
		//console.log(diff);
		//console.log($(window).height());
		var categoryFilter = (typeof categoria !== 'undefined');
		if(diff < eps && scrollCheck) {
			var ingredients = getIngredients(0);
			var excludeList = getIngredients(1);
			var catList = getIngredients(2);

			if (ingredients.length > 0 || excludeList.length > 0 || categoryList.length > 0 || findInName || categoryFilter) {
				//console.log("search");
				scrollCheck = false;
				firstTime = false;
				if (!categoryFilter)
					search_recipe(false, ingredients, excludeList, categoryList);
				else
					search_recipe_category(categoria, tag, false);
				setTimeout(function(){ scrollCheck = true; }, 2000); // disabilito il controllo sullo scroll per 2 secondi per evitare che venga invocato troppo spesso
			}
		}

	});
});

function resetSearch() {
	if(useAnalytics) ga('send', 'event', 'UI', 'resettaFiltri');
	addParam("ingredients", [], true);
}

function getDocHeight() {
   var D = document;
   return Math.max(
       D.body.scrollHeight, D.documentElement.scrollHeight,
       D.body.offsetHeight, D.documentElement.offsetHeight,
       D.body.clientHeight, D.documentElement.clientHeight
   );
}
var page;
var lessRecipes = false;
var advanced = false;

function toggleAdvancedSearch(value) {
	advanced = (value == null) ? !advanced : value;

	if(advanced) {
		if(!clickOnAdvanced) {
			var advancedOld = $("#advancedSearch");
			//var advancedNew = $("#advancedSearch").clone();
			//advancedOld.remove();
			advancedOld.insertAfter($(".materialize-tags"));
			clickOnAdvanced = true;
		}
		$("#advancedSearch").show("slow");
		$("#more").html("Nascondi filtri");
		$("#searchMode").hide();
	} else {
		$("#advancedSearch").hide("slow");
		$("#more").html("Filtri ricerca");
		if((ingredientList == null || ingredientList.length==0) &&
			(ingredientExcludeList == null || ingredientExcludeList.length==0) &&
			(categoryList == null || categoryList.length==0)) {
			$("#searchMode").show();
		}
	}
}
function getIngredientsByUri(ingredientsToSplit, type) {	// type: 0 ingredienti, 1 ingredienti da escludere (ex:), 2 categorie (c:)
	var list = new Array();
	if(ingredientsToSplit)
		list = decodeURI(ingredientsToSplit).split(",");
	var toReturn = new Array();
	for(i=0; i<list.length; i++) {
		if(type==0) {
			if(list[i].trim()!="" && list[i].length > 3) { // rimuove gli ingredienti troppo corti
				if(!list[i].startsWith("ex:") && !list[i].startsWith("c:"))
					toReturn.push(convertEmojiToIngredient(list[i]));
			}
		} else if(type==1) {
			if(list[i].trim()!="" && list[i].length > 3 && list[i].startsWith("ex:")) { // rimuove gli ingredienti troppo corti
				toReturn.push(list[i].substring(3,list[i].length));
			}
		} else if(type==2) {
			if(list[i].trim()!="" && list[i].length > 3 && list[i].startsWith("c:")) { // rimuove gli ingredienti troppo corti
				toReturn.push(list[i].substring(2,list[i].length));
			}
		}
	}
	return toReturn;
}

function convertEmojiToIngredient(ingredientString) {
	var emojiMap= {
    '%F0%9F%8D%8C': 'banane',
    '%F0%9F%90%B7': 'maiale macinato',
    '%F0%9F%8D%87': 'uva',
    '%F0%9F%8D%88': 'melone',
	'%F0%9F%8D%89': 'cocomero',
	'%F0%9F%8D%8E': 'mele',
	'%F0%9F%8D%8F': 'mele verdi',
	'%F0%9F%8D%95': 'pasta per pizza',
	'%F0%9F%8D%8A': 'mandarini',
	'%F0%9F%8D%8B': 'limoni',
	'%F0%9F%8D%9E': 'pane',
	'%F0%9F%A5%96': 'pane',
	'%F0%9F%A5%9A': 'uova',
	'%F0%9F%8C%B6%EF%B8%8F':'peperoncini',
	'%F0%9F%8C%B6': 'peperoncini',
	'%F0%9F%A7%80': 'formaggio',
	'%F0%9F%8D%97': 'pollo',
	'%F0%9F%8D%B7': 'vino',
	'%F0%9F%8D%84': 'funghi',
	'%F0%9F%A5%A9': 'carne bovina',
	'%F0%9F%8D%AB': 'cioccolato',
	'%F0%9F%8D%AA': 'biscotti',
	'%F0%9F%8D%90': 'pere',
	'%F0%9F%8D%91': 'pesche',
	'%F0%9F%8D%92': 'ciliegie',
	'%F0%9F%8D%93': 'fragole',
	'%F0%9F%A5%9D': 'kiwi',
	'%F0%9F%8D%85': 'pomodori',
	'%F0%9F%A5%A5': 'cocco',
	'%F0%9F%8D%86': 'melanzane',
	'%F0%9F%A5%94': 'patate',
	'%F0%9F%A5%95': 'carote',
	'%F0%9F%A5%9C': 'noccioline americane',
	'%F0%9F%A5%A6': 'broccoli',
	'%F0%9F%8C%B0': 'castagne',
	'%F0%9F%8D%94': 'panini da hamburger',
	'%F0%9F%8C%AD': 'panini da hot dog',
	'%F0%9F%8D%AF': 'miele',
	'%F0%9F%A5%A7': 'torta al cioccolato',
	'%F0%9F%8E%82': 'torta al cioccolato',
	'%F0%9F%8D%B0': 'torta al cioccolato',
	'%F0%9F%8D%A3': 'riso per sushi',
	'%F0%9F%8D%8D': 'ananas',
	'%F0%9F%8C%BD': 'mais',
	'%F0%9F%A5%91': 'avocadi',
	'%F0%9F%A5%9E': 'crepes',
	'%F0%9F%A5%93': 'bacon',
	'%F0%9F%A5%9B': 'latte',
	'%E2%98%95': 'caff'+decodeURI('%C3%A8')
    }
	var urlEncodedIngredient = encodeURI(ingredientString);
	if(urlEncodedIngredient.indexOf("%E2%")==0) { //per supportare il caffe'
		if(emojiMap[urlEncodedIngredient])
			return emojiMap[urlEncodedIngredient];
	}
	if(urlEncodedIngredient.indexOf("%F0%")>=0) {
		var mappedEmojis = "";
		var splittedEmoji = urlEncodedIngredient.split("%F0%");
		for(var i=0; i<splittedEmoji.length; i++) {
			temp = splittedEmoji[i];
			if(emojiMap["%F0%"+temp])
				mappedEmojis+=emojiMap["%F0%"+temp]+",";
			else {
				if(temp.indexOf("%E2%")>=0) {	//per supportare il caffe'
					splittedEmojiCaf = temp.split("%E2%");
					for(var j=0; j<splittedEmojiCaf.length; j++) {
						temp2 = splittedEmojiCaf[j];
						if(emojiMap["%F0%"+temp2])
							mappedEmojis+=emojiMap["%F0%"+temp2]+",";
						if(emojiMap["%E2%"+temp2])
							mappedEmojis+=emojiMap["%E2%"+temp2]+",";
					}
				}
			}
		}
		mappedEmojis = mappedEmojis.substring(0, mappedEmojis.length - 1);
	} else
		return ingredientString;
	return mappedEmojis;
}

function inspire_me() {

	try {
		hideInspiration();
	} catch(error) {

	}
	var param = {};
	if(useAnalytics) ga('send', 'event', 'UI', 'ispirami');
	var success = function(data, textStatus, jqXHR) {
		if(data.results.length > 0) {
			addParam("ingredients", data.results, true);
			search_recipe(true,data.results, [], []);
		}
	}

	var error = function (jqXHR, textStatus, errorThrown) {
		$("#preloader").hide();
		console.log(jqXHR);
	};

	doGet(urlInspire, param, success, error);
}
var paymentVersion = getParameter("paymentVersion");
function search_recipe(reset, list, listExclude, listCategory){
	if(findInName) {
		$('#query').blur();
		queryInput = $("#query").val();
		if(useAnalytics) ga('send', 'event', 'SearchByName', queryInput);
		urlToUse = urlName;
		addParam("name", queryInput, false);
		if(reset) {
			salvaCronologia("searchByName", queryInput, queryInput);
			page = 0;
			//console.log("ingredientList: "+ingredientList);
		} else
			page++;
		param = { "keywords": queryInput };
		//console.log(param);
		var success = function(data, textStatus, jqXHR) {
			constructSuccess(data,reset, false);
		};
		var error = function (jqXHR, textStatus, errorThrown) {
			$("#preloader").hide();
			console.log(jqXHR);
		};
	} else {
		if(list == null) {
			splittedList = getIngredients(0);
			splittedExcludeList = getIngredients(1);
			splittedCategoryList = getIngredients(2);
			var ingredientsList = splittedList.concat(splittedExcludeList).concat(splittedCategoryList).join(",");
			if(ingredientsList.length>0) {
				addParam("ingredients", ingredientsList, true);
			}
		} else {
			splittedList = list;
			splittedExcludeList = listExclude;
			splittedCategoryList = listCategory;
		}

		var numeroIngredienti = (splittedList ? splittedList.length : 0) + (splittedExcludeList ? splittedExcludeList.length : 0) + (splittedCategoryList ? splittedCategoryList.length : 0);
		if(numeroIngredienti >= 2) {
			$("#resetIngredients").show();
		}
		if(useAnalytics) ga('send', 'event', 'SearchByIngredients', numeroIngredienti);
		//console.log("splitted: "+splittedList);
		//console.log(ingredients);

		if(reset) {
			page = 0;
			switchQuery = false;
			ingredientList = [];
			for(var i=0; i<splittedList.length; i++) {
				ingredientList.push(splittedList[i]);
			}
			ingredientExcludeList = [];
			for(var i=0; i<splittedExcludeList.length; i++) {
				ingredientExcludeList.push(splittedExcludeList[i]);
			}
			categoryList = [];
			for(var i=0; i<splittedCategoryList.length; i++) {
				categoryList.push(splittedCategoryList[i]);
			}
			//console.log("ingredientList: "+ingredientList);
		} else
			page++;
		if(ingredientList.length>=1 || ingredientExcludeList.length >= 1 || categoryList.length >=1 ) {
			$($(".tt-input")[2]).attr("placeholder","Aggiungi ingrediente");
			$("#searchMode").hide();
		} else {
			$($(".tt-input")[2]).attr("placeholder","Inserisci un ingrediente");
			$("#searchMode").show();
		}

		var ingredientsParam = JSON.stringify(ingredientList);
		var ingredientsExcludeParam = JSON.stringify(ingredientExcludeList);
		var categoryParam = JSON.stringify(categoryList);

		if(ingredientList.length > 0)
			if(useAnalytics) ga('send', 'event', 'Ingredienti', ingredientsParam);
		if(ingredientExcludeList.length > 0) {
			var esclusi = ingredientsExcludeParam.replace(/ex:/g, '');
			if(useAnalytics) ga('send', 'event', 'Esclusi', esclusi);
		}
		if(categoryList.length > 0) {
			var categorieRipulite = categoryParam.replace(/c:/g, '');
			if(useAnalytics) ga('send', 'event', 'Categorie', categorieRipulite);
		}

		param = { "ingredients": ingredientsParam, "ingredientsExclude":ingredientsExcludeParam, "categories": categoryParam };
		//console.log(param);
		var success = function(data, textStatus, jqXHR) {
			constructSuccess(data, reset, true);
		};
		var error = function (jqXHR, textStatus, errorThrown) {
			$("#preloader").hide();
			console.log(jqXHR);
		};
		if(switchQuery)
			urlToUse = url2;
		else
			urlToUse = url;
	}
	var urlCache = contentInCache(page, ingredientsParam, ingredientsExcludeParam, categoryParam);
	if(!switchQuery && urlCache) {
		doGet(urlCache, null, success, error)
	} else
		doPost(urlToUse+page, param, success, error);
}

function contentInCache(page, ingredients, ingredientsToExclude, categories) {
	/*if(ingredients && ingredients != "[]")
		ingredients = ingredients.substring(2, ingredients.length-2);
	else
		ingredients = "";

	if(ingredientsToExclude && ingredientsToExclude != "[]")
		ingredientsToExclude = ingredientsToExclude.substring(2, ingredientsToExclude.length-2);
	else
		ingredientsToExclude = "";

	if(categories && categories != "[]")
		categories = categories.substring(2, categories.length-2);
	else
		categories = "";

	if(page == 0 && ingredients == "uova") {
		return "rest/advancedQueryWeight/cache/"+ingredients+"_"+ingredientsToExclude+"_"+categories+"_"+page+".json";
	}*/
	return null;
}

function constructSuccess(data, reset, ingredientsSearch) {
	var obj = data;
	var i = 0;
	var htmlContent = "";
	if($("#carica_altro").length>0)
		$("#carica_altro").remove();
	var ingredientsListTemp;

	if(data.results.length > 0) {
		for(var i = 0; i < data.results.length; i++) {
			ingredientsListTemp	= []
			if(data.results[i] && data.results[i].ingredienti !== null) {
				for(var j=0; j< data.results[i].ingredienti.length; j++) {
					if(isIngredientSelected(data.results[i].ingredienti[j].nome_normalizzato))
						data.results[i].ingredienti[j].ingredientSelected = true;
					else
						data.results[i].ingredienti[j].ingredientSelected = false;
					ingredientsListTemp.push(data.results[i].ingredienti[j]);
				}
				ingredientsListTemp = cleanIngredients(ingredientsListTemp);
				//console.log(ingredientsListTemp);
				//console.log("");
				htmlContent += constructHtmlRecipeBridge(data.results[i].url,data.results[i].urlImage,data.results[i].nome,data.results[i].source,ingredientsListTemp,page);
			}

			if(paymentVersion !== "true") {
				if(isAndroid || isDesktop) {
					if(page%2==0 && i==0) {
						//htmlContent += '<amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-3367489543895212" data-ad-slot="9518522485" data-auto-format="rspv" data-full-width=""><div overflow=""></div></amp-ad>';
						htmlContent += '';//<!-- Svuotafrigo-ricetta --> <ins class="adsbygoogle"      style="display:block"      data-ad-client="ca-pub-3367489543895212"      data-ad-slot="1006865466"      data-full-width-responsive="true"></ins> <script>      (adsbygoogle = window.adsbygoogle || []).push({}); </script>';
					}
				} else {
					if(page%2==0 && i==0) { // iphone, nascondo pubblicità
						//htmlContent += '<amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-3367489543895212" data-ad-slot="9518522485" data-auto-format="rspv" data-full-width=""><div overflow=""></div></amp-ad>';
						htmlContent += '';//<!-- Svuotafrigo-ricetta --> <ins class="adsbygoogle"      style="display:block"      data-ad-client="ca-pub-3367489543895212"      data-ad-slot="1006865466"      data-full-width-responsive="true"></ins> <script>      (adsbygoogle = window.adsbygoogle || []).push({}); </script>';
					}
				}
			}
		}
		if(ingredientsSearch) {
			htmlContent += '<div class="row" id="carica_altro"><button class="btn btn-primary" onclick="search_recipe(false, ingredientList)"> Carica altro... </button></div>';
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
		} else
			htmlContent += '<div class="row" id="carica_altro"><button class="btn btn-primary" onclick="search_recipe(false, ingredientList)"> Carica altro... </button></div>';
	} else {
		if(ingredientsSearch) {
			if(ingredientList.length>0 || categoryList.length>0 || ingredientExcludeList.length>0) {
				if(!switchQuery) {
					var newIngredientList = [];
					var j=0;
					for(i=0; i<ingredientList.length; i++) {
						ingredientiSplittati = ingredientList[i].split(" ");
						for(k=0; k<ingredientiSplittati.length; k++){
							newIngredientList[j] = ingredientiSplittati[k];
							j++;
						}
					}
					newIngredientListSearch = newIngredientList.join(",");
					var ingredients = getParameter("ingredients");
					if(ingredientList.length > 0 && ingredients != newIngredientListSearch)
						htmlContent = "<h5>Nessun risultato. Forse cercavi <a href='?ingredients="+newIngredientListSearch+"' style='    word-break: break-word;'>"+newIngredientListSearch+"</a>?"
					else
						htmlContent = "<h5>Nessun risultato con i filtri inseriti, prova a toglierne qualcuno</h5>";
				} else {
					htmlContent = "";
				}

				;//"<h5>Non ci sono risultati con gli ingredienti inseriti <i aria-hidden=\"true\" class=\"fa fa-meh-o\"></i></h5>";
			}
			if(!switchQuery) {
				switchQuery = true;
				// appena ottengo 0 risultati faccio una nuova richiesta cambiando query
				firstTime = false;
				page = -1;
			}
		} else
			htmlContent = "<h5>Non ci sono risultati con le parole chiave inserite <i aria-hidden=\"true\" class=\"fa fa-meh-o\"></i></h5>";
	}
	if((categoryList && categoryList.length>0) || (ingredientExcludeList && ingredientExcludeList.length>0))
			toggleAdvancedSearch(true);
	if(reset) {
		$("#results").html(htmlContent);
	} else {
		if(data.results.length > 0) {
			$("#results").append(htmlContent);
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
	if(ingredientsSearch) {
		if(switchQuery && page == -1 && (ingredientList.length>0 || lessRecipes)) {
			if(ingredientList.length>1) {
				htmlContent = "<h5><b>Ricette simili:</b></h5>";//"<h5><b>Ricette con meno ingredienti di quelli inseriti:</b></h5>";
				$("#results").append(htmlContent);
			}
			search_recipe(false, ingredientList);
		}
		if(page==0 && reset)
			salvaCronologia("searchByIngredients", param, param);

	}
	if(page == -1) {
		search_recipe(false, ingredientList);
	}
}

function cleanIngredients(ingredientsListTemp) {
	var list = ingredientsListTemp.sort(function ordina(a,b) {
		return a.ingredientSelected < b.ingredientSelected ? 1 :
					 a.ingredientSelected > b.ingredientSelected ? -1 :
					 a.nome < b.nome ? -1 :
					 a.nome > b.nome ? 1 :
					 0;
	});
	//console.log(list);

	var toReturn = [];
	var found;
	for(var i=0; i<list.length; i++) {
		if(list[i].ingredientSelected) {
			if(toReturn.length == 0 || list[i].nome != toReturn[toReturn.length-1].nome)
				toReturn.push(list[i]);
		} else {
			found = false
			for(j=0; j<toReturn.length; j++) {
				if(list[i].nome == toReturn[j].nome) {
					found = true;
					break;
				}
			}
			if(!found)
				toReturn.push(list[i]);
		}
	}
	return toReturn;
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
	    return "images/source/"+source+".png?1";
	//return "images/source/blog_gz.png";
}

function interceptRedirect(url,index,source,nomeRicetta){
	if(useAnalytics) ga('send', 'event', 'Ricetta', 'guarda', source);
	redirectToUrl(url,index, source, nomeRicetta);
	return false;
}

function redirectToUrl(urlRecipe,index, source, nomeRicetta) {
	var ingredientListJson = getIngredientsFromRecipe(urlRecipe);
	var ingredientQuery = JSON.stringify(getIngredients(0));
	if(useAnalytics) {
		ga('send', 'event', 'Ricetta', 'guarda dall\'immagine', source);
		ga('send', 'event', 'Visite', urlRecipe, fingerprint);
		ga('send', 'event', 'IngredientiQuery', ingredientQuery, ingredientListJson);
	}
	salvaCronologia("view", urlRecipe, nomeRicetta);

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

function getIngredients(type) { // type: 0 ingredienti, 1 ingredienti da escludere (ex:), 2 categorie (c:)
	var toReturn = new Array();
	$( ".chip > span" ).each(function( index ) {
	  //console.log( index + ": " + $( this ).text() );
		if(type==0) {
			if(!$(this).parent().hasClass("exclude") && !$(this).parent().hasClass("category")) {
				var ingredient = $(this).clone().children().remove().end().text();
				toReturn.push(ingredient);
			}
		} else if(type==1) {
			if($(this).parent().hasClass("exclude")) {
				var ingredient = $(this).clone().children().remove().end().text();
				toReturn.push("ex:"+ingredient);
			}
		} else if(type==2) {
			if($(this).parent().hasClass("category")) {
				var ingredient = $(this).clone().children().remove().end().text();
				toReturn.push("c:"+ingredient);
			}
		}
	});
	toReturn.sort();
	return toReturn;
}
function isIngredientSelected(ing) {

	var ing_mod = ing.toLowerCase();
	for(var i=0; i<ingredientList.length; i++){
		if(ing_mod.indexOf(ingredientList[i].toLowerCase())>=0)
			return true;
	}
	return false;
}
function addParam(key, value, reload)
{
	key = encodeURI(key); value = encodeURI(value).replace(/&/g, "%26");
	var kvp = document.location.search.substr(1).split('&');
	var origin="";

	var i=kvp.length; var x; while(i--)
	{
		x = kvp[i].split('=');
		if (x[0]==key)
		{
			x[1] = value;
			kvp[i] = x.join('=');
		} else if(x[0]=="origin") {
			origin = x[1];
		} else {
			kvp.remove(i);
		}
	}
	if(kvp.length==0 || (kvp.length == 1 && kvp[0].substring(0, 6) == "origin")) {kvp[kvp.length] = [key,value].join('=');}

	//this will reload the page, it's likely better to store this until finished
	var urlRedirect = kvp.join('&');
	if(origin!="")
		splittedUrlRedirect = origin+".php?"+urlRedirect.split('&page')[0].split('#')[0];
	else
		splittedUrlRedirect = "?"+urlRedirect.split('&page')[0].split('#')[0];
	if(reload) {

		document.location = splittedUrlRedirect;
	} else
		window.history.replaceState(null, null, splittedUrlRedirect);
}
function focusOnLast() {
	// inizio per fare scroll sull'ultima ricetta visualizzata
	var thisUrl = document.location.href;
	if(thisUrl.indexOf("bridge.php")==-1) {
		var splits = thisUrl.split("#");
		//console.log($('#'+splits[1]).length);

		if(firstTime && $('#'+splits[1]).length) {
			var topLast = $('#'+splits[1]).offset().top;
			$('html, body').animate({ scrollTop: topLast }, 'slow');
			//console.log("focusOnLast");
		}
	}
	// fine per fare scroll sull'ultima ricetta visualizzata
}
function focusOnTop() {
	$('html, body').animate({ scrollTop: 0 }, 'slow');
	if(useAnalytics) ga('send', 'event', 'UI', 'tornasu');
	$( ".tt-input" ).focus();
}

function saveRecipe(obj, nome, url, urlImmagine, source, ingredienti) {
	if (typeof(Storage) !== "undefined") { // se il browser supporta LocalStorage
		var iconHeart = $(obj).find("i")[0].innerHTML;
		if(iconHeart == "favorite") {
			$(obj).find("i").css("color","#26a69a");
			$(obj).find("i")[0].innerHTML = "favorite_border";
			rimuoviRicetta(url);
			if(useAnalytics) ga('send', 'event', 'Ricetta', 'rimuovi', source);
			showToastMessage("Ricetta rimossa dai preferiti");
		} else {
			$(obj).find("i").css("color","red");
			$(obj).find("i")[0].innerHTML = "favorite";
			salvaRicetta(nome, url, urlImmagine, source, ingredienti);
			if(useAnalytics) {
				ga('send', 'event', 'Ricetta', 'salva', source);
				ga('send', 'event', 'Ricetta', 'salvaRicetta', url);
			}
			showToastMessage("Ricetta salvata correttamente nei preferiti");
		}
		return false;
	} else {
		showToastMessage("Spiacente! Funzionalita' non supportata sul tuo cellulare");
	}
}

function getStringFavorite(url) {
	if(isSaved(url))
		return "style=\"color:red\">favorite";
	else
		return ">favorite_border";
}
function showToastMessage(msg) {
	$("#myToast").showToast({
	  message: msg,
	  timeout: 2500 // in ms
	});
}

function constructHtmlRecipeBridge(url,urlImage,name,source,ingredients,page) {
	var ingredientsHtml = ingredientsText = "";
	for (var i = 0; i < ingredients.length; i++) {
		ingredientsHtml += "<span  itemprop=\"recipeIngredient\" class='"+(ingredients[i].ingredientSelected?"ingredient-selected":"")+"'>"+ingredients[i].nome+"</span> - ";
		ingredientsText += ingredients[i].nome+" - ";
	}
	ingredientsHtml = ingredientsHtml.substring(0, ingredientsHtml.length-3);
	ingredientsText = ingredientsText.substring(0, ingredientsText.length-3);
	return constructHtmlRecipe(url,urlImage,name,source,ingredientsHtml,ingredientsText,page);
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
					'<div class="my-card-title" itemprop="name" onclick="redirectToUrl(\''+url+'\','+page+',\''+source+'\',\''+name.replace(/'/g,'\\\'')+'\')">'+name+'</div>'+
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
						'<i class="material-icons favourite" '+getStringFavorite(url)+'</i>'+
					'</a>'+

					'<!-- a href="#" url="#" onclick="likeRecipe(\''+url+'\')">'+
						'<i class="material-icons favourite" >thumb_up</i>'+
					'</a -->'+
				'</div>'+
				//'<span class="powered"> <img src="'+getImg(source)+'">&nbsp;&nbsp;</span>'+
				 '</article><!-- .end Card -->'+
		'</div>'+
	'</div>';
}

function likeRecipe(url){
	if(!loggedUser.uid){
		$('#loginModal').modal('show');

	}
	else{
		saveLike( url);
	}
}

function saveLike(url){
	database.ref('endorsements/' + convertUrlToId(url)+'/'+loggedUser.uid).set({
	 timestamp: Date.now()
 });


}
function mapSource(source){
	if(source == 'SalePepe') return 'Sale&Pepe';
	if(source == 'ilgrembiulinoinfarinato') return 'Il grembiulino infarinato';
	if(source == 'lacucinadiyuto') return 'La cucina di Yuto';
	if(source =='loscrignodelbuongusto') return 'Lo scrigno del buongusto';
	return source;
}

var findInName = false;
function toggleSearchType(value) {
	findInName = value;
	if(findInName) {
		$("#searchInNameLabel").html("Cerca nel nome della ricetta");
		$(".materialize-tags").hide();
		$("#moreContainer").hide();
		hideInspiration();
		$("#query").show();
	} else {
		$("#searchInNameLabel").html("Cerca solo ingredienti");
		$(".materialize-tags").show();
		$("#moreContainer").show();
		$("#query").hide();
	}
}

Array.prototype.remove = function(from, to) {
  var rest = this.slice((to || from) + 1 || this.length);
  this.length = from < 0 ? this.length + from : from;
  return this.push.apply(this, rest);
};

function firebaseAuthentication(){
	// Initialize the FirebaseUI Widget using Firebase.
	var ui = new firebaseui.auth.AuthUI(firebase.auth());
	// Temp variable to hold the anonymous user data if needed.
	var data = null;
	// Hold a reference to the anonymous current user.
	var anonymousUser = firebase.auth().currentUser;
	ui.start('#firebaseui-auth-container', {
	  // Whether to upgrade anonymous users should be explicitly provided.
	  // The user must already be signed in anonymously before FirebaseUI is
	  // rendered.
	  autoUpgradeAnonymousUsers: true,
	  signInSuccessUrl: 'https://svuotafrigo87.uc.r.appspot.com/ricette/android_saved.php',
	  signInOptions: [
		{
			provider: firebase.auth.GoogleAuthProvider.PROVIDER_ID,
      scopes: [
        'https://www.googleapis.com/auth/contacts.readonly'
      ],
      customParameters: {
        // Forces account selection even when one account
        // is available.
        prompt: 'select_account'
      }
    },
		{
			provider: firebase.auth.FacebookAuthProvider.PROVIDER_ID,
      scopes: [
        'public_profile',
        'email',
        'user_likes',
        'user_friends'
      ],
      customParameters: {
        // Forces password re-entry.
        auth_type: 'reauthenticate'
      }
		},
		firebase.auth.TwitterAuthProvider.PROVIDER_ID,
		firebase.auth.EmailAuthProvider.PROVIDER_ID,
		firebase.auth.PhoneAuthProvider.PROVIDER_ID
	  ],
	  callbacks: {
		// signInFailure callback must be provided to handle merge conflicts which
		// occur when an existing credential is linked to an anonymous user.
		signInFailure: function(error) {
			alert("errore: " + error.code);
		  // For merge conflicts, the error.code will be
		  // 'firebaseui/anonymous-upgrade-merge-conflict'.
		  if (error.code != 'firebaseui/anonymous-upgrade-merge-conflict') {
			return Promise.resolve();
		  }
		  // The credential the user tried to sign in with.
		  var cred = error.credential;
		  // Copy data from anonymous user to permanent user and delete anonymous
		  // user.
		  // ...
		  // Finish sign-in after data is copied.
		  return firebase.auth().signInWithCredential(cred);
		}
	  }
	});

}
