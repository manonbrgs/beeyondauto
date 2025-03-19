<?php 

include '../../modele/navigation_facettes/facettes_location.php';

if ($_POST && count($_POST)) {

    if (
        isset($_POST["recherche"]) &&
        count($_POST) && 
        array_key_exists('recherche', $_POST) &&
        (!empty($_POST["recherche"])) &&
        is_string($_POST["recherche"])
    ){
        recherche();
    }

    if(
        isset($_POST["disponibilite"]) &&
        count($_POST) && 
        array_key_exists('disponibilite', $_POST) &&
        (!empty($_POST["disponibilite"])) &&
        is_string($_POST["disponibilite"]) 
    ){
        if ($_POST["disponibilite"] === 'INDISPONIBLE'){
            disponibiliteN();
        } else {
            disponibiliteY();
        }

    } else {

        $disponibilite = "";

    }

    if (
        isset($_POST["marque"]) &&
        count($_POST) && 
        array_key_exists('marque', $_POST) &&
        (!empty($_POST["marque"])) &&
        is_string($_POST["marque"]) 
    ){

        if(strpos($sql, 'WHERE') !== false){
            marqueAnd();
        } else {
            marqueWhere();
        }
        
    } else {

        $marque = "";

    }

    if (
        isset($_POST["type"]) &&
        count($_POST) && 
        array_key_exists('type', $_POST) &&
        (!empty($_POST["type"])) &&
        is_string($_POST["type"]) 
    ){

        if(strpos($sql, 'WHERE') !== false){
            typeAnd();
        } else {
            typeWhere();
        }

    } else {

        $type = "";
    
    }

    if (
        isset($_POST["moteur"]) &&
        count($_POST) && 
        array_key_exists('moteur', $_POST) &&
        (!empty($_POST["moteur"])) &&
        is_string($_POST["moteur"]) 
    ){

        if(strpos($sql, 'WHERE') !== false){
            moteurAnd();
        } else {
            moteurWhere();
        }

    } else {

        $moteur = "";

    }

    if (
        isset($_POST["boitedevitesse"]) &&
        count($_POST) && 
        array_key_exists('boitedevitesse', $_POST) &&
        (!empty($_POST["boitedevitesse"])) &&
        is_string($_POST["boitedevitesse"]) 
    ){

        if(strpos($sql, 'WHERE') !== false){
            boitedevitesseAnd();
        } else {
            boitedevitesseWhere();
        }

    } else {

        $boitedevitesse = "";

    }

    if (
        isset($_POST["place"]) &&
        count($_POST) && 
        array_key_exists('place', $_POST) &&
        (!empty($_POST["place"])) &&
        is_string($_POST["place"]) &&
        preg_match('/^\d+$/', $_POST["place"]) &&
        ($_POST["place"] > 0)
    ){

        if(strpos($sql, 'WHERE') !== false){
            placeAnd();
        } else {
            placeWhere();
        }

    } else {

        $place = "";

    }

    if (
        isset($_POST["porte"]) &&
        count($_POST) && 
        array_key_exists('porte', $_POST) &&
        (!empty($_POST["porte"])) &&
        is_string($_POST["porte"]) &&
        preg_match('/^\d+$/', $_POST["porte"]) &&
        ($_POST["porte"] > 0)
    ){

        if(strpos($sql, 'WHERE') !== false){
            porteAnd();
        } else {
            porteWhere();
        }

    } else {

        $porte = "";

    }


    if (
        isset($_POST["minprix"]) &&
        count($_POST) && 
        array_key_exists('minprix', $_POST) &&
        (!empty($_POST["minprix"])) &&
        is_string($_POST["minprix"]) &&
        preg_match('/^\d+$/', $_POST["minprix"]) &&
        ($_POST["minprix"] >= 0)
    ){

        if(strpos($sql, 'WHERE') !== false){
            minprixAnd();
        } else {
            minprixWhere();
        }

    } else {

        $minprix = "";

    }

    if (
        isset($_POST["maxprix"]) &&
        count($_POST) && 
        array_key_exists('maxprix', $_POST) &&
        (!empty($_POST["maxprix"])) &&
        is_string($_POST["maxprix"]) &&
        preg_match('/^\d+$/', $_POST["maxprix"]) &&
        ($_POST["maxprix"] > 0)
    ){

        if(strpos($sql, 'WHERE') !== false){
            maxprixAnd();
        } else {
            maxprixWhere();
        }

    } else {

        $maxprix = "";

    }

    if (
        isset($_POST["minannee"]) &&
        count($_POST) && 
        array_key_exists('minannee', $_POST) &&
        (!empty($_POST["minannee"])) &&
        is_string($_POST["minannee"]) &&
        preg_match('/^\d{4}$/', $_POST["minannee"]) &&
        ($_POST["minannee"] > 0)
    ){

        if(strpos($sql, 'WHERE') !== false){
            minanneeAnd();
        } else {
            minanneeWhere();
        }

    } else {

        $minannee = "";

    }

    if (
        isset($_POST["maxannee"]) &&
        count($_POST) && 
        array_key_exists('maxannee', $_POST) &&
        (!empty($_POST["maxannee"])) &&
        is_string($_POST["maxannee"]) &&
        preg_match('/^\d{4}$/', $_POST["maxannee"]) &&
        ($_POST["maxannee"] > 0)
    ){

        if(strpos($sql, 'WHERE') !== false){
            maxanneeAnd();
        } else {
            maxanneeWhere();
        }

    } else {

        $maxannee = "";

    }

    if (
        isset($_POST["trilocation"]) &&
        count($_POST) && 
        array_key_exists('trilocation', $_POST) &&
        (!empty($_POST["trilocation"])) &&
        is_string($_POST["trilocation"])
    ){

        if($_POST["trilocation"] === 'location_prix_croissant'){
            prixCroissant();
        } else if ($_POST["trilocation"] === 'location_prix_decroissant') {
            prixDecroissant();
        } else if ($_POST["trilocation"] === 'location_annee_croissant'){
            anneeCroissant();
        } else if ($_POST["trilocation"] === 'location_annee_decroissant'){
            anneeDecroissant();
        }

    } else {

        $trilocation = "";

    }

    if (
        count($_POST) &&
        isset($_POST["premierarticle"]) &&
        isset($_POST["nbvehiculesparpage"]) &&
        array_key_exists('premierarticle', $_POST) &&
        array_key_exists('nbvehiculesparpage', $_POST)){

            settype($_POST["premierarticle"], 'integer');
            settype($_POST["nbvehiculesparpage"], 'integer');

            if (
                is_numeric($_POST["premierarticle"]) &&
                is_numeric($_POST["nbvehiculesparpage"])
            ){

                pagination();
            
            } else {

                $premierarticle = "";
                $nbvehiculesparpage = "";

            }
            
    }
        
} else {
    $sql += 'SELECT * FROM vehicules_location';
}

    executionRequete();

?>