// Fn to allow an event to fire after all images are loaded
$.fn.imagesLoaded = function () {

    // get all the images (excluding those with no src attribute)
    var $imgs = this.find('img[src!=""]');
    // if there's no images, just return an already resolved promise
    if (!$imgs.length) {return $.Deferred().resolve().promise();}

    // for each image, add a deferred object to the array which resolves when the image is loaded (or if loading fails)
    var dfds = [];
    $imgs.each(function(){

        var dfd = $.Deferred();
        dfds.push(dfd);
        var img = new Image();
        img.onload = function(){dfd.resolve();}
        img.onerror = function(){dfd.resolve();}
        img.src = this.src;

    });

    // return a master promise object which will resolve when all the deferred objects have resolved
    // IE - when all the images are loaded
    return $.when.apply($,dfds);
}

String.prototype.hashCode = function(){

    var hash = 0;
    if (this.length == 0) return hash;
    for (i = 0; i < this.length; i++) {
        char = this.charCodeAt(i);
        hash = ((hash<<5)-hash)+char;
        hash = hash & hash; // Convert to 32bit integer
    }
    return hash;
}

function checkBrowser() {
	if((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1 )
    {
        return 'Opera';
    }
    else if(navigator.userAgent.indexOf("Chrome") != -1 )
    {
        return 'Chrome';
    }
    else if(navigator.userAgent.indexOf("Safari") != -1)
    {
        return 'Safari';
    }
    else if(navigator.userAgent.indexOf("Firefox") != -1 )
    {
         return 'Firefox';
    }
    else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) //IF IE > 10
    {
      return 'IE';
    }
    else
    {
       return 'unknown';
    }
}

function convertUrlToId(url) {
	return url.replace(/\.|\/|:|-/gi, '');
}

function getParameter(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function sanify(val) {
	return val.replace(/ /g, "_").replace(/\(/g, "_").replace(/\)/g, "_").replace(/'/g, "_").replace(/\//g, "_").replace(/%/g, "_").replace(/\./g, "_").replace(/,/g, "_").replace(/:/g, "_");
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

function doGet(url,data,successFunc,errorFunc) {
	$.ajax({
		type: "GET",
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

String.prototype.capitalize = function() {
  return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase()
}

function getIngredientImage(url) {
	// var http = new XMLHttpRequest();
    // http.open('HEAD', url, false);
    // http.send();
    // return (http.status!=404)?url:"img/ingredienti/default.png";
	return url;
}

function removeSpecialChars(word) {
	return word.toLowerCase().replace(/ /g,'_').replace(/[^\w\s]/gi, '');
}

function getResizedName(string) {
	return string.length>26? string.substring(0,26)+"..." : string;
}

function isInArray(value, array) {
  return array.indexOf(value) > -1;
}

function fallbackCopyTextToClipboard(text) {
  var textArea = document.createElement("textarea");
  textArea.value = text;

  // Avoid scrolling to bottom
  textArea.style.top = "0";
  textArea.style.left = "0";
  textArea.style.position = "fixed";

  document.body.appendChild(textArea);
  textArea.focus();
  textArea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Fallback: Copying text command was ' + msg);
  } catch (err) {
    console.error('Fallback: Oops, unable to copy', err);
  }

  document.body.removeChild(textArea);
}
function copyTextToClipboard(text) {
  if (!navigator.clipboard) {
    fallbackCopyTextToClipboard(text);
    return;
  }
  navigator.clipboard.writeText(text).then(function() {
    console.log('Async: Copying to clipboard was successful!');
  }, function(err) {
    console.error('Async: Could not copy text: ', err);
  });
}
