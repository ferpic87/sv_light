<!DOCTYPE html>
<?php
require_once 'rest/config/config.php';
require_once "rest/config/elements.php";
require_once "rest/config/timestamp.php";
header('Content-Type: text/html');


$file = (isset($_GET['id']))?$_GET['id'] : null;

$urlLogo = "img/fridge.png";
$giorno = (intval(substr($file,0,2))-1);
$mese = substr($file,2,2);
$anno = substr($file,4,4);
$dataInizio = date('d/m/Y', strtotime($anno."-".$mese."-".$giorno. ' - 6 days'));
$dataFine = date('d/m/Y', strtotime($anno."-".$mese."-".$giorno));
$title = "Svuotafrigo - Classifica della settimana dal ".$dataInizio." al ".$dataFine;
$row = 1;
$classificaHtml = "<table class=\"table table-striped\">
    <!--<thead class=\"blue-grey\">
      <tr>
        <td><b>Posizione</b></td>
        <td><b>Ricetta</b></td>
		<td></td>
        <td><b>Visite settimanali</b></td>
      </tr>
    </thead>--><tbody>";

$classificaText = "";

if(isset($file)) {
	if (($handle = @fopen("stats/".$file.".csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);

			//$classificaHtml .= "<span>Numero visite:".$data[1] . " Nome ricetta:".$data[2] . " Url:".$data[8] . " UrlImage:".$data[10] ."</span>\n";
			if($row==1)
				$badgePosition = "<img src = \" images/oro.png \" style=\"width: 30px;\"/>";
			else if($row==2)
				$badgePosition = "<img src = \" images/argento.png \" style=\"width: 30px;\"/>";
			else if($row==3)
				$badgePosition = "<img src = \" images/bronzo.png \" style=\"width: 30px;\"/>";
			else
				$badgePosition = "";

			$classificaHtml .= "<tr onclick=\"interceptRedirect('".$data[8]."',0)\" class=\"rankingRow\"><td style=\"font-size: 22px;\"><b>#".$row."</b>".$badgePosition."</td><td><img src =". $data[10] ." style=\"width: 80px;\"/></td><td><a href=\"".$data[8]."?ref=svuotafrigo\"  style=\"color: black;\"><b>".$data[2]."</b> | ".$data[9]."</a></td></tr>";
			$classificaText .= $row." ".$data[2]." ";

			if($row == 1) $urlImage = $data[10];

			$row++;
			if($row>10)
				break;

			//$classificaHtml .= "<br />";
		}
		$classificaHtml .= "</tbody></table>";

		$classificaText = substr($classificaText, 0, 80)."...";

		fclose($handle);
	} else {
		$classificaHtml = "<br><h4>Classifica non ancora disponibile.. Riprova più tardi!</h4>";
	}
}
?>

<html lang="it">

<head>

<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $classificaText ?>">
<meta property="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@svuotafrigo">
<meta name="twitter:creator" content="@svuotafrigo">
<meta charset="utf-8">
<meta property="twitter:image:src" content="<?php echo $urlImage ?>">
<meta property="og:title" content="<?php echo $title ?>">
<!--meta property="og:url" content="<?php echo $urlToShare ?>" -->
<meta property="og:description" content="<?php echo $classificaText ?>">
<meta property="og:image" content="<?php echo $urlImage ?>">
<meta property="og:type" content="article">
<meta property="og:locale" content="it_IT">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta property="og:image:width" content="260">
<meta property="og:image:height" content="260">
<meta name="language" content="it">
<meta name="theme-color" content="#ff1493">
<link rel="icon" type="image/png" href="<?php echo $urlLogo ?>" />

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css?v=1<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="css/materialize.min.css"  media="screen,projection"/>
<link rel="stylesheet" type="text/css" href="css/materialize-tags.css?v=<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.min.css">
<link rel="stylesheet" type="text/css" href="css/site.css?v=<?php echo $timestamp; ?>" />
<link rel="stylesheet" type="text/css" href="css/jquery.dynatable.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.css?v=<?php echo $timestamp; ?>">
<link rel="stylesheet" type="text/css" href="css/hideshare.css?v=<?php echo $timestamp; ?>">


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
<style type="text/css">
	.rankingRow {
		border-bottom: 2px solid #000000;
		cursor:pointer;
	}
</style>

</head>

<body style="background: url('../img/bg.jpg') no-repeat center center fixed;">
			<div class="container" style="background: rgba(255,255,255,0.9);">
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
							<div class="table-responsive">
							<?php echo $classificaHtml; ?>
							</div>
						</div>
					</div>
					<?php
						printHtmlBadge(".");
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
