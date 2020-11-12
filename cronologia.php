<!DOCTYPE html>
<?php
$origin = $_GET['origin'];
require_once __DIR__ .'/rest/config/elements.php';
require_once __DIR__ .'/menu_saved.php';
header('Content-Type: text/html');
?>
<html lang="it">
<?php
require_once __DIR__ ."/head.php";
?>
<body>
			<p id="back-top">
				<a href="#top"><span><i class="material-icons">keyboard_arrow_up</i></span></a>
			</p>
			<div id="myToast" class="toast-popup"></div>
			<div class="container" id="wrapper">
				<!-- Start Modal Structure -->
				  <?php print_info() ?>
				<!-- End Modal Structure -->
				<!-- Start Modal Social Structure -->
				  <?php print_social_links(); ?>
				<!-- End Modal Social Structure -->

				<div class="leftoverlay"></div>

				<div class="row">
					<p class="testata" onclick="document.location = '<?php echo $origin ?>.php'"><span id="menu-icon-id"><i class="material-icons">dehaze</i></span><span id="app-name"><b>Svuota</b>frigo</span></span></p>
				</div>
				<!-- Sidebar -->
				<?php print_menu('cronologia'); ?>
				<!-- End Sidebar -->
				<div><br><b style="font-size:large">&nbsp;Attivit&agrave; recenti</b><br><hr></div>
				<!--div>
					<h1>
					il menù di Pasqua!
					</h1>
				</div> -->

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

					<div class="m-t-md" id="results">
					<!-- Fave, pecorino e pancetta -->
					<!--php
						echo getCardFromUrl('http://ricette.giallozafferano.it/Fave-pecorino-e-pancetta.html');
					?-->

					</div>
					<br>
					<br>
					<br>
					<br>
					<br>
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
		if (useAnalytics)
			ga('send', 'event', 'UI', 'apertaCronologia');

		showHistory();
	  });
	</script>
	</body>

</html>
