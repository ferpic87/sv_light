<!DOCTYPE html>
<?php
require_once '../rest/config/config.php';
require_once "../rest/config/elements.php";
require_once "../rest/config/timestamp.php";
header('Content-Type: text/html');
require_once '../rest/config/dbmanagement.php';
require_once '../rest/model/ricetta.php';


$db = openDatabaseConnection();
$obj = new Ricetta($db);
$name = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$ricetta = $obj->loadFromNameHash($name);
$urlToShare = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$ingredientsHtml="";
$ingredientsText="";

$ingredienti = $ricetta->getIngredienti();

for($i=0; $i<(count($ingredienti)-1); $i++) {
	$ingredient = $ingredienti[$i];
	$ingredientsHtml .= "<span class=''>".$ingredient["nome"]."</span> - ";
	$ingredientsText .= $ingredient["nome"]." - ";

}
$ingredientsHtml .= "<span class=''>".$ingredienti[$i]["nome"]."</span>";
$ingredientsText .= $ingredienti[$i]["nome"];
				
$titoloPagina = ucfirst ($name).", la ricetta che ti rappresenta di pi&ugrave; &egrave; ".$ricetta->getNome();
$titoloText = ucfirst ($name).", la ricetta che ti rappresenta di pi&ugrave; &egrave;:";
?>

<html lang="it">

<head>

<title><?php echo $titoloPagina ?></title>
<meta name="description" content="Ricetta completa su <?php echo $ricetta->getSource() ?>. Ingredienti: <?php echo $ingredientsText ?>">
<meta property="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@svuotafrigo">
<meta name="twitter:creator" content="@svuotafrigo">
<meta charset="utf-8">
<meta property="twitter:image:src" content="<?php echo $ricetta->getUrlImage() ?>">
<meta property="og:title" content="<?php echo $titoloPagina ?>">
<meta property="og:url" content="<?php echo $urlToShare ?>">
<meta property="og:description" content="Ricetta completa su <?php echo $ricetta->getSource() ?>. Ingredienti: <?php echo $ingredientsText ?>">
<meta property="og:image" content="<?php echo $ricetta->getUrlImage() ?>">
<meta property="og:type" content="article">
<meta property="og:locale" content="it_IT">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta property="og:image:width" content="260">
<meta property="og:image:height" content="260">
<meta name="language" content="it">
<meta name="theme-color" content="#ff1493">
<link rel="icon" type="image/png" href="../img/fridge.png?v=3" />	

<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css?v=<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="../css/materialize.min.css"  media="screen,projection"/>
<link rel="stylesheet" type="text/css" href="../css/materialize-tags.css?v=<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.structure.min.css">
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.theme.min.css">
<link rel="stylesheet" type="text/css" href="../css/site.css?v=<?php echo $timestamp; ?>" />
<link rel="stylesheet" type="text/css" href="../css/jquery.dynatable.css" />
<link rel="stylesheet" type="text/css" href="../css/font-awesome.css?v=<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="../css/hideshare.css?v=<?php echo $timestamp; ?>">


<script
	src="../js/jquery.min.js"></script>

<script
	src="../js/bootstrap.min.js"></script>

	
	
<script src="../js/utils.js?v=<?php echo $timestamp; ?>"></script>
<script src="../js/recipes_script.js?v=<?php echo $timestamp; ?>"></script>

<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript" src="../js/materialize-tags.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="../js/typehead.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="../js/hideshare.min.js?v=<?php echo $timestamp; ?>"></script>

</head>

<body>			
			<div class="container">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Svuotafrigo-ricetta -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-3367489543895212"
                         data-ad-slot="1006865466"
                         data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<h1 style="text-align:center"><?php echo $titoloText; ?></h1>
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="<?php echo $ricetta->getUrlImage() ?>" alt="" onclick="redirectToUrl('<?php echo $ricetta->getUrl() ?>','0')"/>
								<div class="card-img-overlay">
									<h4 class="my-card-title"><?php echo $ricetta->getNome(); ?></h4>
								</div>
								<div class="card-block">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<?php echo $ingredientsHtml ?></p>
									<div class=""><a href="<?php echo $ricetta->getUrl() ?>?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect('<?php echo $ricetta->getUrl() ?>','0')"><i class="material-icons">open_in_new</i></a>
									<a class="share btn btn-floating" href="#" url="<?php echo $urlToShare ?>" urlImage="<?php echo $ricetta->getUrlImage() ?>"><i class="material-icons">share</i></a></div>
								</div>
								<span class="powered"> <img src="../<?php echo getImg($ricetta->getSource()) ?>">&nbsp;&nbsp;</span>
							 </article><!-- .end Card -->
						</div>
					</div>
					<?php
						printHtmlBadge("..");
					?>
				</div>

	
	<script>
		$(document).ready(function() {
			$( ".share" ).each(function( index ) {
				$(this).hideshare({
					link: $(this).attr("url"),
					media: $(this).attr("urlImage"),
					position: "top",
					linkedin: false
				});
			});	
		});
	</script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-86180841-1', 'auto');
	  ga('send', 'pageview');

	</script>
	
</body>

</html>