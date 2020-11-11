<?php require_once __DIR__ .'/rest/config/timestamp.php'; ?>
<head>
<title>Svuotafrigo - cerca ricette dagli ingredienti</title>
<meta charset="utf-8">
<meta name="robots" content="noindex" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" type="image/png" href="img/fridge_resized.png?v=3" />

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


<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-analytics.js"></script>
<!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-firestore.js"></script>
<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional

  // Initialize Firebase
</script>
<script src="https://www.gstatic.com/firebasejs/ui/4.6.1/firebase-ui-auth.js"></script>
<link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.6.1/firebase-ui-auth.css" />
</head>
