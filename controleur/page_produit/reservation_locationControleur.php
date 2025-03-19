<?php

session_start();

$retourmsg = array();

if(isset($_POST) && count($_POST)){

    $_SESSION['reservation_location'] = array();

    $retourmsg = array(
        'msgdebut' => array(),
        'msgfin' => array(),
        'coherencedates' => array(),
    );

    if(
        array_key_exists('idPageLocation', $_POST) 
        && !empty($_POST['idPageLocation'])
    ) {
        settype($_POST['idPageLocation'], 'integer');

        if (
            array_key_exists('choixdatedebut', $_POST) 
            && !empty($_POST['choixdatedebut'])
        ){

            if ($_POST['choixdatedebut'] >= date('Y-m-d')){

                include_once '../../modele/page_produit/page_produit_location.php';

                choix_date_debut();

                $resultat_choixdatedebut = $_SESSION['choixdatedebut'];

                if (
                    array_key_exists('choixdatefin', $_POST) 
                    && !empty($_POST['choixdatefin'])
                ){

                    if ($_POST['choixdatefin'] >= date('Y-m-d')){

                        include_once '../../modele/page_produit/reservation_location.php';
                    
                        choix_date_fin();
        
                        $resultat_choixdatefin = $_SESSION['choixdatefin'];

                        if ($_POST['choixdatefin'] > $_POST['choixdatedebut']){

                            include_once '../../modele/page_produit/reservation_location.php';
                            
                            ajoutReservationLocationBDD();

                            if($_SESSION['reponse'] = 1){

                                informations_voiture_location();
                            
                                if (!is_array($_SESSION['reservation_location'])){
                                    $_SESSION['reservation_location'] = array();
                                } else {
                                    $_SESSION['reservation_location'][] = $_SESSION['voiture_reservation_location'];
                
                                    $retourmsg['reservation'] = $_SESSION['reservation_location'];
                                    $retourmsg['msg_success'] = 'Votre véhicule a bien été réservé !';
                                }

                            } else {

                                $retourmsg['msg_echec'] = 'Echec de la réservation, veuillez réessayez !';

                            }

                        } else {
                
                            $resultat_coherencedates = 'Sélectionnez des dates cohérentes';
                            $resultat_choixdatefin = "";
                            $resultat_choixdatedebut = "";
                        }
        
                    } else {
        
                        $resultat_choixdatefin = 'Saisissez une date supérieure ou égale à la date du jour';
        
                    }

                } else {

                    $resultat_choixdatefin = 'Saisissez une date de retour';

                }
            
            } else {

                $resultat_choixdatedebut = 'Saisissez une date supérieure ou égale à la date du jour';

            }

        } else {

            $resultat_choixdatedebut = 'Saisissez une date de départ';

        }
    }
}

echo json_encode ($retourmsg);


?>