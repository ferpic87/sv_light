<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body>﻿


<title>Svuotafrigo - cerca ricette dagli ingredienti</title>

<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" type="image/png" href="./img/fridge_resized.png?v=3">

<link rel="stylesheet" href="./ricetta_del_giorno_files/icon" media="screen">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" media="screen">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen" onload="this.media='all'">
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css?v=0<?php echo $timestamp; ?>" media="print" onload="this.media='all'">
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo $timestamp; ?>" media="screen">
<link rel="stylesheet" type="text/css" href="css/materialize.min.css?v=<?php echo $timestamp; ?>"  media="screen,projection"/>
<link rel="stylesheet" type="text/css" href="css/materialize-tags.css?v=<?php echo $timestamp; ?>" media="screen" onload="this.media='all'">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.min.css" media="print" onload="this.media='all'">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.min.css" media="print" onload="this.media='all'">
<link rel="stylesheet" type="text/css" href="css/jquery.dynatable.css"  media="print" onload="this.media='all'"/>
<link rel="stylesheet" type="text/css" href="css/fontawesome-all.css?v=<?php echo $timestamp; ?>" media="screen">
<link rel="stylesheet" type="text/css" href="css/hideshare.css?v=<?php echo $timestamp; ?>" media="screen">
<link rel="stylesheet" type="text/css" href="css/toast-notification-popup.css?v=<?php echo $timestamp; ?>" media="print" onload="this.media='all'">

<script
	src="js/jquery.min.js"></script>

<script
	src="js/bootstrap.min.js"></script>



<script src="js/utils.js?v=<?php echo $timestamp; ?>"></script>
<script src="js/recipes_script_saved.js?v=3<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/materialize-tags.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/typehead.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/hideshare.min.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/sidebar.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/hammer.min.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/hammer-time.min.js?v=<?php echo $timestamp; ?>"></script>
<script async type="text/javascript" src="js/toast-notification-popup.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/save_recipes.js?v=<?php echo $timestamp; ?>"></script>
<!--script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script-->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>



			<p id="back-top" style="display: none;">
				<a href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#top"><span><i class="material-icons">keyboard_arrow_up</i></span></a>
			</p>
			<div id="myToast" class="toast-popup"></div>
        <!-- /#sidebar-wrapper -->
			<div id="splashscreen" style="display: none;">
				<img src="./ricetta_del_giorno_files/fridge_splash2.png" class="img-responsive">
			</div>
			<div class="container" id="wrapper">

					<!-- Start Modal Structure -->
					  <div id="infoModal" class="modal">
						<div class="modal-content">
						  <h4>Chi siamo</h4>
						  <p>Hai pochi ingredienti in frigo? Non sai cosa cucinare stasera? La risposta è <b>Svuotafrigo</b>! Il primo motore di ricerca dedicato al mondo della cucina, che ti aiuta a ridurre gli sprechi.
Scrivi ciò che hai in dispensa e Svuotafrigo ti suggerirà il piatto giusto per te, cercando tra oltre 25.000 ricette in costante aggiornamento.
</p><p> Per qualsiasi problema riscontrato con la nostra app, scrivici utilizzando il pulsante di seguito:</p>
						  <p class="center-align"><a class="btn modal-action" title="Scrivici una mail" href="mailto:svuotafrigo@apphost.it">Contattaci</a>
							</p><p class="center-align"><a class="btn modal-action" title="Modifica consensi" href="http://www.apphost.it/ogury">Modifica consensi privacy</a></p>
							<br>
						</div>
						<div class="modal-footer">
						  <a title="Chiudi info" href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#" class="modal-action modal-close btn btn-primary">Chiudi</a>
						</div>
					  </div>					<!-- End Modal Structure -->
					<!-- Start Modal Social Structure -->
					  <div id="infoSocial" class="modal">
						<div class="modal-content">
						  <h4>Seguici sui social network</h4>
						 	<table class="table">
								<tbody><tr>
								  <td><a class="hideshare-facebook" title="Facebook" href="https://www.facebook.com/svuotafrigo"><i class="fab fa-facebook-square fa-5x"></i></a></td>
								  <td><a class="hideshare-twitter" title="Twitter" href="https://twitter.com/Svuotafrigo"><i class="fab fa-twitter-square fa-5x"></i></a></td>
								</tr>
								<tr>
								  <td><a class="hideshare-instagram" title="Instagram" href="http://www.instagram.com/_u/svuotafrigo/"><i class="fab fa-instagram fa-5x"></i></a></td>
								  <td><a class="hideshare-telegram" title="Telegram" href="https://telegram.me/svuotafrigo"><i class="fab fa-telegram fa-5x"></i></a></td>
								</tr>
							</tbody></table>
						</div>
						<div class="modal-footer">
						  <a title="Chiudi info" href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#" class="modal-action modal-close btn btn-primary">Chiudi</a>
						</div>
					  </div>					<!-- End Modal Social Structure -->

					<div class="leftoverlay" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>

					<div class="row">
						<p class="testata"><span id="menu-icon-id"><i class="material-icons">dehaze</i></span><span id="app-name"><b>Svuota</b>frigo</span></span></p>
					</div>
					<!-- Sidebar -->
					<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand">
			<a href="./android_saved.php">
				<img style="margin-top: 15px; width:80%" alt="Logo Svuotafrigo" src="./ricetta_del_giorno_files/fridge_svuota.png">
			</a>
			</li>
			<li><a class="hover" href="./android_saved.php">Cerca ricette</a></li>
			<li><a href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020">Ricetta del giorno</a></li>
			<li>
				<a href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#" onclick="inspire_me()">Ispirami</a>
			</li>
			<li>
				<a href="./ricette_saved.php?origin=android_saved">Ricette preferite</a>
			</li>
			<li>
				<a href="./restoacasa.php?origin=android_saved">Menù #ioRestoACasa</a>
			</li>
			<li>
				<a href="./cronologia.php?origin=android_saved">Cronologia</a>
			</li>
			<li>
				<a href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#infoModal" class="modal-trigger" onclick="toggleMenu()">
					Contattaci
				</a>
			</li>
			<li>
				<a href="https://play.google.com/store/apps/details?id=com.apphost.ricette">Dacci un voto!</a>
			</li>
			<!--li>
				<a href="https://www.facebook.com/svuotafrigo">Seguici su Facebook</a>
				<!--a href="fb://page/1079007505561276">Seguici su Facebook</a- ->
			</li>
			<li>
				<a href="https://twitter.com/Svuotafrigo">Seguici su Twitter</a>
			</li>
			<li>
				<a href="http://www.instagram.com/_u/svuotafrigo/">Seguici su Instagram</a>
			</li -->
			<li>
				<a href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#infoSocial" class="modal-trigger" onclick="toggleMenu()">
					Seguici
				</a>
			</li>
			<!-- li>
				<a href="#">Le mie ricette preferite</a>
			</li-->
		</ul>
	</div>					<!-- End Sidebar -->

					<br><h4><b>La ricetta del giorno è:</b></h4><div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./ricetta_del_giorno_files/crostata.jpg" alt="" onclick="redirectToUrl(&#39;https://www.cookist.it/mini-crostatine-frutta/&#39;,0, &#39;Cookist&#39;, &#39;Mini crostatine alla frutta: la ricetta dei cestini dell’estate&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Mini crostatine alla frutta: la ricetta dei cestini dell’estate</div>
									<div class="my-card-subtitle" itemprop="name"> by Cookist</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">acqua</span> - <span class="">burro</span> - <span class="">farina tipo 2 bio</span> - <span class="">kiwi</span> - <span class="">limoni</span> - <span class="">marmellata di albicocche</span> - <span class="">mirtilli</span> - <span class="">pesche</span> - <span class="">sale</span> - <span class="">uova</span> - <span class="">zucchero</span></span></p>
									<div class=""><a href="https://www.cookist.it/mini-crostatine-frutta/?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;https://www.cookist.it/mini-crostatine-frutta/&#39;,0, &#39;Cookist&#39;, &#39;Mini crostatine alla frutta: la ricetta dei cestini dell’estate&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#" url="./ricetta.php?id=https://www.cookist.it/mini-crostatine-frutta/" urlimage="https://static.fanpage.it/donnafanpage/wp-content/uploads/2014/06/crostata.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020#" url="https://www.cookist.it/mini-crostatine-frutta/" onclick="return saveRecipe(this,&#39;Mini crostatine alla frutta: la ricetta dei cestini dell’estate&#39;,&#39;https://www.cookist.it/mini-crostatine-frutta/&#39;,&#39;https://static.fanpage.it/donnafanpage/wp-content/uploads/2014/06/crostata.jpg&#39;,&#39;Cookist&#39;,&#39;acqua - burro - farina tipo 2 bio - kiwi - limoni - marmellata di albicocche - mirtilli - pesche - sale - uova - zucchero&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>
	<script type="text/javascript">
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		var useAnalytics = true;

	  ga('create', 'UA-86180841-1', 'auto');
	  ga('send', 'pageview');

	  var ingredientParameter = getParameter("ingredients");

	  var ingredients = getIngredientsByUri(ingredientParameter, 0);
		var excludeList = getIngredientsByUri(ingredientParameter, 1);
		var categoryList = getIngredientsByUri(ingredientParameter, 2);

				var token = 'XTZ3Znc0ZWZlNg==';

	  if(!false && isSplashscreenVisible() && window.location.href.indexOf('ingredients=') == -1 && window.location.href.indexOf('name=') == -1) {
			showSplashscreen();

	  } else {
			$("#splashscreen").hide();
	  }
		if(window.location.href.indexOf('ingredients=') == -1 && window.location.href.indexOf('name=') == -1)
			setTimeout(showInspiration, 3000);

	  function showInspiration() {
			$("#inspiration").fadeIn(2000, function() {
				$("#inspiration span").fadeIn(2000);
				setTimeout(hideInspiration, 60000);
			});
	  }


	  function showSplashscreen() {
		$("#splashscreen").show();
		setTimeout(function() {
			$("#splashscreen").fadeOut( 1000);
		}, 2000);
	  }

	  function hideInspiration() {
		$("#inspiration").fadeOut( "slow" );
	  }

	  function isSplashscreenVisible() {
			var splashscreen = (localStorage.getItem('splashscreen'))? parseInt(localStorage.getItem('splashscreen')) : null;
			if(checkTimeMoreThanThreeHours(splashscreen)) {
				saveSplashscreen();
				return true;

			}
			return false;
	  }

	  function checkTimeMoreThanThreeHours(timesaved) {
		if(timesaved==null)
			return true;
		var millis = Date.now() - timesaved;
		var hours = Math.floor(millis/(1000*3600));
		return hours > 3;
	  }

	  function saveSplashscreen() {
		var currentdate = Date.now();
		localStorage.setItem('splashscreen', currentdate);
	  }

	  $(function(){
		  $(".tt-input").on("keyup", function() {
			  hideInspiration();
		  });
	  });
	  var isAndroid = true;
	  var isDesktop = false;
		$( document ).ready(function() {
			if(false) {
				window.location.href = 'https://www.cookist.it/mini-crostatine-frutta/';
			} else if(false) {
				window.location.href = './https://www.cookist.it/mini-crostatine-frutta/';
			}
			salvaCronologia("recipeOfTheDay", null, null);
		});

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
	</script>



</div><div class="hiddendiv common"></div></body></html>
