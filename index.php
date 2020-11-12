<!DOCTYPE html>
<?php
require_once "rest/config/timestamp.php";
require_once "rest/config/elements.php";
header('Content-Type: text/html');
$title = "Svuotafrigo - cerca ricette dagli ingredienti";
$description = "Il primo motore di ricerca dedicato  al mondo della cucina, che ti aiuta a ridurre gli sprechi. Scrivi ciò che hai in casa e Svuotafrigo ti suggerirà il piatto giusto per te, cercando tra oltre 25.000 ricette in costante aggiornamento.";
$imageLogo = "./img/fridge.png?v=3";
$thisUrl = "http://www.apphost.it/ricette";

if(isset($_GET["ingredients"])){
	$ingredientList = $_GET["ingredients"];
	$ingredientList = trim($ingredientList);
	$ingredients = explode(",",$ingredientList);
} else
	$ingredients = array();

if(count($ingredients)>0) {
	$title = "Svuotafrigo - ricette contenenti ";
	if(count($ingredients)==1) {
		$title .= $ingredients[0];
	} else {
		for($i=0; $i<(count($ingredients)-1); $i++) {
			$title .= $ingredients[$i].", ";
		}
		$title = substr($title, 0, -2);
		$title .= " e ".$ingredients[count($ingredients)-1];
	}
}

?>
<html lang="it">
<head>

<title><?php echo $title ?></title>
<meta charset="utf-8">
<meta name="description" content="<?php echo $description?>">
<meta name="author" content="apphost.it">
<meta name="keywords" content="app, spreco alimentare, antispreco, ricetta, svuotafrigo, ricette, mangiare, food, cibo, cucinare, ricetta facile, cucina, cena, pranzo, drink, ingredienti, cerca, ricerca, giallozafferano, misya, Sale&amp;Pepe">
<meta name="robots" content="all">
<meta property="twitter:card" content="summary">
<meta name="twitter:site" content="@svuotafrigo">
<meta name="twitter:creator" content="@svuotafrigo">
<meta name="twitter:title" content="<?php echo $title ?>">
<meta name="twitter:description" content="<?php echo $description?>">
<meta name="twitter:image" content="<?php echo $imageLogo ?>">
<meta name="twitter:image:alt" content="Logo Svuotafrigo">
<meta name="google-site-verification" content="cty7QHcCEyVvH1IghmnprW8Aw2mLtEnLKSt6Zhgcd3c" />
<meta property="og:title" content="<?php echo $title ?>">
<meta property="og:url" content="<?php echo $thisUrl?>">
<meta property="og:description" content="<?php echo $description?>">
<meta property="og:image" content="<?php echo $imageLogo ?>">
<meta property="og:type" content="article">
<meta property="og:locale" content="it_IT">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta property="og:image:width" content="260">
<meta property="og:image:height" content="260">
<meta name="language" content="it">
<meta name="theme-color" content="#ff1493">
<link rel="icon" type="image/png" href="<?php echo $imageLogo ?>" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="css/materialize.min.css"  media="screen,projection"/>
<link rel="stylesheet" type="text/css" href="css/materialize-tags.css?v=<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.min.css">
<link rel="stylesheet" type="text/css" href="css/site.css?v=<?php echo $timestamp; ?>" />
<link rel="stylesheet" type="text/css" href="css/jquery.dynatable.css" />
<!--link rel="stylesheet" type="text/css" href="css/font-awesome.css?v=<?php echo $timestamp; ?>"-->
<link rel="stylesheet" type="text/css" href="css/fontawesome-all.css?v=<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="css/hideshare.css?v=<?php echo $timestamp; ?>">
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "Svuotafrigo",
  "logo": "https://www.apphost.it/ricette/img/fridge.png",
  "url": "https://www.apphost.it",
  "sameAs": [
    "https://www.facebook.com/svuotafrigo/",
    "https://www.instagram.com/svuotafrigo/",
    "https://twitter.com/svuotafrigo"
  ]
}
</script>
<style type="text/css">
		.powered {
			margin-top: -60px !important;
			margin-right: 0px !important;
		}
	</style>

<script
	src="js/jquery.min.js"></script>

<script
	src="js/bootstrap.min.js"></script>



<script src="js/utils.js?v=<?php echo $timestamp; ?>"></script>
<script src="js/recipes_script.js?v=<?php echo $timestamp; ?>"></script>

<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/materialize-tags.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/typehead.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/hideshare.min.js?v=<?php echo $timestamp; ?>"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>

<body>
			<div class="container">
				<div class="row">
					<div class="col s12 m12 l12"><h1><img style="width:30px" alt="Logo Svuotafrigo" src="img/fridge.png">&nbsp;Svuotafrigo &nbsp;&nbsp;&nbsp;<a title="Vedi info" class="waves-effect waves-light modal-trigger info" href="#infoModal"><i class="material-icons">info_outline</i></a></h1></div>
					<!-- Modal Structure -->
					  <div id="infoModal" class="modal">
						<div class="modal-content">
						  <h4>Chi siamo</h4>
						  <p>Hai pochi ingredienti in frigo? Non sai cosa cucinare stasera? Vuoi dare una rinfrescata al tuo menù?
La risposta è <b>Svuotafrigo</b>! Il primo motore di ricerca dedicato al mondo della cucina, che ti aiuta a ridurre gli sprechi.
Scrivi ciò che hai in dispensa e Svuotafrigo ti suggerirà il piatto giusto per te, cercando tra oltre 25.000 ricette in costante aggiornamento.
</p><p>
<b>In più</b>:
<br>
- Trovi i risultati poco soddisfacenti?
<b>Migliora</b> la ricerca mediante l'aggiunta o la rimozione di altri ingredienti
<p>
- Hai trovato una ricetta interessante?
<b>Condividila</b> con gli amici attraverso i tuoi social preferiti (puoi scegliere tra Facebook, Whatsapp, Twitter e Google Plus)
<p>
- Sei a corto di idee?
<b>Ispirami</b> è la funzione che fa per te, proponendoti gli ingredienti del momento in pieno rispetto delle stagionalità
<p><p>
Cosa aspetti? Metti alla prova Svuotafrigo e scrivici la tua opinione!</p><br>
						  <p>Contatti:</p>
						  <p>E-mail:&nbsp;<a title="Scrivici una mail" href="mailto:svuotafrigo@apphost.it">svuotafrigo@apphost.it</a><br>
						  Facebook:&nbsp;<a title="Pagina ufficiale Facebook Svuotafrigo" href="https://www.facebook.com/svuotafrigo/">Pagina ufficiale Svuotafrigo</a><br>
						  Twitter:&nbsp;<a title="Pagina ufficiale Twitter Svuotafrigo" href="https://twitter.com/Svuotafrigo">Segui i tweet di Svuotafrigo</a><br>
						  Instagram:&nbsp;<a title="Pagina ufficiale Instagram Svuotafrigo" href="https://www.instagram.com/svuotafrigo/">Vedi le foto di Svuotafrigo</a></p>
						</div>
						<div class="modal-footer">
						  <a title="Chiudi info" href="#" class="modal-action modal-close btn btn-primary">Chiudi</a>
						</div>
					  </div>
				</div>

					<div class="row">
						<div class="input-field col s10" id="input">
							<input placeholder="Inserisci un ingrediente" id="ingredients" type="text" class="validate" data-role="materialtags">
						</div>
						<div class="input-field col s2">
							<a title="Cerca ricette" id="search_btn" class="btn btn-floating input-field" onclick="search_recipe(true, null)"/><i class="material-icons">search</i></a>
							<a title="Ispirami!" id="inspire_btn" class="btn btn-floating input-field" onclick="inspire_me()"/><i class="material-icons">lightbulb_outline</i>Ispirami</a>
						</div>
					</div>
					<div class="row">
					<div id="preloader" >
						<div class="preloader-wrapper small active align-center">
		                	<div class="spinner-layer spinner-green-only">
		                    	<div class="circle-clipper left">
		                    		<div class="circle"></div>
		                      	</div>
		                      	<div class="gap-patch">
		                        	<div class="circle"></div>
		                      	</div>
		                      	<div class="circle-clipper right">
		                        	<div class="circle"></div>
		                      </div>
		                    </div>
	                  	</div>
	                  </div>
					</div>
					<div class="row">
						<div class="col s12 m12 l12"><h5 style="display:none" class="result-message">Risultati per gli ingredienti <span id="label-ingredients"></span></h5></div>
					</div>

					<div class="m-t-md" id="results"></div>
					<?php
						printHtmlBadge(".");
					?>
			</div>

	<script>
	var useAnalytics = true;
	var isAndroid = false;
	var isDesktop = true;
	<?php
			$token = getToken();
	?>
	var token = '<?php echo $token; ?>';

    try {
        //Turn off analytics if 'analytics=off' is included as a request parameter.
        var parameters = window.location.search.split('&');
        if (parameters[0]) {
            parameters[0] = parameters[0].replace('?', '');
        }
        for (var i = 0; i < parameters.length; i++) {
            var values = parameters[i].split('=');
            if (values[0] == 'analytics' && values[1] == 'off') {
                useAnalytics = false;
            }
        }

        //Turn off analytics if 'localhost' is the host
        if (window.location.host == 'localhost') {
            useAnalytics = false;
        }
    } catch(e) {
        //Just in case something goes wrong...
        useAnalytics = true;
    }

    if (useAnalytics) {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-86180841-1', 'auto');
	  ga('send', 'pageview');
    }

	function hideInspiration() {
		return null; // do nothing
	}

	</script>
<script type="text/javascript" src="http://nibirumail.com/docs/scripts/nibirumail.cookie.min.js"></script>
</body>

</html>
