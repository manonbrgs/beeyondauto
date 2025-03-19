<?php

	$sql = 'SELECT * FROM vehicules';
	$sqlnbvehiculestotales = 'SELECT COUNT(*) AS nb_vehicules_achat FROM vehicules';

	function etat (){
		global $sql;
		global $sqlnbvehiculestotales;
		$etat = strip_tags($_POST["etat"]);
		$sql .= " WHERE etat='" . $etat . "'";
		$sqlnbvehiculestotales .= " WHERE etat='" . $etat . "'";
	}
		
	function marqueAnd(){
		global $sql;
		global $sqlnbvehiculestotales;
		$marque = strip_tags ($_POST["marque"]);
		$sql .= " AND marque='" . $marque . "'";
		$sqlnbvehiculestotales .= " AND marque='" . $marque . "'";
	}
		
	function marqueWhere (){
		global $sql;
		global $sqlnbvehiculestotales;
		$marque = strip_tags ($_POST["marque"]);
		$sql .= " WHERE marque='" . $marque . "'";
		$sqlnbvehiculestotales .= " WHERE marque='" . $marque . "'";
	}
		
	function typeAnd(){
		global $sql;
		global $sqlnbvehiculestotales;
		$type = strip_tags($_POST["type"]);
		$sql .= " AND type='" . $type . "'";
		$sqlnbvehiculestotales .= " AND type='" . $type . "'";
	}
	
	function typeWhere(){
		global $sql;
		global $sqlnbvehiculestotales;
		$type = strip_tags($_POST["type"]);
		$sql .= " WHERE type='" . $type . "'";
		$sqlnbvehiculestotales .= " WHERE type='" . $type . "'";
	}
		
	function moteurAnd(){
		global $sql;
		global $sqlnbvehiculestotales;
		$moteur = strip_tags ($_POST["moteur"]);
		$sql .= " AND moteur='" . $moteur . "'";
		$sqlnbvehiculestotales .= " AND moteur='" . $moteur . "'";
	}
		
	function moteurWhere(){
		global $sql;
		global $sqlnbvehiculestotales;
		$moteur = strip_tags ($_POST["moteur"]);
		$sql .= " WHERE moteur='" . $moteur . "'";
		$sqlnbvehiculestotales .= " WHERE moteur='" . $moteur . "'";
	}
		
	function boitedevitesseAnd(){
		global $sql;
		global $sqlnbvehiculestotales;
		$boitedevitesse = strip_tags ($_POST["boitedevitesse"]);
		$sql .= " AND boitedevitesse='" . $boitedevitesse . "'";
		$sqlnbvehiculestotales .= " AND boitedevitesse='" . $boitedevitesse . "'";
	}
	
	function boitedevitesseWhere(){
		global $sql;
		global $sqlnbvehiculestotales;
		$boitedevitesse = strip_tags ($_POST["boitedevitesse"]);
		$sql .= " WHERE boitedevitesse='" . $boitedevitesse . "'";
		$sqlnbvehiculestotales .= " WHERE boitedevitesse='" . $boitedevitesse . "'";
	}
		
	function placeAnd(){
		global $sql;
		global $sqlnbvehiculestotales;
		$place = strip_tags ($_POST["place"]);
		$sql .= " AND nombredeplaces='" . $place . "'";
		$sqlnbvehiculestotales .= " AND nombredeplaces='" . $place . "'";
	}
	
	function placeWhere(){
		global $sql;
		global $sqlnbvehiculestotales;
		$place = strip_tags ($_POST["place"]);
		$sql .= " WHERE nombredeplaces='" . $place . "'";
		$sqlnbvehiculestotales .= " WHERE nombredeplaces='" . $place . "'";
	}
		
	function porteAnd(){
		global $sql;
		global $sqlnbvehiculestotales;
		$porte = strip_tags ($_POST["porte"]);
		$sql .= " AND nombredeportes='" . $porte . "'";
		$sqlnbvehiculestotales .= " AND nombredeportes='" . $porte . "'";
	}
	
	function porteWhere(){
		global $sql;
		global $sqlnbvehiculestotales;
		$porte = strip_tags ($_POST["porte"]);
		$sql .= " WHERE nombredeportes='" . $porte . "'";
		$sqlnbvehiculestotales .= " WHERE nombredeportes='" . $porte . "'";
	}
	
	function minprixAnd(){
		global $sql;
		global $sqlnbvehiculestotales;
		$minprix = strip_tags ($_POST["minprix"]);
		$sql .= " AND prix_vente >'" . $minprix . "'";
		$sqlnbvehiculestotales .= " AND prix_vente >'" . $minprix . "'";
	}

	function minprixWhere(){
		global $sql;
		global $sqlnbvehiculestotales;
		$minprix = strip_tags ($_POST["minprix"]);
		$sql .= " WHERE prix_vente >'" . $minprix . "'";
		$sqlnbvehiculestotales .= " WHERE prix_vente >'" . $minprix . "'";
	}
		
	function maxprixAnd(){
		global $sql;
		global $sqlnbvehiculestotales;
		$maxprix = strip_tags ($_POST["maxprix"]);
		$sql .= " AND prix_vente <'" . $maxprix . "'";;
		$sqlnbvehiculestotales .= " AND prix_vente <'" . $maxprix . "'";;
	}
		
	function maxprixWhere(){
		global $sql;
		global $sqlnbvehiculestotales;
		$maxprix = strip_tags ($_POST["maxprix"]);
		$sql .= " WHERE prix_vente <'" . $maxprix . "'";
		$sqlnbvehiculestotales .= " WHERE prix_vente <'" . $maxprix . "'";
	}
		
	function minanneeAnd(){
		global $sql;
		global $sqlnbvehiculestotales;
		$minannee = strip_tags ($_POST["minannee"]);
		$sql .= " AND anneedesortie >='" . $minannee . "'";;
		$sqlnbvehiculestotales .= " AND anneedesortie >='" . $minannee . "'";;
	}

	function minanneeWhere(){
		global $sql;
		global $sqlnbvehiculestotales;
		$minannee = strip_tags ($_POST["minannee"]);
		$sql .= " WHERE anneedesortie >='" . $minannee . "'";
		$sqlnbvehiculestotales .= " WHERE anneedesortie >='" . $minannee . "'";
	}
		
	function maxanneeAnd(){
		global $sql;
		global $sqlnbvehiculestotales;
		$maxannee = strip_tags ($_POST["maxannee"]);
		$sql .= " AND anneedesortie <='" . $maxannee . "'";;
		$sqlnbvehiculestotales .= " AND anneedesortie <='" . $maxannee . "'";;
	}
		
	function maxanneeWhere(){
		global $sql;
		global $sqlnbvehiculestotales;
		$maxannee = strip_tags ($_POST["maxannee"]);
		$sql .= " WHERE anneedesortie <='" . $maxannee . "'";
		$sqlnbvehiculestotales .= " WHERE anneedesortie <='" . $maxannee . "'";
	}

	function recherche(){
		global $sql;
		global $sqlnbvehiculestotales;
		$recherche = strip_tags ($_POST["recherche"]);
		$sql = "SELECT * FROM vehicules WHERE username LIKE '%" . $recherche . "%' OR marque LIKE '%" . $recherche . "%' OR modelFamily LIKE '%" . $recherche . "%' OR modelRange LIKE '%" . $recherche . "%' OR modelVariant LIKE '%" . $recherche . "%' OR type LIKE '%" . $recherche . "%' OR moteur LIKE '%" . $recherche . "%' OR puissance_ch LIKE '%" . $recherche . "%' OR boitedevitesse LIKE '%" . $recherche . "%' OR nombredeportes LIKE '%" . $recherche . "%' OR nombredeplaces LIKE '%" . $recherche . "%' OR anneedesortie LIKE '%" . $recherche . "%' OR stock LIKE '%" . $recherche . "%' OR prix_vente LIKE '%" . $recherche . "%' OR etat LIKE '%" . $recherche . "%'";

		$sqlnbvehiculestotales = "SELECT COUNT(*) AS nb_vehicules_achat FROM vehicules WHERE username LIKE '%" . $recherche . "%' OR marque LIKE '%" . $recherche . "%' OR modelFamily LIKE '%" . $recherche . "%' OR modelRange LIKE '%" . $recherche . "%' OR modelVariant LIKE '%" . $recherche . "%' OR type LIKE '%" . $recherche . "%' OR moteur LIKE '%" . $recherche . "%' OR puissance_ch LIKE '%" . $recherche . "%' OR boitedevitesse LIKE '%" . $recherche . "%' OR nombredeportes LIKE '%" . $recherche . "%' OR nombredeplaces LIKE '%" . $recherche . "%' OR anneedesortie LIKE '%" . $recherche . "%' OR stock LIKE '%" . $recherche . "%' OR prix_vente LIKE '%" . $recherche . "%' OR etat LIKE '%" . $recherche . "%'";
	}

	function prixCroissant(){
		global $sql;
		global $sqlnbvehiculestotales;
		$triachat = strip_tags ($_POST["triachat"]);
		$sql .= " ORDER BY prix_vente ASC";
		$sqlnbvehiculestotales .= " ORDER BY prix_vente ASC";
	}

	function prixDecroissant(){
		global $sql;
		global $sqlnbvehiculestotales;
		$triachat = strip_tags ($_POST["triachat"]);
		$sql .= " ORDER BY prix_vente DESC";
		$sqlnbvehiculestotales .= " ORDER BY prix_vente DESC";
	}

	function anneeCroissant(){
		global $sql;
		global $sqlnbvehiculestotales;
		$triachat = strip_tags ($_POST["triachat"]);
		$sql .= " ORDER BY anneedesortie ASC";
		$sqlnbvehiculestotales .= " ORDER BY anneedesortie ASC";
	}

	function anneeDecroissant(){
		global $sql;
		global $sqlnbvehiculestotales;
		$triachat = strip_tags ($_POST["triachat"]);
		$sql .= " ORDER BY anneedesortie DESC";
		$sqlnbvehiculestotales .= " ORDER BY anneedesortie DESC";
	}

	function pagination(){
		global $sql;
		$page = strip_tags ($_POST["page"]);
		$premierarticle = strip_tags ($_POST["premierarticle"]);
		$nbvehiculesparpage = strip_tags ($_POST["nbvehiculesparpage"]);
	
		$premierarticle = ($page * $nbvehiculesparpage) - $nbvehiculesparpage;
	
		$sql .= " LIMIT ".$premierarticle." , ".$nbvehiculesparpage."";
	}

	function executionRequete(){
		global $o_bdd;
		global $sql;
		global $sqlnbvehiculestotales;
		
		$achat = array(
			'acheter' => array(),
			'acheter_nbvehiculestotales' => array()
		);
		
		include '../../modele/inc.connexion.php';

		$acheter = $o_bdd->prepare($sql);
		$acheter_nbvehiculestotales = $o_bdd->prepare($sqlnbvehiculestotales);

		$acheter->execute();
		$acheter_nbvehiculestotales->execute();

		while ($data = $acheter->fetch())
		{
			if (!$data) // On teste si la réponse à la requête est vide.
			{
				echo 'La BDD n\'existe pas ou est vide.';
				break;
			}
			else
			{
				array_push($achat['acheter'], $data);
			}
		}

		while ($data = $acheter_nbvehiculestotales->fetch())
		{
			if (!$data) // On teste si la réponse à la requête est vide.
			{
				echo 'La BDD n\'existe pas ou est vide.';
				break;
			}
			else
			{
				array_push($achat['acheter_nbvehiculestotales'] , $data);
			}
		}
		$acheter->closeCursor();
		$acheter_nbvehiculestotales->closeCursor();
		echo json_encode ($achat);
	}
	
?>