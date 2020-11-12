<!DOCTYPE html>
<!-- saved from url=(0065)./restoacasa.php?origin=android_saved -->
<html lang="it"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body>﻿

<title>Svuotafrigo - cerca ricette dagli ingredienti</title>

<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" type="image/png" href="./img/fridge_resized.png?v=3">

<link rel="stylesheet" href="./restoacasa_files/icon" media="screen">
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
				<a href="./restoacasa.php?origin=android_saved#top"><span><i class="material-icons">keyboard_arrow_up</i></span></a>
			</p>
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
						  <a title="Chiudi info" href="./restoacasa.php?origin=android_saved#" class="modal-action modal-close btn btn-primary">Chiudi</a>
						</div>
					  </div>				<!-- End Modal Structure -->
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
						  <a title="Chiudi info" href="./restoacasa.php?origin=android_saved#" class="modal-action modal-close btn btn-primary">Chiudi</a>
						</div>
					  </div>				<!-- End Modal Social Structure -->
				<div class="leftoverlay" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>

				<div class="row">
					<p class="testata" onclick="document.location = &#39;android_saved.php&#39;"><span id="menu-icon-id"><i class="material-icons">dehaze</i></span><span id="app-name"><b>Svuota</b>frigo</span></span></p>
				</div>
				<!-- Sidebar -->
				<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand">
			<a href="./android_saved.php">
				<img style="margin-top: 15px; width:80%" alt="Logo Svuotafrigo" src="./restoacasa_files/fridge_svuota.png">
			</a>
			</li>
			<li><a href="./android_saved.php">Cerca ricette</a></li>
			<li><a href="./ricetta_del_giorno.php?origin=android_saved&amp;fake=10112020">Ricetta del giorno</a></li>
			<li>
				<a href="./restoacasa.php?origin=android_saved#" onclick="inspire_me()">Ispirami</a>
			</li>
			<li>
				<a href="./ricette_saved.php?origin=android_saved">Ricette preferite</a>
			</li>
			<li>
				<a class="hover" href="./restoacasa.php?origin=android_saved">Menù #ioRestoACasa</a>
			</li>
			<li>
				<a href="./cronologia.php?origin=android_saved">Cronologia</a>
			</li>
			<li>
				<a href="./restoacasa.php?origin=android_saved#infoModal" class="modal-trigger" onclick="toggleMenu()">
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
				<a href="./restoacasa.php?origin=android_saved#infoSocial" class="modal-trigger" onclick="toggleMenu()">
					Seguici
				</a>
			</li>
			<!-- li>
				<a href="#">Le mie ricette preferite</a>
			</li-->
		</ul>
	</div>				<!-- End Sidebar -->

				<div class="row">
					<div id="preloader" style="display: none;">
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

					<div class="m-t-md" id="results"><br>
					<h5 style="font-size: 26px; text-align:center">In questo periodo possiamo imparare a cucinare tante nuove pietanze. Tra pasta e pane fatta in casa e dolci da preparare con pochissimi ingredienti, la scelta è davvero ampia. Ecco una nostra personalissima selezione.<br><br>
					<b><span style="font-size:36px;color:green"> BUONA</span><span style="font-size:36px; -webkit-text-fill-color: white; -webkit-text-stroke-width: 1px;-webkit-text-stroke-color: black;"> PREPAR</span><span style="font-size:36px;color:red">AZIONE! </span></b>
					<br><br><b>PS</b>: se hai cucinato una ricetta suggerita da noi, scatta una foto 📷 e taggaci su uno dei nostri social (<a href="https://www.facebook.com/svuotafrigo">Facebook</a>, <a href="http://instagram.com/svuotafrigo">Instagram</a> o <a href="https://www.twitter.com/svuotafrigo/">Twitter</a>). <br>Saremo ben felici di ripostarla! 😊<br><br></h5>
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/come-si-fa-la-pasta-fresca_091-986x400.jpg" alt="" onclick="redirectToUrl(&#39;http://www.salepepe.it/tecniche-base/come-fare-pasta/come-si-fa-la-pasta-fresca/&#39;,0, &#39;Sale&amp;Pepe&#39;, &#39;Come si prepara la pasta fresca fatta in casa&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Come si prepara la pasta fresca fatta in casa</div>
									<div class="my-card-subtitle" itemprop="name"> by Sale&amp;Pepe</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">farina</span> - <span class="">sale</span> - <span class="">uova</span></span></p>
									<div class=""><a href="http://www.salepepe.it/tecniche-base/come-fare-pasta/come-si-fa-la-pasta-fresca/?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;http://www.salepepe.it/tecniche-base/come-fare-pasta/come-si-fa-la-pasta-fresca/&#39;,0, &#39;Sale&amp;Pepe&#39;, &#39;Come si prepara la pasta fresca fatta in casa&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=http://www.salepepe.it/tecniche-base/come-fare-pasta/come-si-fa-la-pasta-fresca/" urlimage="https://www.salepepe.it/files/2014/03/come-si-fa-la-pasta-fresca_091-986x400.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="http://www.salepepe.it/tecniche-base/come-fare-pasta/come-si-fa-la-pasta-fresca/" onclick="return saveRecipe(this,&#39;Come si prepara la pasta fresca fatta in casa&#39;,&#39;http://www.salepepe.it/tecniche-base/come-fare-pasta/come-si-fa-la-pasta-fresca/&#39;,&#39;https://www.salepepe.it/files/2014/03/come-si-fa-la-pasta-fresca_091-986x400.jpg&#39;,&#39;SalePepe&#39;,&#39;farina - sale - uova&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/come-fare-patate-fritte_05-986x400.jpg" alt="" onclick="redirectToUrl(&#39;http://www.salepepe.it/tecniche-base/tipi-verdura/patate-fritte-in-casa/&#39;,0, &#39;Sale&amp;Pepe&#39;, &#39;Patate fritte in casa&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Patate fritte in casa</div>
									<div class="my-card-subtitle" itemprop="name"> by Sale&amp;Pepe</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">olio</span> - <span class="">patate</span> - <span class="">sale</span></span></p>
									<div class=""><a href="http://www.salepepe.it/tecniche-base/tipi-verdura/patate-fritte-in-casa/?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;http://www.salepepe.it/tecniche-base/tipi-verdura/patate-fritte-in-casa/&#39;,0, &#39;Sale&amp;Pepe&#39;, &#39;Patate fritte in casa&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=http://www.salepepe.it/tecniche-base/tipi-verdura/patate-fritte-in-casa/" urlimage="https://www.salepepe.it/files/2014/03/come-fare-patate-fritte_05-986x400.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="http://www.salepepe.it/tecniche-base/tipi-verdura/patate-fritte-in-casa/" onclick="return saveRecipe(this,&#39;Patate fritte in casa&#39;,&#39;http://www.salepepe.it/tecniche-base/tipi-verdura/patate-fritte-in-casa/&#39;,&#39;https://www.salepepe.it/files/2014/03/come-fare-patate-fritte_05-986x400.jpg&#39;,&#39;SalePepe&#39;,&#39;olio - patate - sale&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/pane-noci-986x400.jpg" alt="" onclick="redirectToUrl(&#39;http://www.salepepe.it/ricette/lieviti/pane-lieviti/pane-noci/&#39;,0, &#39;Sale&amp;Pepe&#39;, &#39;Pane alle noci&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Pane alle noci</div>
									<div class="my-card-subtitle" itemprop="name"> by Sale&amp;Pepe</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">noce gherigli</span> - <span class="">pasta per pane</span></span></p>
									<div class=""><a href="http://www.salepepe.it/ricette/lieviti/pane-lieviti/pane-noci/?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;http://www.salepepe.it/ricette/lieviti/pane-lieviti/pane-noci/&#39;,0, &#39;Sale&amp;Pepe&#39;, &#39;Pane alle noci&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=http://www.salepepe.it/ricette/lieviti/pane-lieviti/pane-noci/" urlimage="https://www.salepepe.it/files/2014/03/pane-noci-986x400.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="http://www.salepepe.it/ricette/lieviti/pane-lieviti/pane-noci/" onclick="return saveRecipe(this,&#39;Pane alle noci&#39;,&#39;http://www.salepepe.it/ricette/lieviti/pane-lieviti/pane-noci/&#39;,&#39;https://www.salepepe.it/files/2014/03/pane-noci-986x400.jpg&#39;,&#39;Sale&amp;Pepe&#39;,&#39;noce gherigli - pasta per pane&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/hd450x300.jpg" alt="" onclick="redirectToUrl(&#39;http://ricette.giallozafferano.it/Fare-il-burro-in-casa.html&#39;,0, &#39;GialloZafferano&#39;, &#39;Fare il burro in casa&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Fare il burro in casa</div>
									<div class="my-card-subtitle" itemprop="name"> by GialloZafferano</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">panna fresca liquida</span></span></p>
									<div class=""><a href="http://ricette.giallozafferano.it/Fare-il-burro-in-casa.html?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;http://ricette.giallozafferano.it/Fare-il-burro-in-casa.html&#39;,0, &#39;GialloZafferano&#39;, &#39;Fare il burro in casa&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=http://ricette.giallozafferano.it/Fare-il-burro-in-casa.html" urlimage="https://www.giallozafferano.it/images/ricette/7/721/foto_hd/hd450x300.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="http://ricette.giallozafferano.it/Fare-il-burro-in-casa.html" onclick="return saveRecipe(this,&#39;Fare il burro in casa&#39;,&#39;http://ricette.giallozafferano.it/Fare-il-burro-in-casa.html&#39;,&#39;https://www.giallozafferano.it/images/ricette/7/721/foto_hd/hd450x300.jpg&#39;,&#39;GialloZafferano&#39;,&#39;panna fresca liquida&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/orecchiette-al-sugo-1.jpg" alt="" onclick="redirectToUrl(&#39;https://www.misya.info/ricetta/orecchiette-fatte-in-casa.htm&#39;,0, &#39;Misya&#39;, &#39;Orecchiette fatte in casa&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Orecchiette fatte in casa</div>
									<div class="my-card-subtitle" itemprop="name"> by Misya</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">acqua</span> - <span class="">sale</span> - <span class="">semola</span></span></p>
									<div class=""><a href="https://www.misya.info/ricetta/orecchiette-fatte-in-casa.htm?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;https://www.misya.info/ricetta/orecchiette-fatte-in-casa.htm&#39;,0, &#39;Misya&#39;, &#39;Orecchiette fatte in casa&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=https://www.misya.info/ricetta/orecchiette-fatte-in-casa.htm" urlimage="https://www.misya.info/wp-content/uploads/2018/12/orecchiette-al-sugo-1.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="https://www.misya.info/ricetta/orecchiette-fatte-in-casa.htm" onclick="return saveRecipe(this,&#39;Orecchiette fatte in casa&#39;,&#39;https://www.misya.info/ricetta/orecchiette-fatte-in-casa.htm&#39;,&#39;https://www.misya.info/wp-content/uploads/2018/12/orecchiette-al-sugo-1.jpg&#39;,&#39;Misya&#39;,&#39;acqua - sale - semola&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/succo-ace.webp" alt="" onclick="redirectToUrl(&#39;http://www.misya.info/ricetta/succo-ace-fatto-in-casa.htm&#39;,0, &#39;Misya&#39;, &#39;Succo ACE fatto in casa&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Succo ACE fatto in casa</div>
									<div class="my-card-subtitle" itemprop="name"> by Misya</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">acqua</span> - <span class="">arance</span> - <span class="">carota</span> - <span class="">limone</span></span></p>
									<div class=""><a href="http://www.misya.info/ricetta/succo-ace-fatto-in-casa.htm?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;http://www.misya.info/ricetta/succo-ace-fatto-in-casa.htm&#39;,0, &#39;Misya&#39;, &#39;Succo ACE fatto in casa&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=http://www.misya.info/ricetta/succo-ace-fatto-in-casa.htm" urlimage="https://img.misya.info/Misya2/2015/05/succo-ace.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="http://www.misya.info/ricetta/succo-ace-fatto-in-casa.htm" onclick="return saveRecipe(this,&#39;Succo ACE fatto in casa&#39;,&#39;http://www.misya.info/ricetta/succo-ace-fatto-in-casa.htm&#39;,&#39;https://img.misya.info/Misya2/2015/05/succo-ace.jpg&#39;,&#39;Misya&#39;,&#39;acqua - arance - carota - limone&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/immagine-la-sfoglia-fatta-in-casa-986x400.jpg" alt="" onclick="redirectToUrl(&#39;http://www.salepepe.it/ricette/primi/paste-di-base/sfoglia-fatta-in-casa/&#39;,0, &#39;Sale&amp;Pepe&#39;, &#39;La sfoglia fatta in casa&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">La sfoglia fatta in casa</div>
									<div class="my-card-subtitle" itemprop="name"> by Sale&amp;Pepe</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">farina di grano tenero</span> - <span class="">olio di oliva extravergine</span> - <span class="">sale</span> - <span class="">uova</span></span></p>
									<div class=""><a href="http://www.salepepe.it/ricette/primi/paste-di-base/sfoglia-fatta-in-casa/?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;http://www.salepepe.it/ricette/primi/paste-di-base/sfoglia-fatta-in-casa/&#39;,0, &#39;Sale&amp;Pepe&#39;, &#39;La sfoglia fatta in casa&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=http://www.salepepe.it/ricette/primi/paste-di-base/sfoglia-fatta-in-casa/" urlimage="https://www.salepepe.it/files/2014/04/immagine-la-sfoglia-fatta-in-casa-986x400.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="http://www.salepepe.it/ricette/primi/paste-di-base/sfoglia-fatta-in-casa/" onclick="return saveRecipe(this,&#39;La sfoglia fatta in casa&#39;,&#39;http://www.salepepe.it/ricette/primi/paste-di-base/sfoglia-fatta-in-casa/&#39;,&#39;https://www.salepepe.it/files/2014/04/immagine-la-sfoglia-fatta-in-casa-986x400.jpg&#39;,&#39;SalePepe&#39;,&#39;farina di grano tenero - olio di oliva extravergine - sale - uova&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/IMG_20170815_210913.jpg" alt="" onclick="redirectToUrl(&#39;http://blog.giallozafferano.it/lacucinadiyuto/piadine-ripiene-fatte-casa/&#39;,0, &#39;La cucina di yuto&#39;, &#39;Piadine ripiene fatte in casa&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Piadine ripiene fatte in casa</div>
									<div class="my-card-subtitle" itemprop="name"> by La cucina di yuto</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">coppa</span> - <span class="">Funghi</span> - <span class="">Insalata</span> - <span class="">Piadine senza strutto</span> - <span class="">Squacquerone</span></span></p>
									<div class=""><a href="http://blog.giallozafferano.it/lacucinadiyuto/piadine-ripiene-fatte-casa/?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;http://blog.giallozafferano.it/lacucinadiyuto/piadine-ripiene-fatte-casa/&#39;,0, &#39;La cucina di yuto&#39;, &#39;Piadine ripiene fatte in casa&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=http://blog.giallozafferano.it/lacucinadiyuto/piadine-ripiene-fatte-casa/" urlimage="https://blog.giallozafferano.it/lacucinadiyuto/wp-content/uploads/2017/09/IMG_20170815_210913.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="http://blog.giallozafferano.it/lacucinadiyuto/piadine-ripiene-fatte-casa/" onclick="return saveRecipe(this,&#39;Piadine ripiene fatte in casa&#39;,&#39;http://blog.giallozafferano.it/lacucinadiyuto/piadine-ripiene-fatte-casa/&#39;,&#39;https://blog.giallozafferano.it/lacucinadiyuto/wp-content/uploads/2017/09/IMG_20170815_210913.jpg&#39;,&#39;La cucina di yuto&#39;,&#39;coppa - Funghi - Insalata - Piadine senza strutto - Squacquerone&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/nutella_fatta_in_casa.webp" alt="" onclick="redirectToUrl(&#39;http://www.misya.info/ricetta/nutella-fatta-in-casa.htm&#39;,0, &#39;Misya&#39;, &#39;Nutella fatta in casa&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Nutella fatta in casa</div>
									<div class="my-card-subtitle" itemprop="name"> by Misya</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">cacao</span> - <span class="">cioccolato al latte</span> - <span class="">essenza di vaniglia</span> - <span class="">nocciole</span> - <span class="">olio di semi</span> - <span class="">zucchero di canna</span></span></p>
									<div class=""><a href="http://www.misya.info/ricetta/nutella-fatta-in-casa.htm?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;http://www.misya.info/ricetta/nutella-fatta-in-casa.htm&#39;,0, &#39;Misya&#39;, &#39;Nutella fatta in casa&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=http://www.misya.info/ricetta/nutella-fatta-in-casa.htm" urlimage="https://img.misya.info/Misya2/2015/05/nutella_fatta_in_casa.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="http://www.misya.info/ricetta/nutella-fatta-in-casa.htm" onclick="return saveRecipe(this,&#39;Nutella fatta in casa&#39;,&#39;http://www.misya.info/ricetta/nutella-fatta-in-casa.htm&#39;,&#39;https://img.misya.info/Misya2/2015/05/nutella_fatta_in_casa.jpg&#39;,&#39;Misya&#39;,&#39;cacao - cioccolato al latte - essenza di vaniglia - nocciole - olio di semi - zucchero di canna&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/savoiardi.webp" alt="" onclick="redirectToUrl(&#39;http://www.misya.info/ricetta/savoiardi-fatti-in-casa.htm&#39;,0, &#39;Misya&#39;, &#39;Savoiardi fatti in casa&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Savoiardi fatti in casa</div>
									<div class="my-card-subtitle" itemprop="name"> by Misya</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">farina 00</span> - <span class="">fecola di patate</span> - <span class="">limone</span> - <span class="">uova</span> - <span class="">zucchero</span> - <span class="">zucchero a velo</span></span></p>
									<div class=""><a href="http://www.misya.info/ricetta/savoiardi-fatti-in-casa.htm?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;http://www.misya.info/ricetta/savoiardi-fatti-in-casa.htm&#39;,0, &#39;Misya&#39;, &#39;Savoiardi fatti in casa&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=http://www.misya.info/ricetta/savoiardi-fatti-in-casa.htm" urlimage="https://img.misya.info/Misya2/2015/06/savoiardi.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="http://www.misya.info/ricetta/savoiardi-fatti-in-casa.htm" onclick="return saveRecipe(this,&#39;Savoiardi fatti in casa&#39;,&#39;http://www.misya.info/ricetta/savoiardi-fatti-in-casa.htm&#39;,&#39;https://img.misya.info/Misya2/2015/06/savoiardi.jpg&#39;,&#39;Misya&#39;,&#39;farina 00 - fecola di patate - limone - uova - zucchero - zucchero a velo&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/WhatsApp-Image-2020-01-30-at-21.58.53-960x720.jpeg" alt="" onclick="redirectToUrl(&#39;http://blog.giallozafferano.it/trecuoriedunaplanetaria/plumcake-allarancia/&#39;,0, &#39;3cuori_ed1planetaria&#39;, &#39;Plumcake all&#39;arancia - 3cuori_ed1planetaria&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Plumcake all'arancia - 3cuori_ed1planetaria</div>
									<div class="my-card-subtitle" itemprop="name"> by 3cuori_ed1planetaria</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">arance</span> - <span class="">farina</span> - <span class="">latte</span> - <span class="">lievito</span> - <span class="">olio di semi</span> - <span class="">uova</span> - <span class="">zucchero</span></span></p>
									<div class=""><a href="http://blog.giallozafferano.it/trecuoriedunaplanetaria/plumcake-allarancia/?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;http://blog.giallozafferano.it/trecuoriedunaplanetaria/plumcake-allarancia/&#39;,0, &#39;3cuori_ed1planetaria&#39;, &#39;Plumcake all&#39;arancia - 3cuori_ed1planetaria&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=http://blog.giallozafferano.it/trecuoriedunaplanetaria/plumcake-allarancia/" urlimage="http://blog.giallozafferano.it/trecuoriedunaplanetaria/wp-content/uploads/2020/01/WhatsApp-Image-2020-01-30-at-21.58.53-960x720.jpeg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="http://blog.giallozafferano.it/trecuoriedunaplanetaria/plumcake-allarancia/" onclick="return saveRecipe(this,&#39;Plumcake all\&#39;arancia - 3cuori_ed1planetaria&#39;,&#39;http://blog.giallozafferano.it/trecuoriedunaplanetaria/plumcake-allarancia/&#39;,&#39;http://blog.giallozafferano.it/trecuoriedunaplanetaria/wp-content/uploads/2020/01/WhatsApp-Image-2020-01-30-at-21.58.53-960x720.jpeg&#39;,&#39;3cuori_ed1planetaria&#39;,&#39;arance - farina - latte - lievito - olio di semi - uova - zucchero&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="./restoacasa_files/Baileys-fatto-in-casa1.webp" alt="" onclick="redirectToUrl(&#39;http://www.misya.info/ricetta/baileys-fatto-in-casa.htm&#39;,0, &#39;Misya&#39;, &#39;Baileys fatto in casa&#39;)">
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">Baileys fatto in casa</div>
									<div class="my-card-subtitle" itemprop="name"> by Misya</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti"><span class="">cacao</span> - <span class="">caffè</span> - <span class="">caramello</span> - <span class="">latte condensato</span> - <span class="">panna fresca</span> - <span class="">whiskey</span></span></p>
									<div class=""><a href="http://www.misya.info/ricetta/baileys-fatto-in-casa.htm?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(&#39;http://www.misya.info/ricetta/baileys-fatto-in-casa.htm&#39;,0, &#39;Misya&#39;, &#39;Baileys fatto in casa&#39;)"><i class="material-icons">open_in_new</i></a>
									<div class="hideshare-wrap" style="width:38px; height:38px;"><a class="share btn btn-floating hideshare-btn" href="./restoacasa.php?origin=android_saved#" url="./ricetta.php?id=http://www.misya.info/ricetta/baileys-fatto-in-casa.htm" urlimage="https://img.misya.info/Misya2/2015/07/Baileys-fatto-in-casa1.jpg" hidebinded="yes"><i class="material-icons">share</i></a><ul class="hideshare-list" style="z-index: 100; display: none; left: -30px; width: 340px; top:-60px"><li><a class="hideshare-hyperlink" href="./restoacasa.php?origin=android_saved#"><i class="fa fa-link fa-3x"></i><span>Copia link</span></a></li><li><a class="hideshare-facebook" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-facebook-square fa-3x"></i><span>Facebook</span></a></li><li><a class="hideshare-twitter" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-twitter-square fa-3x"></i><span>Twitter</span></a></li><li><a class="hideshare-whatsapp" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-whatsapp fa-3x"></i><span>WhatsApp</span></a></li><li><a class="hideshare-telegram" href="./restoacasa.php?origin=android_saved#"><i class="fab fa-telegram fa-3x"></i><span>Telegram</span></a></li><li><a class="hideshare-pinterest" href="./restoacasa.php?origin=android_saved#" data-pin-do="buttonPin" data-pin-config="above"><i class="fab fa-pinterest-square fa-3x"></i><span>Pinterest</span></a></li></ul></div><a href="./restoacasa.php?origin=android_saved#" url="http://www.misya.info/ricetta/baileys-fatto-in-casa.htm" onclick="return saveRecipe(this,&#39;Baileys fatto in casa&#39;,&#39;http://www.misya.info/ricetta/baileys-fatto-in-casa.htm&#39;,&#39;https://img.misya.info/Misya2/2015/07/Baileys-fatto-in-casa1.jpg&#39;,&#39;Misya&#39;,&#39;cacao - caffè - caramello - latte condensato - panna fresca - whiskey&#39;)"><i class="material-icons favourite">favorite_border</i></a></div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>					<div style="text-align:center;">
						<a href="./android_saved.php?name=casa" style="font-size: 26px;"><b>Trova altre ricette fatte in casa...</b></a><br><br><br><br>
					</div>
					<br><br><br><br><br>
				</div>
			</div>

	<script>
	    var useAnalytics = true;

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

	$(document).ready(function() {
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
	  });
	</script>



<div class="hiddendiv common"></div></body></html>
