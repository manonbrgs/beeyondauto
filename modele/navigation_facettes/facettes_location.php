<?php
$sql = 'SELECT * FROM vehicules_location';
$sqlnbvehiculestotales = 'SELECT COUNT(*) AS nb_vehicules_louer FROM vehicules_location';

function disponibiliteN (){
    global $sql;
    global $sqlnbvehiculestotales;
    $disponibilite = strip_tags($_POST["disponibilite"]);
    $sql .= " JOIN location ON location.idvehicule = vehicules_location.id WHERE DATE(NOW()) BETWEEN debutlocation AND finlocation";
    $sqlnbvehiculestotales .= " JOIN location ON location.idvehicule = vehicules_location.id WHERE DATE(NOW()) BETWEEN debutlocation AND finlocation";
}

function disponibiliteY (){
    global $sql;
    global $sqlnbvehiculestotales;
    $disponibilite = strip_tags($_POST["disponibilite"]);
    $sql .= " JOIN location ON location.idvehicule = vehicules_location.id WHERE DATE(NOW()) NOT BETWEEN debutlocation AND finlocation";
    $sqlnbvehiculestotales .= " JOIN location ON location.idvehicule = vehicules_location.id WHERE DATE(NOW()) NOT BETWEEN debutlocation AND finlocation";
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
    $sql .= " AND prix_journalier >'" . $minprix . "'";
    $sqlnbvehiculestotales .= " AND prix_journalier >'" . $minprix . "'";
}

function minprixWhere(){
    global $sql;
    global $sqlnbvehiculestotales;
    $minprix = strip_tags ($_POST["minprix"]);
    $sql .= " WHERE prix_journalier >'" . $minprix . "'";
    $sqlnbvehiculestotales .= " WHERE prix_journalier >'" . $minprix . "'";
}
    
function maxprixAnd(){
    global $sql;
    global $sqlnbvehiculestotales;
    $maxprix = strip_tags ($_POST["maxprix"]);
    $sql .= " AND prix_journalier <'" . $maxprix . "'";;
    $sqlnbvehiculestotales .= " AND prix_journalier <'" . $maxprix . "'";;
}
    
function maxprixWhere(){
    global $sql;
    global $sqlnbvehiculestotales;
    $maxprix = strip_tags ($_POST["maxprix"]);
    $sql .= " WHERE prix_journalier <'" . $maxprix . "'";
    $sqlnbvehiculestotales .= " WHERE prix_journalier <'" . $maxprix . "'";
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
    $sql = "SELECT * FROM vehicules_location WHERE marque LIKE '%" . $recherche . "%' OR modelFamily LIKE '%" . $recherche . "%' OR modelRange LIKE '%" . $recherche . "%' OR modelVariant LIKE '%" . $recherche . "%' OR type LIKE '%" . $recherche . "%' OR moteur LIKE '%" . $recherche . "%' OR puissance_ch LIKE '%" . $recherche . "%' OR boitedevitesse LIKE '%" . $recherche . "%' OR nombredeportes LIKE '%" . $recherche . "%' OR nombredeplaces LIKE '%" . $recherche . "%' OR anneedesortie LIKE '%" . $recherche . "%' OR prix_journalier LIKE '%" . $recherche . "%'";

    $sqlnbvehiculestotales = "SELECT COUNT(*) AS nb_vehicules_louer FROM vehicules_location WHERE marque LIKE '%" . $recherche . "%' OR modelFamily LIKE '%" . $recherche . "%' OR modelRange LIKE '%" . $recherche . "%' OR modelVariant LIKE '%" . $recherche . "%' OR type LIKE '%" . $recherche . "%' OR moteur LIKE '%" . $recherche . "%' OR puissance_ch LIKE '%" . $recherche . "%' OR boitedevitesse LIKE '%" . $recherche . "%' OR nombredeportes LIKE '%" . $recherche . "%' OR nombredeplaces LIKE '%" . $recherche . "%' OR anneedesortie LIKE '%" . $recherche . "%' OR prix_journalier LIKE '%" . $recherche . "%'";
}

function prixCroissant(){
    global $sql;
    global $sqlnbvehiculestotales;
    $trilocation = strip_tags ($_POST["trilocation"]);
    $sql .= " ORDER BY prix_journalier ASC";
    $sqlnbvehiculestotales .= " ORDER BY prix_journalier ASC";
}

function prixDecroissant(){
    global $sql;
    global $sqlnbvehiculestotales;
    $trilocation = strip_tags ($_POST["trilocation"]);
    $sql .= " ORDER BY prix_journalier DESC";
    $sqlnbvehiculestotales .= " ORDER BY prix_journalier DESC";
}

function anneeCroissant(){
    global $sql;
    global $sqlnbvehiculestotales;
    $trilocation = strip_tags ($_POST["trilocation"]);
    $sql .= " ORDER BY anneedesortie ASC";
    $sqlnbvehiculestotales .= " ORDER BY anneedesortie ASC";
}

function anneeDecroissant(){
    global $sql;
    global $sqlnbvehiculestotales;
    $trilocation = strip_tags ($_POST["trilocation"]);
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

    $location = array(
        'louer' => array(),
        'louer_nbvehiculestotales' => array()
    );

    include '../../modele/inc.connexion.php';

    $louer = $o_bdd->prepare($sql);
    $louer_nbvehiculestotales = $o_bdd->prepare($sqlnbvehiculestotales);

    $louer->execute();
    $louer_nbvehiculestotales->execute();

    while ($data = $louer->fetch())
    {
        if (!$data) // On teste si la réponse à la requête est vide.
        {
            echo 'La BDD n\'existe pas ou est vide.';
            break;
        }
        else
        {
            array_push($location['louer'] , $data);
        }
    }

    while ($data = $louer_nbvehiculestotales->fetch())
    {
        if (!$data) // On teste si la réponse à la requête est vide.
        {
            echo 'La BDD n\'existe pas ou est vide.';
            break;
        }
        else
        {
            array_push($location['louer_nbvehiculestotales'] , $data);
        }
    }
    $louer->closeCursor();
    $louer_nbvehiculestotales->closeCursor();
    echo json_encode ($location);
}

?>