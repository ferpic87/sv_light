<?php
require_once 'rest/model/KLogger.php';
$referer = $_SERVER['HTTP_REFERER'];
$qr_code = (isset($_GET['qr_code']))?" qrcode":"";

$log = new KLogger ( "rest/logs/provenienza".getTimestamp().".txt" , KLogger::DEBUG );

$ua = strtolower($_SERVER['HTTP_USER_AGENT']).$qr_code;
if(stripos($ua,'android') !== false) { // && stripos($ua,'mobile') !== false) {
	$log->LogDebug($referer." android ".$ua);
	header('Location: https://play.google.com/store/apps/details?id=com.apphost.ricette&rdid=com.apphost.ricette');
	
	exit();
} else if(stripos($ua,'iPod') !== false || stripos($ua,'iPhone') !== false || stripos($ua,'iPad') !== false) { // && stripos($ua,'mobile') !== false) {
	$log->LogDebug($referer." mac ".$ua);
	header('Location: https://itunes.apple.com/us/app/svuotafrigo/id1267367811');
	exit();
} else {
	$log->LogDebug($referer." web ".$ua);
	header('Location: http://www.apphost.it/ricette');
	exit();
}

	
function getTimestamp() {
	return date('dmY');
}