function isSaved(url) {
	var ricetteSalvate = (localStorage.getItem('ricetteSalvate'))? JSON.parse(localStorage.getItem('ricetteSalvate')) : {};
	return (url in ricetteSalvate);
}

function salvaRicetta(nome, url, urlImmagine, source, ingredienti) {
	var objectRicetta = {nome:nome, url:url, urlImmagine:urlImmagine, source: source, ingredienti:ingredienti};
	var ricetteSalvate = (localStorage.getItem('ricetteSalvate'))? JSON.parse(localStorage.getItem('ricetteSalvate')) : {};
	ricetteSalvate[url] = objectRicetta;
	localStorage.setItem('ricetteSalvate', JSON.stringify(ricetteSalvate));
}

function rimuoviRicetta(url) {
	var ricetteSalvate = (localStorage.getItem('ricetteSalvate'))? JSON.parse(localStorage.getItem('ricetteSalvate')) : {};
	delete ricetteSalvate[url];
	localStorage.setItem('ricetteSalvate', JSON.stringify(ricetteSalvate));
}

function showSavedRecipes() {
	var ricetteSalvate = (localStorage.getItem('ricetteSalvate'))? JSON.parse(localStorage.getItem('ricetteSalvate')) : {};
	html = "";
	if(Object.keys(ricetteSalvate).length == 0)
		html += "<h1>Nessuna ricetta salvata nei preferiti</h1>";
	else {
		$.each(ricetteSalvate, function (key, value) {
			html = constructHtmlRecipe(ricetteSalvate[key].url,ricetteSalvate[key].urlImmagine,unescape(ricetteSalvate[key].nome),ricetteSalvate[key].source,unescape(ricetteSalvate[key].ingredienti),unescape(ricetteSalvate[key].ingredienti),0) + html;
		});
	}
	$("#results").append(html);
}

function showHistory() {
	var cronologia = (localStorage.getItem('cronologia'))? JSON.parse(localStorage.getItem('cronologia')) : [];
	html = "";
	if(cronologia.length == 0)
		html += "<h1>Nessuna attività recente nella cronologia</h1>";
	else {
		$.each(cronologia, function (key, value) {
			html = constructHistoryElement(value) + html;
		});
	}
	$("#results").append(html);
}

function constructHistoryElement(element) {
	var toReturn = "<div>";
	var text = "";
	var origin = getParameter("origin");
	switch(element.tipo) {
	  case "view":
			if(element.labels)
	    	text = "Hai visto la ricetta <a href='./bridge.php?id="+element.param+"'>"+element.labels+"</a>";
			else
				text = "Hai visto una ricetta <a href='./bridge.php?id="+element.param+"'>dal nostro menu personalizzato</a>";

	    break;
		case "recipeOfTheDay":
				text = "Hai consultato la <a href=\"./ricetta_del_giorno.php?origin="+origin+"\">ricetta del giorno</a>";

		    break;
	  case "searchByIngredients":
			var ingredienti = JSON.parse(element.labels.ingredients);
			var ingredientiEsclusi = JSON.parse(element.labels.ingredientsExclude);
			var categorie = JSON.parse(element.labels.categories);
			var listaIngredienti = "";
			listaIngredienti += (ingredienti.length>0)? ingredienti.join(',')+",":"";
			listaIngredienti += (ingredientiEsclusi.length>0)? "ex:"+ingredientiEsclusi.join(',ex:')+",":"";
			listaIngredienti += (categorie.length>0)? "c:"+categorie.join(',c:'):"";
			listaIngredienti = encodeURI(listaIngredienti);

			text = "Hai cercato ricette <a href=\"./"+origin+".php?ingredients="+listaIngredienti+"\">";
			if(ingredienti.length > 0) {
					text += "contenenti ";
					for(i=0; i<ingredienti.length-1; i++)
						text += ingredienti[i]+", ";
					text += ingredienti[ingredienti.length-1];
			}
			if(ingredientiEsclusi.length > 0) {
					text += " senza ";
					for(i=0; i<ingredientiEsclusi.length-1; i++)
						text += ingredientiEsclusi[i]+", ";
					text += ingredientiEsclusi[ingredientiEsclusi.length-1];
			}
			if(categorie.length > 0) {
					text += " della categoria ";
					for(i=0; i<categorie.length-1; i++)
						text += categorie[i]+", ";
					text += categorie[categorie.length-1];
			}
			text += "</a>";

	    break;
	  case "searchByName":
			element.param = encodeURI(element.param);
	    text = "Hai cercato '<a href=\"./"+origin+".php?name="+element.param+"\">"+element.labels+"</a>'";
	    break;
	  default:
	    text = "Qualcosa sempre avrai fatto";
	}

	var dataMessage = "<div class='feedDateMessage'>";
	if(!element.timestamp) {
		element.timestamp = 1558087200000;
	}
	date = new Date(element.timestamp),
	datevalues = [
	   date.getFullYear(),
	   date.getMonth()+1,
	   date.getDate(),
	   date.getHours(),
	   date.getMinutes(),
	   date.getSeconds(),
	];

	if(isInToday(element.timestamp))
		dataMessage += "Oggi";
	else {
		if(isInYesterday(element.timestamp))
			dataMessage += "Ieri";
		else
			dataMessage += pad(datevalues[2],2)+"/"+pad(datevalues[1],2)+"/"+ datevalues[0];
	}
	dataMessage += " alle ore "+ pad(datevalues[3],2)+":"+ pad(datevalues[4],2);
	dataMessage += "</div>"
	toReturn += text + dataMessage+"<hr></div>";
	return toReturn;
}

function salvaCronologia(tipo, param, labels) {
	var objectCronologia = {tipo:tipo, param:param, labels:labels, timestamp:Date.now()};
	var cronologia = (localStorage.getItem('cronologia'))? JSON.parse(localStorage.getItem('cronologia')) : [];
	cronologia.push(objectCronologia);
	localStorage.setItem('cronologia', JSON.stringify(cronologia));
}

function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function isInToday(timestamp)
{
  var today = new Date();
	var inputDate = new Date(timestamp);
  if(today.setHours(0,0,0,0) == inputDate.setHours(0,0,0,0))
	 	return true;
  return false;
}

function isInYesterday(timestamp)
{
  var yesterday = new Date();
	yesterday.setDate(yesterday.getDate() - 1);
	var inputDate = new Date(timestamp);
  if(yesterday.setHours(0,0,0,0) == inputDate.setHours(0,0,0,0))
	 	return true;
  return false;
}
