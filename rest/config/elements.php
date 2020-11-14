<?php
	require_once "config.php";
	require_once "dbmanagement.php";
	require_once "categories_management.php";

	function print_info() {
		echo '<div id="infoModal" class="modal">
						<div class="modal-content">
						  <h4>Chi siamo</h4>
						  <p>Hai pochi ingredienti in frigo? Non sai cosa cucinare stasera? La risposta è <b>Svuotafrigo</b>! Il primo motore di ricerca dedicato al mondo della cucina, che ti aiuta a ridurre gli sprechi.
Scrivi ciò che hai in dispensa e Svuotafrigo ti suggerirà il piatto giusto per te, cercando tra oltre 25.000 ricette in costante aggiornamento.
<p> Per qualsiasi problema riscontrato con la nostra app, scrivici utilizzando il pulsante di seguito:</p>
						  <p class="center-align"><a class="btn modal-action" title="Scrivici una mail" href="mailto:svuotafrigo@apphost.it">Contattaci</a>
							<p class="center-align"><a class="btn modal-action" title="Modifica consensi" href="../ogury">Modifica consensi privacy</a></p>
							<br>
						</div>
						<div class="modal-footer">
						  <a title="Chiudi info" href="#" class="modal-action modal-close btn btn-primary">Chiudi</a>
						</div>
					  </div>';
	}
	function print_login() {
		echo '<div id="loginModal" class="modal">
						<div class="modal-content">
						  <h4>Accedi</h4>
						 <div id="firebaseui-auth-container"></div>

							<br>
						</div>
						<div class="modal-footer">
						  <a title="Chiudi info" href="#" class="modal-action modal-close btn btn-primary">Chiudi</a>
						</div>
					  </div>';
	}
	function print_social_links() {
		echo '<div id="infoSocial" class="modal">
						<div class="modal-content" style="padding:0px">
							<div class="content_follow">
									<div>
										<a title="Facebook" href="https://www.facebook.com/svuotafrigo" class="fa fa-social fa-facebook"></a>
									</div>
								
									<div>
										<a title="Twitter" href="https://twitter.com/Svuotafrigo" class="fa fa-social fa-twitter"></a>
									</div>
							</div>
							<div class="content_follow">
									<div style="background: lightblue;">
										<a title="Telegram" href="https://telegram.me/svuotafrigo" class="fa fa-social fa-telegram"></a>
									</div>
									<div style="background: pink;">
										<a title="Instagram" href="http://www.instagram.com/_u/svuotafrigo/" href="#" class="fa fa-social fa-instagram"></a>
									</div>
							</div>
							
						</div>
						<div class="modal-footer">
						  <a title="Chiudi info" href="#" class="modal-action modal-close btn btn-primary">Chiudi</a>
						</div>
					  </div>';
	}

	function printHtmlBadge($prefix) {
		echo '<div class="row">
				<div class="table-responsive">
					<table class="table">
						<td class="badgeDownload"><a title="Pagina Play Store Svuotafrigo" href="https://play.google.com/store/apps/details?id=com.apphost.ricette&rdid=com.apphost.ricette" title="Google Download" class="button-google-play" target="_blank">
							<img src="'.$prefix.'/images/googleplay.png" alt="Google Download">
						</a></td>
						<td class="badgeDownload"><a title="Pagina App Store iTunes Svuotafrigo" href="https://itunes.apple.com/us/app/svuotafrigo/id1267367811?mt=8" title="Google Download" class="button-google-play" target="_blank">
							<img src="'.$prefix.'/images/appstore.gif" alt="AppStore Download">
						</a></td>
					</table>
				</div>
			</div>';
	}

	function getImg($source) {
		if($source=='GialloZafferano')
			return "images/source/gz.png";
		else if($source=='Misya')
			return "images/source/misya.png";
		else if($source=='SalePepe')
			return "images/source/salepepe.png";
		else if($source=='Oggi Veggie')
			return "images/source/veggie.png";
		else if($source=='lacucinadiyuto')
			return "images/source/lacucinadiyuto.png";
		return "images/source/".$source.".png";
	}

	function getCardFromUrl($url) {
		require_once dirname(__DIR__)."/model/ricetta.php";
		$db = openDatabaseConnection();
		$obj = new Ricetta($db);
		$idRicetta = $url;
		$ricetta = $obj->loadUnique($idRicetta);

		if(isset($ricetta)) {
			$ingredienti = $ricetta->getIngredienti();
			return getCardFromFields($ricetta->getNome(), $ricetta->getUrl(), $ricetta->getUrlImage(),$ricetta->getSource(),$ingredienti);
		} else {
			$rows1 = array("nome" => "Un po' di buona volont&agrave;","nome_normalizzato" =>"Un po' di buona volont&agrave;");
			$rows2 = array("nome" => "Tanto olio di gomito","nome_normalizzato" =>"Tanto olio di gomito");
			$ings[] = $rows1;
			$ings[] = $rows2;
			return getCardFromFields("Ricetta non trovata", "http://www.apphost.it", "http://www.apphost.it/ricette/images/cucinare1.jpg","Non lo so",$ings);
		}
	}

  function getComplexQuery() {
		require_once dirname(__DIR__)."/model/ricerca_complessa.php";
		$db = openDatabaseConnection();
		$obj = new RicercaComplessa($db);
		return $obj->loadRicercaComplessa();
	}


function getCardFromFullFieldsDiff($nome, $url, $urlImage, $source, $ingredienti, $categorie, $endorse_flag) {
	$ingredientsHtml="";
	$ingredientsText="";
	$categorieHtml="";
	$categorieText="";
	$urlToShare = "http://www.apphost.it/ricette/ricetta.php?id=".$url;
	$idDivRicetta = preg_replace("/[^a-zA-Z]/","",$url);
	$vecchieCategorie="";
	if(isset($ingredienti)) {
		for($i=0; $i<(count($ingredienti)-1); $i++) {
			$ingredient = $ingredienti[$i];
			$ingredientsText .= $ingredient["nome"]." - ";
			$ingredientsHtml .= "<span id='".preg_replace("/[^a-zA-Z]/","",$ingredient["nome"])."' class='ingredientStyle'>".$ingredient["nome"]." <span class=\"del-ingredient\" onclick=\"removeIngredient('".preg_replace("/[^a-zA-Z]/","",$ingredient["nome"])."','".$idDivRicetta."')\">×</span></span>";
		}
		$ingredientsHtml .= "<span id='".preg_replace("/[^a-zA-Z]/","",$ingredienti[count($ingredienti)-1]["nome"])."' class='ingredientStyle'>".$ingredienti[count($ingredienti)-1]["nome"]." <span class=\"del-ingredient\" onclick=\"removeIngredient('".preg_replace("/[^a-zA-Z]/","",$ingredienti[count($ingredienti)-1]["nome"])."','".$idDivRicetta."')\">×</span></span>";
		$ingredientsText .= $ingredienti[count($ingredienti)-1]["nome"];
	}
	$classChanged = '';
	$tutteLeCategorieInserite = '';

	$vecchieCategorie = implode(", ", $categorie);
	$nuoveCategorie = calculate_categories($categorie, $nome, $ingredienti);
	//echo var_export($categorie,true)."<br>";
	//echo var_export($nuoveCategorie,true)."<br>";
	for($i=0; $i<count($nuoveCategorie); $i++) {
		$categoria = $nuoveCategorie[$i];
		//echo var_export($categoria,true)."<br>";

		if(trim($categoria)!="") {

			if(array_search($categoria, $categorie)===FALSE) {
				$classCategory = 'categoryStyleNew';
				$classChanged = 'recipeChanged';
			} else {
				$classCategory = 'categoryStyle';
			}
			if (strpos($tutteLeCategorieInserite, strtolower($categoria)) !== false) {
				$classChanged = 'recipeChanged';
				continue; // non inserire categoria se già presente
			} else {
				$tutteLeCategorieInserite .= strtolower($categoria).' ';
				$categorieText .= $categoria;
				if($i != count($nuoveCategorie)-1)
					$categorieText .= " - ";

				if(count($categorie) == 0) $classChanged = 'recipeChanged';
			}
			$categorieHtml .= "<span id='".preg_replace("/[^a-zA-Z]/","",$categoria)."' class='".$classCategory."'>".$categoria." <span class=\"del-ingredient\" onclick=\"removeCategory('".$categoria."','".$idDivRicetta."')\">×</span></span>";
		}
	}
	//echo $categorieText."<br>";
	if(count($categorie) != count($nuoveCategorie))
		 $classChanged = 'recipeChanged';

	$nessunaCategoria = false;
	if(count($nuoveCategorie) == 0) {
		$nessunaCategoria = true;
	}
	$html = '<div class="row" id="'.$idDivRicetta.'">
					<div class="col-xs-12 col-md-12">
						<article class="card animated fadeInLeft '.$classChanged.' '.(($nessunaCategoria)?'noCategory':'').'" id="ricetta">
						<!-- Card -->
							<!-- img class="card-img-top img-responsive" src="'.$urlImage.'" alt="" onclick="redirectToUrl(\''.$url.'\',0, \''.mapSource($source).'\', \''.$nome.'\')"/ -->
							<div class="card-block">
								<div class="my-card-title" itemprop="name">'.$nome.'</div>
								<div class="my-card-subtitle" itemprop="name"> by <span id="source">'.mapSource($source).'</span></div>
								<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
								<span id="urlRicetta" style="display:none">'.$url.'</span>
								<span id="urlImage" style="display:none">'.$urlImage.'</span>
								<span id="ingredienti" style="display:none">'.$ingredientsText.'</span>
								<span id="categorie" style="display:none">'.$categorieText.'</span>
								<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredientiList">'.$ingredientsHtml.'</span></p>
								<div class="">
								<p class="card-text"><b>Categorie</b>:&nbsp;<span id="categorieList">'.$categorieHtml.'</span></p>
								<p class="card-text"><b>Vecchie categorie</b>:&nbsp;<span id="categorieListOld">'.$vecchieCategorie.'</span></p>
								<p class="card-text"><b>Note:'.(($classChanged!="")?' Modificata':'').(($nessunaCategoria)?' Nessuna categoria':'').'</b></p>
								<div class="">';
					$html .= ($mostrareBottoni)? '<a href="'.$url.'?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(\''.$url.'\',0, \''.mapSource($source).'\', \''.$nome.'\')"><i class="material-icons">open_in_new</i></a>
								<a class="share btn btn-floating" href="#" url="'.$urlToShare.'" urlImage="'.$urlImage.'"><i class="material-icons">share</i></a>':'';
					$html .= ($endorse_flag) ? '</div>
							</div>
							<div style="text-align: center;">
								<button class="waves-effect waves-light btn" onclick="updateRecipe(\''.$idDivRicetta.'\')">Aggiorna ricetta</button>
								<button id="modifyButton" class="waves-effect waves-light btn" onclick="mostraModifiche(\''.$idDivRicetta.'\')">Modifica</button>
								<button class="waves-effect waves-light btn"><a style="color:white" href="'.$url.'" target="_blank">Vai alla ricetta</a></button>
								<button class="waves-effect waves-light btn" onclick="deleteRecipe(\''.$idDivRicetta.'\')">Cancella ricetta</button>
								<br><br>
							</div>
							<div class="row" id="modifica-panel" style="display:none">
								<div class="row">
									<div class="col-sm-3"><b>Inserisci categoria</b></div>
									<div class="col-sm-3"></div>
									<div class="col-sm-3"><b>Inserisci ingrediente</b></div>
									<div class="col-sm-3"></div>
								</div>
								<div class="col-sm-3">
									<select id="categoriaRicetta" class="col md-5">
										'.getCategoriesOptions().'
									</select>
								</div>
								<div class="col-sm-3"><button class="waves-effect waves-light btn" onclick="addCategoryBridge(\''.$idDivRicetta.'\', \'#'.$idDivRicetta.' #categoriaRicetta\')">Aggiungi</button></div>
								<div class="col-sm-3" id="containerIngrediente"></div>
								<div class="col-sm-3"><button class="waves-effect waves-light btn" onclick="addIngredientPlusBridge(\''.$idDivRicetta.'\')">Aggiungi</button></div>
								</div>':'';
		$html .= '</div>
						 </article><!-- .end Card -->
					</div>
				</div>';
	return $html;
}

function getCategoriesOptions() {
	return '<option disabled selected value>Seleziona categoria...</option>
	<option value="Antipasti">Antipasti</option>
	<option value="Bimby">Bimby</option>
	<option value="Biscotti">Biscotti</option>
	<option value="Carne">Carne</option>
	<option value="Cheesecake">Cheesecake</option>
	<option value="Come fare">Come fare</option>
	<option value="Conserve e confetture">Conserve e confetture</option>
	<option value="Contorni">Contorni</option>
	<option value="Creme">Creme</option>
	<option value="Dolci e Desserts">Dolci e Desserts</option>
	<option value="Drinks gelati e granite">Drinks gelati e granite</option>
	<option value="Insalate">Insalate</option>
	<option value="Liquori e cocktail">Liquori e cocktail</option>
	<option value="Muffin">Muffin</option>
	<option value="Pane Pizze e derivati">Pane Pizze e derivati</option>
	<option value="Pesce Molluschi e Crostacei">Pesce Molluschi e Crostacei</option>
	<option value="Primi piatti">Primi piatti</option>
	<option value="Ricette dal mondo">Ricette dal mondo</option>
	<option value="Ricette delle feste">Ricette delle feste</option>
	<option value="Ricette light">Ricette light</option>
	<option value="Ricette napoletane">Ricette napoletane</option>
	<option value="Ricette per bambini">Ricette per bambini</option>
	<option value="Ricette regionali">Ricette regionali</option>
	<option value="Salse e Sughi">Salse e Sughi</option>
	<option value="Secondi piatti">Secondi piatti</option>
	<option value="Senza glutine">Senza glutine</option>
	<option value="Senza lattosio">Senza lattosio</option>
	<option value="Vegane">Vegane</option>
	<option value="Vegetariane">Vegetariane</option>
	<option value="Videoricette">Videoricette</option>
	<option value="Zuppe e Minestre">Zuppe e Minestre</option>';
}

function getCardFromFullFields($nome, $url, $urlImage, $source, $ingredienti, $categorie, $endorse_flag) {
	$ingredientsHtml="";
	$ingredientsText="";
	$categorieHtml="";
	$categorieText="";
	$urlToShare = "http://www.apphost.it/ricette/ricetta.php?id=".$url;
	$idDivRicetta = preg_replace("/[^a-zA-Z]/","",$url);
	if(isset($ingredienti)) {
		for($i=0; $i<(count($ingredienti)-1); $i++) {
			$ingredient = $ingredienti[$i];
			$ingredientsText .= $ingredient["nome"]." - ";
			$ingredientsHtml .= "<span id='".preg_replace("/[^a-zA-Z]/","",$ingredient["nome"])."' class='ingredientStyle'>".$ingredient["nome"]." <span class=\"del-ingredient\" onclick=\"removeIngredient('".preg_replace("/[^a-zA-Z]/","",$ingredient["nome"])."','".$idDivRicetta."')\">×</span></span>";
		}
		$ingredientsHtml .= "<span id='".preg_replace("/[^a-zA-Z]/","",$ingredienti[count($ingredienti)-1]["nome"])."' class='ingredientStyle'>".$ingredienti[count($ingredienti)-1]["nome"]." <span class=\"del-ingredient\" onclick=\"removeIngredient('".preg_replace("/[^a-zA-Z]/","",$ingredienti[count($ingredienti)-1]["nome"])."','".$idDivRicetta."')\">×</span></span>";
		$ingredientsText .= $ingredienti[count($ingredienti)-1]["nome"];
	}
	if(isset($categorie) && count($categorie)>0) {

		$categorie = calculate_categories($categorie, $nome, $ingredienti);
		for($i=0; $i<(count($categorie)-1); $i++) {
			$categoria = $categorie[$i];
			if(trim($categoria)!="") {
				$categorieText .= $categoria." - ";
				$categorieHtml .= "<span id='".preg_replace("/[^a-zA-Z]/","",$categoria)."' class='categoryStyle'>".$categoria." <span class=\"del-ingredient\" onclick=\"removeCategory('".$categoria."','".$idDivRicetta."')\">×</span></span>";
			}
		}
		if(trim($categorie[count($categorie)-1])!="") {
			$categorieHtml .= "<span id='".preg_replace("/[^a-zA-Z]/","",$categorie[count($categorie)-1])."' class='categoryStyle'>".$categorie[count($categorie)-1]." <span class=\"del-ingredient\" onclick=\"removeCategory('".$categorie[count($categorie)-1]."','".$idDivRicetta."')\">×</span></span>";
			$categorieText .= $categorie[count($categorie)-1];
		}
	}
	$html = '<div class="row" id="'.$idDivRicetta.'">
					<div class="col-xs-12 col-md-12">
						<article class="card animated fadeInLeft" id="ricetta">
						<!-- Card -->
							<img class="card-img-top img-responsive" src="'.$urlImage.'" alt="" onclick="redirectToUrl(\''.$url.'\',0, \''.mapSource($source).'\', \''.$nome.'\')"/>
							<div class="card-block">
								<div class="my-card-title" itemprop="name">'.$nome.'</div>
								<div class="my-card-subtitle" itemprop="name"> by <span id="source">'.mapSource($source).'</span></div>
								<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
								<span id="urlRicetta" style="display:none">'.$url.'</span>
								<span id="urlImage" style="display:none">'.$urlImage.'</span>
								<span id="ingredienti" style="display:none">'.$ingredientsText.'</span>
								<span id="categorie" style="display:none">'.$categorieText.'</span>
								<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredientiList">'.$ingredientsHtml.'</span></p>
								<div class="">
								<p class="card-text"><b>Categorie</b>:&nbsp;<span id="categorieList">'.$categorieHtml.'</span></p>
								<div class="">';
					$html .= ($mostrareBottoni)? '<a href="'.$url.'?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(\''.$url.'\',0, \''.mapSource($source).'\', \''.$nome.'\')"><i class="material-icons">open_in_new</i></a>
								<a class="share btn btn-floating" href="#" url="'.$urlToShare.'" urlImage="'.$urlImage.'"><i class="material-icons">share</i></a>':'';
					$html .= ($endorse_flag) ? '</div>
							</div>
							<div style="text-align: center;">
								<button class="waves-effect waves-light btn" onclick="endorseRecipe(\''.$idDivRicetta.'\')">Approva ricetta</button>
								<button id="modifyButton" class="waves-effect waves-light btn" onclick="mostraModifiche(\''.$idDivRicetta.'\')">Modifica</button>
								<button class="waves-effect waves-light btn"><a style="color:white" href="'.$url.'" target="_blank">Vai alla ricetta</a></button>
								<button class="waves-effect waves-light btn" onclick="discardRecipe(\''.$idDivRicetta.'\')">Scarta ricetta</button>
								<br><br>
							</div>
							<div class="row" id="modifica-panel" style="display:none">
								<div class="row">
									<div class="col-sm-3"><b>Inserisci categoria</b></div>
									<div class="col-sm-3"></div>
									<div class="col-sm-3"><b>Inserisci ingrediente</b></div>
									<div class="col-sm-3"></div>
								</div>
								<div class="col-sm-3">
									<select id="categoriaRicetta" class="col md-5">
										'.getCategoriesOptions().'
									</select>
								</div>
								<div class="col-sm-3"><button class="waves-effect waves-light btn" onclick="addCategory(\''.$idDivRicetta.'\', \'#'.$idDivRicetta.' #categoriaRicetta\')">Aggiungi</button></div>
								<div class="col-sm-3" id="containerIngrediente"></div>
								<div class="col-sm-3"><button class="waves-effect waves-light btn" onclick="addIngredientPlus(\''.$idDivRicetta.'\')">Aggiungi</button></div>
								</div>':'';
		$html .= '</div>
						 </article><!-- .end Card -->
					</div>
				</div>';
	return $html;
}


	function getCardFromFields($nome, $url, $urlImage, $source, $ingredienti, $mostrareBottoni = true) {
		$ingredientsHtml="";
		$ingredientsText="";
		$urlToShare = "http://www.apphost.it/ricette/ricetta.php?id=".$url;
		if(isset($ingredienti)) {
			for($i=0; $i<(count($ingredienti)-1); $i++) {
				$ingredient = $ingredienti[$i];
				$ingredientsText .= $ingredient["nome"]." - ";
				$ingredientsHtml .= "<span class=''>".$ingredient["nome"]."</span> - ";
			}
			$ingredientsHtml .= "<span class=''>".$ingredienti[$i]["nome"]."</span>";
			$ingredientsText .= $ingredienti[$i]["nome"];
		}
		$html = '<div class="row">
						<div class="col-xs-12 col-md-12">
							<article class="card animated fadeInLeft" id="ricetta">
							<!-- Card -->
								<img class="card-img-top img-responsive" src="'.$urlImage.'" alt="" onclick="redirectToUrl(\''.$url.'\',0, \''.mapSource($source).'\', \''.$nome.'\')"/>
								<div class="card-block">
								  <div class="my-card-title" itemprop="name">'.$nome.'</div>
									<div class="my-card-subtitle" itemprop="name"> by '.mapSource($source).'</div>
									<hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
									<p class="card-text"><b>Ingredienti</b>:&nbsp;<span id="ingredienti">'.$ingredientsHtml.'</span></p>
									<div class="">';
		$html .= ($mostrareBottoni)? '<a href="'.$url.'?ref=svuotafrigo" class="btn btn-floating" onclick="interceptRedirect(\''.$url.'\',0, \''.mapSource($source).'\', \''.$nome.'\')"><i class="material-icons">open_in_new</i></a>
									<a class="share btn btn-floating" href="#" url="'.$urlToShare.'" urlImage="'.$urlImage.'"><i class="material-icons">share</i></a>':'';
									if(strpos($_SERVER['REQUEST_URI'],'add-recipe')===false)
										$html .= '<a href="#" url="'.$url.'" onclick="return saveRecipe(this,\''.addslashes ($nome).'\',\''.$url.'\',\''.$urlImage.'\',\''.$source.'\',\''.addslashes($ingredientsText).'\')"><i class="material-icons favourite">favorite_border</i></a>';
									$html .= '</div>
								</div>
							 </article><!-- .end Card -->
						</div>
					</div>';
		return $html;
	}

	function mapSource($source){
		if($source == 'SalePepe') return 'Sale&Pepe';
		if($source == 'ilgrembiulinoinfarinato') return 'Il grembiulino infarinato';
		if($source == 'lacucinadiyuto') return 'La cucina di Yuto';
		if($source =='loscrignodelbuongusto') return 'Lo scrigno del buongusto';
		return $source;
	}

	function getToken() {
		$time = time();
		$time = str_replace('1', 'a', $time);
		$time = str_replace('2', 'x', $time);
		$time = str_replace('0', 'w', $time);
		$time = str_replace('5', 'f', $time);
		$time = str_replace('7', 'e', $time);
		$token = base64_encode($time);
		$toReturn = "";
		$tokenList = str_split($token);
		foreach($tokenList as $symbol) {
			if($symbol=='a')
				$toReturn.='b';
			else if($symbol=='b')
					$toReturn.='s';
			else if($symbol=='s')
					$toReturn.='t';
			else if($symbol=='t')
					$toReturn.='v';
			else if($symbol=='v')
					$toReturn.='Y';
			else if($symbol=='Y')
					$toReturn.='X';
			else if($symbol=='X')
					$toReturn.='a';
			else {
				$toReturn.=$symbol;
			}
		}
		return $toReturn;
	}

	function decodeToken($token) {
		$toReturn = '';
		$tokenList = str_split($token);
		foreach($tokenList as $symbol) {
			if($symbol=='b')
				$toReturn.='a';
			else if($symbol=='s')
					$toReturn.='b';
			else if($symbol=='t')
					$toReturn.='s';
			else if($symbol=='v')
					$toReturn.='t';
			else if($symbol=='Y')
					$toReturn.='v';
			else if($symbol=='X')
					$toReturn.='Y';
			else if($symbol=='a')
					$toReturn.='X';
			else {
				$toReturn.=$symbol;
			}
		}
		$toReturn = base64_decode($toReturn);
		$toReturn = str_replace('a', '1', $toReturn);
		$toReturn = str_replace('x', '2', $toReturn);
		$toReturn = str_replace('w', '0', $toReturn);
		$toReturn = str_replace('f', '5', $toReturn);
		$toReturn = str_replace('e', '7', $toReturn);

		return $toReturn;
	}

	function isValid($token) {
		if(!isset($token) || $token == '')
			return false;
		if(strcmp($token, "AlexaMarcoDeFelice123")==0)
			return true;
		$invokeTime = decodeToken($token);
		$now = time();
		return ($now - $invokeTime) < 120;
	}

	function logCall($ingredients, $token, $validToken, $page) {
		$log = new KLogger ( dirname(__FILE__)."/../logs/api_calls".date('dmY').".txt" , KLogger::DEBUG );
		$ingredientsString = '';

		foreach ($ingredients as $value) {
			$ingredientsString .= $value."-";
		}
		$ingredientsString = substr($ingredientsString, 0, -1);

		$row = $ingredientsString.";".$page.";".$token.";".$validToken;

		$log->LogDebug($row);
	}
?>
