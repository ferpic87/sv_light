<?php
//$origin = $_GET['origin'];

function print_menu($location) {
	global $origin;
	global $bridge;
	//$labelMenuEvento = "Men&ugrave; di Carnevale";
	//$labelMenuEvento = "Men&ugrave; San Valentino";
	//	Men&ugrave; di Natale';
	//	Men&ugrave; di Pasqua';
	//  Men&ugrave; pic-nic';
	//$labelMenuEvento = "Men&ugrave; Mimosa";
	$labelMenuEvento = "Men&ugrave; di Pasqua";
	$labelMenuSecondario = "Men&ugrave; #ioRestoACasa";
	$link_ricetta_del_giorno = '<a href="ricetta_del_giorno.php?origin='.$origin.'&fake=02102020">Ricetta del giorno</a>';

	//$link_menu_evento = '<a href="pasqua_saved.php?origin='.$origin.'">'.$labelMenuEvento.'</a>';


//	Men&ugrave; San Valentino';

	$link_store = ($origin=="android_saved")?"https://play.google.com/store/apps/details?id=com.apphost.ricette":"https://itunes.apple.com/us/app/svuotafrigo/id1267367811?mt=8";

	/*$link_vegetariane = '<a href="vegetarian.php?origin='.$origin.'">Ricette vegetariane</a>';
	$link_vegane = '<a href="vegan.php?origin='.$origin.'">Ricette vegane</a>';
	$link_senza_glutine = '<a href="gluten_free.php?origin='.$origin.'">Ricette senza glutine</a>';
	$link_senza_lattosio = '<a href="lactose_free.php?origin='.$origin.'">Ricette senza lattosio</a>';
	*/
	if($location == "index") {
		$link_index = '<a class="hover" href="'.$origin.'.php">Cerca ricette</a>';
		$link_menu_ricette_salvate = '<a href="ricette_saved.php?origin='.$origin.'">Ricette preferite</a>';
		$link_menu_secondario = '<a href="restoacasa.php?origin='.$origin.'">'.$labelMenuSecondario.'</a>';
		$link_cronologia = '<a href="cronologia.php?origin='.$origin.'">Cronologia</a>';
	/*} else if($location == "evento") {
		$link_index = '<a href="'.$origin.'.php">Cerca ricette</a>';
		$link_menu_secondario = '<a href="restoacasa.php?origin='.$origin.'">'.$labelMenuSecondario.'</a>';
		$link_menu_ricette_salvate = '<a href="ricette_saved.php?origin='.$origin.'">Ricette preferite</a>';
		$link_cronologia = '<a href="cronologia.php?origin='.$origin.'">Cronologia</a>';
	*/
	} else if($location == "ricette_salvate") {
		$link_index = '<a href="'.$origin.'.php">Cerca ricette</a>';
		$link_menu_ricette_salvate = '<a class="hover" href="ricette_saved.php?origin='.$origin.'">Ricette preferite</a>';
		$link_menu_secondario = '<a href="restoacasa.php?origin='.$origin.'">'.$labelMenuSecondario.'</a>';
		$link_cronologia = '<a href="cronologia.php?origin='.$origin.'">Cronologia</a>';
	} else if($location == "secondario") {
		$link_index = '<a href="'.$origin.'.php">Cerca ricette</a>';
		$link_menu_ricette_salvate = '<a href="ricette_saved.php?origin='.$origin.'">Ricette preferite</a>';
		$link_menu_secondario = '<a class="hover" href="restoacasa.php?origin='.$origin.'">'.$labelMenuSecondario.'</a>';
		$link_cronologia = '<a href="cronologia.php?origin='.$origin.'">Cronologia</a>';
	} else if($location == "cronologia") {
		$link_index = '<a href="'.$origin.'.php">Cerca ricette</a>';
		$link_menu_ricette_salvate = '<a href="ricette_saved.php?origin='.$origin.'">Ricette preferite</a>';
		$link_menu_secondario = '<a href="restoacasa.php?origin='.$origin.'">'.$labelMenuSecondario.'</a>';
		$link_cronologia = '<a class="hover" href="cronologia.php?origin='.$origin.'">Cronologia</a>';
	} else {
		$link_index = '<a href="'.$origin.'.php">Cerca ricette</a>';
		$link_menu_ricette_salvate = '<a href="ricette_saved.php?origin='.$origin.'">Ricette preferite</a>';
		$link_menu_secondario = '<a href="restoacasa.php?origin='.$origin.'">'.$labelMenuSecondario.'</a>';
		$link_cronologia = '<a href="cronologia.php?origin='.$origin.'">Cronologia</a>';
	}
	echo '<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand">
			<a href="./'.$origin.'.php">
				<img style="margin-top: 15px; width:80%" alt="Logo Svuotafrigo" src="img/fridge_svuota.png">
			</a>
			</li>
			<li>'.$link_index.'</li>
			<li>'.$link_ricetta_del_giorno.'</li>
			<li>
				<a href="#" onclick="">Ispirami</a>
			</li>
			<li>
				'.$link_menu_ricette_salvate.'
			</li>
			<li>
				'.$link_menu_secondario.'
			</li>
			<li>
				'.$link_cronologia.'
			</li>'.
			/*<li>
				'.$link_vegetariane.'
			</li>
			<!--li>
				'.$link_vegane.'
			</li-->
			<li>
				'.$link_senza_glutine.'
			</li>
			<!--li>
				'.$link_senza_lattosio.'*/
			'</li-->
			'.((isset($_GET['pro']))?'<li>
				<a href="#historyModal" class="modal-trigger" onclick="toggleHistory()">
					Ultime ricerche <img src="img/pro.png">
				</a>
			</li>
			<li>
				<a href="#pantryModal" class="modal-trigger" onclick="togglePantry()">
					Dispensa <img src="img/pro.png">
				</a>
			</li>':'').
			'<li>
				<a href="#infoModal" class="modal-trigger" onclick="toggleMenu()">
					Contattaci
				</a>
			</li>
			<li>
				<a href="'.$link_store.'">Dacci un voto!</a>
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
				<a href="#infoSocial" class="modal-trigger" onclick="toggleMenu()">
					Seguici
				</a>
			</li>
			<!-- li>
				<a id="loginButtonId" href="#loginModal" class="modal-trigger" onclick="toggleMenu()">
					Accedi...
				</a>
			</li -->
			<!-- li>
				<a href="#">Le mie ricette preferite</a>
			</li-->
		</ul>
	</div>';
}
