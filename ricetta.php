<!DOCTYPE html>
<?php
require_once 'rest/config/config.php';
require_once "rest/config/elements.php";
require_once "rest/config/timestamp.php";
header('Content-Type: text/html');
require_once 'rest/config/dbmanagement.php';
require_once 'rest/model/ricetta.php';

$db = openDatabaseConnection();
$obj = new Ricetta($db);
$idRicetta = (isset($_GET['id']))?$_GET['id'] : null;
$ricetta = $obj->loadUnique($idRicetta);
$urlToShare = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//$ingredientsHtml="";
$ingredientsText="";
$ingredientsTextJson="[";
$categorieText="";

if(isset($ricetta)) {
	$ingredienti = $ricetta->getIngredienti();

	for($i=0; $i<(count($ingredienti)-1); $i++) {
		$ingredient = $ingredienti[$i];
		//$ingredientsHtml .= "<span class=''>".$ingredient["nome"]."</span> - ";
		$ingredientsText .= $ingredient["nome"]." - ";
		$ingredientsTextJson .= "\"".$ingredient["nome"]."\",";
	}
	//$ingredientsHtml .= "<span class=''>".$ingredienti[$i]["nome"]."</span>";
	$ingredientsText .= $ingredienti[$i]["nome"];
	$ingredientsTextJson .= "\"".$ingredienti[$i]["nome"]."\"]";

	$categorie = $ricetta->getCategorie();

	for($i=0; $i<(count($categorie)-1); $i++) {
		$categoria = $categorie[$i];
		//$ingredientsHtml .= "<span class=''>".$ingredient["nome"]."</span> - ";
		$categorieText .= $categoria.", ";
	}
	//$ingredientsHtml .= "<span class=''>".$ingredienti[$i]["nome"]."</span>";
	$categorieText .= $categorie[$i];

	$source = $ricetta->getSource();
	$description = "Svuotafrigo - Cerca ricette dagli ingredienti. Ricetta completa su ".$source.". Ingredienti: ".$ingredientsText;
	$nome = $ricetta->getNome();
	$urlImage = $urlImage;
} else {
	$source = "Non lo so";
	$description = "Svuotafrigo - Cerca ricette dagli ingredienti. Ricetta non trovata";
	$nome = "Ricetta non trovata";
	$urlImage = "http://www.apphost.it/ricette/images/cucinare1.jpg";
}

?>
<html lang="it">

<head>

<title><?php echo $nome ?></title>
<meta charset="utf-8">
<meta name="description" content="<?php echo $description ?>">
<meta name="author" content="<?php echo $source ?>">
<meta name="keywords" content="ricetta, svuotafrigo, <?php echo $categorieText ?>">
<meta name="robots" content="all">
<meta property="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@svuotafrigo">
<meta name="twitter:creator" content="@svuotafrigo">
<meta name="twitter:title" content="<?php echo $nome ?>">
<meta name="twitter:description" content="<?php echo $description ?>">
<meta property="twitter:image:src" content="<?php echo $urlImage ?>">
<meta property="og:title" content="<?php echo $nome ?>">
<meta property="og:site_name" content="Svuotafrigo - Cerca ricette dagli ingredienti">
<meta property="og:url" content="<?php echo $urlToShare ?>">
<meta property="og:description" content="<?php echo $description ?>">
<meta property="og:image" content="<?php echo $urlImage ?>">
<meta property="og:type" content="article">
<meta property="og:locale" content="it_IT">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta property="og:image:width" content="260">
<meta property="og:image:height" content="260">
<meta name="language" content="it">
<meta name="theme-color" content="#ff1493">
<link rel="icon" type="image/png" href="img/fridge.png?v=3" />

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="css/materialize.min.css" media="screen,projection"/>
<link rel="stylesheet" type="text/css" href="css/materialize-tags.css?v=<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.min.css">
<link rel="stylesheet" type="text/css" href="css/site.css?v=<?php echo $timestamp; ?>" />
<link rel="stylesheet" type="text/css" href="css/jquery.dynatable.css" />
<link rel="stylesheet" type="text/css" href="css/fontawesome-all.css?v=<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="css/hideshare.css?v=<?php echo $timestamp; ?>">
<script type="application/ld+json">
{
   "@context":"http://schema.org",
   "@type":"Recipe",
   "description":"<?php echo $description ?>",
   "author":{
      "@type":"Person",
      "name":"<?php echo $source ?>"
   },
   "image":[
      {
         "@type":"ImageObject",
         "url":"<?php echo $urlImage ?>"
      }
   ],
   "name":"<?php echo $nome ?>",
   "recipeIngredient":<?php echo $ingredientsTextJson ?>,
   "recipeCategory":"<?php echo $categorieText ?>",
   "keywords":"<?php echo str_replace(" ",",",$nome); ?>"
}
</script>

<script
	src="js/jquery.min.js"></script>

<script
	src="js/bootstrap.min.js"></script>

<script src="js/utils.js?v=<?php echo $timestamp; ?>"></script>
<script src="js/recipes_script_saved.js?v=<?php echo $timestamp; ?>"></script>

<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/materialize-tags.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/typehead.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/hideshare.min.js?v=<?php echo $timestamp; ?>"></script>
<script type="text/javascript" src="js/save_recipes.js?v=<?php echo $timestamp; ?>"></script>

</head>

<body>
			<script type="application/ld+json">
			{
			   "@context":"http:\/\/schema.org\/",
			   "@type":"Recipe",
			   "name":"<?php echo $nome ?>",
			   "recipeCategory":"<?php echo $categorieText ?>",
			   "image":[
			      "<?php echo $urlImage ?>"
			   ],
			   "author":{
			      "@type":"Person",
			      "name":"<?php echo $source ?>"
			   },
			   "description":"<?php echo $nome ?>",
			   "recipeIngredient":[<?php
							$recipeIngredients = "\"".str_replace(" - ","\",\"",$ingredientsText)."\"";
							echo $recipeIngredients;?>],
			   "recipeInstructions":"Visita la ricetta completa su <?php echo $source ?>",
			   "keywords":"<?php echo $nome ?>, <?php echo $categorieText ?>",
			   "cookTime":"",
			   "nutrition":"",
			   "prepTime":"",
			   "recipeCuisine":"",
			   "video":""
			}
			</script>
			<div class="container">
					<br>
					<?php
						echo getCardFromUrl($idRicetta);
					?>
					<?php
						printHtmlBadge(".");
					?>
				</div>
				<div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="downloadModal" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel"></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <br><br>Svuotafrigo è anche un'app che ti permette di trovare nuove ricette ogni giorno, a partire dagli ingredienti che hai in casa. Vuoi provarla?
								<br><br>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-primary" onclick='window.location.href = "http://apphost.it/ricette/checker.php"'>SI, SCARICA L'APP!</a></button>
				      </div>
				    </div>
				  </div>
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

			setTimeout(function(){
				 $('#downloadModal').modal();
			 }, 1000);
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
