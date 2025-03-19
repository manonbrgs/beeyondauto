<?php

session_start();

$retourmsg = array(
    'msg_retour' => array(),
);

if (isset($_POST) && count($_POST)){

    $_SESSION['reservation_achat'] = array();

    if (
        array_key_exists('attributIdCarAchat', $_POST) 
        && !empty($_POST['attributIdCarAchat'])
    ){

        settype($_POST['attributIdCarAchat'], 'integer');

        if (
            isset($_POST["choixquantite"]) &&
            array_key_exists('choixquantite', $_POST) &&
            (!empty($_POST["choixquantite"]))
        ){

            settype($_POST['choixquantite'],"integer");

            if (
                is_numeric($_POST["choixquantite"]) &&
                preg_match('/^\d+$/', $_POST["choixquantite"]) &&
                ($_POST["choixquantite"] > 0)
            ){

                include_once '../../modele/page_produit/reservation_achat.php';
                        
                ajoutReservationAchatBDD();
                $reponse = $_SESSION['reponse'];
        
                if($reponse === 1){

                    gestion_stock();

                    informations_voiture_achat();

                    if (!is_array($_SESSION['reservation_achat'])) {
                        $_SESSION['reservation_achat'] = array();
                    } else {
                        $_SESSION['reservation_achat'][] = $_SESSION['voiture_reservation_achat'];
        
                        $retourmsg['reservation'] = $_SESSION['reservation_achat'];
        
                        $retourmsg['msg_success'] = 'Votre véhicule a bien été réservé !';
                    }

                } else {

                    $retourmsg['msg_echec'] = 'Echec de la réservation, veuillez réessayez !';

                }

            } else {

                $msg_retour = 'Sélectionner un chiffre supérieur à 0';

            }

        } else {

            $msg_retour = 'Aucune quantité n\' a été sélectionnée'; 

        }

    } else {

        $msg_retour = 'Aucun véhicule sélectionné';

    }

} else {

    $msg_retour = 'Aucune quantité n\' a été sélectionnée';

}

global $msg_retour;

array_push($retourmsg['msg_retour'], $msg_retour);

echo json_encode ($retourmsg);


?>