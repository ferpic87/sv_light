<?php
require_once __DIR__ .'/rest/config/elements.php';
header("Content-Type: text/html");
$hideSplashscreen = (isset($_GET['ingredients']))? "true":"false";
//$ricerca_complessa = getComplexQuery();

//global $bridge;

?>
<html>

<?php
require_once __DIR__ ."/head.php";
?>
<body>

<!-- The surrounding HTML is left untouched by FirebaseUI.
     Your app may use that space for branding, controls and other customizations.-->
			<p id="back-top">
				<a href="#top"><span><i class="material-icons">keyboard_arrow_up</i></span></a>
			</p>
			<div id="myToast" class="toast-popup"></div>
        <!-- /#sidebar-wrapper -->
			<div id="splashscreen" style="display:<?php echo ($hideSplashscreen=="true")?"none":"block" ?>">
				<img src="img/fridge_splash2.png" class="img-responsive">
			</div>
			<div class="container" id="wrapper">

					<!-- Start Modal Structure -->
					  <?php print_info() ?>
					<!-- End Modal Structure -->
					<!-- Start Modal Login Structure -->
					  <?php print_login() ?>
					<!-- End Modal Login Structure -->
					<!-- Start Modal Social Structure -->
					  <?php print_social_links(); ?>
					<!-- End Modal Social Structure -->

					<div class="leftoverlay"></div>

					<div class="row">
						<p class="testata"><span id="menu-icon-id"><i class="material-icons">dehaze</i></span><span id="app-name"><b>Svuota</b>frigo</span></p>
					</div>
					<!-- Sidebar -->
					<?php print_menu('index'); ?>
					<!-- End Sidebar -->

					<?php if(!($bridge)) { ?>
					<div class="row searchBlock">
						<div id="searchLabel">
							<span >Ricerca</span>
						</div>
						<div id="searchMode" class="col s12 center">
							<label style="margin-right:30px">
								<input class="with-gap" name="group1" id="radioIngredient" type="radio" checked="true" onclick="toggleSearchType(false)" />
								<span>Ingredienti</span>
							</label>
							<label>
								<input class="with-gap" name="group1" id="radioName" type="radio" onclick="toggleSearchType(true)" />
								<span>Nome della ricetta</span>
							</label>
						</div>
			
					
						
						<div class="col s12 input-field center" id="moreContainer">
							<a href="#" class="btn" onclick="toggleAdvancedSearch(null)">
								<b id="more">Filtri ricerca</b>
							</a>
						</div>
						<span id="resetIngredients" style="display:none">
							<a href="#" class="btn btn-floating" onclick="resetSearch()"><i class="material-icons">delete</i></a>
						</span>
						<div data-role="materialtags">
						</div>
						<div class="input-field col s12" id="input">
							<input placeholder="Cerca..." id="query" type="text" class="validate" style="display:none">
							<div id="advancedSearch" style="display:block">
								<input placeholder="Escludi ingrediente" id="ingredientsExclude" type="text" class="validate"><br>
								<input placeholder="Categoria" id="categories" type="text" class="validate">
							</div>
							<input placeholder="Inserisci un ingrediente" id="ingredients" type="text" class="validate">
						</div>
						<!--div class="input-field col s2">
							<a id="search_btn" class="btn btn-floating" onclick="search_recipe(true, null)"/><i class="material-icons">search</i></a>
						</div-->
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
					<!--<div id="inspiration" style="display:none" class="noselect">
						<span style="display:none">Ciao sono Freddyno, il tuo assistente virtuale. Lo sapevi che con Svuotafrigo puoi fare ricerche complesse come <a href="<?php echo $ricerca_complessa[0]['query'] ?>&suggerimento=true" style='color:#26a69a'>< ?php echo $ricerca_complessa[0]['descrizione'] ?></a>? Basta usare i filtri avanzati in alto. Oppure puoi farti consigliare ingredienti stagionali usando il menu a sinistra, premendo su <a href="#" onclick='inspire_me()' style='color:#26a69a'> Ispirami</a>.</span>
					</div-->
					<div class="m-t-md" id="results">
					</div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<?php
						} else {

							if(isset($idRicetta)) {
								echo "<br>";
								echo (isset($ricettaDelGiorno)?"<h4><b>La ricetta del giorno &egrave;:</b></h2>":"");
								echo (strpos($idRicetta, 'http') === 0)?getCardFromUrl($idRicetta):'';
								/*echo '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<!-- Svuotafrigo-ricetta -->
								<ins class="adsbygoogle"
									 style="display:block"
									 data-ad-client="ca-pub-3367489543895212"
									 data-ad-slot="1006865466"
									 data-ad-format="auto"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({
                                      google_ad_client: "ca-pub-3367489543895212",
                                      enable_page_level_ads: false
                                 });
								</script>';*/
							} else {
								/*echo '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<!-- Svuotafrigo-ricetta -->
								<br><ins class="adsbygoogle"
									 style="display:block"
									 data-ad-client="ca-pub-3367489543895212"
									 data-ad-slot="1006865466"
									 data-ad-format="auto"></ins>
									 <br>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({
                                      google_ad_client: "ca-pub-3367489543895212",
                                      enable_page_level_ads: false
                                 });
								</script>';*/
								echo $classificaHtml;
							}
						}
					?>

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

		<?php
				$token = getToken();
		?>
		var token = '<?php echo $token; ?>';

	  if(!<?php echo $hideSplashscreen ?> && isSplashscreenVisible() && window.location.href.indexOf('ingredients=') == -1 && window.location.href.indexOf('name=') == -1) {
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
